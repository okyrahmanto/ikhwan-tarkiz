<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_user extends CI_Model
{

    function addUser($user) {
        $this->db->insert('login',$user);
    }

    function removeUser($idLogin) {
        $this->db_where('idLogin',$idLogin);
        $this->db->delete('login');
    }

    function updateUser() {


    }

    function getUser($idLogin) {
        return $this->db->get_where('login',array('idLogin'=>$idLogin))->row();

    }
    function getAllPesertaEvent() {
        $this->db->select('*');
        $this->db->join('peserta','peserta.idPeserta = registerevent.idPeserta');
        $this->db->join('event','event.idEvent = registerevent.idEvent');
        $this->db->from('registerevent');
        $result = $this->db->get()->result();
        return $result;
    }

    function getAllPesertaEventByStatusAndEvent($status,$event) {
        $this->db->select("*,IF(isTicketSend=0, 'Belum Dikirim', 'Telah Dikirimkan') AS statusTicket");
        $this->db->join('peserta','peserta.idPeserta = registerevent.idPeserta');
        $this->db->join('event','event.idEvent = registerevent.idEvent');
        $this->db->join('ticket','ticket.idTicket = registerevent.idTicket');
        $this->db->where('status',$status);
        if ($event!=null) {
            $this->db->where('idEvent',$event);
        }
        $this->db->from('registerevent');
        $result = $this->db->get()->result();
        return $result;
    }
}
