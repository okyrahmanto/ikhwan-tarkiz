<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
    
    class Api extends CI_Controller{
        
        public function __construct(){
            parent::__construct();
            //$this->load->model('m_admin');
            $this->load->model('m_admin');
            
            //load Database
            $this->load->database();
            // load url helper
            $this->load->helper('url');
            
         
        }
        
        function getHargaBarang() {
            $id_barang = $_GET['id_barang'];
            $id_pelayanan = $_GET['id_pelayanan'];
            $barang = $this->db->get_where('barang',array('id_barang'=>$id_barang))->row();
            //print_r($barang);
            if ($id_pelayanan=='2') {
                echo $barang->harga_laundry;
            } else if ($id_pelayanan=='3') {
                echo $barang->harga_pressing;
            } else if ($id_pelayanan=='4') {
                echo $barang->harga_dry;
            }
        }
        
        function getBarang($limit=10) {
            $barang = $this->db->get('barang')->result_array();
            echo json_encode($barang);
        }
    }
