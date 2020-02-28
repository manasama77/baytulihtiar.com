<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class KaryawanController extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('M_backend_karyawan', 'mkaryawan');
		$this->load->library('TemplateAdmin', NULL, 'template');
	}

	public function index()
	{
		$data['title']                 = 'List Karyawan';
		$data['content']               = 'karyawan/index';
		$data['vitamin']               = 'admin_karyawan_vitamin';

		$limit  = 10;
		$offset = 0;

		if($this->input->get('per_page')){
			$offset = $this->input->get('per_page');
		}

		$this->load->library('pagination');

		$config['base_url']            = site_url('backend/karyawan/index');
		$config['total_rows']          = $this->mcore->count('karyawan', NULL);
		$config['per_page']            = $limit;
		$config['use_page_numbers']    = FALSE;
		$config['enable_query_string'] = TRUE;
		$config['page_query_string']   = TRUE;
		$config['reuse_query_string']  = TRUE;
		$config['full_tag_open']       = '<ul class="pagination">';
		$config['full_tag_close']      = '</ul>';
		$config['attributes']          = ['class' => 'page-link'];
		$config['first_link']          = false;
		$config['last_link']           = false;
		$config['first_tag_open']      = '<li class="page-item">';
		$config['first_tag_close']     = '</li>';
		$config['prev_link']           = '&laquo';
		$config['prev_tag_open']       = '<li class="page-item">';
		$config['prev_tag_close']      = '</li>';
		$config['next_link']           = '&raquo';
		$config['next_tag_open']       = '<li class="page-item">';
		$config['next_tag_close']      = '</li>';
		$config['last_tag_open']       = '<li class="page-item">';
		$config['last_tag_close']      = '</li>';
		$config['cur_tag_open']        = '<li class="page-item active"><a href="#" class="page-link">';
		$config['cur_tag_close']       = '<span class="sr-only">(current)</span></a></li>';
		$config['num_tag_open']        = '<li class="page-item">';
		$config['num_tag_close']       = '</li>';

		$this->pagination->initialize($config);

		$data['arrs'] = $this->mcore->get('karyawan', '*', NULL, 'nik', 'ASC', $limit, $offset);

		$this->template->template($data);
	}

	public function store()
	{
		$nik        = $this->input->post('nik');
		$nama       = $this->input->post('nama');
		$password   = $this->_passwordGenerate($this->input->post('password'));
		$flag_aktif = $this->input->post('flag_aktif');
		$created_by = $this->session->userdata('id');

		$data = [
			'nik'        => $nik,
			'nama'       => $nama,
			'password'   => $password,
			'flag_aktif' => $flag_aktif,
			'created_by' => $created_by,
			'created_at' => date('Y-m-d H:i:s')
		];
		$exec = $this->mcore->store('karyawan', $data);
		if($exec === TRUE){
			$code = 200;
		}else{
			$code = 500;
		}

		echo json_encode(compact('code', 'isi'));
		exit;
	}

	public function edit($nik)
	{
		$arrs = $this->mcore->get('karyawan', '*', ['nik' => $nik], NULL, 'ASC', NULL, NULL);

		if($arrs->num_rows() == 0){
			$code   = 500;
			$result = NULL;
		}else{
			$code         = 200;
			$data['arrs'] = $arrs;
			$result       = $this->load->view('admin/karyawan/modal', $data, TRUE);

			// DEBUG PURPOSE ONLY
			// $data['arrs'] = $arrs;
			// return $this->load->view('karyawan/karyawan/modal', $data, FALSE);
		}

		echo json_encode([
			'code'  => $code,
			'judul' => 'Edit Karyawan - '.$arrs->row()->nama,
			'data'  => $result
		]);
		exit;
	}

	public function update()
	{
		$url  = $_SERVER['HTTP_REFERER'];
		$nik  = $this->input->post('nik_edit');
		$nama = $this->input->post('nama_edit');

		$data = [
			'nama' => $nama
		];
		$exec = $this->mcore->update('karyawan', $data, ['nik' => $nik]);
		if($exec){
			$this->session->set_flashdata('edit', 'Edit Berhasil');
			redirect($url,'refresh');
		}else{
			show_error('Terjadi kesalahan dengan Database, silahkan coba kembali', 500, 'Oops...');
		}
		exit;
	}

	public function destroy($nik)
	{
		$url = $_SERVER['HTTP_REFERER'];
		$exec = $this->mcore->delete('karyawan', ['nik' => $nik]);

		if($exec){
			$this->session->set_flashdata('delete', 'Delete Berhasil');
			redirect($url,'refresh');
		}else{
			show_error('Terjadi kesalahan dengan Database, silahkan coba kembali', 500, 'Oops...');
		}
		exit;
	}

	public function flag($flag, $nik)
	{
		$url = $_SERVER['HTTP_REFERER'];
		if($flag == 1){
			$flag_msg = 'Aktifkan karyawan berhasil';
			$object = ['flag_aktif' => 'aktif'];
		}elseif($flag == 0){
			$flag_msg = 'Non Aktifkan karyawan berhasil';
			$object = ['flag_aktif' => 'tidak aktif'];
		}

		$exec = $this->mcore->update('karyawan', $object, ['nik' => $nik]);

		if($exec){
			$this->session->set_flashdata('flag', $flag_msg);
			redirect($url);
		}else{
			show_error('Terjadi kesalahan dengan Database, silahkan coba kembali', 500, 'Oops...');
		}
		exit;
	}

	public function check($nik)
	{
		$count = $this->mcore->count('karyawan', ['nik' => $nik]);

		if($count == 0){
			echo json_encode(['code' => 200]);
			exit;
		}else{
			echo json_encode(['code' => 400]);
			exit;
		}

	}

	public function reset()
	{
		$nik      = $this->input->post('id_reset');
		$password = $this->_passwordGenerate($this->input->post('new_password'));
		$exec     = $this->mcore->update('karyawan', ['password' => $password], ['nik' => $nik]);

		if($exec){
			echo json_encode(['code' => 200]);
			exit;
		}else{
			echo json_encode(['code' => 400]);
			exit;
		}
	}

	public function _passwordGenerate($password)
	{
		return sha1($password.UYAH);
	}

}

/* End of file KaryawanController.php */
/* Location: ./application/controllers/backend/KaryawanController.php */