<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class DashboardController extends CI_Controller {

	public function __construct()
  {
    parent::__construct();
    // $this->load->model('M_dashboard', 'mdashboard');
    $this->load->library('TemplateAdmin', NULL, 'template');
  }

	public function index()
	{
		$data['title']          = 'Dashboard';
		$data['content']        = 'dashboard/index';
		$data['vitamin']        = 'admin_dashboard_vitamin';
		$data['count_berita']   = $this->mcore->count('berita', ['flag_aktif' => 'aktif']);
		$data['count_kisah']    = $this->mcore->count('kisah', ['flag_aktif' => 'aktif']);
		$data['count_admin']    = $this->mcore->count('admin', ['flag_aktif' => 'aktif']);
		$data['count_karyawan'] = $this->mcore->count('karyawan', ['flag_aktif' => 'aktif']);
		$data['count_anggota']  = $this->mcore->count('anggota', ['flag_aktif' => 'aktif']);

    $this->template->template($data);
	}

}

/* End of file DashboardController.php */
/* Location: ./application/controllers/backend/DashboardController.php */