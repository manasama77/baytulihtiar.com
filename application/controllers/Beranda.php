<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Beranda extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
	}

	private function _template($data)
	{
		$this->load->view('frontend/template', $data);
	}

	public function index()
	{
		// $data['anggota']     = 0;
		// $data['outstanding'] = 0;
		// $data['angsuran']    = 0;
		$sirkah              = $this->sirkah();
		$data['anggota']     = $sirkah['get_count_anggota'][0]->count;
		$data['outstanding'] = $sirkah['get_outstanding'][0]->sum / 1000000;
		$data['angsuran']    = ($sirkah['get_count_par_lancar'][0]->count / $sirkah['get_count_par_all'][0]->count) * 100;

		$data['navbar']  = 'navbar1';
		$data['title']   = 'KSPPS Baytul Ikhtiar | Beranda';
		$data['content'] = 'beranda/main';
		$data['vitamin'] = 'beranda/vitamin';
		$data['beritas'] = $this->mcore->get('berita', '*', ['flag_aktif' => 'aktif'], 'id', 'DESC', 6, NULL);
		$data['kisahs']  = $this->mcore->get('kisah', '*', ['flag_aktif' => 'aktif'], 'id', 'DESC', 3, NULL);
		$data['kenals']  = $this->mcore->get('profile', '*', NULL,  'id', 'ASC', 3, NULL);
		$this->_template($data);
	}

	public function sirkah()
	{
		$url = 'http://app.baytulikhtiar.com/index.php/webservices/get_detail';

		$tgl_obj   = new DateTime('now');
		$curr_date = $tgl_obj->modify('first day of last month');

		// $get_periode  = date('d-m-Y');
		// $exp_bulans   = explode('-', $get_periode);
		// $exp_tahuns   = explode('-', $exp_bulans[2]);
		// $get_bulan    = $exp_bulans[1] - 1;
		// $post_tanggal = $exp_tahuns[0].'-'.$get_bulan.'-'.'1';

		$fields['from_date'] = $curr_date->format('Y-m-d');
    //url-ify the data for the POST
		$field_string = http_build_query($fields);

    //open connection
		$ch = curl_init();

    //set the url, number of POST vars, POST data
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
		curl_setopt($ch, CURLOPT_URL, $url);
		curl_setopt($ch, CURLOPT_POST, count($field_string));
		curl_setopt($ch, CURLOPT_POSTFIELDS, $field_string);
		curl_setopt($ch,CURLOPT_SSL_VERIFYPEER, false);

    //execute post
		$content = curl_exec($ch);
    //close connection
		curl_close($ch);
		$ret = json_decode($content);

		$data['get_count_par_lancar'] = $ret->get_count_par_lancar;
		$data['get_count_par_all']    = $ret->get_count_par_all;
		$data['get_count_anggota']    = $ret->get_count_anggota;
		$data['get_sum_saldo']        = $ret->get_sum_saldo;
		$data['get_pembiayaan']       = $ret->get_pembiayaan;
		$data['get_outstanding']      = $ret->get_outstanding;
		return $data;
	}

	public function store_tanya()
	{
		$tgl_obj = new DateTime('now');
		$nama    = $this->input->post('nama', TRUE);
		$email   = $this->input->post('email', TRUE);
		$pesan   = $this->input->post('pesan', TRUE);

		$data = [
			'nama'         => $nama,
			'email'        => $email,
			'pesan'        => $pesan,
			'created_date' => $tgl_obj->format('Y-m-d H:i:s')
		];
		$exec = $this->mcore->store('bukutamu', $data);

		if($exec === FALSE){
			http_response_code(500);
			echo json_encode(['code' => 500]);
			exit;
		}else{
			http_response_code(200);
			echo json_encode(['code' => 200]);
			exit;
		}
	}

}

/* End of file Beranda.php */
/* Location: ./application/controllers/Beranda.php */