<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_core2 extends CI_Model {

	public function get($table, $limit = NULL, $offset = NULL, $where = NULL, $order = NULL, $order_ori = 'ASC')
  {
    // TEMPLATE get($table, $limit, $offset, $where, $order, $order_ori)
    if($where != null)
    {
      $this->db->where($where);
    }

    if($order != null)
    {
      $this->db->order_by($order, $order_ori);
    }

    return $this->db->get($table, $limit, $offset);
  }

  public function insert($table, $data)
  {
    return $this->db->insert($table, $data);
  }

  public function insert_berita($table, $data)
  {
    $this->db->trans_start();
    $image = $this->_uploadImage();
    $data['gambar'] = $image;
    $this->db->insert($table, $data);
    $this->db->trans_complete();
    return $this->db->trans_status();
  }

  public function update_tentang($table, $data)
  {
    $this->db->trans_start();
    if($_FILES['gambar']['name'] == NULL){
      $image = $this->input->post('prev_gambar');
    }else{
      $image = $this->_uploadImageTentang();
    }
    
    $data['banner'] = $image;
    $this->db->where('id', '1');
    $this->db->update($table, $data);
    $this->db->trans_complete();
    return $this->db->trans_status();
  }

  public function update($table, $where, $data)
  {
    $this->db->trans_start();
    $this->db->where($where);
    $this->db->update($table, $data);
    $this->db->trans_complete();
    return $this->db->trans_status();
  }

  public function update_berita($table, $data, $id)
  {
    $this->db->trans_start();
    if($_FILES['gambar']['name'] == NULL){
      $image = $this->input->post('prev_gambar');
    }else{
      $image = $this->_uploadImage();
    }
    $data['gambar'] = $image;
    $this->db->where('id', $id);
    $this->db->update($table, $data);
    $this->db->trans_complete();
    return $this->db->trans_status();
  }

  public function destroy($table, $where = null)
  {
    $this->db->trans_start();
    $this->db->delete($table, $where);
    $this->db->trans_complete();
    return $this->db->trans_status();
  }

  private function _uploadImage()
  {
    $config['upload_path']   = 'assets/img/berita';
    $config['allowed_types'] = 'gif|jpg|png|jpeg';
    $config['overwrite']     = TRUE;
    $config['max_size']      = 100024;
    $config['encrypt_name']  = TRUE;

    $this->load->library('upload', $config);

    if ($this->upload->do_upload('gambar')) {
        return $this->upload->data("file_name");
    }
    
    return "default-image.jpg";
  }

  private function _uploadImageTentang()
  {
    $config['upload_path']   = 'assets/img/tentang';
    $config['allowed_types'] = 'gif|jpg|png|jpeg';
    $config['overwrite']     = TRUE;
    $config['max_size']      = 100024;
    $config['encrypt_name']  = TRUE;

    $this->load->library('upload', $config);

    if ($this->upload->do_upload('gambar')) {
        return $this->upload->data("file_name");
    }
    
    return "default-image.jpg";
  }

	

}

/* End of file M_core2.php */
/* Location: ./application/models/M_core2.php */