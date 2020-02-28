<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class BukuTamuController extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->library('TemplateAdmin', NULL, 'template');
	}

	public function index()
	{
		$data['title']   = 'List Buku Tamu';
		$data['content'] = 'bukutamu/index';
		$data['vitamin'] = 'admin_bukutamu_vitamin';
		$data['arrs']    = $this->mcore->get('bukutamu', '*', NULL, 'id', 'ASC', NULL, NULL);

		$this->template->template($data);
	}

}

/* End of file BukuTamuController.php */
/* Location: ./application/controllers/backend/BukuTamuController.php */