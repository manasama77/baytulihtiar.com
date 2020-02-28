<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class AdminController extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('M_backend_admin', 'madmin');
		$this->load->library('TemplateAdmin', NULL, 'template');
	}

	public function index()
	{
		$data['title']                 = 'List Admin';
		$data['content']               = 'admin/index';
		$data['vitamin']               = 'admin_admin_vitamin';

		$limit  = 10;
		$offset = 0;

		if($this->input->get('per_page')){
			$offset = $this->input->get('per_page');
		}

		$this->load->library('pagination');

		$config['base_url']            = site_url('backend/admin/index');
		$config['total_rows']          = $this->mcore->count('admin', NULL);
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

		$data['arrs'] = $this->mcore->get('admin', '*', NULL, 'id', 'ASC', $limit, $offset);

		$this->template->template($data);
	}

	public function store()
	{
		$username       = $this->input->post('username');
		$nama           = $this->input->post('nama');
		$password       = $this->_passwordGenerate($this->input->post('password'));
		$flag_aktif     = $this->input->post('flag_aktif');
		$id_admin       = $this->session->userdata('id');
		$username_admin = $this->session->userdata('username');
		$nama_admin     = $this->session->userdata('nama');

		$data = [
			'username'   => $username,
			'nama'       => $nama,
			'password'   => $password,
			'flag_aktif' => $flag_aktif,
			'created_by' => $id_admin,
			'created_at' => date('Y-m-d H:i:s')
		];
		$exec = $this->mcore->store('admin', $data);
		if($exec === TRUE){
			$code = 200;
		}else{
			$code = 500;
		}

		echo json_encode(compact('code', 'isi'));
		exit;
	}

	public function edit($id)
	{
		$arrs = $this->mcore->get('admin', '*', ['id' => $id], NULL, 'ASC', NULL, NULL);

		if($arrs->num_rows() == 0){
			$code   = 500;
			$result = NULL;
		}else{
			$code         = 200;
			$data['arrs'] = $arrs;
			$result       = $this->load->view('admin/admin/modal', $data, TRUE);

			// DEBUG PURPOSE ONLY
			// $data['arrs'] = $arrs;
			// return $this->load->view('admin/admin/modal', $data, FALSE);
		}

		echo json_encode([
			'code'  => $code,
			'judul' => 'Edit Admin - '.$arrs->row()->nama,
			'data'  => $result
		]);
		exit;
	}

	public function update()
	{
		$url  = $_SERVER['HTTP_REFERER'];
		$id   = $this->input->post('id_edit');
		$nama = $this->input->post('nama_edit');

		$data = [
			'nama' => $nama
		];
		$exec = $this->mcore->update('admin', $data, ['id' => $id]);
		if($exec){
			$this->session->set_flashdata('edit', 'Edit Berhasil');
			redirect($url,'refresh');
		}else{
			show_error('Terjadi kesalahan dengan Database, silahkan coba kembali', 500, 'Oops...');
		}
		exit;
	}

	public function destroy($id)
	{
		$url = $_SERVER['HTTP_REFERER'];
		$exec = $this->mcore->delete('admin', ['id' => $id]);

		if($exec){
			$this->session->set_flashdata('delete', 'Delete Berhasil');
			redirect($url,'refresh');
		}else{
			show_error('Terjadi kesalahan dengan Database, silahkan coba kembali', 500, 'Oops...');
		}
		exit;
	}

	public function flag($flag, $id)
	{
		$url = $_SERVER['HTTP_REFERER'];
		if($flag == 1){
			$flag_msg = 'Aktifkan admin berhasil';
			$object = ['flag_aktif' => 'aktif'];
		}elseif($flag == 0){
			$flag_msg = 'Non Aktifkan admin berhasil';
			$object = ['flag_aktif' => 'tidak aktif'];
		}

		$exec = $this->mcore->update('admin', $object, ['id' => $id]);

		if($exec){
			$this->session->set_flashdata('flag', $flag_msg);
			redirect($url);
		}else{
			show_error('Terjadi kesalahan dengan Database, silahkan coba kembali', 500, 'Oops...');
		}
		exit;
	}

	public function check($username)
	{
		$count = $this->mcore->count('admin', ['username' => $username]);

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
		$id       = $this->input->post('id_reset');
		$password = $this->_passwordGenerate($this->input->post('new_password'));
		$exec     = $this->mcore->update('admin', ['password' => $password], ['id' => $id]);

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

/* End of file AdminController.php */
/* Location: ./application/controllers/backend/AdminController.php */