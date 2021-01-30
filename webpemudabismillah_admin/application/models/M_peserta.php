<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_peserta extends CI_Model
{

    function addPeserta($peserta) {
        $this->db->insert('peserta',$peserta);
    }

    function removePeserta($idLogin) {
        $this->db_where('idLogin',$idLogin);
        $this->db->delete('peserta');
    }

    function updatePeserta() {


    }

    function getPeserta($idLogin) {
        return $this->db->get_where('peserta',array('idLogin'=>$idLogin))->row();

    }

    function getPesertaByIdFirebase($idFirebase) {
        return $this->db->get_where('peserta',array('idFirebase'=>$idFirebase))->row();

    }
   
}
