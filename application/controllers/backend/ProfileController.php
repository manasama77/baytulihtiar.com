<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ProfileController extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('M_backend_profile', 'mprofile');
		$this->load->library('TemplateAdmin', NULL, 'template');
	}

	public function index()
	{
		$data['title']   = 'List Profile';
		$data['content'] = 'profile/index';
		$data['vitamin'] = 'admin_profile_vitamin';
		$data['arrs']    = $this->mcore->get('profile', '*', NULL, 'id', 'ASC', NULL, NULL);

		$this->template->template($data);
	}

	public function show($id)
	{
		$arrs = $this->mcore->get('profile', '*', ['id' => $id], NULL, 'ASC', NULL, NULL);

		if($arrs->num_rows() == 0){
			$code   = 500;
			$result = NULL;
		}else{
			$code         = 200;
			$data['arrs'] = $arrs;
			$result       = $this->load->view('admin/profile/modal', $data, TRUE);

			// DEBUG PURPOSE ONLY
			// $data['arrs'] = $arrs;
			// return $this->load->view('admin/berita/modal', $data, FALSE);
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

		$data['title']   = 'Edit Profile';
		$data['content'] = 'profile/form_edit';
		$data['vitamin'] = 'admin_profile_form_edit_vitamin';

		$arrs                   = $this->mcore->get('profile', '*', ['id' => $id], NULL, 'ASC', NULL, NULL);
		$data['id_profile']     = $arrs->row()->id;
		$data['judul_profile']  = $arrs->row()->judul;
		$data['isi_profile']    = $arrs->row()->isi;
		$data['gambar_profile'] = $arrs->row()->gambar;

		$this->template->template($data);
	}

	public function update()
	{
		$id         = $this->input->post('id');
		$judul      = $this->input->post('judul');
		$isi        = nl2br($this->input->post('isi'));
		$prev_image = $this->input->post('prev_image');

		$data = [
			'judul' => $judul,
			'isi'   => $isi
		];
		$exec = $this->mprofile->update_profile('profile', $data, $id, $prev_image);
		if($exec === TRUE){
			$code = 200;
		}else{
			$code = 500;
		}

		echo json_encode(compact('code', 'isi'));
		exit;
	}

}

/* End of file ProfileController.php */
/* Location: ./application/controllers/backend/ProfileController.php */