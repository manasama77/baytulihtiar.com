<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_backend_kisah extends CI_Model {

	public function get_data($limit, $offset, $status_filter, $admin_karyawan_filter)
	{
		if($admin_karyawan_filter == 'admin'){
			$this->db->where('id_admin !=', NULL);
		}elseif($admin_karyawan_filter == 'karyawan'){
			$this->db->where('nik_karyawan !=', NULL);
		}

		if($status_filter != 'semua'){
			$this->db->where('flag_aktif', $status_filter);
		}
		
		$this->db->limit($limit);
		$this->db->offset($offset);
		return $this->db->get('kisah');
	}

	public function count($status_filter, $admin_karyawan_filter)
	{
		if($admin_karyawan_filter == 'admin'){
			$this->db->where('id_admin !=', NULL);
		}elseif($admin_karyawan_filter == 'karyawan'){
			$this->db->where('nik_karyawan !=', NULL);
		}

		if($status_filter != 'semua'){
			$this->db->where('flag_aktif', $status_filter);
		}

		$this->db->from('kisah');
		return $this->db->count_all_results();
	}
			

	public function insert_kisah($table, $data)
	{
		$this->db->trans_start();
		$this->db->insert($table, $data);
		$this->db->trans_complete();
		return $this->db->trans_status();
	}

	public function update_kisah($table, $data, $id)
	{
		$this->db->trans_start();
		$this->db->where('id', $id);
		$this->db->update($table, $data);
		$this->db->trans_complete();
		return $this->db->trans_status();
	}

}

/* End of file M_backend_kisah.php */
/* Location: ./application/models/M_backend_kisah.php */