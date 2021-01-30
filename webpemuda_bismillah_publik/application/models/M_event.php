<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_event extends CI_Model
{

    function addEvent($event) {
        $this->db->insert('event',$event);
    }

    function removeEvent($idEvent) {
        $this->db_where('idEvent',$idEvent);
        $this->db->delete('event');
    }

    function updateEvent() {


    }

    function getEvent($idEvent) {
        return $this->db->get_where('event',array('idEvent'=>$idEvent))->row();

    }

    function getAllEvent() {
        return $this->db->get('event');

    }

    function addRegisterEvent($data) {
        return $this->db->insert('registerevent',$data);
    }
    function updateRegisterEvent($idRegisterEvent,$data) {
        $this->db->where('idRegister',$idRegisterEvent);
        $this->db->update('registerevent',$data);
    }

    function checkRegisteredEvent($data) {
        $this->db->where('idPeserta',$data['idPeserta']);
        $this->db->where('idEvent',$data['idEvent']);
        $result = $this->db->get('registerevent');
        if ($result->num_rows()>0) {
            return true;
        } else {
            return false;
        }

    }

    function getRegisteredEventByPesertaEvent($data) {
        $this->db->where('idPeserta',$data['idPeserta']);
        $this->db->where('idEvent',$data['idEvent']);
        return $this->db->get('registerevent');
    }

    function getRegisteredEventByPeserta($data) {
        $this->db->where('idPeserta',$data['idPeserta']);
        return $this->db->get('registerevent');
    }

    function getRegisteredEventById($idRegister) {
        $this->db->where('idRegister',$idRegister);
        return $this->db->get('registerevent');
    }

    function confirm($idRegister,$idEvent) {
        $kodeEvent = $this->db->get_where('event',array('idEvent',$idEvent))->row()->kodeEvent;
        echo $kodeEvent;
        $num = $this->db->get_where('registerevent',array('idEvent'=>$idEvent,'status'=>'konfirmasi'))->num_rows();
        $num = sprintf("%05d", $num++);
        $noTiket = $kodeEvent.$num;
        $data = array(
            'noTiket' => $noTiket,
            'status' => 'konfirmasi'
        );
        $this->updateRegisterEvent($idRegister,$data);
        

    }


   
}
