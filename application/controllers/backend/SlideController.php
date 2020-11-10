<?php
defined('BASEPATH') or exit('No direct script access allowed');

class SlideController extends CI_Controller
{

  public function __construct()
  {
    parent::__construct();
    $this->load->model('M_backend_admin', 'madmin');
    $this->load->library('TemplateAdmin', NULL, 'template');
  }

  public function index()
  {
    $data['title']   = 'Banner Management';
    $data['content'] = 'slide/index';
    $data['vitamin'] = 'admin_slide_vitamin';

    $limit  = 10;
    $offset = 0;

    if ($this->input->get('per_page')) {
      $offset = $this->input->get('per_page');
    }

    $this->load->library('pagination');

    $config['base_url']            = site_url('backend/slide/index');
    $config['total_rows']          = $this->mcore->count('slideshow', NULL);
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

    $data['arrs'] = $this->mcore->get('slideshow', '*', NULL, 'id', 'DESC', $limit, $offset);

    $this->template->template($data);
  }

  public function store()
  {
    $banner_path = $this->input->post('banner_path');

    $config['upload_path']   = 'assets/img/slideshow';
    $config['allowed_types'] = 'gif|jpg|png|jpeg';
    $config['overwrite']     = TRUE;
    $config['max_size']      = 200024;
    $config['encrypt_name']  = TRUE;

    $this->load->library('upload', $config);

    if ($this->upload->do_upload('banner_path')) {
      $banner_name = $this->upload->data("file_name");
      $data = [
        'banner_path'   => $banner_name,
      ];
      $exec = $this->mcore->store('slideshow', $data);
      if ($exec === TRUE) {
        $code = 200;
      } else {
        $code = 500;
      }
    } else {
      $code = 501;
    }

    echo json_encode(compact('code'));
    exit;
  }

  public function edit($id)
  {
    $arrs = $this->mcore->get('slideshow', '*', ['id' => $id], NULL, 'ASC', NULL, NULL);

    if ($arrs->num_rows() == 0) {
      $code   = 500;
      $result = NULL;
    } else {
      $code         = 200;
      $data['arrs'] = $arrs;
      $result       = $this->load->view('admin/slide/modal', $data, TRUE);

      // DEBUG PURPOSE ONLY
      // $data['arrs'] = $arrs;
      // return $this->load->view('admin/admin/modal', $data, FALSE);
    }

    echo json_encode([
      'code'  => $code,
      'judul' => 'Edit Banner',
      'data'  => $result
    ]);
    exit;
  }

  public function update()
  {
    $url  = $_SERVER['HTTP_REFERER'];
    $id   = $this->input->post('id_edit');

    $config['upload_path']   = 'assets/img/slideshow';
    $config['allowed_types'] = 'gif|jpg|png|jpeg';
    $config['overwrite']     = TRUE;
    $config['max_size']      = 200024;
    $config['encrypt_name']  = TRUE;

    $this->load->library('upload', $config);

    if ($this->upload->do_upload('banner_path')) {
      $banner_name = $this->upload->data("file_name");
      $data = [
        'banner_path'   => $banner_name,
      ];
      $exec = $this->mcore->update('slideshow', $data, ['id' => $id]);
      if ($exec) {
        $this->session->set_flashdata('edit', 'Edit Berhasil');
        redirect($url, 'refresh');
      } else {
        show_error('Terjadi kesalahan dengan Database, silahkan coba kembali', 500, 'Oops...');
      }
      exit;
    } else {
      show_error('Terjadi kesalahan dengan Database, silahkan coba kembali', 500, 'Oops...');
    }
  }

  public function destroy($id)
  {
    $url = $_SERVER['HTTP_REFERER'];
    $exec = $this->mcore->delete('slideshow', ['id' => $id]);

    if ($exec) {
      $this->session->set_flashdata('delete', 'Delete Berhasil');
      redirect($url, 'refresh');
    } else {
      show_error('Terjadi kesalahan dengan Database, silahkan coba kembali', 500, 'Oops...');
    }
    exit;
  }
}

/* End of file SlideController.php */
/* Location: ./application/controllers/backend/SlideController.php */