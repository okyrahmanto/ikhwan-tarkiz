<?php
//require APPPATH . '/libraries/REST_Controller.php';
require APPPATH . 'libraries/REST_Controller.php';
require APPPATH . 'libraries/Format.php';
use Restserver\Libraries\REST_Controller;

class Kode extends REST_Controller {

    function __construct($config = 'rest') {
        parent::__construct($config);
        $this->load->database();
    }

    //Menampilkan data kode
    function index_get() {
        $id = $this->get('id');
        if ($id == '') {
            $kode = $this->db->get('tb_kode')->result();
        } else {
            $this->db->where('id', $id);
            $kode = $this->db->get('tb_kode')->result();
        }
        $this->response($kode, 200);
    }


    //Masukan function selanjutnya disini
}
?>