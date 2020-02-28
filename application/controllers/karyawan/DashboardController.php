<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class DashboardController extends CI_Controller {

	public function __construct()
  {
    parent::__construct();
    // $this->load->model('M_dashboard', 'mdashboard');
    $this->load->library('TemplateKaryawan', NULL, 'template');
  }

	public function index()
	{
		$sess_nik = $this->session->userdata('nik');
		$data['title']          = 'Dashboard';
		$data['content']        = 'dashboard/index';
		$data['vitamin']        = 'admin_dashboard_vitamin';
		$data['count_berita']   = $this->mcore->count('berita', ['flag_aktif' => 'aktif', 'nik_karyawan' => $sess_nik]);
		$data['count_kisah']    = $this->mcore->count('kisah', ['flag_aktif' => 'aktif', 'nik_karyawan' => $sess_nik]);

    $this->template->template($data);
	}

}

/* End of file DashboardController.php */
/* Location: ./application/controllers/backend/DashboardController.php */