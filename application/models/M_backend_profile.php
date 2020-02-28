<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_backend_profile extends CI_Model {

	private function _uploadImage()
	{
		$config['upload_path']   = 'assets/img/profile';
		$config['allowed_types'] = 'gif|jpg|png|jpeg';
		$config['overwrite']     = TRUE;
		$config['max_size']      = 200024;
		$config['encrypt_name']  = TRUE;

		$this->load->library('upload', $config);

		if ($this->upload->do_upload('gambar')) {
			return $this->upload->data("file_name");
		}

		return "default.png";
	}

	public function update_profile($table, $data, $id, $prev_image)
	{
		$this->db->trans_start();

		if(empty($_FILES['gambar']['name'])) {
			$image = $prev_image;
		}else{
			$image = $this->_uploadImage();

		}

		$data['gambar'] = $image;
		$this->db->where('id', $id);
		$this->db->update($table, $data);
		$this->db->trans_complete();
		return $this->db->trans_status();
	}

}

/* End of file M_backend_profile.php */
/* Location: ./application/models/M_backend_profile.php */