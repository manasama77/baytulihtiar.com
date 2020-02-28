<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_karyawan_berita extends CI_Model {

	public function get_data($limit, $offset, $status_filter, $admin_karyawan_filter, $tipe_filter = NULL, $kata_filter = NULL)
	{
		if($admin_karyawan_filter == 'admin'){
			$this->db->where('id_admin !=', NULL);
		}elseif($admin_karyawan_filter == 'karyawan'){
			$this->db->where('nik_karyawan !=', NULL);
		}

		if($tipe_filter == 'judul'){
			$this->db->like('judul', $kata_filter);
		}elseif($tipe_filter == 'isi'){
			$this->db->like('judul', $kata_filter);
		}elseif($tipe_filter == 'nama_admin'){
			$this->db->like('nama_admin', $kata_filter);
		}elseif($tipe_filter == 'nik_karyawan'){
			$this->db->like('nik_karyawan', $kata_filter);
		}elseif($tipe_filter == 'nama_karyawan'){
			$this->db->like('nama_karyawan', $kata_filter);
		}

		if($status_filter != 'semua'){
			$this->db->where('flag_aktif', $status_filter);
		}
		
		$this->db->where('nik_karyawan', $this->session->userdata('nik'));
		$this->db->limit($limit);
		$this->db->offset($offset);
		return $this->db->get('berita');
	}

	public function count($status_filter, $admin_karyawan_filter, $tipe_filter = NULL, $kata_filter = NULL)
	{
		if($admin_karyawan_filter == 'admin'){
			$this->db->where('id_admin !=', NULL);
		}elseif($admin_karyawan_filter == 'karyawan'){
			$this->db->where('nik_karyawan !=', NULL);
		}

		if($tipe_filter == 'judul'){
			$this->db->like('judul', $kata_filter);
		}elseif($tipe_filter == 'isi'){
			$this->db->like('judul', $kata_filter);
		}elseif($tipe_filter == 'nama_admin'){
			$this->db->like('nama_admin', $kata_filter);
		}elseif($tipe_filter == 'nik_karyawan'){
			$this->db->like('nik_karyawan', $kata_filter);
		}elseif($tipe_filter == 'nama_karyawan'){
			$this->db->like('nama_karyawan', $kata_filter);
		}

		if($status_filter != 'semua'){
			$this->db->where('flag_aktif', $status_filter);
		}

		$this->db->where('nik_karyawan', $this->session->userdata('nik'));
		$this->db->from('berita');
		return $this->db->count_all_results();
	}
			

	public function insert_berita($table, $data)
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
		$config['upload_path']   = 'assets/img/berita';
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

	public function update_berita($table, $data, $id, $prev_image)
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

/* End of file M_karyawan_berita.php */
/* Location: ./application/models/M_karyawan_berita.php */