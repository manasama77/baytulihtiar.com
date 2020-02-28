<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class LoginAnggotaController extends CI_Controller {

	public function index()
  {
    if ($this->session->userdata('id') && $this->session->userdata('name') && $this->session->userdata('role')) {
      redirect('anggota/dashboard', 'refresh');
    } else {
			$data['title']        = 'Login Anggota KSPPS Baytul Ikhtiar';
			$data['view']         = 'login_anggota';
			$data['view_vitamin'] = 'login_anggota_vitamin';
      $this->load->view('login', $data);
    }
  }

  public function auth()
  {
  	$cif_no = $this->input->post('cif_no', TRUE);
  	$password = sha1($this->input->post('password', TRUE).UYAH);

  	$where = [
			'cif_no'   => $cif_no,
			'password' => $password
  	];

  	$count = $this->mcore->count('anggota', $where);

  	if($count == 0){
			$code  = 400;
			$hasil = 'tidak ada';
  	}else{
  		$arrs = $this->mcore->get('anggota', 'flag_aktif', ['cif_no' => $cif_no], NULL, 'ASC', NULL, NULL);

  		if($arrs->row()->flag_aktif == 'aktif'){
	  		$last_login = $this->mcore->update('anggota', ['last_login' => date('Y-m-d H:i:s')], ['cif_no' => $cif_no]);
	  		$users = $this->mcore->get('anggota', '*', $where, NULL, 'ASC', NULL, NULL);
	  		$array = [
					'cif_no' => $users->row()->cif_no,
					'nama'   => $users->row()->nama
	  		];
	  		
	  		$this->session->set_userdata( $array );
	  		$code  = 200;
	  		$hasil = 'ada';
	  	}else{
	  		$code = 200;
	  		$hasil = 'tidak aktif';
	  	}
  	}

  	echo json_encode(compact('hasil', 'code'));
  	exit();
  }

  public function logout()
  {
  	$unset = ['cif_no', 'nama', 'majlis'];
		$this->session->unset_userdata($unset);
		redirect('/','refresh');
  }

  public function check_sirkah()
  {
  	$url = 'http://app.baytulikhtiar.com/index.php/webservices/get_data_anggota';

		$cif_no = $this->input->get('cif_no');

    //url-ify the data for the POST
		$field_string = http_build_query(['cif_no' => $cif_no]);

    //open connection
		$ch = curl_init();

    //set the url, number of POST vars, POST data
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
		curl_setopt($ch, CURLOPT_URL, $url);
		curl_setopt($ch, CURLOPT_POST, count($field_string));
		curl_setopt($ch, CURLOPT_POSTFIELDS, $field_string);
		curl_setopt($ch,CURLOPT_SSL_VERIFYPEER, false);

    //execute post
		$content = curl_exec($ch);
    //close connection
		curl_close($ch);
		$ret = json_decode($content);

		$data['nama']          = $ret->get_data_anggota[0]->nama;
		$data['panggilan']     = $ret->get_data_anggota[0]->panggilan;
		$data['jenis_kelamin'] = $ret->get_data_anggota[0]->jenis_kelamin;
		$data['majlis']        = $ret->get_data_anggota[0]->majlis;
		// $data['majlis']        = 'Nama Majlis';
		echo json_encode($data);
		exit;
  }

  public function check()
  {
  	$cif_no = $this->input->post('cif_no', TRUE);
		$count = $this->mcore->count('anggota', ['cif_no' => $cif_no]);
		if($count == 0){
			echo json_encode(['terdaftar' => 'tidak']);
			exit;
		}else{
			$arrs = $this->mcore->get('anggota', 'flag_aktif', ['cif_no' => $cif_no], NULL, 'ASC', NULL, NULL);
			echo json_encode(['flag_aktif' => $arrs->row()->flag_aktif, 'terdaftar' => 'ya']);
			exit;
		}
  }

  public function register()
  {
		$cif_no   = $this->input->post('cif_no');
		$nama     = $this->input->post('nama');
		$majlis   = $this->input->post('majlis');
		$password = sha1($this->input->post('password', TRUE).UYAH);
		$cur_date = date('Y-m-d H:i:s');

		$data_store = [
			'cif_no'       => $cif_no,
			'password'     => $password,
			'nama'         => $nama,
			'majlis'       => $majlis,
			'flag_aktif'   => 'aktif',
			'created_date' => $cur_date,
			'last_login'   => $cur_date,
		];

		$exec = $this->mcore->store('anggota', $data_store);

		if($exec){
			$array = [
				'cif_no' => $cif_no,
				'nama'   => $nama,
				'majlis' => $majlis
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

/* End of file LoginAnggotaController.php */
/* Location: ./application/controllers/LoginAnggotaController.php */