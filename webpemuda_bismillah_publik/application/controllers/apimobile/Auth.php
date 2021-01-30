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
    class Auth extends REST_Controller {
        
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

        public function user_register_post() {

            $user = array(
                'nama'=>$this->input->post('nama'),
                'email'=>$this->input->post('email'),
                'noTelepon'=>$this->input->post('noTelepon'),
                'idFirebase'=>$this->input->post('idFirebase'),
                'jenisKelamin'=>$this->input->post('jenisKelamin'),
                'asalKota'=>$this->input->post('asalKota'),

            );

            $loginDetail = array(
                'username' => $this->input->post('nama'),
                'password' => $this->input->post('password'),
                'role' => 'peserta'
            );

            $this->user_add($user,$loginDetail);

            
            
        }

        function user_add($user,$loginDetail) {
            $this->m_peserta->addPeserta($user);
            $this->m_peserta->addLogin($loginDetail);
        }

        public function user_post() {
            $idFirebase = $this->input->post('idFirebase');
            $row = $this->m_peserta->getPesertaByIdFirebase($idFirebase);
            $this->set_response($row, REST_Controller::HTTP_OK); // OK (200) being the HTTP response code
        }
        
        public function absen_image_post()
        {
            
            $config['upload_path']          = './uploads/';
            $config['allowed_types']        = 'gif|jpg|png';
            //$config['max_size']             = 100;
            //$config['max_width']            = 1024;
            //$config['max_height']           = 768;
            $new_name = time().$_FILES["userfile"]['name'];
            $config['file_name'] = $new_name;
            
            $this->load->library('upload', $config);
            
            if ( ! $this->upload->do_upload('userfile'))
            {
                
                
                $error = array('error' => $this->upload->display_errors());
                $this->set_response($error, REST_Controller::HTTP_CREATED); // CREATED (201) being the HTTP response code
                //$this->load->view('upload_form', $error);
            }
            else
            {
                // get data for saving in db
                $absen_data = array(
                                    "uid_firebase"=>$this->post('uid_pegawai'),
                                    "status"=>$this->post('status'),
                                    "latitude"=>$this->post('latitude'),
                                    "longitude"=>$this->post('longitude'),
                                    "radius"=>$this->post('radius'),
                                    "tanggal"=>date("Y-m-d"),
                                    "jam"=>date("h:i:s"),
                                    "catatan"=>$this->post('catatan'),
                                    "pic"=> $new_name
                                    );
                $this->db->insert("tb_absen",$absen_data);
                $data = array('upload_data' => $this->upload->data());
                $this->set_response($data, REST_Controller::HTTP_CREATED); // CREATED (201) being the HTTP response code
                //$this->load->view('upload_success', $data);
            }
         
            
           
        }
        
        public function absen_post()
        {
            
            //print_r($_POST);
                // get data for saving in db
                $absen_data = array(
                                    "uid_firebase"=>$this->post('uid_pegawai'),
                                    "status"=>$this->post('status'),
                                    "latitude"=>$this->post('latitude'),
                                    "longitude"=>$this->post('longitude'),
                                    "radius"=>$this->post('radius'),
                                    "tanggal"=>date("Y-m-d"),
                                    "jam"=>date("h:i:s"),
                                    "pic"=> ''
                                    );
                $result = $this->db->insert("tb_absen",$absen_data);
                $this->set_response(0, REST_Controller::HTTP_OK); // CREATED (201) being the HTTP response code
                //$this->load->view('upload_success', $data);
            
            
            
            
        }
        
        public function driver_get() {
            $uid = $this->get('uid');
            $user = $this->db->query("select * from tb_driver where uid_firebase='".$uid."'")->row();
            if (!empty($user))
            {
                $this->set_response($user, REST_Controller::HTTP_OK); // OK (200) being the HTTP response code
            }
            else
            {
                $this->set_response([
                                    'status' => FALSE,
                                    'message' => 'User could not be found'
                                    ], REST_Controller::HTTP_NOT_FOUND); // NOT_FOUND (404) being the HTTP response code
            }
            
        }
        
        public function petugas_get() {
            $uid = $this->get('uid');
            $user = $this->db->query("select * from tb_petugas where uid_firebase='".$uid."'")->row();
            if (!empty($user))
            {
                $this->set_response($user, REST_Controller::HTTP_OK); // OK (200) being the HTTP response code
            }
            else
            {
                $this->set_response([
                                    'status' => FALSE,
                                    'message' => 'User could not be found'
                                    ], REST_Controller::HTTP_NOT_FOUND); // NOT_FOUND (404) being the HTTP response code
            }
        }
        
        public function banksampah_get() {
            
            $result = $this->db->query("select * from tb_bank_sampah")->result();
            //$result = array();
            //foreach ($query as $row) {
            //    array_push($result,$row);
            //}
            if (!empty($result))
            {
                $this->set_response($result, REST_Controller::HTTP_OK); // OK (200) being the HTTP response code
            }
            else
            {
                $this->set_response([
                                    'status' => FALSE,
                                    'message' => 'User could not be found'
                                    ], REST_Controller::HTTP_NOT_FOUND); // NOT_FOUND (404) being the HTTP response code
            }
        }
        
        public function users_get()
        {
            // Users from a data store e.g. database
            $users = [
            ['id' => 1, 'name' => 'John', 'email' => 'john@example.com', 'fact' => 'Loves coding'],
            ['id' => 2, 'name' => 'Jim', 'email' => 'jim@example.com', 'fact' => 'Developed on CodeIgniter'],
            ['id' => 3, 'name' => 'Jane', 'email' => 'jane@example.com', 'fact' => 'Lives in the USA', ['hobbies' => ['guitar', 'cycling']]],
            ];
            
            $id = $this->get('id');
            
            // If the id parameter doesn't exist return all the users
            
            if ($id === NULL)
            {
                // Check if the users data store contains users (in case the database result returns NULL)
                if ($users)
                {
                    // Set the response and exit
                    $this->response($users, REST_Controller::HTTP_OK); // OK (200) being the HTTP response code
                }
                else
                {
                    // Set the response and exit
                    $this->response([
                                    'status' => FALSE,
                                    'message' => 'No users were found'
                                    ], REST_Controller::HTTP_NOT_FOUND); // NOT_FOUND (404) being the HTTP response code
                }
            }
            
            // Find and return a single record for a particular user.
            
            $id = (int) $id;
            
            // Validate the id.
            if ($id <= 0)
            {
                // Invalid id, set the response and exit.
                $this->response(NULL, REST_Controller::HTTP_BAD_REQUEST); // BAD_REQUEST (400) being the HTTP response code
            }
            
            // Get the user from the array, using the id as key for retrieval.
            // Usually a model is to be used for this.
            
            $user = NULL;
            
            if (!empty($users))
            {
                foreach ($users as $key => $value)
                {
                    if (isset($value['id']) && $value['id'] === $id)
                    {
                        $user = $value;
                    }
                }
            }
            
            if (!empty($user))
            {
                $this->set_response($user, REST_Controller::HTTP_OK); // OK (200) being the HTTP response code
            }
            else
            {
                $this->set_response([
                                    'status' => FALSE,
                                    'message' => 'User could not be found'
                                    ], REST_Controller::HTTP_NOT_FOUND); // NOT_FOUND (404) being the HTTP response code
            }
        }
        
        public function users_post()
        {
            // $this->some_model->update_user( ... );
            $message = [
            'id' => 100, // Automatically generated by the model
            'name' => $this->post('name'),
            'email' => $this->post('email'),
            'message' => 'Added a resource'
            ];
            
            $this->set_response($message, REST_Controller::HTTP_CREATED); // CREATED (201) being the HTTP response code
        }
        
        public function users_delete()
        {
            $id = (int) $this->get('id');
            
            // Validate the id.
            if ($id <= 0)
            {
                // Set the response and exit
                $this->response(NULL, REST_Controller::HTTP_BAD_REQUEST); // BAD_REQUEST (400) being the HTTP response code
            }
            
            // $this->some_model->delete_something($id);
            $message = [
            'id' => $id,
            'message' => 'Deleted the resource'
            ];
            
            $this->set_response($message, REST_Controller::HTTP_NO_CONTENT); // NO_CONTENT (204) being the HTTP response code
        }
        
    }
    
