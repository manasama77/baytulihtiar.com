<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class DashboardController extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
    // $this->load->model('M_dashboard', 'mdashboard');
		$this->load->library('TemplateAnggota', NULL, 'template');
	}

	public function index()
	{
		if(!$this->session->userdata('cif_no') && !$this->session->userdata('nama')){
			redirect('logout/anggota');
		}else{
			$sess_cif_no     = $this->session->userdata('cif_no');
			$data['title']   = 'Dashboard';
			$data['content'] = 'dashboard/index';
			$data['vitamin'] = 'anggota_dashboard_vitamin';
			$data['arrs']    = $this->mcore->get('anggota', '*', ['cif_no' => $sess_cif_no], NULL, 'ASC', NULL,  NULL);
			$sirkah          = json_decode($this->sirkah($sess_cif_no));

			$data['saldo_simpanan_pokok']    = $sirkah->saldo_simpanan_pokok;
			$data['saldo_simpanan_wajib']    = $sirkah->saldo_simpanan_wajib;
			$data['saldo_simpanan_sukarela'] = $sirkah->saldo_simpanan_sukarela;
			$data['data_taber']              = $sirkah->data_taber;
			$data['data_saldo_pembiayaan']   = $sirkah->data_saldo_pembiayaan;

			$this->template->template($data);
		}
	}

	public function sirkah($cif_no)
	{
		$data_taber            = [];
		$data_saldo_pembiayaan = [];

		$ch = curl_init();

		curl_setopt($ch, CURLOPT_URL,"http://app.baytulikhtiar.com/index.php/webservices/get_saldo_anggota_apm");
		curl_setopt($ch, CURLOPT_POST, 1);
		curl_setopt($ch, CURLOPT_POSTFIELDS, ['cif_no' => $cif_no]);

		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

		$server_output = curl_exec($ch);
		$result = json_decode($server_output);
		curl_close ($ch);

		$saldo_simpanan_pokok    = $result->saldo_simpanan_pokok;
		$saldo_simpanan_wajib    = $result->saldo_simpanan_wajib;
		$saldo_simpanan_sukarela = $result->saldo_simpanan_sukarela;

		if($result->taber->count > 0){
			for ($i=0; $i < $result->taber->count; $i++) {
				$nested_taber = [
					'account_saving_no' => $result->taber->$i->account_saving_no,
					'product_code'      => $result->taber->$i->product_code,
					'product_name'      => $result->taber->$i->product_name,
					'saldo_memo'        => $result->taber->$i->saldo_memo,
				];

				$data_taber[] = $nested_taber;
			}
		}

		if($result->saldo_pembiayaan->count > 0){
			for ($i=0; $i < $result->saldo_pembiayaan->count; $i++) {
				$nested_saldo_pembiayaan = [
					'account_saving_no' => $result->saldo_pembiayaan->$i->account_saving_no,
					'product_code'      => $result->saldo_pembiayaan->$i->product_code,
					'product_name'      => $result->saldo_pembiayaan->$i->product_name,
					'saldo_memo'        => $result->saldo_pembiayaan->$i->saldo_memo,
				];

				$data_saldo_pembiayaan[] = $nested_saldo_pembiayaan;
			}
		}

		return json_encode(compact('saldo_simpanan_pokok', 'saldo_simpanan_wajib', 'saldo_simpanan_sukarela', 'data_taber', 'data_saldo_pembiayaan'));
	}

}

/* End of file DashboardController.php */
/* Location: ./application/controllers/backend/DashboardController.php */