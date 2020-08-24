<?php
defined('BASEPATH') or exit('No direct script access allowed');

class LoginAdminController extends CI_Controller
{

	public function index()
	{
		if ($this->session->userdata('id') && $this->session->userdata('name') && $this->session->userdata('role')) {
			redirect('backend/dashboard', 'refresh');
		} else {
			$data['title']        = 'Login Admin KSPPS Baytul Ikhtiar';
			$data['view']         = 'login_admin';
			$data['view_vitamin'] = 'login_admin_vitamin';
			$this->load->view('login', $data);
		}
	}

	public function auth()
	{
		$username = $this->input->post('username', TRUE);
		$password = sha1($this->input->post('password', TRUE) . UYAH);

		$where_username = [
			'username'   => $username,
			'password'   => $password
		];

		$count_username = $this->mcore->count('admin', $where_username);

		if ($count_username == 0) {
			$hasil = 'tidak ada';
		} else {
			$last_login = $this->mcore->update('admin', ['last_login' => date('Y-m-d H:i:s')], ['username' => $username]);
			$users = $this->mcore->get('admin', 'id, username, nama, flag_aktif', $where_username, NULL, 'ASC', NULL, NULL);

			if ($users->row()->flag_aktif == 'aktif') {
				$array = [
					'id'       => $users->row()->id,
					'username' => $users->row()->username,
					'nama'     => $users->row()->nama,
				];

				$this->session->set_userdata($array);
				$hasil = 'ada';
			} else {
				$hasil = 'tidak aktif';
			}
		}

		echo json_encode(compact('hasil'));
		exit();
	}

	public function logout()
	{
		$unset = ['id', 'username', 'nama'];
		$this->session->unset_userdata($unset);
		redirect('/login/admin', 'refresh');
	}
}

/* End of file LoginAdminController.php */
/* Location: ./application/controllers/LoginAdminController.php */