<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class KisahController extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('M_backend_kisah', 'mkisah');
		$this->load->library('TemplateAdmin', NULL, 'template');
	}

	public function index()
	{
		$data['title']                 = 'List Kisah';
		$data['content']               = 'kisah/index';
		$data['vitamin']               = 'admin_kisah_vitamin';
		$data['status_filter']         = NULL;
		$data['admin_karyawan_filter'] = NULL;

		if($this->input->get('status_filter') != NULL){
			$limit  = 10;
			$offset = 0;

			if($this->input->get('per_page')){
				$offset = $this->input->get('per_page');
			}

			$this->load->library('pagination');

			$status_filter         = $this->input->get('status_filter');
			$admin_karyawan_filter = $this->input->get('admin_karyawan_filter');

			$config['base_url']            = site_url('backend/kisah/index');
			$config['total_rows']          = $this->mkisah->count($status_filter, $admin_karyawan_filter);
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

			$data['status_filter']         = $status_filter;
			$data['admin_karyawan_filter'] = $admin_karyawan_filter;
			$data['arrs']                  = $this->mkisah->get_data($limit, $offset, $status_filter, $admin_karyawan_filter);
		}

		$this->template->template($data);
	}

	public function create()
	{
		$data['title']   = 'Tambah Kisah';
		$data['content'] = 'kisah/form';
		$data['vitamin'] = 'admin_kisah_form_vitamin';

		$this->template->template($data);
	}

	public function store()
	{
		$judul          = $this->input->post('judul');
		$video          = $this->input->post('video');
		$id_admin       = $this->session->userdata('id');
		$username_admin = $this->session->userdata('username');
		$nama_admin     = $this->session->userdata('nama');

		$data = [
			'judul'      => $judul,
			'video'      => $video,
			'flag_aktif' => 'tidak aktif',
			'id_admin'   => $id_admin,
			'nama_admin' => $nama_admin,
			'date_admin' => date('Y-m-d H:i:s')
		];
		$exec = $this->mcore->store('kisah', $data);
		if($exec === TRUE){
			$code = 200;
		}else{
			$code = 500;
		}

		echo json_encode(compact('code', 'isi'));
		exit;
	}

	public function show($id)
	{
		$arrs = $this->mcore->get('kisah', '*', ['id' => $id], NULL, 'ASC', NULL, NULL);

		if($arrs->num_rows() == 0){
			$code   = 500;
			$result = NULL;
		}else{
			$code         = 200;
			$data['arrs'] = $arrs;
			$result       = $this->load->view('admin/kisah/modal', $data, TRUE);

			// DEBUG PURPOSE ONLY
			// $data['arrs'] = $arrs;
			// return $this->load->view('admin/kisah/modal', $data, FALSE);
		}

		echo json_encode([
			'code'  => $code,
			'judul' => $arrs->row()->judul,
			'data'  => $result
		]);
		exit;
	}

	public function edit($id)
	{

		$data['title']   = 'Edit Kisah';
		$data['content'] = 'kisah/form_edit';
		$data['vitamin'] = 'admin_kisah_form_edit_vitamin';

		$arrs                 = $this->mcore->get('kisah', '*', ['id' => $id], NULL, 'ASC', NULL, NULL);
		$data['id_kisah']     = $arrs->row()->id;
		$data['judul_kisah']  = $arrs->row()->judul;
		$data['video_kisah']  = $arrs->row()->video;

		$this->template->template($data);
	}

	public function update()
	{
		$id    = $this->input->post('id');
		$judul = $this->input->post('judul');
		$video = $this->input->post('video');

		$data = [
			'judul'      => $judul,
			'video'      => $video,
			'flag_aktif' => 'tidak aktif',
		];
		$exec = $this->mkisah->update_kisah('kisah', $data, $id);
		if($exec === TRUE){
			$code = 200;
		}else{
			$code = 500;
		}

		echo json_encode(compact('code', 'isi'));
		exit;
	}

	public function destroy($id)
	{
		$url  = $_SERVER['HTTP_REFERER'];
		$exec = $this->mcore->delete('kisah', ['id' => $id]);

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
			$flag_msg = 'Aktifkan kisah berhasil';
			$object = ['flag_aktif' => 'aktif'];
		}elseif($flag == 0){
			$flag_msg = 'Non Aktifkan kisah berhasil';
			$object = ['flag_aktif' => 'tidak aktif'];
		}

		$exec = $this->mcore->update('kisah', $object, ['id' => $id]);

		if($exec){
			$this->session->set_flashdata('flag', $flag_msg);
			redirect($url);
		}else{
			show_error('Terjadi kesalahan dengan Database, silahkan coba kembali', 500, 'Oops...');
		}
		exit;
	}

}

/* End of file KisahController.php */
/* Location: ./application/controllers/backend/KisahController.php */