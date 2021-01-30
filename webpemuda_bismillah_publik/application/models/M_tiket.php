<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_tiket extends CI_Model
{

    function getTiketById($idTiket) {
        return $this->db->get_where('ticket',array('idTicket'=>$idTiket))->row();
    }
   
}
