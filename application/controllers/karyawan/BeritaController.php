<?php
defined('BASEPATH') or exit('No direct script access allowed');

class BeritaController extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->load->model('M_karyawan_berita', 'mberita');
		$this->load->library('TemplateKaryawan', NULL, 'template');
	}

	public function index()
	{
		$data['title']                 = 'List Berita';
		$data['content']               = 'berita/index';
		$data['vitamin']               = 'karyawan_berita_vitamin';
		$data['status_filter']         = NULL;
		$data['admin_karyawan_filter'] = NULL;
		$data['tipe_filter']           = NULL;
		$data['kata_filter']           = NULL;

		if ($this->input->get('status_filter') != NULL) {
			$limit  = 10;
			$offset = 0;

			if ($this->input->get('per_page')) {
				$offset = $this->input->get('per_page');
			}

			$this->load->library('pagination');

			$status_filter         = $this->input->get('status_filter');
			$admin_karyawan_filter = 'karyawan';
			$tipe_filter           = $this->input->get('tipe_filter');
			$kata_filter           = $this->input->get('kata_filter');

			$config['base_url']            = site_url('karyawan/berita/index');
			$config['total_rows']          = $this->mberita->count($status_filter, $admin_karyawan_filter, $tipe_filter, $kata_filter);
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
			$data['tipe_filter']           = $tipe_filter;
			$data['kata_filter']           = $kata_filter;
			$data['arrs']                  = $this->mberita->get_data($limit, $offset, $status_filter, $admin_karyawan_filter, $tipe_filter, $kata_filter);
		}

		$this->template->template($data);
	}

	public function create()
	{
		$data['title']   = 'Tambah Berita';
		$data['content'] = 'berita/form';
		$data['vitamin'] = 'karyawan_berita_form_vitamin';

		$this->template->template($data);
	}

	public function store()
	{
		$url           = 'karyawan/berita/index?status_filter=semua&tipe_filter=judul&kata_filter=&filter=';
		$judul         = $this->input->post('judul');
		$isi           = nl2br($this->input->post('isi'));
		$nik_karyawan  = $this->session->userdata('nik');
		$nama_karyawan = $this->session->userdata('nama');

		$data = [
			'judul'         => $judul,
			'isi'           => $isi,
			'flag_aktif'    => 'tidak aktif',
			'nik_karyawan'  => $nik_karyawan,
			'nama_karyawan' => $nama_karyawan,
			'date_karyawan' => date('Y-m-d H:i:s')
		];
		$exec = $this->mberita->insert_berita('berita', $data);
		if ($exec) {
			$this->session->set_flashdata('flag', $flag_msg);
			redirect($url);
		} else {
			show_error('Terjadi kesalahan dengan Database, silahkan coba kembali', 500, 'Oops...');
		}
	}

	public function show($id)
	{
		$arrs = $this->mcore->get('berita', '*', ['id' => $id], NULL, 'ASC', NULL, NULL);

		if ($arrs->num_rows() == 0) {
			$code   = 500;
			$result = NULL;
		} else {
			$code         = 200;
			$data['arrs'] = $arrs;
			$result       = $this->load->view('admin/berita/modal', $data, TRUE);

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

		$data['title']   = 'Edit Berita';
		$data['content'] = 'berita/form_edit';
		$data['vitamin'] = 'karyawan_berita_form_edit_vitamin';

		$arrs                  = $this->mcore->get('berita', '*', ['id' => $id], NULL, 'ASC', NULL, NULL);
		$data['id_berita']     = $arrs->row()->id;
		$data['judul_berita']  = $arrs->row()->judul;
		$data['isi_berita']    = $arrs->row()->isi;
		$data['gambar_berita'] = $arrs->row()->gambar;

		$this->template->template($data);
	}

	public function update()
	{
		$id         = $this->input->post('id');
		$judul      = $this->input->post('judul');
		$isi        = nl2br($this->input->post('isi'));
		$prev_image = $this->input->post('prev_image');

		$data = [
			'judul'      => $judul,
			'isi'        => $isi,
			'flag_aktif' => 'tidak aktif',
		];
		$exec = $this->mberita->update_berita('berita', $data, $id, $prev_image);
		if ($exec === TRUE) {
			$code = 200;
		} else {
			$code = 500;
		}

		echo json_encode(compact('code', 'isi'));
		exit;
	}

	public function destroy($id)
	{
		$url  = $_SERVER['HTTP_REFERER'];
		$exec = $this->mcore->delete('berita', ['id' => $id]);

		if ($exec) {
			$this->session->set_flashdata('delete', 'Delete Berhasil');
			redirect($url, 'refresh');
		} else {
			show_error('Terjadi kesalahan dengan Database, silahkan coba kembali', 500, 'Oops...');
		}
		exit;
	}

	public function flag($flag, $id)
	{
		$url = $_SERVER['HTTP_REFERER'];
		if ($flag == 1) {
			$flag_msg = 'Aktifkan berita berhasil';
			$object = ['flag_aktif' => 'aktif'];
		} elseif ($flag == 0) {
			$flag_msg = 'Non Aktifkan berita berhasil';
			$object = ['flag_aktif' => 'tidak aktif'];
		}

		$exec = $this->mcore->update('berita', $object, ['id' => $id]);

		if ($exec) {
			$this->session->set_flashdata('flag', $flag_msg);
			redirect($url);
		} else {
			show_error('Terjadi kesalahan dengan Database, silahkan coba kembali', 500, 'Oops...');
		}
		exit;
	}
}

/* End of file BeritaController.php */
/* Location: ./application/controllers/karyawan/BeritaController.php */