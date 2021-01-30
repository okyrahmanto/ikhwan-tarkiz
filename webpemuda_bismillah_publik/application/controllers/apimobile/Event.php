<?php
    use Restserver\Libraries\REST_Controller;
    defined('BASEPATH') OR exit('No direct script access allowed');
    
    // This can be removed if you use __autoload() in config.php OR use Modular Extensions
    /** @noinspection PhpIncludeInspection */
    //To Solve File REST_Controller not found
    require APPPATH . 'libraries/REST_Controller.php';
    require APPPATH . 'libraries/Format.php';
    
    /**
     * This is an example of a few basic user interaction methods you could use
     * all done with a hardcoded array
     *
     * @package         CodeIgniter
     * @subpackage      Rest Server
     * @category        Controller
     * @author          Phil Sturgeon, Chris Kacerguis
     * @license         MIT
     * @link            https://github.com/chriskacerguis/codeigniter-restserver
     */
    class Event extends REST_Controller {
        
        function __construct()
        {
            // Construct the parent class
            parent::__construct();
            
            // Configure limits on our controller methods
            // Ensure you have created the 'limits' table and enabled 'limits' within application/config/rest.php
            $this->methods['users_get']['limit'] = 500; // 500 requests per hour per user/key
            $this->methods['users_post']['limit'] = 100; // 100 requests per hour per user/key
            $this->methods['users_delete']['limit'] = 50; // 50 requests per hour per user/key
            date_default_timezone_set("Asia/Makassar");
            $this->load->model('m_peserta');
            $this->load->model('m_user');
            $this->load->model('m_event');
        }

        public function registerEvent_post() {
            $idFirebase = $this->input->post('idFirebase');
            $idEvent = $this->input->post('idEvent');
            $idTicket = $this->input->post('idTicket');
            $device = $this->input->post('device');

            // get userid from firebase
            $peserta = $this->m_peserta->getPesertaByIdFirebase($idFirebase);

            // cunstruct the data
            $eventData = array(
                'idEvent' => $idEvent,
                'idPeserta' => $peserta->idPeserta,
                'idTicket' => $idTicket,
                'status' => 'masuk',
                'device' => $device,
                'isTicketSend' => '0'
            );


            // daftarkan pada event
            if (!$this->m_event->checkRegisteredEvent($eventData)) {
                $result = $this->m_event->addRegisterEvent($eventData);
                $this->set_response($result, REST_Controller::HTTP_OK);
            } else {
                $result = $this->m_event->addRegisterEvent($eventData);
                $this->set_response(true, REST_Controller::HTTP_OK);
            }

           
        }

        public function getRegisteredEvent_post() {
            $idFirebase = $this->input->post('idFirebase');
            $idEvent = $this->input->post('idEvent');
            // get userid from firebase
            $peserta = $this->m_peserta->getPesertaByIdFirebase($idFirebase);
            
            $param = array(
                'idPeserta' => $peserta->idPeserta,
                'idEvent' => $idEvent,

            );
            
            $event = $this->m_event->getRegisteredEventByPesertaEvent($param)->row();
            $result = $this->m_event->addRegisterEvent($eventData);
            $this->set_response($event, REST_Controller::HTTP_OK);

        }

        public function getRegisteredEventByIdFirebase_post() {
            $idFirebase = $this->input->post('idFirebase');
            // get userid from firebase
            $peserta = $this->m_peserta->getPesertaByIdFirebase($idFirebase);
            
            $param = array(
                'idPeserta' => $peserta->idPeserta

            );
            
            $event = $this->m_event->getRegisteredEventByPesertaEvent($param)->row();
            $result = $this->m_event->addRegisterEvent($eventData);
            $this->set_response($event, REST_Controller::HTTP_OK);

        }
   
        
        
    }
    
