<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Berita extends CI_Controller {

  public function __construct()
  {
    parent::__construct();
    $this->load->model('M_core2', 'mcore2');
    $this->load->model('M_berita', 'mberita');
  }

  private function _template($data)
  {
    $this->load->view('frontend/template', $data);
  }

  public function index($offset = 0)
  {
  	$this->load->library('pagination');
		$data['navbar']  = 'navbar2';
		$data['title']   = 'KSPPS Baytul Ikhtiar - Berita Baik';
		$data['content'] = 'berita/main';
		$data['vitamin'] = 'berita/vitamin';

		$id_kategori = '';
		$limit       = 9;
		$offset      = $offset;
		$keyword     = trim($this->input->get('keyword', TRUE));
		$table       = 'berita';

    $where = ['flag_aktif' => 'aktif'];
    if($keyword != NULL){
      $where = [
				'flag_aktif' => 'aktif',
				'judul LIKE' => "%".$keyword."%"
      ];
    }

		$arr_berita_all     = $this->mcore->get($table, '*', $where, 'id', 'DESC', NULL, NULL);
		$data['total_data'] = $arr_berita_all->num_rows();
		$data['arr_berita'] = $this->mcore->get($table, '*', $where, 'id', 'DESC', $limit, $offset);
		$data['lq']         = $this->db->last_query();
		$data['keyword']    = $keyword;

    // pagination limit
		$pagination['base_url']             = site_url('berita');
		$pagination['total_rows']           = $arr_berita_all->num_rows();
		$pagination['full_tag_open']        = '<ul class="pagination">';
		$pagination['full_tag_close']       = '</ul>';
		$pagination['attributes']           = ['class' => 'waves-effect waves-yellow hoverable'];
		$pagination['first_tag_open']       = '<li class="waves-effect waves-yellow hoverable">';
		$pagination['first_tag_close']      = '</li>';
		$pagination['last_tag_open']        = '<li class="waves-effect waves-yellow hoverable">';
		$pagination['last_tag_close']       = '</li>';
		$pagination['cur_tag_open']         = '<li class="waves-effect waves-yellow hoverable active orange darken-2"><a class="disabled">';
		$pagination['cur_tag_close']        = '</a></li>';
		$pagination['num_tag_open']         = '<li class="waves-effect waves-yellow hoverable">';
		$pagination['num_tag_close']        = '</li>';
		$pagination['next_link']            = '<i class="fas fa-chevron-right"></i>';
		$pagination['next_tag_open']        = '<li class="waves-effect waves-yellow hoverable">';
		$pagination['next_tag_close']       = '</li>';
		$pagination['prev_link']            = '<i class="fas fa-chevron-left"></i>';
		$pagination['prev_tag_open']        = '<li class="waves-effect waves-yellow hoverable">';
		$pagination['prev_tag_close']       = '</li>';
		$pagination['per_page']             = $limit;
		$pagination['uri_segment']          = 2;
		$pagination['use_page_numbers']     = FALSE;
		$pagination['page_query_string']    = FALSE;
		$pagination['query_string_segment'] = 'keyword';
		$pagination['reuse_query_string']   = TRUE;
    $this->pagination->initialize($pagination);

    $this->_template($data);

  }

  public function show($id = NULL)
  {
		$judul_error = '[404] Oops...';
		$isi_error   = '<h2 style="margin-left:15px;">Berita Tidak Ditemukan</h2><br><a href="'.site_url('/').'" style="margin-left:15px;">Kembali Ke Beranda</a>';

  	if($id == NULL){
  		show_error($isi_error, 404, $judul_error);
  	}else{
  		$beritas = $this->mcore2->get('berita', NULL, NULL, ['id' => $id, 'flag_aktif' => 'aktif'], NULL, 'ASC');

  		if($beritas->num_rows() == 0){
  			show_error($isi_error, 404, $judul_error);
  			exit;
  		}

  		$tgl_obj = new DateTime();

			$data['id']           = $beritas->row()->id;
			$data['judul']        = $beritas->row()->judul;
			$data['isi']          = $beritas->row()->isi;
			$data['gambar']       = $beritas->row()->gambar;
			if($beritas->row()->id_admin != NULL){
				$data['created_date'] = $tgl_obj->createFromFormat('Y-m-d H:i:s', $beritas->row()->date_admin)->format('d F Y H:i');
				$data['created_name'] = $beritas->row()->nama_admin;
			}else{
				$data['created_date'] = $tgl_obj->createFromFormat('Y-m-d H:i:s', $beritas->row()->date_karyawan)->format('d F Y H:i');
				$data['created_name'] = $beritas->row()->nama_karyawan;
			}

			$data['navbar']       = 'navbar2';
			$data['title']        = 'KSPPS Baytul Ikhtiar | '.$data['judul'];
			$data['content']      = 'berita/show';
			$data['vitamin']      = 'berita/vitamin';

			$this->_template($data);
  	}
  }

}

/* End of file Berita.php */
/* Location: ./application/controllers/Berita.php */