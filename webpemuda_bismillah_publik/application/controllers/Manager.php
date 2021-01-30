<?php
defined('BASEPATH') OR exit('No direct script access allowed');
require realpath(__DIR__ . '/../..').'/vendor/autoload.php';
use Kreait\Firebase\Factory;
use Kreait\Firebase\ServiceAccount;

class Manager extends CI_Controller {

	function __construct(){
		parent::__construct();		
		$this->isLoggedIn();
		$this->load->model('m_manager');
		$this->load->model('m_event');
		$this->load->model('m_peserta');
        $this->CI =& get_instance();
	}

	private function isLoggedIn() {
		if ($_SESSION['status']!='login') {
			redirect(base_url('index.php/login'));
		}
	}
	
	function debugPrint($param) {
		echo "<pre>";
		print_r($param);
		echo "</pre>";
	}
    
    function peserta_masuk($event=null){
		//if(isset($this->input->get('idEvent'))) {
			$event = $this->input->get('idEvent');
		//}
		$dataPeserta = $this->m_manager->getAllPesertaEventByStatusAndEvent('masuk',$event);
		$viewData['dataEvent'] = $this->m_event->getAllEvent()->result();
		$viewData['idEventSelected'] = $event;
		$viewData['dataPeserta'] = $dataPeserta;

		$this->load->view('backend/v_header.php');
		$this->load->view('backend/v_datainput.php',$viewData);
		$this->load->view('backend/v_footer.php');
	}
	
	function update_peserta_konfirmasi() {
		$idUser = $this->input->post('idUser');
	
	}

    function peserta_konfirmasi($event=null){
		$dataPeserta = $this->m_manager->getAllPesertaEventByStatusAndEvent('konfirmasi',$event);
		$viewData['dataPeserta'] = $dataPeserta;
		$this->load->view('backend/v_header.php');
		$this->load->view('backend/v_datakonfirmasi.php',$viewData);
		$this->load->view('backend/v_footer.php');
    }

    function peserta_batal($event=null){
		$dataPeserta = $this->m_manager->getAllPesertaEventByStatusAndEvent('batal',$event);
		$viewData['dataPeserta'] = $dataPeserta;
		$this->load->view('backend/v_header.php');
		$this->load->view('backend/v_databatal.php',$viewData);
		$this->load->view('backend/v_footer.php');
    }

    function peserta_tiket_used($event=null){
		$dataPeserta = $this->m_manager->getAllPesertaEventByStatusAndEvent('tiket_digunakan',$event);
		$viewData['dataPeserta'] = $dataPeserta;
		$this->load->view('backend/v_header.php');
		$this->load->view('backend/v_datadigunakan.php',$viewData);
		$this->load->view('backend/v_footer.php');
    }

    function peserta_tiket_expire($event=null){
		$dataPeserta = $this->m_manager->getAllPesertaEventByStatusAndEvent('tiket_kadaluarsa',$event);
		$viewData['dataPeserta'] = $dataPeserta;
		$this->load->view('backend/v_header.php');
		$this->load->view('backend/v_datakadaluarsa.php',$viewData);
		$this->load->view('backend/v_footer.php');
	}
	
	function management_event(){
		$this->load->library('grocery_CRUD');
            try{
                $crud = new grocery_CRUD();
                $crud->set_lang_string('insert_error','Terjadi kegagalan');
                
                $crud->set_theme('bootstrap');
                $crud->set_table('event');
				$crud->set_subject('event');
				$crud->unset_jquery();
				$crud->unset_bootstrap();
                $output = $crud->render();
                $this->load->view('backend/v_header_grocery',$output);            
				$this->load->view('backend/v_main_grocery',$output);
				$this->load->view('backend/v_footer_grocery',$output ); 
            }catch(Exception $e){
                show_error($e->getMessage().' --- '.$e->getTraceAsString());
            }
	}

	function management_artikel(){
		$this->load->library('grocery_CRUD');
            try{
                $crud = new grocery_CRUD();
                $crud->set_lang_string('insert_error','Terjadi kegagalan');
                
                $crud->set_theme('bootstrap');
                $crud->set_table('article');
				$crud->set_subject('artikel');
				$crud->set_field_upload('image','assets/img/artikel');
				$crud->unset_jquery();
				$crud->unset_bootstrap();
                $output = $crud->render();
                $this->load->view('backend/v_header_grocery',$output);            
				$this->load->view('backend/v_main_grocery',$output);
				$this->load->view('backend/v_footer_grocery',$output ); 
            }catch(Exception $e){
                show_error($e->getMessage().' --- '.$e->getTraceAsString());
            }
	}

	function management_sponsor(){
		$this->load->library('grocery_CRUD');
            try{
                $crud = new grocery_CRUD();
                $crud->set_lang_string('insert_error','Terjadi kegagalan');
                
                $crud->set_theme('bootstrap');
                $crud->set_table('sponsor');
				$crud->set_subject('sponsor');
				$crud->set_relation('idEvent','event','name');
				$crud->unset_jquery();
				$crud->unset_bootstrap();
                $output = $crud->render();
                $this->load->view('backend/v_header_grocery',$output);            
				$this->load->view('backend/v_main_grocery',$output);
				$this->load->view('backend/v_footer_grocery',$output ); 
            }catch(Exception $e){
                show_error($e->getMessage().' --- '.$e->getTraceAsString());
            }
	}

	function management_peserta(){
		$this->load->library('grocery_CRUD');
            try{
                $crud = new grocery_CRUD();
                $crud->set_lang_string('insert_error','Terjadi kegagalan');
                
                $crud->set_theme('bootstrap');
                $crud->set_table('peserta');
				$crud->set_subject('peserta');
				$crud->unset_jquery();
				$crud->unset_bootstrap();
				$crud->unset_add();
				$crud->unset_read();
				$crud->unset_fields(array('idFirebase'));
				$crud->unset_edit_fields(array('idFirebase'));
				$crud->callback_after_update(array($this, 'updateEmailPeserta'));
                $output = $crud->render();
                $this->load->view('backend/v_header_grocery',$output);            
				$this->load->view('backend/v_main_grocery',$output);
				$this->load->view('backend/v_footer_grocery',$output ); 
            }catch(Exception $e){
                show_error($e->getMessage().' --- '.$e->getTraceAsString());
            }
	}

	function updateEmailPeserta($post_array,$primary_key) {
		// get firebase
		$userProfile = $this->m_peserta->getPesertaByIdPeserta($primary_key);

		$serviceAccount = ServiceAccount::fromJsonFile(realpath(__DIR__ . '/..').'/tpazproject-firebase-adminsdk-rc3lv-636c00531c.json');
        $firebase = (new Factory)
            ->withServiceAccount($serviceAccount)
            ->create();
            
		$auth = $firebase->getAuth();
		$updatedUser = $auth->changeUserEmail($userProfile->idFirebase,$post_array['email']);

	}

	public function index()
	{
		$this->load->view('v_login.php');
	}

	function konfirmasi($idRegister,$idEvent) {
		$this->m_event->confirm($idRegister,$idEvent);
		redirect('manager/peserta_masuk');
	}

	function kirim_tiket($idRegister,$idPeserta) {
		$peserta = $this->m_peserta->getPesertaByIdPeserta($idPeserta);
		$tiket = $this->m_event->getRegisteredEventById($idRegister)->row();
		$this->email_send($peserta->nama,$tiket->noTiket,$peserta->noTelepon,$peserta->email);

		$data = array(
			'isTicketSend' => '1'
		);
		$this->m_event->updateRegisterEvent($idRegister,$data);
		redirect('manager/peserta_konfirmasi');
	}

	function email_send($nama=null,$noTiket=null,$noTelepon=null,$email,$alamat=null) {
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
        $htmlContent = '';
		$htmlContent .= '<p>
			Assalamu\'alaykum Warahmatullahi Wabarakatuh<br>
			Yth. '.$nama.'<br> <br>

			Terima kasih telah mendaftar di acara Pemuda Bismillah. Pendaftaran acara Anda telah dikonfirmasi berhasil.<br><br>

			Detil acara<br>
			<table>
						<tr>
							<td> Nama acara </td>
							<td> : Pemuda Bismillah on 4D </td>
						</tr>
						<tr>
							<td> Waktu </td>
							<td> : 08.00 - Selesai</td>
						</tr>
						<tr>
							<td> Tempat </td>
							<td> : Hotel Roditha, Banjarmasin, Kalimantan Selatan </td>
						</tr>
					</table><br>

			e-tiket Anda terdapat pada lampiran.<br> <br>

			Terima Kasih<br>
			Wassalamu\'alaykum Warahmatullahi Wabarakatuh<br> <br>
		</p>';
        
        $this->email->to($email);
        $this->email->from('tiket.bismillah@gmail.com','Pemuda Bismillah');
        $this->email->subject('E-Tiket Pemuda Bismillah');
		$this->email->message($htmlContent);
		$this->email->attach($this->fpdf($nama,$noTiket,$noTelepon));
		sleep(2);
        //Send email
        $this->email->send();
	}
	
	function fpdf($nama=null,$noTiket=null,$noTelepon=null,$alamat=null) {
		$qrcodeUrl = $this->generateQRcode($noTiket);
		$this->load->library('fpdf');
		define('FPDF_FONTPATH','assets/fpdf/font');	
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
		$pdf->Image($qrcodeUrl,335,110,-40);
		$pdf->Output(__DIR__.'/../../assets/ticketpdf/attachment_'.$noTiket.'.pdf', 'F');
		return __DIR__.'/../../assets/ticketpdf/attachment_'.$noTiket.'.pdf';
	}

	function generateQRcode($noTiket) {
		$this->load->library('phpqrcode/qrlib');
		$this->qrlib->generate($noTiket,__DIR__.'/../../assets/ticketpdf/qrcode_'.$noTiket.'.png',QR_ECLEVEL_H,6);
		return __DIR__.'/../../assets/ticketpdf/qrcode_'.$noTiket.'.png';
	}
}
