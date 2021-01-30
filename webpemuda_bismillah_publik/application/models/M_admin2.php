<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_admin extends CI_Model
{

    public function data_transaksi()
    {
        $this->db->select('*');
        $this->db->from('transaksi');
        $this->db->join('pelanggan','pelanggan.id_pelanggan=transaksi.id_pelanggan');
        $this->db->join('counter','counter.id_counter=transaksi.id_counter');
        $query =  $this->db->get();
        return $query->result();
    }
    
    public function m_pelanggan()
    {
        $query =  $this->db->get('pelanggan');
        return $query->result();
    }

    public function m_pelanggan2($id)
    {
       // $this->db->from('pelanggan')
        $this->db->where('id_pelanggan',$id);
        $query =  $this->db->get('pelanggan');
        return $query->result();
    }

    public function m_barang()
    {
        $query =  $this->db->get('barang');
        return $query->result();
    }

    public function harga_barang()
    {
        $this->db->where('id_barang','1');
        $query =  $this->db->get('harga_barang');
        return $query->result();
    }

    public function m_counter()
    {
        $query =  $this->db->get('counter');
        return $query->result();
    }
}