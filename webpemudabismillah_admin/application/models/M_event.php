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

    function getAllEvent($idEvent) {
        return $this->db->get('event');

    }

    function addRegisterEvent($data) {
        $this->db->insert('registerevent',$data);
    }
    function updateRegisterEvent($idRegisterEvent,$data) {
        $this->db_where('idRegisterEvent',$idRegisterEvent);
        $this->db->update('registerevent',$data);
    }
   
}
