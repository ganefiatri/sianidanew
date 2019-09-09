<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class ReaktivasiKartuHalo extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->helper('url');
        $this->load->library('session');
        $this->load->model('Auth_model');
        $this->load->model('User_model');
        $this->load->model('Logbook_model');
        $this->load->model('Disclaimer_model');

//$this->Auth_model->authorization($this->session->userdata('role'));
//$this->Auth_model->login_info();
        function validateDate($date) {
            $d = DateTime::createFromFormat('d F Y - H:i', $date);
            return $d && $d->format('d F Y - H:i') === $date;
        }

    }

    public function detail() {
        $id = $this->uri->segment(3, 0);
        $where = array('id' => $id);
        $logbook = $data['logbook'] = $this->db->get_where('reaktivasi_kartuhalo', $where)->result()[0];
        $this->load->view('reaktivasi/detail', $data);
    }

    public function index() {
        $offset = null;
        if ($this->uri->segment(3, 0) != null) {
            $offset = $this->uri->segment(3, 0);
        };

        $data['logbook'] = $logbook = $this->Logbook_model->get_all_reaktivasi(array(20, $offset));
        $this->load->view('reaktivasi/list', $data);
    }

    public function sign() {
        $i = $this->input;
        $this->db->where('id', $i->post('id'));
        $this->db->update('reaktivasi_kartuhalo', array('digital_sign' => $i->post('output')));
        redirect(site_url('ReaktivasiKartuHalo/detail/' . $i->post('id')));
    }

    public function create() {
        $this->load->view('reaktivasi/form');
    }

    public function r_print() {
        $logbook = $data['logbook'] = $this->db->get_where('reaktivasi_kartuhalo', array('id' => $this->uri->segment(3, 0)))->row();

        $data['print'] = true;
        $data['logbook'] = $logbook;

        $this->load->view('reaktivasi/reaktivasi_print', $data);
    }

    public function hapus() {
        $uri = $this->uri->segment(3.0);
        if ($uri != null) {
            $this->db->where('id', $uri);
            $this->db->update('reaktivasi_kartuhalo', array('c_t' => 9));
            redirect(site_url('ReaktivasiKartuHalo'));
        }
    }

    public function submit() {
        $i = $this->input;
        var_dump($i->post());
        $data = array('nama' => $i->post('msisdn_name'),
            'msisdn' => $i->post('msisdn_number'),
            'waktu' => time(),
            'col1_1' => $i->post('col1_1'),
            'col1_2' => $i->post('col1_2'),
            'col1_3' => $i->post('col1_3'),
            'col1_4' => $i->post('col1_4'),
            'col1_5' => $i->post('col1_5'),
            'col1_6' => $i->post('col1_6'),
            'col2_1' => $i->post('col2_1'),
            'col2_2' => $i->post('col2_2'),
            'col2_3' => $i->post('col2_3'),
            'col2_4' => $i->post('col2_4'),
            'col2_5' => $i->post('col2_5'),
            'col2_6' => $i->post('col2_6'),
            'author' => $this->ion_auth->user()->row()->id
        );

        $this->db->insert('reaktivasi_kartuhalo', $data);
        redirect("ReaktivasiKartuHalo/detail/" . $this->db->insert_id());
    }

}
