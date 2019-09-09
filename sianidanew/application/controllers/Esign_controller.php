<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Esign_controller extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
        $this->load->helper('url');
        $this->load->library('session');
        $this->load->model('Auth_model');
        $this->load->model('User_model');
        $this->load->model('Logbook_model');
        $this->load->model('Disclaimer_model');
        $this->load->model('Starla_model');
        function validateDate($date)
        {
            $d = DateTime::createFromFormat('d F Y - H:i', $date);
            return $d && $d->format('d F Y - H:i') === $date;
        }

    }

    public function esign(){
        $data['v'] = 'esignature/esign_view.php';
        $this->load->view('init', $data);
    }

    public function insert(){

    }

    public function esign_view(){
        $data['v'] = 'esignature/esign_detail.php';
        $this->load->view('init', $data);
    }

}