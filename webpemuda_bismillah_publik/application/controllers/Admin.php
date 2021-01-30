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
                $crud->columns('username','password');
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

        //Untuk Menu Data Proyek
    public function proyek()
        {
            $this->load->library('grocery_CRUD');
            try{
                $crud = new grocery_CRUD();
                $crud->set_lang_string('insert_error','Username sudah ada di database');
                
                $crud->set_theme('bootstrap');
                $crud->set_table('proyek');
                $crud->set_subject('Data User');
                $crud->fields('nama_proyek','alamat_proyek');
                $crud->columns('nama_proyek','alamat_proyek');
                $crud->required_fields('nama_proyek');
               
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
                $crud->fields('nama_pelanggan','jenis','status_diskon','status_wilayah','alamat','telp','tgl_input');
                $crud->columns('nama_pelanggan','jenis','status_diskon','status_wilayah','alamat','telp');
                $crud->required_fields('id_pelanggan','nama_pelanggan','status_diskon');
                $crud->unset_edit_fields('tgl_input');

                $crud->field_type('telp','integer');
                $crud->field_type('status_wilayah','enum',array('Luar','Dalam'));
                $crud->field_type('jenis','enum',array('Agen','Umum'));
                $crud->field_type('status_diskon','integer');
                $crud->display_as('status_diskon','Status diskon (%)');

                //$crud->callback_after_update('tgl_input',array($this,'tanggal'));
               
                $output = $crud->render();            
                $this->load->view('v_side_menu',$output);            
                $this->load->view('v_main_grocery',$output);
            }catch(Exception $e){
                show_error($e->getMessage().' --- '.$e->getTraceAsString());
            }
        }

        //Untuk Menu Data vendor
        public function vendor()
        {
            $this->load->library('grocery_CRUD');
            try{
                $crud = new grocery_CRUD();
                $crud->set_lang_string('insert_error','ID Pelanggan sudah ada di database');
                
                $crud->set_theme('bootstrap');
                $crud->set_table('vendor');
                $crud->set_subject('Data Pelanggan');
                $crud->fields('nama_vendor','jenis','status_diskon','status_wilayah','alamat','telp','tgl_input');
                $crud->columns('nama_vendor','jenis','status_diskon','status_wilayah','alamat','telp');
                $crud->required_fields('nama_vendor','status_diskon');
                $crud->unset_edit_fields('tgl_input');

                $crud->field_type('telp','integer');
                $crud->field_type('status_wilayah','enum',array('Luar','Dalam'));
                $crud->field_type('jenis','enum',array('Agen','Umum'));
                $crud->field_type('status_diskon','integer');
                $crud->display_as('status_diskon','Status diskon (%)');

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
                $crud->fields('kode_barang','nama_barang','satuan','harga_laundry','kategori');
                $crud->columns('kode_barang','nama_barang','satuan','harga_laundry','kategori');
                $crud->required_fields('kode_barang','nama_barang','harga_laundry','harga_pressing','harga_dry');

                $crud->display_as('harga_laundry','Harga');
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

        //Untuk Menu Data Akun
    public function akun()
        {
            
            $this->load->library('grocery_CRUD');
            try{
                $crud = new grocery_CRUD();
                $crud->set_lang_string('insert_error','Username sudah ada di database');
                
                $crud->set_theme('bootstrap');
                $crud->set_table('akun');
                $crud->set_subject('Data Akun');
                $crud->fields('no_urut','nama_akun','saldo_normal','tipe_akun_header');
                $crud->columns('no_akun','no_urut','nama_akun','saldo_normal','tipe_akun_header');
                $crud->required_fields('no_urut','nama_akun');
                $crud->set_relation('tipe_akun_header','akun_header','nama_akun_header');
               
                //$crud->set_field_upload('foto','assets/uploads/foto_pasien/');
                $crud->callback_insert(array($this,'generate_no_akun'));
                $crud->callback_update(array($this,'generate_no_akun_update'));

                $output = $crud->render();
                $this->load->view('v_side_menu',$output);            
                $this->load->view('v_main_grocery',$output);
            }catch(Exception $e){
                show_error($e->getMessage().' --- '.$e->getTraceAsString());
            }
        }
    
    function generate_no_akun($post_array) {
        $no_urut = $post_array['no_urut'];
        $akun_header = $this->db->get_where('akun_header',array('id_akun_header'=>$post_array['tipe_akun_header']))->result();
        $no_akun_header = $akun_header[0]->no_akun_header;
        $id_akun_kelompok = $akun_header[0]->akun_kelompok;
        
        $no_akun_kelompok = $this->db->get_where('akun_kelompok',array('id_akun_kelompok'=>$id_akun_kelompok))->result();
        //echo "<pre>";
        //print_r($no_akun_kelompok);
        //echo "</pre>";
        $no_akun_kelompok = $no_akun_kelompok[0]->no_akun_kelompok;
        //echo "<pre>";
        //print_r($no_akun_kelompok);
        //echo "</pre>";
        $no_akun = $no_akun_kelompok;
        $no_akun .= '-';
        $no_akun .= $no_akun_header;
        $no_akun .= $no_urut;
        $data = array(
            'no_akun'=>$no_akun,
            'no_urut'=>$no_urut,
            'nama_akun'=>$post_array['nama_akun'],
            'saldo_normal'=>$post_array['saldo_normal'],
            'tipe_akun_header'=>$post_array['tipe_akun_header']
        );
        //echo "<pre>";
        //print_r($data);
        //echo "</pre>";
        //die("stop");
        return $this->db->insert('akun',$data);
        //return $this->db->update('db_user',$post_array,array('id' => $primary_key));
    }
    
    function generate_no_akun_update($post_array,$primary_key) {
        $no_urut = $post_array['no_urut'];
        $akun_header = $this->db->get_where('akun_header',array('id_akun_header'=>$post_array['tipe_akun_header']))->result();
        $no_akun_header = $akun_header[0]->no_akun_header;
        $id_akun_kelompok = $akun_header[0]->akun_kelompok;
        
        $no_akun_kelompok = $this->db->get_where('akun_kelompok',array('id_akun_kelompok'=>$id_akun_kelompok))->result();
        $no_akun_kelompok = $no_akun_kelompok[0]->no_akun_kelompok;
        $no_akun = $no_akun_kelompok;
        $no_akun .= '-';
        $no_akun .= $no_akun_header;
        $no_akun .= $no_urut;
        $data = array(
                      'no_akun'=>$no_akun,
                      'no_urut'=>$no_urut,
                      'nama_akun'=>$post_array['nama_akun'],
                      'saldo_normal'=>$post_array['saldo_normal'],
                      'tipe_akun_header'=>$post_array['tipe_akun_header']
                      );
        //echo "<pre>";
        //print_r($data);
        //echo "</pre>";
        //die("stop");
        //return $this->db->insert('akun',$data);
        return $this->db->update('akun',$data,array('id_akun' => $primary_key));
    }
    
    //Untuk Menu Data Akun
    public function akun_header()
    {
        
        $this->load->library('grocery_CRUD');
        try{
            $crud = new grocery_CRUD();
            $crud->set_lang_string('insert_error','Username sudah ada di database');
            
            $crud->set_theme('bootstrap');
            $crud->set_table('akun_header');
            $crud->set_subject('Data Akun Header');
            //$crud->fields('no_akun','nama_akun','tipe_akun','saldo_normal');
            //$crud->columns('no_akun','nama_akun','tipe_akun','saldo_normal');
            $crud->required_fields('no_akun_header','nama_akun_header','akun_kelompok');
            $crud->set_relation('akun_kelompok','akun_kelompok','nama_akun_kelompok');
            
            //$crud->set_field_upload('foto','assets/uploads/foto_pasien/');
            
            $output = $crud->render();
            $this->load->view('v_side_menu',$output);
            $this->load->view('v_main_grocery',$output);
        }catch(Exception $e){
            show_error($e->getMessage().' --- '.$e->getTraceAsString());
        }
    }
    
    public function akun_kelompok()
    {
        
        $this->load->library('grocery_CRUD');
        try{
            $crud = new grocery_CRUD();
            $crud->set_lang_string('insert_error','Username sudah ada di database');
            
            $crud->set_theme('bootstrap');
            $crud->set_table('akun_kelompok');
            $crud->set_subject('Data Akun Kelompok');
            //$crud->fields('no_akun','nama_akun','tipe_akun','saldo_normal');
            //$crud->columns('no_akun','nama_akun','tipe_akun','saldo_normal');
            $crud->required_fields('no_akun_kelompok','nama_akun_kelompok');
            //$crud->set_relation('akun_kelompok','akun_kelompok','nama_akun_kelompok');
            
            //$crud->set_field_upload('foto','assets/uploads/foto_pasien/');
            
            $output = $crud->render();
            $this->load->view('v_side_menu',$output);
            $this->load->view('v_main_grocery',$output);
        }catch(Exception $e){
            show_error($e->getMessage().' --- '.$e->getTraceAsString());
        }
    }

        //Untuk Menu Data Perihal
        public function perihal()
        {
            $this->load->library('grocery_CRUD');
            try{
                $crud = new grocery_CRUD();
                $crud->set_lang_string('insert_error','Username sudah ada di database');
                
                $crud->set_theme('bootstrap');
                $crud->set_table('perihal');
                $crud->set_subject('Data Perihal');
                $crud->fields('nama_perihal');
                $crud->columns('id_perihal','nama_perihal');
                $crud->display_as('id_perihal','ID Perihal');
               
                //$crud->set_field_upload('foto','assets/uploads/foto_pasien/');

                $output = $crud->render();
                $this->load->view('v_side_menu',$output);            
                $this->load->view('v_main_grocery',$output);
            }catch(Exception $e){
                show_error($e->getMessage().' --- '.$e->getTraceAsString());
            }
        }

        public function data_penjualan()
        {
            $data['transaksi']=$this->m_admin->data_penjualan();
            $this->load->view('v_header',$data); 
            $this->load->view('v_data_penjualan',$data);  
        }

        public function data_retur_penjualan()
        {
            $data['transaksi']=$this->m_admin->data_retur_penjualan();
            $this->load->view('v_header',$data); 
            $this->load->view('v_data_retur_penjualan',$data);  
        }


        public function data_pembelian()
        {
            $data['transaksi']=$this->m_admin->data_pembelian();
            $this->load->view('v_header',$data); 
            $this->load->view('v_data_pembelian',$data);  
        }

        public function data_retur_pembelian()
        {
            $data['transaksi']=$this->m_admin->data_retur_pembelian();
            $this->load->view('v_header',$data); 
            $this->load->view('v_data_retur_pembelian',$data);  
        }


        public function transaksi_penjualan()
        {
            $data['kode'] = $this->m_admin->id_penjualan();
            $data['pelanggan'] = $this->m_admin->m_pelanggan();
            $data['barang']=$this->m_admin->m_barang();
            $data['akun']=$this->m_admin->m_akun();
            $data['proyek']=$this->m_admin->m_proyek();
            $data['perihal']=$this->m_admin->m_perihal();
            $data['barang2']=$this->m_admin->m_barang();
            $data['harga_barang']=$this->m_admin->harga_barang();
            $data['harga_barang2']=$this->m_admin->harga_barang();
            $data['id']=$this->m_admin->get_last_id();
            $this->load->view('v_header',$data); 
            $this->load->view('v_transaksi_penjualan',$data);  
        }

        public function transaksi_pembelian()
        {
            $data['pelanggan'] = $this->m_admin->m_pelanggan();
            $data['barang']=$this->m_admin->m_barang();
            $data['akun']=$this->m_admin->m_akun();
            $data['vendor']=$this->m_admin->m_vendor();
            $data['proyek']=$this->m_admin->m_proyek();
            $data['perihal']=$this->m_admin->m_perihal();
            $data['barang2']=$this->m_admin->m_barang();
            $data['harga_barang']=$this->m_admin->harga_barang();
            $data['harga_barang2']=$this->m_admin->harga_barang();
            $data['id']=$this->m_admin->get_last_id();
            $this->load->view('v_header',$data); 
            $this->load->view('v_transaksi_pembelian',$data);  
        }

        function get_pelanggan()
        {
        $id=$this->input->post('id');
        $data=$this->m_admin->m_pelanggan2($id);
        echo json_encode($data);
        }

        function get_vendor()
        {
        $id=$this->input->post('id');
        $data=$this->m_admin->m_vendor2($id);
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
        }

        function proses_transaksi_penjualan()
        {
        
        $tgl_transaksi = date('Y-m-d');
        $id_pelanggan = $this->input->post('id_pelanggan');
        $no_kontrak = $this->input->post('no_kontrak');
        $id_proyek = $this->input->post('id_proyek');
        $retur = $this->input->post('retur');
        if($retur=='penjualan'){
            $data['kode'] = $this->m_admin->id_penjualan();
            $id_transaksi=$data['kode'];
        }elseif($retur=='retur_penjualan'){
            $data['kode'] = $this->m_admin->id_retur_penjualan();
            $id_transaksi=$data['kode'];
        }else{
            $data['kode'] = $this->m_admin->id_pembayaran_penjualan();
            $id_transaksi=$data['kode'];
        }
        $jenis_pelayanan = $this->input->post('jenis_pelayanan');
        $tgl_diterima = $this->input->post('tgl_diterima');
        $perihal = $this->input->post('perihal');
        $shift = $this->input->post('shift');
        $area_antar = $this->input->post('area_antar');

        $operator=$this->input->post('operator');
        $biaya=$this->input->post('biaya');
        $diskon1=$this->input->post('diskon1');
        $diskon2=$this->input->post('diskon2');
        $total=$this->input->post('total');
        $akun_biaya=$this->input->post('akun_biaya');
        $akun_potongan=$this->input->post('akun_potongan');
        $akun_total=$this->input->post('akun_total');

        $data = array(
            'id_transaksi' => $id_transaksi ,
            'tgl_transaksi' => $tgl_transaksi ,
            'id_pelanggan' =>  $id_pelanggan,
            'no_kontrak' => $no_kontrak,
            'id_proyek' => $id_proyek,
            'retur' => $retur,
            'jenis_pelayanan' => $jenis_pelayanan,
            'tgl_diterima' =>  $tgl_diterima ,
            'perihal' =>  $perihal ,
            'shift' =>$shift ,
            'area_antar' =>  $area_antar,
            'operator' =>  $operator,
            'biaya' =>  $biaya ,
            'diskon1' => $diskon1 ,
            'diskon2' => $diskon2 ,
            'tagihan' => $total ,
            'akun_biaya' => $akun_biaya ,
            'akun_potongan' => $akun_potongan ,
            'akun_total' => $akun_total,
            );

            $this->m_admin->proses_transaksi_penjualan($data);

           // $id_transaksi = $this->db->insert_id();
            if($retur=='penjualan'){
                $data['id_transaksi']= $this->m_admin->id_terakhir_penjualan();
            }
            /*if($retur=='retur_penjualan'){
                $data['id_transaksi']= $this->m_admin->id_terakhir_retur_penjualan();
            }else{
                $data['id_transaksi']= $this->m_admin->id_terakhir_pembayaran_penjualan();
            }*/
            

            //echo "<pre>";
            //print_r($id_transaksi);
            //echo "</pre>";

            $id_barang=$this->input->post('nama_barang');
            $merek=$this->input->post('merek');
            $warna=$this->input->post('warna');
            $memo_order=$this->input->post('memo_order');
            $pelayanan=$this->input->post('pelayanan');
            $jumlah=$this->input->post('jumlah');
            $harga=$this->input->post('harga');
            $harga_kimia=$this->input->post('harga_kimia');
            $sepasang=$this->input->post('sepasang');


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
                'harga'=>$harga[$i],
                'harga_kimia'=>$harga_kimia[$i],
                'sepasang'=>$sepasang[$i],
                );

            //    echo "<pre>";
            //print_r($barang);
            //echo "</pre>";
               $proses=$this->m_admin->proses_input_barang_penjualan($barang);
            }

            //Proses Buku Besar
            if($retur=='penjualan'){
                $kredit= array($biaya,0,0);
                $debet=array(0,$diskon2,$total);
                $sal1=$biaya;
                $sal2=$biaya-$diskon2;
                $sal3=$sal2+$total;
                $saldo=array($sal1,$sal2,$sal3);
            }if($retur=='retur_penjualan'){
                $debet=array($biaya,0,0);
                $kredit=array(0,$diskon2,$total);
                $sal1=$biaya;
                $sal2=$biaya-$diskon2;
                $sal3=$sal2+$total;
                $saldo=array($sal1,$sal2,$sal3);
            }

            //echo "<pre>";
           // print_r($kredit);
           // print_r($debet);
           // echo "</pre>";

            $id_akun=array($akun_biaya,$akun_potongan,$akun_total);
            if($retur=='penjualan'){
                $ref='PJ'.$no_kontrak;}        
            elseif($retur=='retur_penjualan'){
                $ref='RPJ'.$no_kontrak;}
            else{$ref='PPJ'.$no_kontrak;}
            
            // akun biaya
            $buku_besar = array(
                                'id_transaksi' => $id_transaksi ,
                                'tgl_transaksi' => $tgl_diterima,
                                'keterangan' => $perihal,
                                'ref' => $ref,
                                'debet' =>  $total,
                                'kredit' => 0,
                                'saldo' => 0,
                                'id_akun' => $akun_biaya,
                                );
            $this->m_admin->proses_buku_besar($buku_besar);
            
            // akun total
            $buku_besar = array(
                                'id_transaksi' => $id_transaksi ,
                                'tgl_transaksi' => $tgl_diterima,
                                'keterangan' => $perihal,
                                'ref' => $ref,
                                'debet' =>  0,
                                'kredit' => $total,
                                'saldo' => 0,
                                'id_akun' => $akun_total,
                                );
            $this->m_admin->proses_buku_besar($buku_besar);

            /*
            for($i=0;$i<3;$i++){
            $buku_besar = array(
            'id_transaksi' => $id_transaksi ,
            'tgl_transaksi' => $tgl_diterima,
            'keterangan' => $perihal,
            'ref' => $ref,
            'debet' =>  $debet[$i],
            'kredit' => $kredit[$i],
            'saldo' => $saldo[$i],
            'id_akun' => $id_akun[$i],
            );

            $this->m_admin->proses_buku_besar($buku_besar);
            }*/
            redirect('admin/data_penjualan'); 
        } 

        function proses_transaksi_pembelian()
        {
            
        $tgl_transaksi = date('Y-m-d');
        $id_vendor = $this->input->post('id_vendor');
        $no_nota = $this->input->post('no_nota');
        $id_proyek = $this->input->post('id_proyek');
        $retur = $this->input->post('retur');
        if($retur=='pembelian'){
            $data['kode'] = $this->m_admin->id_pembelian();
            $id_transaksi=$data['kode'];
        }else if($retur=='retur_pembelian'){
            $data['kode'] = $this->m_admin->id_retur_pembelian();
            $id_transaksi=$data['kode'];
        }
        /*else{
            $data['kode'] = $this->m_admin->id_pembayaran_pembelian();
            $id_transaksi=$data['kode'];
        }*/

        //echo "<pre>";
        //print_r($retur);
        //    print_r($id_transaksi);
        //    echo "</pre>";
        $jenis_pelayanan = $this->input->post('jenis_pelayanan');
        
        $tgl_diterima = $this->input->post('tgl_diterima');
        $perihal = $this->input->post('perihal');
        $shift = $this->input->post('shift');
        $area_antar = $this->input->post('area_antar');

        $operator=$this->input->post('operator');
        $biaya=$this->input->post('biaya');
        $diskon1=$this->input->post('diskon1');
        $diskon2=$this->input->post('diskon2');
        $total=$this->input->post('total');
        $akun_biaya=$this->input->post('akun_biaya');
        $akun_potongan=$this->input->post('akun_potongan');
        $akun_total=$this->input->post('akun_total');

        $data = array(
            'id_transaksi' => $id_transaksi ,
            'tgl_transaksi' => $tgl_transaksi ,
            'id_vendor' =>  $id_vendor,
            'no_kontrak' => $no_nota,
            'id_proyek' => $id_proyek,
            'retur' => $retur,
            'jenis_pelayanan' => $jenis_pelayanan,
            'tgl_diterima' =>  $tgl_diterima ,
            'perihal' =>  $perihal ,
            'shift' =>$shift ,
            'area_antar' =>  $area_antar,
            'operator' =>  $operator,
            'biaya' =>  $biaya ,
            'diskon1' => $diskon1 ,
            'diskon2' => $diskon2 ,
            'tagihan' => $total ,
            'akun_biaya' => $akun_biaya ,
            'akun_potongan' => $akun_potongan ,
            'akun_total' => $akun_total,
            );

            $this->m_admin->proses_transaksi_pembelian($data);

            //$id_transaksi = $this->db->insert_id();
            if($retur=='pembelian'){
                $data['id_transaksi']= $this->m_admin->id_terakhir_pembelian();
            } else if($retur=='retur_pembelian'){
                $data['id_transaksi']= $this->m_admin->id_terakhir_retur_pembelian();
            }
            /*else{
                $data['id_transaksi']= $this->m_admin->id_terakhir_pembayaran_pembelian();
            }*/

            //echo "<pre>";
            //print_r($id_transaksi);
            //echo "</pre>";

            $id_barang=$this->input->post('nama_barang');
            $merek=$this->input->post('merek');
            $warna=$this->input->post('warna');
            $memo_order=$this->input->post('memo_order');
            $pelayanan=$this->input->post('pelayanan');
            $jumlah=$this->input->post('jumlah');
            $harga=$this->input->post('harga');
            $harga_kimia=$this->input->post('harga_kimia');
            $sepasang=$this->input->post('sepasang');


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
                'harga'=>$harga[$i],
                'harga_kimia'=>$harga_kimia[$i],
                'sepasang'=>$sepasang[$i],
                );

            //    echo "<pre>";
            //print_r($barang);
            //echo "</pre>";

               $proses=$this->m_admin->proses_input_barang_pembelian($barang);
            }

            //Proses Buku Besar
            

            if($retur=='pembelian'){
                $kredit=array(0,$diskon2,$total);
                $debet=array($biaya,0,0);
                $sal1=$biaya;
                $sal2=$biaya-$diskon2;
                $sal3=$sal2+$total;
                $saldo=array($sal1,$sal2,$sal3);
            }if($retur=='retur_pembelian'){
                $debet=array(0,$diskon2,$total);
                $kredit=array($biaya,0,0);
                $sal1=$biaya;
                $sal2=$biaya-$diskon2;
                $sal3=$sal2+$total;
                $saldo=array($sal1,$sal2,$sal3);
            }

           // echo "<pre>";
           // print_r($kredit);
           // print_r($debet);
           // echo "</pre>";

            $id_akun=array($akun_biaya,$akun_potongan,$akun_total);
             if ($retur=='pembelian'){
                $ref='PB'.$no_nota;
             } else if($retur=='retur_pembelian'){
                $ref='RPB'.$no_nota;
             }
            
            if($retur=="pembelian"){
                // akun biaya
                $buku_besar = array(
                                    'id_transaksi' => $id_transaksi ,
                                    'tgl_transaksi' => $tgl_diterima,
                                    'keterangan' => $perihal,
                                    'ref' => $ref,
                                    'debet' =>  $total,
                                    'kredit' => 0,
                                    'saldo' => 0,
                                    'id_akun' => $akun_biaya,
                                    );
                $this->m_admin->proses_buku_besar($buku_besar);
             
                
                // akun potongan
                $buku_besar = array(
                                    'id_transaksi' => $id_transaksi ,
                                    'tgl_transaksi' => $tgl_diterima,
                                    'keterangan' => $perihal,
                                    'ref' => $ref,
                                    'debet' =>  0,
                                    'kredit' => $total,
                                    'saldo' => 0,
                                    'id_akun' => $akun_potongan,
                                    );
                $this->m_admin->proses_buku_besar($buku_besar);
               
                // akun total
                $buku_besar = array(
                                    'id_transaksi' => $id_transaksi ,
                                    'tgl_transaksi' => $tgl_diterima,
                                    'keterangan' => $perihal,
                                    'ref' => $ref,
                                    'debet' =>  0,
                                    'kredit' => $total,
                                    'saldo' => 0,
                                    'id_akun' => $akun_total,
                                    );
                $this->m_admin->proses_buku_besar($buku_besar);
                
            } else if ($retur=="retur_pembelian") {
                // akun biaya
                $buku_besar = array(
                                    'id_transaksi' => $id_transaksi ,
                                    'tgl_transaksi' => $tgl_diterima,
                                    'keterangan' => $perihal,
                                    'ref' => $ref,
                                    'debet' =>  0,
                                    'kredit' => $total,
                                    'saldo' => 0,
                                    'id_akun' => $akun_biaya,
                                    );
                $this->m_admin->proses_buku_besar($buku_besar);
                
                // akun potongan
                $buku_besar = array(
                                    'id_transaksi' => $id_transaksi ,
                                    'tgl_transaksi' => $tgl_diterima,
                                    'keterangan' => $perihal,
                                    'ref' => $ref,
                                    'debet' =>  $total,
                                    'kredit' => 0,
                                    'saldo' => 0,
                                    'id_akun' => $akun_potongan,
                                    );
                $this->m_admin->proses_buku_besar($buku_besar);
                
                // akun total
                $buku_besar = array(
                                    'id_transaksi' => $id_transaksi ,
                                    'tgl_transaksi' => $tgl_diterima,
                                    'keterangan' => $perihal,
                                    'ref' => $ref,
                                    'debet' =>  $total,
                                    'kredit' => 0,
                                    'saldo' => 0,
                                    'id_akun' => $akun_total,
                                    );
                $this->m_admin->proses_buku_besar($buku_besar);

            }
            
            
            /*
            for($i=0;$i<3;$i++){
            $buku_besar = array(
            'id_transaksi' => $id_transaksi ,
            'tgl_transaksi' => $tgl_diterima,
            'keterangan' => $perihal,
            'ref' => $ref,
            'debet' =>  $debet[$i],
            'kredit' => $kredit[$i],
            'saldo' => $saldo[$i],
            'id_akun' => $id_akun[$i],
            );

            $this->m_admin->proses_buku_besar($buku_besar);
            }
            */
            if($retur=='pembelian'){
                redirect('admin/data_pembelian');
            }else if($retur=='retur_pembelian'){
                redirect('admin/data_retur_pembelian');
            }
            
        } 

        public function cetak_transaksi($id_transaksi)
        {
            $data['transaksi'] = $this->m_admin->cetak_transaksi($id_transaksi);
            $data['barang_transaksi'] = $this->m_admin->barang_transaksi($id_transaksi);
            $this->load->view('v_cetak_transaksi',$data);  
        }

        public function input_konfirmasi($id_transaksi)
        {
            $id_transaksi=$this->input->post('id_transaksi');
            $konfirmasi_selesai=$this->input->post('konfirmasi_selesai');
            $tgl_selesai=$this->input->post('tgl_selesai');
            $jam_selesai=$this->input->post('jam_selesai');
            $petugas_opr=$this->input->post('petugas_opr');
            $tgl_lunas=$this->input->post('tgl_lunas');
            $konfirmasi_terima=$this->input->post('konfirmasi_terima');
            $tgl_terima=$this->input->post('tgl_terima');
            $jam_terima=$this->input->post('jam_terima');
            $pending=$this->input->post('pending');
            $sisa_hari=$this->input->post('sisa_hari');
            $bon_status=$this->input->post('bon_status');
            $status_diskon=$this->input->post('status_diskon');

            $data = array(
                'id_transaksi' => $id_transaksi ,
                'konfirmasi_selesai' =>  $konfirmasi_selesai,
                'tgl_selesai' => $tgl_selesai,
                'jam_selesai' =>      $jam_selesai,
                'petugas_opr' =>  $petugas_opr ,
                'tgl_lunas' => $tgl_lunas ,
                'konfirmasi_terima' => $konfirmasi_terima ,
                'tgl_terima' =>  $tgl_terima ,
                'jam_terima' =>  $jam_terima ,
                'pending' =>$pending ,
                'sisa_hari' =>  $sisa_hari ,
                'bon_status' => $bon_status ,
                'status_diskon' =>$status_diskon ,
                );
            //echo "<pre>";
            //print_r($data);
            //echo "</pre>";
            $this->m_admin->input_konfirmasi($data);
            redirect('admin/data_transaksi');   
        }

        function hapus_transaksi_penjualan($id_transaksi)
        {
            
            $this->m_admin->hapus_transaksi_penjualan($id_transaksi);
            //$this->db->delete('buku_besar',array('id_transaksi',$id_transaksi));
            redirect('admin/data_penjualan');
        }

        function hapus_transaksi_pembelian($id_transaksi)
        {
            
            $this->m_admin->hapus_transaksi_pembelian($id_transaksi);
            //$this->db->delete('buku_besar',array('id_transaksi',$id_transaksi));
            redirect('admin/data_pembelian');
        }

        function hapus_transaksi_retur_penjualan($id_transaksi)
        {
            $this->m_admin->hapus_transaksi_retur_penjualan($id_transaksi);
            //$this->db->delete('buku_besar',array('id_transaksi',$id_transaksi));
            redirect('admin/data_retur_penjualan');
        }

        function hapus_transaksi_retur_pembelian($id_transaksi)
        {
            $this->m_admin->hapus_transaksi_retur_pembelian($id_transaksi);
            //$this->db->delete('buku_besar',array('id_transaksi',$id_transaksi));
            redirect('admin/data_retur_pembelian');
        }
    
    

        public function edit_transaksi($id_transaksi)
        {
            $data['pelanggan'] = $this->m_admin->m_pelanggan();
            $data['counter']=$this->m_admin->m_counter();
            $data['barang']=$this->m_admin->m_barang();
            $data['barang2']=$this->m_admin->m_barang();
            $data['harga_barang']=$this->m_admin->harga_barang();
            $data['harga_barang2']=$this->m_admin->harga_barang();
            //$data['id']=$this->m_admin->get_last_id();

            $data['transaksi'] = $this->m_admin->data_transaksi_edit($id_transaksi);

            //echo "<pre>";
            //print_r($data['transaksi']->id_pelanggan);
            //echo "</pre>";
            $data['barang_transaksi']=$this->m_admin->barang_transaksi($id_transaksi);
            $this->load->view('v_transaksi_edit',$data);  
        }

        function proses_edit_transaksi()
        {
        //$tgl_transaksi = date('Y-m-d');
        $id_transaksi = $this->input->post('id_transaksi');
        $id_pelanggan = $this->input->post('id_pelanggan');
        $jenis_pelayanan = $this->input->post('jenis_pelayanan');
        $no_nota = $this->input->post('no_nota');
        
        $tgl_diterima = $this->input->post('tgl_diterima');
        $tgl_dikembalikan = $this->input->post('tgl_dikembalikan');
        $id_counter = $this->input->post('id_counter');
        //$id_mo = $this->input->post('id_mo');
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
        $total=$this->input->post('total');

        $data = array(
            //'tgl_transaksi' => $tgl_transaksi ,
            'id_pelanggan' =>  $id_pelanggan,
            'jenis_pelayanan' => $jenis_pelayanan,
            'no_nota' =>      $no_nota,
            'tgl_diterima' =>  $tgl_diterima ,
            'tgl_dikembalikan' => $tgl_dikembalikan ,
            'id_counter' => $id_counter ,
            //'id_mo' =>  $id_mo ,
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
            'tagihan' =>         $total ,
            );

            $this->m_admin->proses_edit_transaksi($data,$id_transaksi);

            $this->m_admin->proses_hapus_barang_transaksi($id_transaksi);

            $id_barang=$this->input->post('nama_barang');
            $merek=$this->input->post('merek');
            $warna=$this->input->post('warna');
            $memo_order=$this->input->post('memo_order');
            $pelayanan=$this->input->post('pelayanan');
            $jumlah=$this->input->post('jumlah');
            $harga=$this->input->post('harga');
            $harga_kimia=$this->input->post('harga_kimia');
            $sepasang=$this->input->post('sepasang');


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
                'harga'=>$harga[$i],
                'harga_kimia'=>$harga_kimia[$i],
                'sepasang'=>$sepasang[$i],
                );

               $proses=$this->m_admin->proses_input_barang_transaksi($barang);
            }

            $id_konfirmasi=$this->input->post('id_konfirmasi');
            $konfirmasi_selesai=$this->input->post('konfirmasi_selesai');
            $tgl_selesai=$this->input->post('tgl_selesai');
            $jam_selesai=$this->input->post('jam_selesai');
            $petugas_opr=$this->input->post('petugas_opr');
            $bon_status=$this->input->post('bon_status');
            $tgl_lunas=$this->input->post('tgl_lunas');
            $konfirmasi_terima=$this->input->post('konfirmasi_terima');
            $tgl_terima=$this->input->post('tgl_terima');
            $jam_terima=$this->input->post('jam_terima');
            $pending=$this->input->post('pending');
            $sisa_hari=$this->input->post('sisa_hari');
            $status_diskon=$this->input->post('status_diskon');

            $data3=array(
                'id_transaksi' => $id_transaksi,
                'konfirmasi_selesai' => $konfirmasi_selesai,
                'tgl_selesai' => $tgl_selesai,
                'jam_selesai' => $jam_selesai,
                'petugas_opr' => $petugas_opr,
                'bon_status' => $bon_status,
                'tgl_lunas' => $tgl_lunas,
                'konfirmasi_terima' => $konfirmasi_terima,
                'tgl_terima' => $tgl_diterima,
                'jam_terima' => $jam_terima,
                'pending' => $pending,
                'sisa_hari' => $sisa_hari,
                'status_diskon' => $status_diskon,
                );

            $this->m_admin->proses_edit_konfirmasi($data3,$id_konfirmasi);
            redirect('admin/data_transaksi'); 

        } 

    function laporanharian() {
        if (isset($_GET['submit'])) {
            $tanggal_mulai = $_GET['tanggal_mulai'];
            $tanggal_akhir =$_GET['tanggal_akhir'];
            $result = null;
            $result2 = null;
            if ($_GET['terima']=='true') {
                $result = $this->db->query("SELECT *, tagihan as jumlah FROM `transaksi` join counter on transaksi.id_counter=counter.id_counter join pelanggan on pelanggan.id_pelanggan=transaksi.id_pelanggan  where tgl_diterima>='".$tanggal_mulai."' and tgl_diterima<='".$tanggal_akhir."'");
                $result2 = $this->db->query("SELECT *, sum(tagihan) as jumlah,tgl_diterima as tanggal FROM `transaksi` join counter on transaksi.id_counter=counter.id_counter join pelanggan on pelanggan.id_pelanggan=transaksi.id_pelanggan  where tgl_diterima>='".$tanggal_mulai."' and tgl_diterima<='".$tanggal_akhir."' GROUP BY DATE(tgl_diterima)");
            } else {
                $result = $this->db->query("SELECT *, tagihan as jumlah FROM `transaksi` join counter on transaksi.id_counter=counter.id_counter join pelanggan on pelanggan.id_pelanggan=transaksi.id_pelanggan  where tgl_dikembalikan>='".$tanggal_mulai."' and tgl_dikembalikan<='".$tanggal_akhir."'");
                $result2 = $this->db->query("SELECT *, sum(tagihan) as jumlah, tgl_dikembalikan as tanggal FROM `transaksi` join counter on transaksi.id_counter=counter.id_counter join pelanggan on pelanggan.id_pelanggan=transaksi.id_pelanggan  where tgl_dikembalikan>='".$tanggal_mulai."' and tgl_dikembalikan<='".$tanggal_akhir."' GROUP BY DATE(tgl_dikembalikan)");
            }
            $data['result1'] = $result->result();
            $data['result2'] = $result2->result();
            $data['tanggal_mulai'] = $tanggal_mulai;
            $data['tanggal_akhir'] = $tanggal_akhir;
            $this->load->view('v_data_harian',$data);
        } else {
            $this->load->view('v_data_harian_filter');
        }
        
    }

    function laporannota() {
        if (isset($_GET['submit'])) {
            $tanggal_mulai = $_GET['tanggal_mulai'];
            $tanggal_akhir =$_GET['tanggal_akhir'];
            $id_customer = $_GET['id_customer'];
            $customer = $this->db->get_where('pelanggan',array("id_pelanggan"=>$id_customer))->row();
            $nama_customer = $customer->nama_pelanggan;
            $alamat_customer = $customer->alamat;
            $result = null;
            $result2 = null;
            if ($_GET['terima']=='true') {
                $result = $this->db->query("SELECT *, tagihan as jumlah,tgl_diterima as tanggal FROM `transaksi` join counter on transaksi.id_counter=counter.id_counter join pelanggan on pelanggan.id_pelanggan=transaksi.id_pelanggan  where tgl_diterima>='".$tanggal_mulai."' and tgl_diterima<='".$tanggal_akhir."'");
                $result2 = $this->db->query("SELECT *, sum(tagihan) as jumlah,tgl_diterima as tanggal FROM `transaksi` join counter on transaksi.id_counter=counter.id_counter join pelanggan on pelanggan.id_pelanggan=transaksi.id_pelanggan  where tgl_diterima>='".$tanggal_mulai."' and tgl_diterima<='".$tanggal_akhir."' GROUP BY DATE(tgl_diterima)");
            } else {
                $result = $this->db->query("SELECT *, tagihan as jumlah,tgl_dikembalikan as tanggal FROM `transaksi` join counter on transaksi.id_counter=counter.id_counter join pelanggan on pelanggan.id_pelanggan=transaksi.id_pelanggan  where tgl_dikembalikan>='".$tanggal_mulai."' and tgl_dikembalikan<='".$tanggal_akhir."'");
                $result2 = $this->db->query("SELECT *, sum(tagihan) as jumlah, tgl_dikembalikan as tanggal FROM `transaksi` join counter on transaksi.id_counter=counter.id_counter join pelanggan on pelanggan.id_pelanggan=transaksi.id_pelanggan  where tgl_dikembalikan>='".$tanggal_mulai."' and tgl_dikembalikan<='".$tanggal_akhir."' GROUP BY DATE(tgl_dikembalikan)");
            }
            $data['result1'] = $result->result();
            $data['result2'] = $result2->result();
            $data['tanggal_mulai'] = $tanggal_mulai;
            $data['tanggal_akhir'] = $tanggal_akhir;
            $data['id_pelanggan'] = $id_customer;
            $data['nama_pelanggan'] = $nama_customer;
            $data['alamat_pelanggan'] = $alamat_customer;
            $this->load->view('v_data_costumer',$data);
        } else {
            $data['pelanggan'] = $this->m_admin->m_pelanggan();
            $this->load->view('v_data_costumer_filter',$data);
        }
        
    }

    public function data_faktur_filter()
        {
            $data['pelanggan']=$this->m_admin->m_pelanggan();
            $this->load->view('v_data_faktur_filter',$data);  
        }

    public function data_faktur()
        {
            $jenis_tgl=$this->input->post('terima');
            $tgl_mulai=$this->input->post('tgl_mulai');
            $tgl_sampai=$this->input->post('tgl_sampai');
            $pj=$this->input->post('pj');
            $jabatan=$this->input->post('jabatan');
            $id_pelanggan=$this->input->post('pelanggan');

            foreach ($id_pelanggan as $p) {
            $tabel[$p] = $this->m_admin->proses_data_faktur($jenis_tgl,$tgl_mulai,$tgl_sampai,$p);
            }

            $data['range_tanggal']=array('tgl_mulai'=>$tgl_mulai,'tgl_sampai'=>$tgl_sampai);
            
            $data['pj']=array('pj'=>$pj);
            $data['jabatan']=array('jabatan'=>$jabatan);
            $data['tabel'] = $tabel;
            
           // echo "<pre>";
           // print_r($tabel);
           // echo "</pre>";
            $this->load->view('v_cetak_faktur',$data); 
        }

    public function transaksi_harian_filter()
        {
            $data['hotel']=$this->m_admin->pelanggan_hotel();
            $this->load->view('v_transaksi_harian_filter',$data);
        }

    public function transaksi_harian()
        {
            $hotel=$this->input->post('hotel');
            $tgl_mulai=$this->input->post('tgl_mulai');
            $tgl_sampai=$this->input->post('tgl_sampai');

            if(empty($hotel)){
            $data['tabel'] = $this->m_admin->proses_transaksi_harian_umum($tgl_mulai,$tgl_sampai);
            }else{
                foreach ($hotel as $h) {
                $tabel[$h] = $this->m_admin->proses_transaksi_harian_hotel($tgl_mulai,$tgl_sampai,$h);
                }
            $data['tabel'] = $tabel;
            }

            
            //echo "<pre>";
            //print_r($data);
            //echo "</pre>";
            //$this->load->view('v_transaksi_harian',$data);
        }

    public function statistik_harian()
        {
            $data['statistik']=$this->m_admin->statistik_harian();

            //echo "<pre>";
           //print_r($data);
           //echo "</pre>";
            $this->load->view('v_statistik_harian',$data);  
        }

    public function buku_besar()
        {
            $data['akun']=$this->m_admin->m_akun();
            $this->load->view('v_header');
            $this->load->view('v_buku_besar',$data);  
        }

   
    public function buku_besar_range()
        {
            $tgl_mulai=$this->input->post('tgl_mulai');
            $tgl_sampai=$this->input->post('tgl_sampai');
            $id_akun=$this->input->post('akun');
            
            // hitungan baru
            $data_buku_besar = $this->db->query("select *,(CASE WHEN p.nama_perihal IS NULL THEN bb.keterangan ELSE p.nama_perihal END) as keterangan_perihal from buku_besar bb left join perihal p on bb.keterangan=p.id_perihal where bb.id_akun='".$id_akun."' and bb.tgl_transaksi>='".$tgl_mulai."' and bb.tgl_transaksi<='".$tgl_sampai."'")->result();
            
            $data_saldo_awal = $this->db->query("select *,sum(CASE WHEN saldo_awal IS NULL THEN 0 ELSE saldo_awal END) as jumlah_saldo_awal from data_akun where id_akun='".$id_akun."' and tgl<='".$tgl_mulai."'")->row();
            
            $data_akun = $this->db->query("select id_akun,nama_akun from akun where id_akun='".$id_akun."'")->row();
            
            $total_saldo_transaksi = $this->db->query("select sum(CASE WHEN a.saldo_normal='Debit' THEN (bb.debet-bb.kredit) ELSE (bb.kredit-bb.debet) END) as saldo_akhir  from buku_besar bb join akun a on bb.id_akun=a.id_akun where bb.id_akun='".$id_akun."' and bb.tgl_transaksi>='".$tgl_mulai."' and bb.tgl_transaksi<='".$tgl_sampai."'")->row();
            
            $data['data_buku_besar'] = $data_buku_besar;
            $data['data_saldo_awal'] = $data_saldo_awal;
            $data['data_akun'] = $data_akun;
            $data['total_saldo_transaksi'] = $total_saldo_transaksi;
            $data['akun']=$this->m_admin->m_akun();
            $data['tgl_mulai']=$tgl_mulai;
            $data['tgl_sampai']=$tgl_sampai;
            $this->load->view('v_header');
            $this->load->view('v_buku_besar_range',$data);   
        }  
    
    public function neraca()
    {
        $data['akun']=$this->m_admin->m_akun();
        $this->load->view('v_header');
        $this->load->view('v_neraca_cari',$data);
    }
    
    public function neraca_range()
    {
        $tgl_mulai=$this->input->get('tgl_mulai');
        $tgl_sampai=$this->input->get('tgl_sampai');
        $print=$this->input->get('print');
        
        //$id_akun=$this->input->post('akun');
        
        //$data1['saldo_awal_akun']=$this->m_admin->saldo_awal_akun($id_akun);
        
        $data1['akun']=$this->m_admin->m_akun();
        $data1['tgl_mulai']=$tgl_mulai;
        $data1['tgl_sampai']=$tgl_sampai;
        
        $hasil = array();
        
        
        $kelompokResult = $this->db->query("SELECT k.id_akun_kelompok,k.nama_akun_kelompok,h.id_akun_header,h.nama_akun_header,a.id_akun,a.no_akun,a.nama_akun,sum(bb.debet) as debet, sum(bb.kredit) as kredit,(CASE WHEN a.saldo_normal='Debit' THEN (sum(bb.debet)-sum(bb.kredit)+(CASE WHEN da.saldo_awal IS NULL THEN 0 ELSE da.saldo_awal END)) ELSE (sum(bb.kredit)-sum(bb.debet)+(CASE WHEN da.saldo_awal IS NULL THEN 0 ELSE da.saldo_awal END))END) as saldo_akhir FROM akun_kelompok k join akun_header h on k.id_akun_kelompok=h.akun_kelompok join akun a on h.id_akun_header=a.tipe_akun_header join buku_besar bb on bb.id_akun=a.id_akun left join data_akun da on da.id_akun=a.id_akun where no_akun_kelompok in (1,2,3) and bb.tgl_transaksi>='".$tgl_mulai."' and bb.tgl_transaksi<='".$tgl_sampai."' GROUP BY k.id_akun_kelompok")->result();
     
       
        foreach ($kelompokResult as $rowKelompok) {
            //array_push($hasil,array("id_akun_kelompok"=>$rowKelompok->id_akun_kelompok,"id_akun_header"=>$rowKelompok->id_akun_header,"id_akun"=>$rowKelompok->id_akun,"nama_akun_kelompok"=>$rowKelompok->nama_akun_kelompok,"nama_akun_header"=>'',"nama_akun"=>'',"no_akun"=>$rowKelompok->no_akun,"saldo_akhir"=>''));
            $headerResult = $this->db->query("SELECT k.id_akun_kelompok,k.nama_akun_kelompok,h.id_akun_header,h.nama_akun_header,a.id_akun,a.no_akun,a.nama_akun,sum(bb.debet) as debet, sum(bb.kredit) as kredit,(CASE WHEN a.saldo_normal='Debit' THEN (sum(bb.debet)-sum(bb.kredit)+(CASE WHEN da.saldo_awal IS NULL THEN 0 ELSE da.saldo_awal END)) ELSE (sum(bb.kredit)-sum(bb.debet)+(CASE WHEN da.saldo_awal IS NULL THEN 0 ELSE da.saldo_awal END))END) as saldo_akhir FROM akun_kelompok k join akun_header h on k.id_akun_kelompok=h.akun_kelompok join akun a on h.id_akun_header=a.tipe_akun_header join buku_besar bb on bb.id_akun=a.id_akun left join data_akun da on da.id_akun=a.id_akun where no_akun_kelompok in (1,2,3) and bb.tgl_transaksi>='".$tgl_mulai."' and bb.tgl_transaksi<='".$tgl_sampai."' and h.akun_kelompok='".$rowKelompok->id_akun_kelompok."' GROUP BY h.id_akun_header ")->result();
            foreach ($headerResult as $rowHeader) {
                //array_push($hasil,array("id_akun_kelompok"=>$rowHeader->id_akun_kelompok,"id_akun_header"=>$rowHeader->id_akun_header,"id_akun"=>$rowHeader->id_akun,"nama_akun_kelompok"=>"","nama_akun_header"=>$rowHeader->nama_akun_header,"nama_akun"=>"","no_akun"=>$rowHeader->no_akun,"saldo_akhir"=>""));
                $bukuBesarResult = $this->db->query("SELECT k.id_akun_kelompok,k.nama_akun_kelompok,h.id_akun_header,h.nama_akun_header,a.id_akun,a.no_akun,a.nama_akun,sum(bb.debet) as debet, sum(bb.kredit) as kredit,(CASE WHEN a.saldo_normal='Debit' THEN (sum(bb.debet)-sum(bb.kredit)+(CASE WHEN da.saldo_awal IS NULL THEN 0 ELSE da.saldo_awal END)) ELSE (sum(bb.kredit)-sum(bb.debet)+(CASE WHEN da.saldo_awal IS NULL THEN 0 ELSE da.saldo_awal END))END) as saldo_akhir FROM akun_kelompok k join akun_header h on k.id_akun_kelompok=h.akun_kelompok join akun a on h.id_akun_header=a.tipe_akun_header join buku_besar bb on bb.id_akun=a.id_akun left join data_akun da on da.id_akun=a.id_akun where no_akun_kelompok in (1,2,3) and bb.tgl_transaksi>='".$tgl_mulai."' and bb.tgl_transaksi<='".$tgl_sampai."' and a.tipe_akun_header='".$rowHeader->id_akun_header."' GROUP BY a.id_akun")->result();
                foreach ( $bukuBesarResult as $rowBukuBesar) {
                       array_push($hasil,array("id_akun_kelompok"=>$rowBukuBesar->id_akun_kelompok,"id_akun_header"=>$rowBukuBesar->id_akun_header,"id_akun"=>$rowBukuBesar->id_akun,"nama_akun_kelompok"=>"","nama_akun_header"=>"","nama_akun"=>$rowBukuBesar->nama_akun,"no_akun"=>$rowBukuBesar->no_akun,"saldo_akhir"=>$rowBukuBesar->saldo_akhir));
                }
                array_push($hasil,array("id_akun_kelompok"=>$rowHeader->id_akun_kelompok,"id_akun_header"=>$rowHeader->id_akun_header,"id_akun"=>$rowHeader->id_akun,"nama_akun_kelompok"=>'',"nama_akun_header"=>"Total ".$rowHeader->nama_akun_header,"nama_akun"=>'',"no_akun"=>$rowHeader->no_akun,"saldo_akhir"=>$rowHeader->saldo_akhir));
            }
            array_push($hasil,array("id_akun_kelompok"=>$rowKelompok->id_akun_kelompok,"id_akun_header"=>$rowKelompok->id_akun_header,"id_akun"=>$rowKelompok->id_akun,"nama_akun_kelompok"=>"Total ".$rowKelompok->nama_akun_kelompok,"nama_akun_header"=>'',"nama_akun"=>'',"no_akun"=>$rowKelompok->no_akun,"saldo_akhir"=>$rowKelompok->saldo_akhir));
        }

        $data1['hasil'] = $hasil;

        //$data['tgl_sampa']=40343;
        
        if ($print=='Print') {
            $this->load->view('v_laporan_neraca_print',$data1);
        } else {
            $this->load->view('v_header');
            $this->load->view('v_laporan_neraca',$data1);
        }

    }
    
    


	public function laba_rugi()
    {
        $data['akun']=$this->m_admin->m_akun();
        $this->load->view('v_header');
        $this->load->view('v_laba_rugi_cari',$data);
    }
    
    public function laba_rugi_range()
    {
        $tgl_mulai=$this->input->get('tgl_mulai');
        $tgl_sampai=$this->input->get('tgl_sampai');
        $print=$this->input->get('print');
        //$id_akun=$this->input->post('akun');
        
        //$data1['saldo_awal_akun']=$this->m_admin->saldo_awal_akun($id_akun);
        
        $data1['akun']=$this->m_admin->m_akun();
        $data1['tgl_mulai']=$tgl_mulai;
        $data1['tgl_sampai']=$tgl_sampai;
        
        $hasil = array();
        
        
        $kelompokResult = $this->db->query("SELECT k.id_akun_kelompok,k.nama_akun_kelompok,h.id_akun_header,h.nama_akun_header,a.id_akun,a.no_akun,a.nama_akun,sum(bb.debet) as debet, sum(bb.kredit) as kredit,(CASE WHEN a.saldo_normal='Debit' THEN (sum(bb.debet)-sum(bb.kredit)+(CASE WHEN da.saldo_awal IS NULL THEN 0 ELSE da.saldo_awal END)) ELSE (sum(bb.kredit)-sum(bb.debet)+(CASE WHEN da.saldo_awal IS NULL THEN 0 ELSE da.saldo_awal END))END) as saldo_akhir FROM akun_kelompok k join akun_header h on k.id_akun_kelompok=h.akun_kelompok join akun a on h.id_akun_header=a.tipe_akun_header join buku_besar bb on bb.id_akun=a.id_akun left join data_akun da on da.id_akun=a.id_akun where no_akun_kelompok in (4,5,6,7,8) and bb.tgl_transaksi>='".$tgl_mulai."' and bb.tgl_transaksi<='".$tgl_sampai."' GROUP BY k.id_akun_kelompok")->result();
        
        
        foreach ($kelompokResult as $rowKelompok) {
            //array_push($hasil,array("id_akun_kelompok"=>$rowKelompok->id_akun_kelompok,"id_akun_header"=>$rowKelompok->id_akun_header,"id_akun"=>$rowKelompok->id_akun,"nama_akun_kelompok"=>$rowKelompok->nama_akun_kelompok,"nama_akun_header"=>'',"nama_akun"=>'',"no_akun"=>$rowKelompok->no_akun,"saldo_akhir"=>''));
            $headerResult = $this->db->query("SELECT k.id_akun_kelompok,k.nama_akun_kelompok,h.id_akun_header,h.nama_akun_header,a.id_akun,a.no_akun,a.nama_akun,sum(bb.debet) as debet, sum(bb.kredit) as kredit,(CASE WHEN a.saldo_normal='Debit' THEN (sum(bb.debet)-sum(bb.kredit)+(CASE WHEN da.saldo_awal IS NULL THEN 0 ELSE da.saldo_awal END)) ELSE (sum(bb.kredit)-sum(bb.debet)+(CASE WHEN da.saldo_awal IS NULL THEN 0 ELSE da.saldo_awal END))END) as saldo_akhir FROM akun_kelompok k join akun_header h on k.id_akun_kelompok=h.akun_kelompok join akun a on h.id_akun_header=a.tipe_akun_header join buku_besar bb on bb.id_akun=a.id_akun left join data_akun da on da.id_akun=a.id_akun where no_akun_kelompok in (4,5,6,7,8) and bb.tgl_transaksi>='".$tgl_mulai."' and bb.tgl_transaksi<='".$tgl_sampai."' and h.akun_kelompok='".$rowKelompok->id_akun_kelompok."' GROUP BY h.id_akun_header ")->result();
            foreach ($headerResult as $rowHeader) {
                //array_push($hasil,array("id_akun_kelompok"=>$rowHeader->id_akun_kelompok,"id_akun_header"=>$rowHeader->id_akun_header,"id_akun"=>$rowHeader->id_akun,"nama_akun_kelompok"=>"","nama_akun_header"=>$rowHeader->nama_akun_header,"nama_akun"=>"","no_akun"=>$rowHeader->no_akun,"saldo_akhir"=>""));
                $bukuBesarResult = $this->db->query("SELECT k.id_akun_kelompok,k.nama_akun_kelompok,h.id_akun_header,h.nama_akun_header,a.id_akun,a.no_akun,a.nama_akun,sum(bb.debet) as debet, sum(bb.kredit) as kredit,(CASE WHEN a.saldo_normal='Debit' THEN (sum(bb.debet)-sum(bb.kredit)+(CASE WHEN da.saldo_awal IS NULL THEN 0 ELSE da.saldo_awal END)) ELSE (sum(bb.kredit)-sum(bb.debet)+(CASE WHEN da.saldo_awal IS NULL THEN 0 ELSE da.saldo_awal END))END) as saldo_akhir FROM akun_kelompok k join akun_header h on k.id_akun_kelompok=h.akun_kelompok join akun a on h.id_akun_header=a.tipe_akun_header join buku_besar bb on bb.id_akun=a.id_akun left join data_akun da on da.id_akun=a.id_akun where no_akun_kelompok in (4,5,6,7,8) and bb.tgl_transaksi>='".$tgl_mulai."' and bb.tgl_transaksi<='".$tgl_sampai."' and a.tipe_akun_header='".$rowHeader->id_akun_header."' GROUP BY a.id_akun")->result();
                foreach ( $bukuBesarResult as $rowBukuBesar) {
                    array_push($hasil,array("id_akun_kelompok"=>$rowBukuBesar->id_akun_kelompok,"id_akun_header"=>$rowBukuBesar->id_akun_header,"id_akun"=>$rowBukuBesar->id_akun,"nama_akun_kelompok"=>"","nama_akun_header"=>"","nama_akun"=>$rowBukuBesar->nama_akun,"no_akun"=>$rowBukuBesar->no_akun,"saldo_akhir"=>$rowBukuBesar->saldo_akhir));
                }
                array_push($hasil,array("id_akun_kelompok"=>$rowHeader->id_akun_kelompok,"id_akun_header"=>$rowHeader->id_akun_header,"id_akun"=>$rowHeader->id_akun,"nama_akun_kelompok"=>'',"nama_akun_header"=>"Total ".$rowHeader->nama_akun_header,"nama_akun"=>'',"no_akun"=>$rowHeader->no_akun,"saldo_akhir"=>$rowHeader->saldo_akhir));
            }
            array_push($hasil,array("id_akun_kelompok"=>$rowKelompok->id_akun_kelompok,"id_akun_header"=>$rowKelompok->id_akun_header,"id_akun"=>$rowKelompok->id_akun,"nama_akun_kelompok"=>"Total ".$rowKelompok->nama_akun_kelompok,"nama_akun_header"=>'',"nama_akun"=>'',"no_akun"=>$rowKelompok->no_akun,"saldo_akhir"=>$rowKelompok->saldo_akhir));
        }
        
        $data1['hasil'] = $hasil;
        


        if ($print=='Print') {
            $this->load->view('v_laporan_laba_rugi_print',$data1);
        } else {
            $this->load->view('v_header');
            $this->load->view('v_laporan_laba_rugi',$data1);
        }
        //$data['tgl_sampa']=40343;
        
    }

    public function jurnal_umum()
        {
            $data['akun'] = $this->m_admin->m_akun();
            $this->load->view('v_header',$data); 
            $this->load->view('v_jurnal_umum',$data);  
        }

    function proses_input_jurnal_umum()
        {
        $tgl = $this->input->post('tgl');
        $alltotal=$this->input->post('alltotal');
        $data=array('tgl_jurnal' => $tgl,'total_keseluruhan' => $alltotal);

        $this->m_admin->proses_input_jurnal_umum($data);
        $id_jurnal = $this->db->insert_id();
        
            $akun=$this->input->post('akun');
            $keterangan=$this->input->post('keterangan');
            $perihal=$this->input->post('perihal');
            $harga=$this->input->post('harga');
            $jumlah=$this->input->post('jumlah');
            $total=$this->input->post('total_harga');
           

           


            for($i=0;$i<COUNT($akun);$i++){
                $barang=array(
                'id_jurnal' => $id_jurnal,
                'id_akun'=>$akun[$i],
                'keterangan'=>$keterangan[$i],
                'perihal'=>$perihal[$i],
                'harga'=>$harga[$i],
                'jumlah'=>$jumlah[$i],
                'total'=>$total[$i],
                );

            //echo "<pre>";
            //    print_r($barang);
            //echo "</pre>";
                
               $proses=$this->m_admin->proses_input_barang_jurnal($barang);
                // input ke buku besar
                $debet = 0;
                $kredit = 0;
                if ($keterangan[$i]=="Debet") {
                    $debet = $total[$i];
                } else {
                   $kredit = $total[$i];
                }
                $saldo = $total[$i];
                
                $buku_besar = array(
                                    'id_transaksi' => "JU".$proses,
                                    'tgl_transaksi' => $tgl,
                                    'keterangan' => "Jurnal Umum",
                                    'ref' => $perihal[$i],
                                    'debet' =>  $debet,
                                    'kredit' => $kredit,
                                    'saldo' => 0,
                                    'id_akun' => $akun[$i],
                                    );
                $this->m_admin->proses_buku_besar($buku_besar);
            }
            //die();
            redirect('admin/jurnal_umum'); 
        } 

    public function data_jurnal_umum()
        {
            $data['jurnal'] = $this->m_admin->data_jurnal_umum();
            $data['akun'] = $this->m_admin->m_akun();
            $this->load->view('v_header'); 
            $this->load->view('v_data_jurnal_umum',$data);  
        }

    public function data_jurnal_umum_range()
        {
            $tgl_mulai=$this->input->post('tgl_mulai');
            $tgl_sampai=$this->input->post('tgl_sampai');
            $data['jurnal'] = $this->m_admin->data_jurnal_umum_range($tgl_mulai,$tgl_sampai);
            $this->load->view('v_header'); 
            $this->load->view('v_data_jurnal_umum',$data);  
        }  

    public function edit_jurnal_umum($id_barang_jurnal)
        {
            $data['jurnal'] = $this->m_admin->jurnal_umum2($id_barang_jurnal);
            $data['akun'] = $this->m_admin->m_akun();
            $this->load->view('v_header'); 
            $this->load->view('v_edit_jurnal_umum',$data);  
        }   

    function proses_edit_jurnal_umum($id_barang_jurnal)
        {
        $id_jurnal = $this->input->post('id_jurnal');
        $tgl = $this->input->post('tgl');
        $data=array('tgl_jurnal' => $tgl);

        $this->m_admin->proses_update_jurnal_umum($data,$id_jurnal);
    
            $akun=$this->input->post('akun');
            $keterangan=$this->input->post('keterangan');
            $perihal=$this->input->post('perihal');
            $harga=$this->input->post('harga');
            $jumlah=$this->input->post('jumlah');
    
                $barang=array(
                'id_akun'=>$akun,
                'keterangan'=>$keterangan,
                'perihal'=>$perihal,
                'harga'=>$harga,
                'jumlah'=>$jumlah,
                );

            //    echo "<pre>";
            //print_r($data);
            //echo "</pre>";

               $proses=$this->m_admin->proses_update_barang_jurnal($barang,$id_barang_jurnal);

            redirect('admin/data_jurnal_umum'); 
        } 

    public function hapus_barang_jurnal($id_barang_jurnal)
    {
        
        if ($id_barang_jurnal!=null) {
            $this->db->trans_start();
            
            $this->db->where('id_barang_jurnal',$id_barang_jurnal);
            $this->db->delete('barang_jurnal');
            
            $this->db->where('id_transaksi','JU'.$id_barang_jurnal);
            $this->db->delete('buku_besar');

            $this->db->trans_complete();
            
           
            
        }
        
        
        redirect('admin/data_jurnal_umum'); 
    }

    public function laporan_proyek_cari()
    {
        $data['proyek'] = $this->m_admin->m_proyek();
        $this->load->view('v_header'); 
        $this->load->view('v_laporan_proyek_cari',$data);  
    }

    public function laporan_proyek()
    {
        $id_proyek=$this->input->post('proyek');
        $data['proyek_penjualan'] = $this->m_admin->laporan_proyek_penjualan($id_proyek);
        $data['proyek_pembelian'] = $this->m_admin->laporan_proyek_pembelian($id_proyek);
        $data['proyek'] = $this->m_admin->m_proyek();
        $this->load->view('v_header'); 
        $this->load->view('v_laporan_proyek',$data);  
    }

    public function data_akun()
    {
        $data['akun'] = $this->m_admin->m_akun();
        $data['data_akun'] = $this->m_admin->data_akun();
        $this->load->view('v_header'); 
        $this->load->view('v_data_akun',$data);  
    }

    function tambah_data_akun()
        {
        $tgl = $this->input->post('tgl');
        $id_akun = $this->input->post('id_akun');
        $saldo_awal=$this->input->post('saldo_awal');

    
                $data=array(
                'tgl'=>$tgl,
                'id_akun'=>$id_akun,
                'saldo_awal'=>$saldo_awal,
                );

            //echo "<pre>";
            //print_r($data);
            //echo "</pre>";

            $proses=$this->m_admin->tambah_data_akun($data);

            redirect('admin/data_akun'); 
        } 

    function edit_data_akun()
        {
        $id_data_akun = $this->input->post('id_data_akun');
        $tgl = $this->input->post('tgl');
        $id_akun = $this->input->post('id_akun');
        $saldo_awal=$this->input->post('saldo_awal');

    
                $data=array(
                'tgl'=>$tgl,
                'id_akun'=>$id_akun,
                'saldo_awal'=>$saldo_awal,
                );

            //echo "<pre>";
            //print_r($data);
            //echo "</pre>";

            $proses=$this->m_admin->edit_data_akun($data,$id_data_akun);

            redirect('admin/data_akun'); 
        } 

     function hapus_data_akun($id_data_akun)
        {
            $this->m_admin->hapus_data_akun($id_data_akun);
            redirect('admin/data_akun');
        }

    public function edit_penjualan($id_transaksi)
    {
        $data['kode'] = $this->m_admin->id_penjualan();
        $data['pelanggan'] = $this->m_admin->m_pelanggan();
        $data['barang']=$this->m_admin->m_barang();
        $data['akun']=$this->m_admin->m_akun();
        $data['proyek']=$this->m_admin->m_proyek();
        $data['perihal']=$this->m_admin->m_perihal();
        //$data['barang2']=$this->m_admin->m_barang();
        //$data['harga_barang']=$this->m_admin->harga_barang();
        //$data['harga_barang2']=$this->m_admin->harga_barang();
        $data['id']=$this->m_admin->get_last_id();
        $data['penjualan']=$this->m_admin->edit_penjualan($id_transaksi);
        $data['barang_penjualan']=$this->m_admin->barang_penjualan($id_transaksi);

        //echo "<pre>";
        //print_r($data['barang_penjualan']);
        //echo "</pre>";
        $this->load->view('v_header'); 
        $this->load->view('v_edit_penjualan',$data);  
    }

    function proses_edit_penjualan()
        {
        $id_transaksi = $this->input->post('id_transaksi');
        $id_pelanggan = $this->input->post('id_pelanggan');
        $no_kontrak = $this->input->post('no_kontrak');
        $id_proyek = $this->input->post('id_proyek');
        $retur = $this->input->post('retur');
        $jenis_pelayanan = $this->input->post('jenis_pelayanan');
        $tgl_diterima = $this->input->post('tgl_diterima');
        $perihal = $this->input->post('perihal');
        $shift = $this->input->post('shift');
        $area_antar = $this->input->post('area_antar');

        $operator=$this->input->post('operator');
        $biaya=$this->input->post('biaya');
        $diskon1=$this->input->post('diskon1');
        $diskon2=$this->input->post('diskon2');
        $total=$this->input->post('total');
        $akun_biaya=$this->input->post('akun_biaya');
        $akun_potongan=$this->input->post('akun_potongan');
        $akun_total=$this->input->post('akun_total');

        $data = array(
            'id_pelanggan' =>  $id_pelanggan,
            'no_kontrak' => $no_kontrak,
            'id_proyek' => $id_proyek,
            'retur' => $retur,
            'jenis_pelayanan' => $jenis_pelayanan,
            'tgl_diterima' =>  $tgl_diterima ,
            'perihal' =>  $perihal ,
            'shift' =>$shift ,
            'area_antar' =>  $area_antar,
            'operator' =>  $operator,
            'biaya' =>  $biaya ,
            'diskon1' => $diskon1 ,
            'diskon2' => $diskon2 ,
            'tagihan' => $total ,
            'akun_biaya' => $akun_biaya ,
            'akun_potongan' => $akun_potongan ,
            'akun_total' => $akun_total,
            );

            $this->m_admin->proses_edit_penjualan($data,$id_transaksi);

            echo "<pre>";
            print_r($id_transaksi);
            echo "</pre>";

            $id_barang=$this->input->post('nama_barang');
            $merek=$this->input->post('merek');
            $warna=$this->input->post('warna');
            $memo_order=$this->input->post('memo_order');
            $pelayanan=$this->input->post('pelayanan');
            $jumlah=$this->input->post('jumlah');
            $harga=$this->input->post('harga');
            $harga_kimia=$this->input->post('harga_kimia');
            $sepasang=$this->input->post('sepasang');

             $this->m_admin->proses_reset_barang_penjualan($id_transaksi);
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
                'harga'=>$harga[$i],
                'harga_kimia'=>$harga_kimia[$i],
                'sepasang'=>$sepasang[$i],
                );

                echo "<pre>";
            print_r($barang);
            echo "</pre>";
               $proses=$this->m_admin->proses_input_barang_penjualan($barang);
            }

            //Proses Buku Besar
            if($retur=='penjualan'){
                $kredit= array($biaya,0,0);
                $debet=array(0,$diskon2,$total);
                $sal1=$biaya;
                $sal2=$biaya-$diskon2;
                $sal3=$sal2+$total;
                $saldo=array($sal1,$sal2,$sal3);
            }if($retur=='retur_penjualan'){
                $debet=array($biaya,0,0);
                $kredit=array(0,$diskon2,$total);
                $sal1=$biaya;
                $sal2=$biaya-$diskon2;
                $sal3=$sal2+$total;
                $saldo=array($sal1,$sal2,$sal3);
            }


            $id_akun=array($akun_biaya,$akun_potongan,$akun_total);
            if($retur=='penjualan'){
                $ref='PJ'.$no_kontrak;}        
            elseif($retur=='retur_penjualan'){
                $ref='RPJ'.$no_kontrak;}
            else{$ref='PPJ'.$no_kontrak;}

            $this->m_admin->proses_reset_buku_besar($id_transaksi);
            for($i=0;$i<3;$i++){
            $buku_besar = array(
            'id_transaksi' => $id_transaksi ,
            'tgl_transaksi' => $tgl_diterima,
            'keterangan' => $perihal,
            'ref' => $ref,
            'debet' =>  $debet[$i],
            'kredit' => $kredit[$i],
            'saldo' => $saldo[$i],
            'id_akun' => $id_akun[$i],
            );
            $this->m_admin->proses_buku_besar($buku_besar);
            }
            redirect('admin/data_penjualan'); 
        } 

    public function edit_pembelian($id_transaksi)
    {
        $data['kode'] = $this->m_admin->id_penjualan();
        $data['vendor'] = $this->m_admin->m_vendor();
        $data['barang']=$this->m_admin->m_barang();
        $data['akun']=$this->m_admin->m_akun();
        $data['proyek']=$this->m_admin->m_proyek();
        $data['perihal']=$this->m_admin->m_perihal();
        //$data['barang2']=$this->m_admin->m_barang();
        //$data['harga_barang']=$this->m_admin->harga_barang();
        //$data['harga_barang2']=$this->m_admin->harga_barang();
        $data['id']=$this->m_admin->get_last_id();
        $data['pembelian']=$this->m_admin->edit_pembelian($id_transaksi);
        $data['barang_pembelian']=$this->m_admin->barang_pembelian($id_transaksi);

        //echo "<pre>";
        //print_r($data['barang_penjualan']);
        //echo "</pre>";
        $this->load->view('v_header'); 
        $this->load->view('v_edit_pembelian',$data);  
    }

    function proses_edit_pembelian()
        {
        $id_transaksi = $this->input->post('id_transaksi');
        $id_vendor = $this->input->post('id_vendor');
        $no_kontrak = $this->input->post('no_kontrak');
        $id_proyek = $this->input->post('id_proyek');
        $retur = $this->input->post('retur');
        $jenis_pelayanan = $this->input->post('jenis_pelayanan');
        $tgl_diterima = $this->input->post('tgl_diterima');
        $perihal = $this->input->post('perihal');
        $shift = $this->input->post('shift');
        $area_antar = $this->input->post('area_antar');

        $operator=$this->input->post('operator');
        $biaya=$this->input->post('biaya');
        $diskon1=$this->input->post('diskon1');
        $diskon2=$this->input->post('diskon2');
        $total=$this->input->post('total');
        $akun_biaya=$this->input->post('akun_biaya');
        $akun_potongan=$this->input->post('akun_potongan');
        $akun_total=$this->input->post('akun_total');

        $data = array(
            'id_vendor' =>  $id_vendor,
            'no_kontrak' => $no_kontrak,
            'id_proyek' => $id_proyek,
            'retur' => $retur,
            'jenis_pelayanan' => $jenis_pelayanan,
            'tgl_diterima' =>  $tgl_diterima ,
            'perihal' =>  $perihal ,
            'shift' =>$shift ,
            'area_antar' =>  $area_antar,
            'operator' =>  $operator,
            'biaya' =>  $biaya ,
            'diskon1' => $diskon1 ,
            'diskon2' => $diskon2 ,
            'tagihan' => $total ,
            'akun_biaya' => $akun_biaya ,
            'akun_potongan' => $akun_potongan ,
            'akun_total' => $akun_total,
            );

            $this->m_admin->proses_edit_pembelian($data,$id_transaksi);

            echo "<pre>";
            print_r($id_transaksi);
            echo "</pre>";

            $id_barang=$this->input->post('nama_barang');
            $merek=$this->input->post('merek');
            $warna=$this->input->post('warna');
            $memo_order=$this->input->post('memo_order');
            $pelayanan=$this->input->post('pelayanan');
            $jumlah=$this->input->post('jumlah');
            $harga=$this->input->post('harga');
            $harga_kimia=$this->input->post('harga_kimia');
            $sepasang=$this->input->post('sepasang');

             $this->m_admin->proses_reset_barang_pembelian($id_transaksi);
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
                'harga'=>$harga[$i],
                'harga_kimia'=>$harga_kimia[$i],
                'sepasang'=>$sepasang[$i],
                );

                echo "<pre>";
            print_r($barang);
            echo "</pre>";
               $proses=$this->m_admin->proses_input_barang_pembelian($barang);
            }

            $debet='';
            $kredit='';
            //Proses Buku Besar
            if($retur=='pembelian'){
                $kredit= array($biaya,0,0);
                $debet=array(0,$diskon2,$total);
                $sal1=$biaya;
                $sal2=$biaya-$diskon2;
                $sal3=$sal2+$total;
                $saldo=array($sal1,$sal2,$sal3);
            }if($retur=='retur_pembelian'){
                $debet=array($biaya,0,0);
                $kredit=array(0,$diskon2,$total);
                $sal1=$biaya;
                $sal2=$biaya-$diskon2;
                $sal3=$sal2+$total;
                $saldo=array($sal1,$sal2,$sal3);
            }


            echo "<pre>";
            print_r($retur);
            print_r($debet);
            echo "</pre>";

            $id_akun=array($akun_biaya,$akun_potongan,$akun_total);
            if($retur=='pembelian'){
                $ref='PJ'.$no_kontrak;}        
            elseif($retur=='retur_pembelian'){
                $ref='RPJ'.$no_kontrak;}
            else{$ref='PPJ'.$no_kontrak;}

            $this->m_admin->proses_reset_buku_besar($id_transaksi);
            for($i=0;$i<3;$i++){
            $buku_besar = array(
            'id_transaksi' => $id_transaksi ,
            'tgl_transaksi' => $tgl_diterima,
            'keterangan' => $perihal,
            'ref' => $ref,
            'debet' =>  $debet[$i],
            'kredit' => $kredit[$i],
            'saldo' => $saldo[$i],
            'id_akun' => $id_akun[$i],
            );
            $this->m_admin->proses_buku_besar($buku_besar);
            }
            redirect('admin/data_pembelian'); 
        } 

    public function transaksi_pembayaran()
    {
        $data['kode'] = $this->m_admin->id_penjualan();
        $data['vendor'] = $this->m_admin->m_vendor();
        $data['pelanggan'] = $this->m_admin->m_pelanggan();
        $data['akun']=$this->m_admin->m_akun();
        //$data['perihal']=$this->m_admin->m_perihal();
        $this->load->view('v_header'); 
        $this->load->view('v_transaksi_pembayaran',$data);  
    }

    public function proses_transaksi_pembayaran()
    {
        $opsi=$this->input->post('opsi');
        $id_pelanggan=$this->input->post('id_pelanggan');
        $id_vendor=$this->input->post('id_vendor');
        $no_kontrak=$this->input->post('no_kontrak');
        $tgl_pembayaran=$this->input->post('tgl_pembayaran');
        $total=$this->input->post('alltotal');
        $akun_total=$this->input->post('akun_total');

        if($opsi=='utang'){
            $kostumer=$id_pelanggan;
            $data['kode'] = $this->m_admin->id_pembayaran_utang();
            $id_pembayaran=$data['kode'];
        }else{
            $kostumer=$id_vendor;
            $data['kode'] = $this->m_admin->id_pembayaran_piutang();
            $id_pembayaran=$data['kode'];
        }

        $data = array(
            'id_pembayaran' =>  $id_pembayaran,
            'tgl_pembayaran' =>  $tgl_pembayaran,
            'tgl_input' => date('Y-m-d'),
            'id_pelanggan' => $kostumer,
            'no_kontrak' => $no_kontrak,
            'id_mo' => '',
            'total' => $total ,
            'jenis_pembayaran' => $opsi ,
            'akun_total' => $akun_total,
            );

        $this->m_admin->proses_input_pembayaran($data);


        //$id_pembayaran = $this->db->insert_id();
        $keterangan=$this->input->post('keterangan');
        $memo_order=$this->input->post('memo_order');
        $total_harga=$this->input->post('total_harga');

            for($i=0;$i<COUNT($keterangan);$i++){
            $barang = array(
            'id_pembayaran' => $id_pembayaran,
            'keterangan' => $keterangan[$i],
            'memo_order' => $memo_order[$i],
            'total_harga' => $total_harga[$i],
            );
            $this->m_admin->proses_input_barang_pembayaran($barang);
            }


            //Proses Buku Besar
            $debet='';
            $kredit='';
            if($opsi=='utang'){
                $kredit= $total;
                $debet= 0;
                $saldo= $total;
                $ref='PU'.$no_kontrak;
                
                $buku_besar = array(
                                    'id_transaksi' => $id_pembayaran ,
                                    'tgl_transaksi' => $tgl_pembayaran,
                                    'keterangan' => $opsi,
                                    'ref' => $ref,
                                    'debet' =>  0,
                                    'kredit' => $total,
                                    'saldo' => 0,
                                    'id_akun' => 34,
                                    );
                $this->m_admin->proses_buku_besar($buku_besar);
                
                $buku_besar = array(
                                    'id_transaksi' => $id_pembayaran ,
                                    'tgl_transaksi' => $tgl_pembayaran,
                                    'keterangan' => $opsi,
                                    'ref' => $ref,
                                    'debet' =>  $total,
                                    'kredit' => 0,
                                    'saldo' => 0,
                                    'id_akun' => 42,
                                    );
                $this->m_admin->proses_buku_besar($buku_besar);
                
            }elseif($opsi=='piutang'){
                $kredit=0;
                $debet=$total;
                $saldo=$total;
                $ref='PP'.$no_kontrak;
                $buku_besar = array(
                                    'id_transaksi' => $id_pembayaran ,
                                    'tgl_transaksi' => $tgl_pembayaran,
                                    'keterangan' => $opsi,
                                    'ref' => $ref,
                                    'debet' =>  $total,
                                    'kredit' => 0,
                                    'saldo' => 0,
                                    'id_akun' => 34,
                                    );
                $this->m_admin->proses_buku_besar($buku_besar);
                
                $buku_besar = array(
                                    'id_transaksi' => $id_pembayaran ,
                                    'tgl_transaksi' => $tgl_pembayaran,
                                    'keterangan' => $opsi,
                                    'ref' => $ref,
                                    'debet' =>  0,
                                    'kredit' => $total,
                                    'saldo' => 0,
                                    'id_akun' => 42,
                                    );
                $this->m_admin->proses_buku_besar($buku_besar);
                
            }

            $id_akun=$akun_total;                
        
        
            redirect('admin/data_pembayaran'); 
    }

    public function data_pembayaran()
        {
            $data['pembayaran']=$this->m_admin->data_pembayaran();
            $this->load->view('v_header',$data); 
            $this->load->view('v_data_pembayaran',$data);  
        }
    
    public function edit_pembayaran($id_pembayaran=null)
    {
        if ($id_pembayaran!=null) {
            
            
            $data['kode'] = $this->m_admin->id_penjualan();
            $data['vendor'] = $this->m_admin->m_vendor();
            $data['pelanggan'] = $this->m_admin->m_pelanggan();
            $data['akun']=$this->m_admin->m_akun();
            
            $data['pembayaran'] = $this->m_admin->get_data_pembayaran($id_pembayaran);
            $data['detil_pembayaran'] = $this->m_admin->get_data_pembayaran_detil($id_pembayaran);
            //$data['perihal']=$this->m_admin->m_perihal();
            $this->load->view('v_header');
            $this->load->view('v_edit_pembayaran',$data);
        }

    }
    
    public function hapus_transaksi_pembayaran($id_pembayaran=null)
    {
        if ($id_pembayaran!=null) {
            $this->db->trans_start();
            $this->db->where('id_transaksi',$id_pembayaran);
            $this->db->delete('buku_besar');
            
            $this->db->where('id_pembayaran',$id_pembayaran);
            $this->db->delete('barang_pembayaran');
            
            $this->db->where('id_pembayaran',$id_pembayaran);
            $this->db->delete('transaksi_pembayaran');
            $this->db->trans_complete();
            
            redirect('admin/data_pembayaran');
            
        }
        
    }


}
