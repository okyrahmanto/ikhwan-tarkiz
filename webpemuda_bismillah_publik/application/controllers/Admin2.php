<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
 
class Admin extends CI_Controller{
 
    public function __construct(){
        parent::__construct();
        //$this->load->model('m_admin');
        $this->load->model('m_admin');

        //load Database 
        $this->load->database();
        // load url helper
        $this->load->helper('url');

        // load Session Library
        $this->load->library('grocery_CRUD');
        $this->load->library('session');
         
        
        if($this->session->userdata('status') != "login"){
            redirect(base_url("index.php/login"));
        }   
    }
    
 
    function index(){

    }

    //Untuk Menu Data User
    public function user()
        {
            $this->load->library('grocery_CRUD');
            try{
                $crud = new grocery_CRUD();
                $crud->set_lang_string('insert_error','Username sudah ada di database');
                
                $crud->set_theme('bootstrap');
                $crud->set_table('user');
                $crud->set_subject('Data User');
                $crud->fields('username','password');
                $crud->columns('id_user','username','password');
                $crud->display_as('id_user','ID User');
                $crud->field_type('password','password');
                $crud->required_fields('username','password');
               
                //$crud->set_field_upload('foto','assets/uploads/foto_pasien/');

                $output = $crud->render();
                $this->load->view('v_side_menu',$output);            
                $this->load->view('v_main_grocery',$output);
            }catch(Exception $e){
                show_error($e->getMessage().' --- '.$e->getTraceAsString());
            }
        }



        //Untuk Menu Data pelanggan
        public function pelanggan()
        {
            $this->load->library('grocery_CRUD');
            try{
                $crud = new grocery_CRUD();
                $crud->set_lang_string('insert_error','ID Pelanggan sudah ada di database');
                
                $crud->set_theme('bootstrap');
                $crud->set_table('pelanggan');
                $crud->set_subject('Data Pelanggan');
                $crud->fields('id_pelanggan','nama_pelanggan','jenis','status_diskon','status_wilayah','alamat','telp','tgl_input');
                $crud->columns('id_pelanggan','nama_pelanggan','jenis','status_diskon','status_wilayah','alamat','telp');
                $crud->display_as('id_pelanggan','ID pelanggan');
                $crud->required_fields('id_pelanggan');
                $crud->unset_edit_fields('tgl_input');

                $crud->field_type('telp','integer');
                $crud->field_type('status_wilayah','enum',array('Luar','Dalam'));
                $crud->field_type('jenis','enum',array('Agen','Umum'));

                //$crud->callback_after_update('tgl_input',array($this,'tanggal'));
               
                $output = $crud->render();            
                $this->load->view('v_side_menu',$output);            
                $this->load->view('v_main_grocery',$output);
            }catch(Exception $e){
                show_error($e->getMessage().' --- '.$e->getTraceAsString());
            }
        }

        //Untuk Menu Data barang
       public function barang()
        {
            $this->load->library('grocery_CRUD');
            try{
                $crud = new grocery_CRUD();
                $crud->set_lang_string('insert_error','ID Barang sudah ada di database');
                
                $crud->set_theme('bootstrap');
                $crud->set_table('barang');
                $crud->set_subject('Data Barang');
                $crud->fields('kode_barang','nama_barang','satuan','harga_laundry','harga_pressing','harga_dry');
                $crud->columns('kode_barang','nama_barang','satuan','harga_laundry','harga_pressing','harga_dry');
                $crud->required_fields('kode_barang');
                $crud->field_type('harga_laundry','integer');
                $crud->field_type('harga_dry','integer');
                $crud->field_type('harga_pressing','integer');
            
                $output = $crud->render();            
                $this->load->view('v_side_menu',$output);            
                $this->load->view('v_main_grocery',$output);
            }catch(Exception $e){
                show_error($e->getMessage().' --- '.$e->getTraceAsString());
            }
        } 

        /*public function barang(){
            $data['barang']=$this->m_admin->m_barang();
            $data['harga_barang']=$this->m_admin->m_harga_barang();
            $this->load->view('v_data_barang',$data); 
        }*/

        //Untuk Menu Data Counter
        public function Counter()
        {
            $this->load->library('grocery_CRUD');
            try{
                $crud = new grocery_CRUD();
                $crud->set_lang_string('insert_error','ID Counter sudah ada di database');
                
                $crud->set_theme('bootstrap');
                $crud->set_table('counter');
                $crud->set_subject('Data Counter');
                $crud->fields('id_counter','nama_counter','alamat_counter','telp_counter');
                $crud->columns('id_counter','nama_counter','alamat_counter','telp_counter');
                $crud->required_fields('id_counter');
    
                $crud->field_type('telp_counter','integer');
            
                $output = $crud->render();            
                $this->load->view('v_side_menu',$output);            
                $this->load->view('v_main_grocery',$output);
            }catch(Exception $e){
                show_error($e->getMessage().' --- '.$e->getTraceAsString());
            }
        }

        public function data_transaksi()
        {
            $data['transaksi']=$this->m_admin->data_transaksi();
            $this->load->view('v_data_transaksi',$data);  
        }

        public function transaksi()
        {
            $data['pelanggan'] = $this->m_admin->m_pelanggan();
            $data['counter']=$this->m_admin->m_counter();
            $data['barang']=$this->m_admin->m_barang();
            $data['barang2']=$this->m_admin->m_barang();
            $data['harga_barang']=$this->m_admin->harga_barang();
            $data['harga_barang2']=$this->m_admin->harga_barang();
            $this->load->view('v_transaksi',$data);  
        }

        function get_pelanggan()
        {
        $id=$this->input->post('id');
        $data=$this->m_admin->m_pelanggan2($id);
        echo json_encode($data);
        }

        function get_harga_pelayanan()
        {
        $nama_barang0=$this->input->post('nama_barang0');
        $pelayanan0=$this->input->post('pelayanan0');
        $harga=$this->m_admin->get_harga_pelayanan($nama_barang0,$pelayanan0);

            while ($data = mysql_fetch_array($harga)) {       
            echo $data[1];
            }
        //echo json_encode($data);
        }

        function proses_input_transaksi()
        {
        $tgl_transaksi = $this->input->post('tgl_transaksi');
        $id_pelanggan = $this->input->post('id_pelanggan');
        $jenis_pelayanan = $this->input->post('jenis_pelayanan');
        $no_nota = $this->input->post('no_nota');
        
        $tgl_diterima = date('d-m-Y');
        $tgl_dikembalikan = $this->input->post('tgl_dikembalikan');
        $id_counter = $this->input->post('id_counter');
        $id_mo = $this->input->post('id_mo');
        $shift = $this->input->post('shift');
        $area_antar = $this->input->post('area_antar');

        $memo=$this->input->post('memo');
        $permintaan=$this->input->post('permintaan');
        $petugas_lap=$this->input->post('petugas_lap');
        $operator=$this->input->post('operator');
        $biaya_jemput=$this->input->post('biaya_jemput');

        $biaya=$this->input->post('biaya');
        $diskon1=$this->input->post('diskon1');
        $diskon2=$this->input->post('diskon2');

        $data = array(
            'tgl_transaksi' => $tgl_transaksi ,
            'id_pelanggan' =>  $id_pelanggan,
            'jenis_pelayanan' => $jenis_pelayanan,
            'no_nota' =>      $no_nota,
            'tgl_diterima' =>  $tgl_diterima ,
            'tgl_dikembalikan' => $tgl_dikembalikan ,
            'id_counter' => $id_counter ,
            'id_mo' =>  $id_mo ,
            'shift' =>$shift ,
            'area_antar' =>  $area_antar ,
            'memo' => $memo ,
            'permintaan' =>$permintaan ,
            'petugas_lap' =>     $petugas_lap,
            'operator' =>  $operator,
            'biaya_jemput' =>  $biaya_jemput ,
            'biaya' =>       $biaya ,
            'diskon1' =>         $diskon1 ,
            'diskon2' =>         $diskon2 ,
            );

            $this->m_admin->proses_input_transaksi($data);

            $id_transaksi = $this->db->insert_id();

            echo "<pre>";
            print_r($id_transaksi);
            echo "</pre>";

            $id_barang=$this->input->post('nama_barang');
            $merek=$this->input->post('merek');
            $warna=$this->input->post('warna');
            $memo_order=$this->input->post('memo_order');
            $pelayanan=$this->input->post('pelayanan');
            $jumlah=$this->input->post('jumlah');
            $harga_kimia=$this->input->post('harga_kimia');
            $sepasang=$this->input->post('sepasang');
            if($sepasang==""){
                $sepasang=$Tidak;
            }else{
                $sepasang=$sepasang;
            }

            for($i=0;$i<COUNT($id_barang);$i++){
                $barang=array(
                'id_barang_transaksi' => "",
                'id_transaksi'=>$id_transaksi,
                'id_barang'=>$id_barang[$i],
                'merek'=>$merek[$i],
                'warna'=>$warna[$i],
                'memo_order'=>$memo_order[$i],
                'pelayanan'=>$pelayanan[$i],
                'jumlah'=>$jumlah[$i],
                'harga_kimia'=>$harga_kimia[$i],
                'sepasang'=>$sepasang[$i],
                );

                $proses=$this->m_admin->proses_input_barang_transaksi($barang);
            }

           /* $index=0;
            $data_barang=array(
                'id_transaksi'=>$id_transaksi,
                'id_barang'=>$id_barang,
                'merek'=>$merek,
                'warna'=>$warna,
                'memo_order'=>$memo_order,
                'pelayanan'=>$pelayanan,
                'jumlah'=>$jumlah,
                'harga_kimia'=>$harga_kimia,
                'sepasang'=>$sepasang,
                );
            echo "<pre>";
            print_r($data_barang);
            echo "</pre>";
            
            foreach ($data_barang as $barang) {
                 $proses=$this->m_admin->proses_input_barang_transaksi($barang);
            }
            */
           

            if($proses){
                $this->session->set_flashdata('message', 
                        '<div class="alert alert-success">
                            <h4>Berhasil</h4>
                            <p>Data Telah Tersimpan</p>
                        </div>');    
                redirect('admin/data_transaksi');  
            }else{
                $this->session->set_flashdata('message', 
                        '<div class="alert alert-danger">
                            <h4>Ops !</h4>
                            <p>Terjadi Kesalahan</p>
                        </div>');    
                redirect('admin/transaksi');
            }
        }

}