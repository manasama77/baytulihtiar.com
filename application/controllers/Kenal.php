<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kenal extends CI_Controller {

	public function __construct()
  {
    parent::__construct();
    $this->load->model('M_core2', 'mcore2');
  }

  private function _template($data)
  {
    $this->load->view('frontend/template', $data);
  }

	public function index()
	{
		$data['navbar']     = 'navbar2';
		$data['title']      = 'KSPPS Baytul Ikhtiar - Kenal Baik';
		$data['content']    = 'kenal/main';
		$data['vitamin']    = 'kenal/vitamin';
		$table              = 'profile';
		$where              = NULL;
		$data['arr_berita'] = $this->mcore2->get($table, NULL, NULL, $where, 'id', 'ASC');

    $this->_template($data);
	}

	public function show($id = NULL)
  {
		$judul_error = '[404] Oops...';
		$isi_error   = '<h2 style="margin-left:15px;">Kenal BAIK Tidak Ditemukan</h2><br><a href="'.site_url('/').'" style="margin-left:15px;">Kembali Ke Beranda</a>';

  	if($id == NULL){
  		show_error($isi_error, 404, $judul_error);
  	}else{
  		$beritas = $this->mcore2->get('profile', NULL, NULL, ['id' => $id], NULL, 'ASC');

  		if($beritas->num_rows() == 0){
  			show_error($isi_error, 404, $judul_error);
  			exit;
  		}

  		$tgl_obj = new DateTime();

			$data['id']           = $beritas->row()->id;
			$data['judul']        = $beritas->row()->judul;
			$data['isi']          = $beritas->row()->isi;
			$data['gambar']       = $beritas->row()->gambar;

			$data['navbar']       = 'navbar2';
			$data['title']        = 'KSPPS Baytul Ikhtiar | '.$data['judul'];
			$data['content']      = 'kenal/show';
			$data['vitamin']      = 'kenal/vitamin';

			$this->_template($data);
  	}
  }

}

/* End of file Kenal.php */
/* Location: ./application/controllers/Kenal.php */