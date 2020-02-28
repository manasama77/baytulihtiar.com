<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kisah extends CI_Controller {

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
		$data['navbar']  = 'navbar2';
		$data['title']   = 'KSPPS Baytul Ikhtiar - Kisah Baik';
		$data['content'] = 'kisah/main';
		$data['vitamin'] = 'kisah/vitamin';
		$table           = 'kisah';
		$where           = ['flag_aktif' => 'aktif'];
		$data['kisahs']  = $this->mcore2->get($table, NULL, NULL, $where, 'id', 'DESC');

    $this->_template($data);

  }

}

/* End of file Kisah.php */
/* Location: ./application/controllers/Kisah.php */