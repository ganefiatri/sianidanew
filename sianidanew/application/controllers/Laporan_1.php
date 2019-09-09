<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Laporan extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->helper('url');
        $this->load->library('session');
        $this->load->model('Auth_model');
        $this->load->model('User_model');
        $this->load->model('Logbook_model');
    }

    function validateDate($date) {
        $d = DateTime::createFromFormat('m/d/Y', $date);
        return $d && $d->format('m/d/Y') === $date;
    }

    public function index() {

        $i = $this->input;

        if ($i->post() != null) {
            $tanggal = explode(" - ", $i->post('tanggal_range'));

            if ($this->validateDate($tanggal[0]) == true) {
                $tanggalA = DateTime::createFromFormat("m/d/Y", $tanggal[0])->getTimestamp();
            }
            if ($this->validateDate($tanggal[1]) == true) {
                $tanggalB = DateTime::createFromFormat("m/d/Y", $tanggal[1])->getTimestamp();
            }
            $where = sprintf(" AND date BETWEEN %s AND %s", $tanggalA, $tanggalB);
            $query = sprintf("SELECT count('id') as id, case_type FROM `logbook` WHERE tipe = 2  %s GROUP BY case_type", $where);
            $data['lap_q'] = $this->db->query($query);
            $data['tanggal'] = $tanggal;
        }

        $data['v'] = 'laporan/form_laporan.php';
        $this->load->view('init', $data);
    }

}
