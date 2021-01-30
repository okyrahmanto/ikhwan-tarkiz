<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Login extends CI_Controller
{

	function __construct()
	{
		parent::__construct();
		$this->load->model('m_login');
		$this->CI = &get_instance();
	}

	public function index()
	{
		$this->load->view('v_login.php');
	}

	function aksi_login()
	{
		if (isset($_POST['submit'])) {
			$username = $this->input->post('username', TRUE);
			$password = $this->input->post('password', TRUE);

			$where = array(
				'username' => $username,
				'password' => $password
			);
			$cek = $this->m_login->cek_login("login", $where)->num_rows();
			if ($cek > 0) {
				$user_login = $this->db->get_where('login', array('username' => $username, 'password' => $password))->row();

				if ($user_login->username == $username) {
					$data_session = array(
						'username' => $username,
						'status' => "login",
						'role' => $user_login->role,
					);

					$this->session->set_userdata($data_session);
					if ($user_login->role == 'admin') {

						redirect(base_url("index.php/manager/peserta_masuk"));
					} else if ($user_login->role == 'sponsor') {

						redirect(base_url("index.php/sponsor/data_event"));
					}
				} else {
					$this->CI->session->set_flashdata('sukses', 'Username/password salah !');
					redirect(base_url('login'));
				}
			}
		}
	}

	function logout()
	{
		$this->session->sess_destroy();
		redirect('login', 'refresh');
	}
}
