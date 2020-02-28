<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class LoginKaryawanController extends CI_Controller {

	public function index()
  {
    if ($this->session->userdata('id') && $this->session->userdata('name') && $this->session->userdata('role')) {
      redirect('karyawan/dashboard', 'refresh');
    } else {
			$data['title']        = 'Login Karyawan KSPPS Baytul Ikhtiar';
			$data['view']         = 'login_karyawan';
			$data['view_vitamin'] = 'login_karyawan_vitamin';
      $this->load->view('login', $data);
    }
  }

  public function auth()
  {
  	$nik = $this->input->post('nik', TRUE);
  	$password = sha1($this->input->post('password', TRUE).UYAH);

  	$where = [
			'nik'        => $nik,
			'password'   => $password,
			'flag_aktif' => 'aktif',
  	];

  	$count = $this->mcore->count('karyawan', $where);

  	if($count == 0){
			$code  = 400;
			$hasil = 'tidak ada';
  	}else{
  		$last_login = $this->mcore->update('karyawan', ['last_login' => date('Y-m-d H:i:s')], ['nik' => $nik]);
  		$users = $this->mcore->get('karyawan', '*', $where, NULL, 'ASC', NULL, NULL);
  		$array = [
				'nik'  => $users->row()->nik,
				'nama' => $users->row()->nama
  		];
  		
  		$this->session->set_userdata( $array );
  		$code  = 200;
  		$hasil = 'ada';
  	}

  	echo json_encode(compact('hasil', 'code'));
  	exit();
  }

  public function logout()
  {
  	$unset = ['nik', 'nama'];
		$this->session->unset_userdata($unset);
		redirect('/','refresh');
  }

  public function check()
  {
  	$nik = $this->input->post('nik', TRUE);
		$count = $this->mcore->count('karyawan', ['nik' => $nik]);
		if($count == 0){
			echo json_encode(['terdaftar' => 'tidak']);
			exit;
		}else{
			$arrs = $this->mcore->get('karyawan', 'flag_aktif', ['nik' => $nik], NULL, 'ASC', NULL, NULL);
			echo json_encode(['flag_aktif' => $arrs->row()->flag_aktif, 'terdaftar' => 'ya']);
			exit;
		}
  }

  public function register()
  {
		$nik      = $this->input->post('nik');
		$nama     = $this->input->post('nama');
		$password = sha1($this->input->post('password', TRUE).UYAH);
		$cur_date = date('Y-m-d H:i:s');

		$data_store = [
			'nik'        => $nik,
			'password'   => $password,
			'nama'       => $nama,
			'flag_aktif' => 'aktif',
			'created_by' => $nik,
			'created_at' => $cur_date,
			'last_login' => $cur_date
		];

		$exec = $this->mcore->store('karyawan', $data_store);

		if($exec){
			$array = [
				'nik'  => $nik,
				'nama' => $nama
  		];
  		
  		$this->session->set_userdata( $array );
			$code = 200;
		}else{
			$code = 500;
		}

		echo json_encode(compact('code'));
		exit;
  }

}

/* End of file LoginKaryawanController.php */
/* Location: ./application/controllers/LoginKaryawanController.php */