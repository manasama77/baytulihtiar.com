<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Bm extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('M_core2', 'mcore2');
	}

	private function _template($data)
	{
		$this->load->view('frontend/template2', $data);
	}

	public function index()
	{
		//$sirkah              = $this->sirkah();
		$data['anggota']     = 0;
		$data['outstanding'] = 0;
		$data['angsuran']    = 0;

		$data['navbar']  = 'navbar3';
		$data['title']   = 'KSPPS Baytul Ikhtiar | Beranda';
		$data['content'] = 'bm/beranda/main';
		$data['vitamin'] = 'bm/beranda/vitamin';
		$this->_template($data);
	}

}

/* End of file Bm.php */
/* Location: ./application/controllers/Bm.php */