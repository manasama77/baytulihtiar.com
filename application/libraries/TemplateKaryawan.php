<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class TemplateKaryawan
{
	protected $ci;

	public function __construct()
	{
		$this->ci =& get_instance();
		$this->ci->load->model('M_core', 'mcore');
	}

	public function template($data)
	{
		if(!$this->ci->session->userdata('nik') && !$this->ci->session->userdata('nama')){
			redirect('logout/karyawan');
		}else{
			$data['pp']  = base_url().'assets/img/avatars/avatar_default.png';
			$data['uri2'] = $this->ci->uri->segment(2);
			$data['uri3'] = $this->ci->uri->segment(3);

			if(file_exists(APPPATH.'views/karyawan/'.$data['content'].'.php')){
				$this->ci->load->view('layouts/karyawan/template', $data, FALSE);
			}else{
				show_404();
			}
		}
	}
}

/* End of file TemplateKaryawan.php */
/* Location: ./application/libraries/TemplateAdmin.php */
