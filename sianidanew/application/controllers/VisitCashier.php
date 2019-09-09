<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class VisitCashier extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->helper('url');
        $this->load->library('session');
        $this->load->model('Auth_model');
        $this->load->model('User_model');
        $this->load->model('Logbook_model');
    }

    function validateDate($date) {
        $d = DateTime::createFromFormat('d-m-Y', $date);
        return $d && $d->format('d-m-Y') === $date;
    }

    public function save() {
        $i = $this->input;
        $tipe = $msisdn = null;

        if ($i->post() != null) {
            if ($i->post('msisdn_telkomsel') != null) {
                $msisdn = $i->post('msisdn_telkomsel');
                $tipe = 1;
            }

            if ($i->post('msisdn_telkom') != null) {
                $msisdn = $i->post('msisdn_telkom');
                $tipe = 2;
            }

            $data = array(
                'msisdn' => $msisdn,
                'type' => $tipe,
                'date' => time()
            );

            $this->db->insert('vc', $data);
            redirect(site_url('VisitCashier'));
        }
    }

    public function stats() {

        $i = $this->input;

        if ($i->post() != null) {
            $tanggal = explode(" - ", $i->post('tanggal_range'));

            if ($this->validateDate($tanggal[0]) == true) {
                $tanggalA = strtotime(date('d-m-Y 00:00:00', DateTime::createFromFormat("d-m-Y", $tanggal[0])->getTimestamp()));
            }
            if ($this->validateDate($tanggal[1]) == true) {
                $tanggalB = strtotime(date('d-m-Y 23:59:59', DateTime::createFromFormat("d-m-Y", $tanggal[1])->getTimestamp()));
            }

            $where = sprintf(" AND date BETWEEN %s AND %s", $tanggalA, $tanggalB);

            $query1 = sprintf("SELECT * FROM `vc` WHERE type = 1  %s", $where);
            $query2 = sprintf("SELECT * FROM `vc` WHERE type = 2  %s", $where);

            $data['d1'] = $this->db->query($query1);
            echo $this->db->last_query();
            $data['d2'] = $this->db->query($query2);


            $data['tanggal'] = $tanggal;
        }


        $data['v'] = 'visitcashier/form_laporan.php';
        $this->load->view('init', $data);
    }

    public function index() {
        $d2 = $this->db;
        $d2->where('type', 2);
        $d2->where('date >', strtotime(date('Y-m-d 00:00:00', time())));
        $d2->where('date <', strtotime(date('Y-m-d 23:59:00', time())));
        $data['d2'] = $d2->get('vc');

        $d1 = $this->db;
        $d1->where('type', 1);
        $d1->where('date >', strtotime(date('Y-m-d 00:00:00', time())));
        $d1->where('date <', strtotime(date('Y-m-d 23:59:00', time())));
        $data['d1'] = $d1->get('vc');

        $data['v'] = 'visitcashier/form.php';
        $this->load->view('init', $data);
    }

}
