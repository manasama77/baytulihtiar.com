<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_backend_anggota extends CI_Model {

	public function get_data($limit, $offset)
	{
		$this->db->limit($limit);
		$this->db->offset($offset);
		return $this->db->get('anggota');
	}

	public function count($status_filter, $anggota_anggota_filter, $tipe_filter = NULL, $kata_filter = NULL)
	{
		if($anggota_anggota_filter == 'anggota'){
			$this->db->where('id_anggota !=', NULL);
		}elseif($anggota_anggota_filter == 'anggota'){
			$this->db->where('nik_anggota !=', NULL);
		}

		if($tipe_filter == 'judul'){
			$this->db->like('judul', $kata_filter);
		}elseif($tipe_filter == 'isi'){
			$this->db->like('judul', $kata_filter);
		}elseif($tipe_filter == 'nama_anggota'){
			$this->db->like('nama_anggota', $kata_filter);
		}elseif($tipe_filter == 'nik_anggota'){
			$this->db->like('nik_anggota', $kata_filter);
		}elseif($tipe_filter == 'nama_anggota'){
			$this->db->like('nama_anggota', $kata_filter);
		}

		$this->db->where('flag_aktif', $status_filter);
		$this->db->from('anggota');
		return $this->db->count_all_results();
	}
			

	public function insert_anggota($table, $data)
	{
		$this->db->trans_start();
		$image          = $this->_uploadImage();
		$data['gambar'] = $image;
		$this->db->insert($table, $data);
		$this->db->trans_complete();
		return $this->db->trans_status();
	}

	private function _uploadImage()
	{
		$config['upload_path']   = 'assets/img/anggota';
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

	public function update_anggota($table, $data, $id, $prev_image)
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

/* End of file M_backend_anggota.php */
/* Location: ./application/models/M_backend_anggota.php */