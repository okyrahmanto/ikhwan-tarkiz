<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Mailsend extends CI_Controller {

	
	function __construct(){
		parent::__construct();
		define('FPDF_FONTPATH','assets/fpdf/font');		
		$this->load->model('m_login');
		$this->load->library('fpdf');
        $this->CI =& get_instance();
	}

	public function index()
	{
		//echo exec('whoami');
		//$this->load->view('v_login.php');
	}

	function aksi_login(){
		if (isset($_POST['submit'])){
			$username = $this->input->post('username',TRUE);
			$password = $this->input->post('password',TRUE);

			$where = array(
			'username' => $username,
			'password' => $password
			);
			$cek = $this->m_login->cek_login("login",$where)->num_rows();
			if($cek > 0){
				$user_login = $this->db->get_where('login',array('username'=>$username,'password'=>$password))->row();

 				if($user_login->username==$username){
 					$data_session = array(
					'username' => $username,
					'status' => "login",
					);
	 
				$this->session->set_userdata($data_session);
				redirect('manager/peserta_masuk');
 				}else{
				$this->CI->session->set_flashdata('sukses','Username/password salah !');
	 			redirect(base_url('login'));
				}
			}
		}
	}
 
	function logout(){
		$this->session->sess_destroy();
		redirect('login','refresh');
    }
    
    function email_send($nama=null,$noTiket=null,$noTelepon=null,$alamat=null) {
		$this->load->library('email');
        $config = array(
            'protocol'  => 'smtp',
            'smtp_host' => 'ssl://smtp.googlemail.com',
            'smtp_port' => 465,
            'smtp_user' => 'tiket.bismillah@gmail.com',
            'smtp_pass' => 'tiket.bismillah2020',
            'mailtype'  => 'html',
            'charset'   => 'utf-8'
        );
        $this->email->initialize($config);
        $this->email->set_mailtype("html");
        $this->email->set_newline("\r\n");
        
        //Email content
        $htmlContent = '<h1>Ini email test</h1>';
        $htmlContent .= '<p>jangan dibuka, nanti meledak</p>';
        
        $this->email->to('oky.rahmanto@gmail.com');
        $this->email->from('tiket.bismillah@gmail.com','Pemuda Bismillah');
        $this->email->subject('Tes ticket');
		$this->email->message($htmlContent);
		$this->email->attach($this->fpdf());
		echo __DIR__.'/../../assets/ticketpdf/attachment_1'.$noTiket.'.pdf';
		sleep(2);
        //Send email
        $this->email->send();
	}
	
	function fpdf($nama=null,$noTiket=null,$noTelepon=null,$alamat=null) {
		$pdf = new FPDF('l','mm',array((1240/3),(591/3)));
		$pdf->AddPage();
		$pdf->Image('assets/fpdf/tiket_background.png',0,0,(1240/3),(591/3));
		$pdf->SetFont('Arial','B',30);
		//$pdf->MultiCell(0,65,'Hello World!\nyawn\nyoow');
		$pdf->SetXY(220,13);
		$pdf->Cell(0,10,'Pemuda Bismillah On 4D ',0,1);
		$pdf->SetXY(90,38);
		$pdf->Cell(0,10,$nama,0,1);
		$pdf->SetXY(90,71);
		$pdf->Cell(0,10,$noTiket,0,1);
		$pdf->SetXY(90,104);
		$pdf->Cell(0,10,$noTelepon,0,1);
		$pdf->SetXY(90,138);
		$pdf->Cell(0,10,$alamat,0,1);
		$pdf->Output(__DIR__.'/../../assets/ticketpdf/attachment_1'.$noTiket.'.pdf', 'F');
		return __DIR__.'/../../assets/ticketpdf/attachment_1'.$noTiket.'.pdf';
	}
}
