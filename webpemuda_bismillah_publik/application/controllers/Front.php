<?php
defined('BASEPATH') OR exit('No direct script access allowed');
require realpath(__DIR__ . '/../..').'/vendor/autoload.php';
use Kreait\Firebase\Factory;
use Kreait\Firebase\ServiceAccount;

class Front extends CI_Controller {

	function __construct(){
		parent::__construct();		
        $this->CI =& get_instance();
        $this->load->model('m_event');
        $this->load->model('m_peserta');
        $this->load->model('m_tiket');

	}

	public function index()
	{
        $_SESSION['message'] = null;
		$this->load->view('frontend/v_front.php');
    }
    

    public function daftar() {

        $idTicket = $this->input->post('kelas');
        $user = array(
            'nama'=>$this->input->post('nama'),
            'email'=>$this->input->post('email'),
            'noTelepon'=>$this->input->post('noTelepon'),
            'idFirebase'=>'-',
            'jenisKelamin'=>$this->input->post('jenisKelamin'),

        );



        $loginDetail = array(
            'username' => $this->input->post('nama'),
            'password' => '12345678',
            'role' => 'peserta'
        );

        $serviceAccount = ServiceAccount::fromJsonFile(realpath(__DIR__ . '/..').'/tpazproject-firebase-adminsdk-rc3lv-636c00531c.json');
        $firebase = (new Factory)
            ->withServiceAccount($serviceAccount)
            ->create();
            
        $auth = $firebase->getAuth();

        try {
            $userAuth = $auth->getUserByEmail($user['email']);
        } catch (\Throwable $th) {
            $userAuth = false;
        }
        
        if ($userAuth==false) {
            $userProperties = [
                'email' => $user['email'],
                'emailVerified' => false,
                'password' => $loginDetail['password'],
                'displayName' => $user['nama'],
                'disabled' => false,
            ];
            
            
            $createdUser = $auth->createUser($userProperties);
            
            //print_r($createdUser);
            $user['idFirebase'] = $createdUser->uid;
    
            $this->user_add($user,$loginDetail);
            $this->registerEvent($user['idFirebase'],$idTicket);
            $_SESSION['message'] = "Registrasi Berhasil, tim kami akan segera menghubungi anda melalui WhatsApp";
            $this->load->view('frontend/v_front.php');
        } else {
            $_SESSION['message'] = "email telah digunakan";
            $this->load->view('frontend/v_front.php');
        }

        
        
    }

    function user_add($user,$loginDetail) {
        $this->m_peserta->addPeserta($user);
        $this->m_peserta->addLogin($loginDetail);
    }

    function registerEvent($idFirebase,$idTicket){
        //$idFirebase = $this->input->post('idFirebase');
        $price = $this->m_tiket->getTiketById($idTicket)->hargaTiket;
        // get userid from firebase
        $peserta = $this->m_peserta->getPesertaByIdFirebase($idFirebase);
        $lastNumberCode = substr($peserta->noTelepon,-3);
        if ($lastNumberCode>500) {
            $price = $price - 1000 + $lastNumberCode;
        } else {
            $price = $price - 500 + $lastNumberCode;
        }
        
        $idEvent = '1';
        //$idTicket = '1';
        $device = 'Website';

            

            // cunstruct the data
            $eventData = array(
                'idEvent' => $idEvent,
                'idPeserta' => $peserta->idPeserta,
                'idTicket' => $idTicket,
                'status' => 'masuk',
                'device' => $device,
                'isTicketSend' => '0',
                'hargaTiket' => $price
            );


            // daftarkan pada event
            if (!$this->m_event->checkRegisteredEvent($eventData)) {
                $result = $this->m_event->addRegisterEvent($eventData);
                //$this->set_response($result, REST_Controller::HTTP_OK);
            } else {
                $result = $this->m_event->addRegisterEvent($eventData);
                //$this->set_response(true, REST_Controller::HTTP_OK);
            }
            
    }


	
}
