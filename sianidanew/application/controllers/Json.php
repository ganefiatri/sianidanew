<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Json extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->helper('url');
        $this->load->model('Logbook_model');
    }

    public function logbooktelkom() {
        header('Content-Type: application/json');
        echo $this->Logbook_model->json_logbooktelkom();
    }

    public function logbooktelkomsel() {
        header('Content-Type: application/json');
        echo $this->Logbook_model->json_logbooktelkomsel();
    }

    public function logbooktelkom2() {
        header('Content-Type: application/json');
        echo $this->Logbook_model->json_logbooktelkom2(array(
            'author' => $this->ion_auth->user()->row()->id
        ));
    }

    public function logbooktelkombast() {
        header('Content-Type: application/json');
        echo $this->Logbook_model->json_logbooktelkom('BAST PENUTUPAN INDIHOME', array(
            'author' => $this->ion_auth->user()->row()->id
        ));
    }

    public function logbooktelkomselgantipaket() {
        header('Content-Type: application/json');
        echo $this->Logbook_model->json_logbooktelkomsel(array(
            'author' => $this->ion_auth->user()->row()->id,
            'kategori' => 'GANTI PAKET TELKOMSEL'
        ));
    }

    public function logbooktelkomselpsb() {
        header('Content-Type: application/json');
        echo $this->Logbook_model->json_logbooktelkomselpsb(array(
            'author' => $this->ion_auth->user()->row()->id
        ));
    }

}
