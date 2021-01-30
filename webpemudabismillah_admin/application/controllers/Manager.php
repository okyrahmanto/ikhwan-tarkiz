<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Manager extends CI_Controller
{

	function __construct()
	{
		parent::__construct();
		$this->load->model('m_manager');
		$this->CI = &get_instance();
	}

	function debugPrint($param)
	{
		echo "<pre>";
		print_r($param);
		echo "</pre>";
	}

	function peserta_masuk($event = null)
	{
		$dataPeserta = $this->m_manager->getAllPesertaEventByStatusAndEvent('masuk', $event);
		$viewData['dataPeserta'] = $dataPeserta;
		$this->load->view('backend/v_header.php');
		$this->load->view('backend/v_datainput.php', $viewData);
		$this->load->view('backend/v_footer.php');
	}

	function update_peserta_konfirmasi()
	{
		$idUser = $this->input->post('idUser');
	}

	function peserta_konfirmasi($event = null)
	{
		$dataPeserta = $this->m_manager->getAllPesertaEventByStatusAndEvent('konfirmasi', $event);
		$viewData['dataPeserta'] = $dataPeserta;
		$this->load->view('backend/v_header.php');
		$this->load->view('backend/v_datakonfirmasi.php', $viewData);
		$this->load->view('backend/v_footer.php');
	}

	function peserta_batal($event = null)
	{
		$dataPeserta = $this->m_manager->getAllPesertaEventByStatusAndEvent('batal', $event);
		$viewData['dataPeserta'] = $dataPeserta;
		$this->load->view('backend/v_header.php');
		$this->load->view('backend/v_databatal.php', $viewData);
		$this->load->view('backend/v_footer.php');
	}

	function peserta_tiket_used($event = null)
	{
		$dataPeserta = $this->m_manager->getAllPesertaEventByStatusAndEvent('tiket_digunakan', $event);
		$viewData['dataPeserta'] = $dataPeserta;
		$this->load->view('backend/v_header.php');
		$this->load->view('backend/v_datadigunakan.php', $viewData);
		$this->load->view('backend/v_footer.php');
	}

	function peserta_tiket_expire($event = null)
	{
		$dataPeserta = $this->m_manager->getAllPesertaEventByStatusAndEvent('tiket_kadaluarsa', $event);
		$viewData['dataPeserta'] = $dataPeserta;
		$this->load->view('backend/v_header.php');
		$this->load->view('backend/v_datakadaluarsa.php', $viewData);
		$this->load->view('backend/v_footer.php');
	}

	function management_event()
	{
		$this->load->library('grocery_CRUD');
		try {
			$crud = new grocery_CRUD();
			$crud->set_lang_string('insert_error', 'Terjadi kegagalan');

			$crud->set_theme('bootstrap');
			$crud->set_table('event');
			$crud->set_subject('event');
			$crud->unset_jquery();
			$crud->unset_bootstrap();

			$crud->set_field_upload('file_upload', 'assets/uploads/events/');

			$output = $crud->render();
			$this->load->view('backend/v_header_grocery', $output);
			$this->load->view('backend/v_main_grocery', $output);
			$this->load->view('backend/v_footer_grocery', $output);
		} catch (Exception $e) {
			show_error($e->getMessage() . ' --- ' . $e->getTraceAsString());
		}
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
				$user_login = $this->db->get_where('user', array('username' => $username, 'password' => $password))->row();

				if ($user_login->username == $username) {
					$data_session = array(
						'username' => $username,
						'status' => "login",
					);

					$this->session->set_userdata($data_session);
					redirect('admin/user');
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
