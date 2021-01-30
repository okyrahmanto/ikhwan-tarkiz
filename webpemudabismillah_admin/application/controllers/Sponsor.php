<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Sponsor extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
        //$this->load->model('m_sponsor');
        $this->CI = &get_instance();
    }

    function data_event()
    {
        $this->load->library('grocery_CRUD');
        try {
            $crud = new grocery_CRUD();
            $crud->set_lang_string('insert_error', 'Terjadi kegagalan');

            $crud->set_theme('bootstrap');
            $crud->set_table('event');
            $crud->set_subject('Event yang akan berlangsung');
            $crud->unset_jquery();
            $crud->unset_bootstrap();
            $crud->unset_operations();
            $crud->set_field_upload('file_upload', 'assets/uploads/events/');

            $output = $crud->render();
            $this->load->view('sponsor/v_header_grocery', $output);
            $this->load->view('sponsor/v_main_grocery', $output);
            $this->load->view('sponsor/v_footer_grocery', $output);
        } catch (Exception $e) {
            show_error($e->getMessage() . ' --- ' . $e->getTraceAsString());
        }
    }
}
