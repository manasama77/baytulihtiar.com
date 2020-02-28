<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_karyawan_kisah extends CI_Model {

	public function get_data($limit, $offset, $status_filter)
	{
		if($status_filter != 'semua'){
			$this->db->where('flag_aktif', $status_filter);
		}

		$this->db->where('nik_karyawan', $this->session->userdata('nik'));
		$this->db->limit($limit);
		$this->db->offset($offset);
		return $this->db->get('kisah');
	}

	public function count($status_filter)
	{
		if($status_filter != 'semua'){
			$this->db->where('flag_aktif', $status_filter);
		}

		$this->db->where('nik_karyawan', $this->session->userdata('nik'));
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

/* End of file M_karyawan_kisah.php */
/* Location: ./application/models/M_karyawan_kisah.php */