<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_admin extends CI_Model
{

    public function id_penjualan(){
          $this->db->select('RIGHT(transaksi_penjualan.id_transaksi,5) as id_transaksi', FALSE);
          $this->db->order_by('id_transaksi','DESC');    
          $this->db->limit(1); 
          $this->db->where('retur','penjualan');    
          $query = $this->db->get('transaksi_penjualan');  //cek dulu apakah ada sudah ada kode di tabel.    
          if($query->num_rows() <> 0){      
               //cek kode jika telah tersedia    
               $data = $query->row();      
               $kode = intval($data->id_transaksi) + 1; 
          }
          else{      
               $kode = 1;  //cek jika kode belum terdapat pada table
          }
              $batas = str_pad($kode, 5, "0", STR_PAD_LEFT);    
              $kodetampil = "PJ".$batas;  //format kode
              return $kodetampil;  
         }

    public function id_retur_penjualan(){
          $this->db->select('RIGHT(transaksi_penjualan.id_transaksi,5) as id_transaksi', FALSE);
          $this->db->order_by('id_transaksi','DESC');    
          $this->db->limit(1);  
          $this->db->where('retur','retur_penjualan');    
          $query = $this->db->get('transaksi_penjualan');  //cek dulu apakah ada sudah ada kode di tabel.    
          if($query->num_rows() <> 0){      
               //cek kode jika telah tersedia    
               $data = $query->row();      
               $kode = intval($data->id_transaksi) + 1; 
          }
          else{      
               $kode = 1;  //cek jika kode belum terdapat pada table
          }
              $batas = str_pad($kode, 5, "0", STR_PAD_LEFT);    
              $kodetampil = "RPJ".$batas;  //format kode
              return $kodetampil;  
         }

    public function id_pembelian(){
          $this->db->select('RIGHT(transaksi_pembelian.id_transaksi,5) as id_transaksi', FALSE);
          $this->db->order_by('id_transaksi','DESC');    
          $this->db->limit(1);    
          $this->db->where('retur','pembelian');
          $query = $this->db->get('transaksi_pembelian');  //cek dulu apakah ada sudah ada kode di tabel.    
          if($query->num_rows() <> 0){      
               //cek kode jika telah tersedia    
               $data = $query->row();      
               $kode = intval($data->id_transaksi) + 1; 
          }
          else{      
               $kode = 1;  //cek jika kode belum terdapat pada table
          }
              $batas = str_pad($kode, 5, "0", STR_PAD_LEFT);    
              $kodetampil = "PB".$batas;  //format kode
              return $kodetampil;  
         }

    public function id_retur_pembelian(){
          $this->db->select('RIGHT(transaksi_pembelian.id_transaksi,5) as id_transaksi', FALSE);
          $this->db->order_by('id_transaksi','DESC');    
          $this->db->limit(1);
          $this->db->where('retur','retur_pembelian');
          $query = $this->db->get('transaksi_pembelian');  //cek dulu apakah ada sudah ada kode di tabel.    
          if($query->num_rows() <> 0){      
               //cek kode jika telah tersedia    
               $data = $query->row();      
               $kode = intval($data->id_transaksi) + 1; 
          }
          else{      
               $kode = 1;  //cek jika kode belum terdapat pada table
          }
              $batas = str_pad($kode, 5, "0", STR_PAD_LEFT);    
              $kodetampil = "RPB".$batas;  //format kode
              return $kodetampil;  
         }


    public function id_terakhir_penjualan()
    {
        $this->db->select('MAX(id_transaksi) as id_transaksi');
        $this->db->order_by('id_transaksi','DESC');
        $this->db->limit(1);
        $this->db->like('id_transaksi','PJ','after');
        $this->db->where('retur','penjualan');
        $query =  $this->db->get('transaksi_penjualan');
        return $query->row();
    }

    public function id_terakhir_retur_penjualan()
    {
        $this->db->select('MAX(id_transaksi)');
        $this->db->order_by('id_transaksi','DESC');
        $this->db->limit(1);
        $this->db->like('id_transaksi','RPJ','after');
        $this->db->where('retur','retur_penjualan');
        $query =  $this->db->get('transaksi_penjualan');
        return $query->row();
    }

    public function id_terakhir_pembelian()
    {
        $this->db->select('MAX(id_transaksi) as id_transaksi');
        $this->db->order_by('id_transaksi','DESC');
        $this->db->limit(1);
        $this->db->like('id_transaksi','PB','after');
        $this->db->where('retur','retur_pembelian');
        $query =  $this->db->get('transaksi_pembelian');
        return $query->row();
    }

    public function id_terakhir_retur_pembelian()
    {
        $this->db->select('MAX(id_transaksi)');
        $this->db->order_by('id_transaksi','DESC');
        $this->db->limit(1);
        $this->db->like('id_transaksi','RPB','after');
        $this->db->where('retur','retur_pembelian');
        $query =  $this->db->get('transaksi_pembelian');
        return $query->row();
    }
    
    public function data_penjualan()
    {
        $this->db->select('*');
        $this->db->from('transaksi_penjualan');
        $this->db->join('pelanggan','pelanggan.id_pelanggan=transaksi_penjualan.id_pelanggan');
        $this->db->where('retur','penjualan');
        $query =  $this->db->get();
        return $query->result();
    }

    public function data_retur_penjualan()
    {
        $this->db->select('*');
        $this->db->from('transaksi_penjualan');
        $this->db->join('pelanggan','pelanggan.id_pelanggan=transaksi_penjualan.id_pelanggan');
        $this->db->where('retur','retur_penjualan');
        $query =  $this->db->get();
        return $query->result();
    }

    public function data_pembelian()
    {
        $this->db->select('*');
        $this->db->from('transaksi_pembelian');
        $this->db->join('vendor','vendor.id_vendor=transaksi_pembelian.id_vendor');
        $this->db->where('retur','pembelian');
        $query =  $this->db->get();
        return $query->result();
    }

    public function data_retur_pembelian()
    {
        $this->db->select('*');
        $this->db->from('transaksi_pembelian');
        $this->db->join('vendor','vendor.id_vendor=transaksi_pembelian.id_vendor');
        $this->db->where('retur','retur_pembelian');
        $query =  $this->db->get();
        return $query->result();
    }

    public function data_transaksi_edit($id_transaksi)
    {
        $this->db->select('*');
        $this->db->from('transaksi');
        $this->db->join('pelanggan','pelanggan.id_pelanggan=transaksi.id_pelanggan');
        $this->db->join('counter','counter.id_counter=transaksi.id_counter');
        $this->db->where('id_transaksi',$id_transaksi);
        $query =  $this->db->get();
        return $query->row();
    }


    public function m_pelanggan()
    {
        $query =  $this->db->get('pelanggan');
        return $query->result();
    }

    public function m_proyek()
    {
        $query =  $this->db->get('proyek');
        return $query->result();
    }

    public function m_perihal()
    {
        $query =  $this->db->get('perihal');
        return $query->result();
    }

    public function m_vendor()
    {
        $query =  $this->db->get('vendor');
        return $query->result();
    }

    public function m_akun()
    {
        $query =  $this->db->get('akun');
        return $query->result();
    }

    public function m_akun2($id_akun)
    {
        $query =  $this->db->get_where('akun',$id_akun);
        return $query->result();
    }

    public function saldo_awal_akun($id_akun)
    {
        $this->db->select('*');
        $this->db->from('data_akun');
        $this->db->where('id_akun',$id_akun);
        $query =  $this->db->get();
        return $query->result();
    }

    public function m_pelanggan2($id)
    {
       // $this->db->from('pelanggan')
        $this->db->where('id_pelanggan',$id);
        $query =  $this->db->get('pelanggan');
        return $query->result();
    }

    public function m_vendor2($id)
    {
       // $this->db->from('pelanggan')
        $this->db->where('id_vendor',$id);
        $query =  $this->db->get('vendor');
        return $query->result();
    }

    public function m_barang()
    {
        $query =  $this->db->get('barang');
        return $query->result();
    }

    public function m_harga_barang()
    {
        $query =  $this->db->get('harga_barang');
        return $query->result();
    }

    public function harga_barang()
    {
        $this->db->where('id_barang','1');
        $query =  $this->db->get('harga_barang');
        return $query->result();
    }


    public function get_harga_pelayanan($nama_barang0,$pelayanan0)
    {
        $this->db->select('*');
        $this->db->from('barang');
        $this->db->join('harga_barang','harga_barang.id_barang=barang.id_barang');
        $this->db->where('nama_barang',$nama_barang0);
        $this->db->where('nama_pelayanan',$pelayanan0);
        $query = $this->db->get();
        return $query->result();
    }

    public function proses_transaksi_penjualan($data)
    {
        $this->db->insert('transaksi_penjualan',$data);
    }

    public function proses_transaksi_pembelian($data)
    {
        $this->db->insert('transaksi_pembelian',$data);
    }

    public function proses_input_barang_penjualan($barang)
    {
        $this->db->insert('barang_penjualan',$barang);
    }

    public function proses_input_barang_pembelian($barang)
    {
        $this->db->insert('barang_pembelian',$barang);
    }

    public function proses_buku_besar($buku_besar)
    {
        $this->db->insert('buku_besar',$buku_besar);
    }

    public function cetak_transaksi($id_transaksi)
    {
        $this->db->select('*');
        $this->db->from('transaksi');
        $this->db->join('pelanggan','pelanggan.id_pelanggan=transaksi.id_pelanggan');
        $this->db->join('counter','counter.id_counter=transaksi.id_counter');
        $this->db->where('id_transaksi',$id_transaksi);
        //$this->db->join('barang_transaksi','barang_transaksi.id_transaksi=transaksi.id_transaksi');
        //$this->db->join('barang','barang.id_barang=barang_transaksi.id_barang');
        $query =  $this->db->get();
        return $query->result();
    }

    public function barang_transaksi($id_transaksi)
    {
        $this->db->select('*');
        $this->db->from('barang_transaksi');
        $this->db->join('barang','barang.id_barang=barang_transaksi.id_barang');
        $this->db->where('id_transaksi',$id_transaksi);
        $query =  $this->db->get();
        return $query->result();
    }

    public function konfirmasi($id_transaksi)
    {
        $this->db->select('*');
        $this->db->from('konfirmasi');
        $this->db->where('id_transaksi',$id_transaksi);
        $query =  $this->db->get();
        return $query->row();
    }

    public function input_konfirmasi($data)
    {
        $this->db->insert('konfirmasi',$data);
    }

    public function hapus_transaksi_penjualan($id_transaksi)
    {
        $this->db->trans_begin();
        $this->db->where('id_transaksi',$id_transaksi);
        $this->db->delete('buku_besar');
        $this->db->where('id_transaksi',$id_transaksi);
        $this->db->delete('transaksi_penjualan');
        $this->db->where('id_transaksi',$id_transaksi);
        $this->db->delete('barang_penjualan');
        $this->db->where('id_transaksi',$id_transaksi);
        $this->db->delete('konfirmasi');
        if ($this->db->trans_status() === FALSE)
        {
            $this->db->trans_rollback();
        }
        else
        {
            $this->db->trans_commit();
        }
    }

    public function hapus_transaksi_pembelian($id_transaksi)
    {
        $this->db->trans_begin();
        $this->db->where('id_transaksi',$id_transaksi);
        $this->db->delete('buku_besar');
        $this->db->where('id_transaksi',$id_transaksi);
        $this->db->delete('transaksi_pembelian');
        $this->db->where('id_transaksi',$id_transaksi);
        $this->db->delete('barang_pembelian');
        $this->db->where('id_transaksi',$id_transaksi);
        $this->db->delete('konfirmasi');
        if ($this->db->trans_status() === FALSE)
        {
            $this->db->trans_rollback();
        }
        else
        {
            $this->db->trans_commit();
        }
    }

    public function hapus_transaksi_retur_penjualan($id_transaksi)
    {
        $this->db->trans_begin();
        $this->db->where('id_transaksi',$id_transaksi);
        $this->db->delete('buku_besar');
        $this->db->where('id_transaksi',$id_transaksi);
        $this->db->where('retur','Ya');
        $this->db->delete('transaksi_penjualan');
        $this->db->where('id_transaksi',$id_transaksi);
        $this->db->delete('barang_penjualan');
        $this->db->where('id_transaksi',$id_transaksi);
        $this->db->delete('konfirmasi');
        if ($this->db->trans_status() === FALSE)
        {
            $this->db->trans_rollback();
        }
        else
        {
            $this->db->trans_commit();
        }
    }

    public function hapus_transaksi_retur_pembelian($id_transaksi)
    {
        $this->db->trans_begin();
        $this->db->where('id_transaksi',$id_transaksi);
        $this->db->delete('buku_besar');
        $this->db->where('id_transaksi',$id_transaksi);
        $this->db->where('retur','Ya');
        $this->db->delete('transaksi_pembelian');
        $this->db->where('id_transaksi',$id_transaksi);
        $this->db->delete('barang_pembelian');
        //$this->db->where('id_transaksi',$id_transaksi);
        //$this->db->delete('konfirmasi');
        if ($this->db->trans_status() === FALSE)
        {
            $this->db->trans_rollback();
        }
        else
        {
            $this->db->trans_commit();
        }
    }
    
    public function hapus_transaksi_pembayaran($id_transaksi)
    {
        $this->db->trans_begin();
        $this->db->delete('buku_besar',array('id_transaksi',$id_transaksi));
        $this->db->where('id_transaksi',$id_transaksi);
        $this->db->delete('transaksi_pembayaran');
        $this->db->where('id_transaksi',$id_transaksi);
        $this->db->delete('barang_pembayaran');
        //$this->db->where('id_transaksi',$id_transaksi);
        //$this->db->delete('konfirmasi');
        if ($this->db->trans_status() === FALSE)
        {
            $this->db->trans_rollback();
        }
        else
        {
            $this->db->trans_commit();
        }
    }

    function get_last_id()
    {
        $this->db->select('id_transaksi');
        $this->db->from('transaksi_penjualan');
        $this->db->order_by('id_transaksi',"desc");
        $this->db->limit(1);
        $query =  $this->db->get();
        return $query->result();
    }

    public function proses_edit_transaksi($data,$id_transaksi)
    {
        $this->db->where('id_transaksi',$id_transaksi);
        $this->db->update('transaksi',$data);
    }

    public function proses_hapus_barang_transaksi($id_transaksi)
    {
        $this->db->where('id_transaksi',$id_transaksi);
        $this->db->delete('barang_transaksi');
    }

    public function proses_edit_konfirmasi($data3,$id_konfirmasi)
    {
        $this->db->where('id_konfirmasi',$id_konfirmasi);
        $this->db->update('konfirmasi',$data3);
    }

    public function proses_data_faktur($jenis_tgl,$tgl_mulai,$tgl_sampai,$id_pelanggan)
    {
        $this->db->select('*,sum(tagihan) as jm');
        $this->db->from('transaksi');
        $this->db->join('pelanggan','pelanggan.id_pelanggan=transaksi.id_pelanggan');
       // $this->db->join('counter','counter.id_counter=transaksi.id_counter');
        $this->db->where('transaksi.id_pelanggan',$id_pelanggan);
        if($jenis_tgl=='tgl_diterima'){
            $this->db->where('tgl_diterima >=',$tgl_mulai);
            $this->db->where('tgl_diterima <=',$tgl_sampai);
        }else{
            $this->db->where('tgl_dikembalikan >=',$tgl_mulai);
            $this->db->where('tgl_dikembalikan <=',$tgl_sampai);
        }
        $this->db->group_by('pelanggan.id_pelanggan');
        $query =  $this->db->get();
        return $query->result();
    }

    public function statistik_harian()
    {
        $this->db->select('*,sum(barang_transaksi.jumlah) AS totLembar,count(id_mo) AS jumNota,count(bon_status!=NULL) AS notalunas,count(konfirmasi_selesai="Ya") AS dataOK,count(konfirmasi_selesai=NULL) AS dalamProses,count(IF(bon_status=NULL)) AS notaBon, sum(tagihan) AS nilaiTransaksi');
        $this->db->from('transaksi');
        $this->db->join('barang_transaksi','barang_transaksi.id_transaksi=transaksi.id_transaksi');
        $this->db->join('konfirmasi','konfirmasi.id_transaksi=transaksi.id_transaksi');
        $this->db->group_by('transaksi.tgl_transaksi');
        $query =  $this->db->get();
        return $query->result();
    }

    public function proses_transaksi_harian_umum($tgl_mulai,$tgl_sampai)
    {
        $this->db->select('COUNT(no_nota) AS nota,COUNT(kategori="BJU") AS baju,COUNT(kategori="BED COVER") AS bedcover,COUNT(kategori="LAIN-LAIN") AS lainnya,COUNT(status_karpet="Ya") AS karpet,COUNT(IF(status_karpet="Ya" && konfirmasi_selesai="Ya", 1,0)) AS karpetselesai');
        $this->db->from('transaksi');
        $this->db->join('pelanggan','pelanggan.id_pelanggan=transaksi.id_pelanggan');
       $this->db->join('konfirmasi','konfirmasi.id_transaksi=transaksi.id_transaksi');
        $this->db->join('barang_transaksi','barang_transaksi.id_transaksi=transaksi.id_transaksi');
        $this->db->join('barang','barang.id_barang=barang_transaksi.id_barang');
        $this->db->where('pelanggan.jenis !=','hotel');
        //$this->db->or_where('pelanggan.jenis','umum');
        $this->db->group_by('pelanggan.jenis');
       // $this->db->group_by('transaksi.tgl_transaksi');
        $query =  $this->db->get();
        return $query->result();
    }

    public function proses_transaksi_harian_hotel($tgl_mulai,$tgl_sampai,$h)
    {
        $this->db->select('pelanggan.nama_pelanggan,COUNT(kategori = "LINEN") AS linen');
        $this->db->from('transaksi');
        $this->db->join('pelanggan','pelanggan.id_pelanggan=transaksi.id_pelanggan');
        //$this->db->join('konfirmasi','konfirmasi.id_transaksi=transaksi.id_transaksi');
        $this->db->join('barang_transaksi','barang_transaksi.id_transaksi=transaksi.id_transaksi');
        $this->db->join('barang','barang.id_barang=barang_transaksi.id_barang');
        $this->db->where('pelanggan.id_pelanggan',$h);
        $this->db->group_by('pelanggan.id_pelanggan');
        $query =  $this->db->get();
        return $query->result();
    }

    public function buku_besar_range($tgl_mulai,$tgl_sampai,$id_akun)
    {
        $this->db->select('*,buku_besar.id_transaksi AS transaksi');
        $this->db->from('buku_besar');
        $this->db->join('akun','akun.id_akun=buku_besar.id_akun');
        $this->db->join('data_akun','data_akun.id_akun=buku_besar.id_akun','left');
        //$this->db->join('transaksi_penjualan','transaksi_penjualan.id_transaksi=buku_besar.id_transaksi');
        //$this->db->join('transaksi_pembelian','transaksi_pembelian.id_transaksi=buku_besar.id_transaksi');
        $this->db->where('buku_besar.id_akun',$id_akun);
        $this->db->where('buku_besar.tgl_transaksi >=',$tgl_mulai);
        $this->db->where('buku_besar.tgl_transaksi <=',$tgl_sampai);
        $query=$this->db->get();
        return $query->result();
    }

    public function buku_besar_range2($tgl_mulai,$tgl_sampai,$id_akun)
    {
        $this->db->select('*,buku_besar.id_transaksi AS transaksi');
        $this->db->from('buku_besar');
        $this->db->join('akun','akun.id_akun=buku_besar.id_akun');
        $this->db->join('data_akun','data_akun.id_akun=buku_besar.id_akun','left');
        //$this->db->join('transaksi_penjualan','transaksi_penjualan.id_transaksi=buku_besar.id_transaksi');
        //$this->db->join('transaksi_pembelian','transaksi_pembelian.id_transaksi=buku_besar.id_transaksi');
        $this->db->where('buku_besar.id_akun',$id_akun);
        $this->db->where('buku_besar.tgl_transaksi >=',$tgl_mulai);
        $this->db->where('buku_besar.tgl_transaksi <=',$tgl_sampai);
        $query=$this->db->get();
        return $query->result();
    }

    public function transaksi_jurnal($tgl_mulai,$tgl_sampai,$id_akun)
    {
        $this->db->select('*,SUM(IF(id_akun='.$id_akun.',total_keseluruhan,0)) AS total_jurnal');
        $this->db->from('jurnal_umum');
        $this->db->join('barang_jurnal','barang_jurnal.id_jurnal=jurnal_umum.id_jurnal');
        $this->db->where('id_akun',$id_akun);
        $this->db->where('tgl_jurnal >=',$tgl_mulai);
        $this->db->where('tgl_jurnal <=',$tgl_sampai);
        $query=$this->db->get();
        return $query->result();
    }

    public function hitung_saldo_awal($tgl_mulai,$id_akun)
    {
      //SELECT *, SUM(IF(akun_biaya=1,biaya,0)) AS biaya,SUM(IF(akun_potongan=1,diskon2,0)) AS potongan,SUM(IF(akun_total=1,tagihan,0)) AS biaya_total FROM `transaksi_penjualan` WHERE akun_biaya='1' OR akun_potongan='1' OR akun_total='1'

        $this->db->select('*,SUM(IF(akun_biaya='.$id_akun.',biaya,0)) AS tot_biaya,SUM(IF(akun_potongan='.$id_akun.',diskon2,0)) AS potongan,SUM(IF(akun_total='.$id_akun.',tagihan,0)) AS biaya_total');
        $this->db->from('transaksi_penjualan');
        $this->db->where('transaksi_penjualan.tgl_diterima <',$tgl_mulai);
        $query=$this->db->get();
        return $query->result();
    }

    public function hitung_saldo_awal2($tgl_mulai,$id_akun)
    {
        $this->db->select('*,SUM(IF(akun_biaya='.$id_akun.',biaya,0)) AS tot_biaya,SUM(IF(akun_potongan='.$id_akun.',diskon2,0)) AS potongan,SUM(IF(akun_total='.$id_akun.',tagihan,0)) AS biaya_total');
        $this->db->from('transaksi_pembelian');
        $this->db->where('transaksi_pembelian.tgl_diterima <',$tgl_mulai);
        $query=$this->db->get();
        return $query->result();
    }

     public function proses_input_jurnal_umum($data)
    {
        $this->db->insert('jurnal_umum',$data);
    }

    public function proses_input_barang_jurnal($barang)
    {
        $this->db->insert('barang_jurnal',$barang);
        return $this->db->insert_id();
    }

    public function data_jurnal_umum()
    {
        $this->db->select('*');
        $this->db->from('jurnal_umum');
        $this->db->join('barang_jurnal','jurnal_umum.id_jurnal=barang_jurnal.id_jurnal');
        $this->db->join('akun','barang_jurnal.id_akun=akun.id_akun');
        $query=$this->db->get();
        return $query->result();
    }

    public function jurnal_umum2($id_barang_jurnal)
    {
        $this->db->select('*');
        $this->db->from('jurnal_umum');
        $this->db->join('barang_jurnal','jurnal_umum.id_jurnal=barang_jurnal.id_jurnal');
        $this->db->join('akun','barang_jurnal.id_akun=akun.id_akun');
        $this->db->where('barang_jurnal.id_barang_jurnal',$id_barang_jurnal);
        $query=$this->db->get();
        return $query->row();
    }

    public function data_jurnal_umum_range($tgl_mulai,$tgl_sampai)
    {
        $this->db->select('*');
        $this->db->from('jurnal_umum');
        $this->db->join('barang_jurnal','jurnal_umum.id_jurnal=barang_jurnal.id_jurnal');
        $this->db->join('akun','barang_jurnal.id_akun=akun.id_akun');
        $this->db->where('tgl_jurnal >=',$tgl_mulai);
        $this->db->where('tgl_jurnal <=',$tgl_sampai);
        $query=$this->db->get();
        return $query->result();
    }

    public function proses_update_jurnal_umum($data,$id_jurnal)
    {
        $this->db->where('id_jurnal',$id_jurnal);
        $this->db->update('jurnal_umum',$data);
    }

    public function proses_update_barang_jurnal($barang,$id_barang_jurnal)
    {
        $this->db->where('id_barang_jurnal',$id_barang_jurnal);
        $this->db->update('barang_jurnal',$barang);
    }

    public function laporan_proyek_penjualan($id_proyek)
    {
        $this->db->select('*,SUM(tagihan) AS total_penjualan');
        $this->db->from('transaksi_penjualan');
        $this->db->join('akun','transaksi_penjualan.akun_total=akun.id_akun');
        $this->db->join('proyek','transaksi_penjualan.id_proyek=proyek.id_proyek');
        $this->db->join('perihal','transaksi_penjualan.perihal=perihal.id_perihal');
        $this->db->where('retur !=','pembayaran_penjualan');
        $this->db->group_by('perihal');
        $query=$this->db->get();
        return $query->result();
    }

    public function laporan_proyek_pembelian($id_proyek)
    {
        $this->db->select('*,SUM(tagihan) AS total_pembelian');
        $this->db->from('transaksi_pembelian');
        $this->db->join('akun','transaksi_pembelian.akun_total=akun.id_akun');
        $this->db->join('proyek','transaksi_pembelian.id_proyek=proyek.id_proyek');
        $this->db->join('perihal','transaksi_pembelian.perihal=perihal.id_perihal');
        $this->db->where('retur !=','pembayaran_pembelian');
        $this->db->group_by('perihal');
        $query=$this->db->get();
        return $query->result();
    }

    public function data_akun()
    {
        $this->db->select('*');
        $this->db->from('data_akun');
        $this->db->join('akun','akun.id_akun=data_akun.id_akun');
        $query=$this->db->get();
        return $query->result();
    }

    public function tambah_data_akun($data)
    {
        $this->db->insert('data_akun',$data);
    }

    public function edit_data_akun($data,$id_data_akun)
    {
        $this->db->where('id_data_akun',$id_data_akun);
        $this->db->update('data_akun',$data);
    }

    public function hapus_data_akun($id_data_akun)
    {
        $this->db->where('id_data_akun',$id_data_akun);
        $this->db->delete('data_akun');
    }

    public function edit_penjualan($id_transaksi)
    {
        $this->db->select('*');
        $this->db->from('transaksi_penjualan');
        //$this->db->join('akun','akun.id_akun=data_akun.id_akun');
        $this->db->where('id_transaksi',$id_transaksi);
        $query=$this->db->get();
        return $query->row();
    }

    public function barang_penjualan($id_transaksi)
    {
        $this->db->select('*');
        $this->db->from('barang_penjualan');
        $this->db->where('id_transaksi',$id_transaksi);
        $query=$this->db->get();
        return $query->result();
    }

    public function proses_edit_penjualan($data,$id_transaksi)
    {
        $this->db->where('id_transaksi',$id_transaksi);
        $this->db->update('transaksi_penjualan',$data);
    }

    public function proses_reset_barang_penjualan($id_transaksi)
    {
        $this->db->where('id_transaksi',$id_transaksi);
        $this->db->delete('barang_penjualan');
    }

    public function proses_reset_buku_besar($id_transaksi)
    {
        $this->db->where('id_transaksi',$id_transaksi);
        $this->db->delete('buku_besar');
    }

    public function edit_pembelian($id_transaksi)
    {
        $this->db->select('*');
        $this->db->from('transaksi_pembelian');
        //$this->db->join('akun','akun.id_akun=data_akun.id_akun');
        $this->db->where('id_transaksi',$id_transaksi);
        $query=$this->db->get();
        return $query->row();
    }

    public function barang_pembelian($id_transaksi)
    {
        $this->db->select('*');
        $this->db->from('barang_pembelian');
        $this->db->where('id_transaksi',$id_transaksi);
        $query=$this->db->get();
        return $query->result();
    }

    public function proses_edit_pembelian($data,$id_transaksi)
    {
        $this->db->where('id_transaksi',$id_transaksi);
        $this->db->update('transaksi_pembelian',$data);
    }

    public function proses_reset_barang_pembelian($id_transaksi)
    {
        $this->db->where('id_transaksi',$id_transaksi);
        $this->db->delete('barang_pembelian');
    }

    public function id_pembayaran_utang(){
          $this->db->select('RIGHT(transaksi_pembayaran.id_pembayaran,5) as id_pembayaran', FALSE);
          $this->db->order_by('id_pembayaran','DESC');    
          $this->db->limit(1); 
          $this->db->where('jenis_pembayaran','utang');    
          $query = $this->db->get('transaksi_pembayaran');  //cek dulu apakah ada sudah ada kode di tabel.    
          if($query->num_rows() <> 0){      
               //cek kode jika telah tersedia    
               $data = $query->row();      
               $kode = intval($data->id_pembayaran) + 1; 
          }
          else{      
               $kode = 1;  //cek jika kode belum terdapat pada table
          }
              $batas = str_pad($kode, 5, "0", STR_PAD_LEFT);    
              $kodetampil = "PU".$batas;  //format kode
              return $kodetampil;  
         }

    public function id_pembayaran_piutang(){
          $this->db->select('RIGHT(transaksi_pembayaran.id_pembayaran,5) as id_pembayaran', FALSE);
          $this->db->order_by('id_pembayaran','DESC');    
          $this->db->limit(1); 
          $this->db->where('jenis_pembayaran','piutang');    
          $query = $this->db->get('transaksi_pembayaran');  //cek dulu apakah ada sudah ada kode di tabel.    
          if($query->num_rows() <> 0){      
               //cek kode jika telah tersedia    
               $data = $query->row();      
               $kode = intval($data->id_pembayaran) + 1; 
          }
          else{      
               $kode = 1;  //cek jika kode belum terdapat pada table
          }
              $batas = str_pad($kode, 5, "0", STR_PAD_LEFT);    
              $kodetampil = "PP".$batas;  //format kode
              return $kodetampil;  
         }

    public function proses_input_pembayaran($data)
    {
        $this->db->insert('transaksi_pembayaran',$data);
    }

    public function proses_input_barang_pembayaran($barang)
    {
        $this->db->insert('barang_pembayaran',$barang);
    }

     public function data_pembayaran()
    {
        $this->db->select('*');
        $this->db->from('transaksi_pembayaran');
        $this->db->join('pelanggan','pelanggan.id_pelanggan=transaksi_pembayaran.id_pelanggan','left');
        $this->db->join('vendor','vendor.id_vendor=transaksi_pembayaran.id_pelanggan','left');
        $query =  $this->db->get();
        return $query->result();
    }
    
    public function get_data_pembayaran($id_pembayaran)
    {
        $this->db->select('*');
        $this->db->from('transaksi_pembayaran');
        $this->db->join('pelanggan','pelanggan.id_pelanggan=transaksi_pembayaran.id_pelanggan','left');
        $this->db->join('vendor','vendor.id_vendor=transaksi_pembayaran.id_pelanggan','left');
        $this->db->where('id_pembayaran',$id_pembayaran);
        $query =  $this->db->get();
        return $query->row();
    }
    public function get_data_pembayaran_detil($id_pembayaran)
    {
        $this->db->select('*');
        $this->db->from('barang_pembayaran');
        $this->db->where('id_pembayaran',$id_pembayaran);
        $query =  $this->db->get();
        return $query->result();
    }
}
