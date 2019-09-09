<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Registrasi extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->helper('url');
        $this->load->library('session');
        $this->load->model('Auth_model');
        $this->load->model('User_model');
        $this->load->model('Logbook_model');
        $this->load->model('Registrasi_model');

        function validateDate($date) {
            $d = DateTime::createFromFormat('d F Y - H:i', $date);
            return $d && $d->format('d F Y - H:i') === $date;
        }

    }

    public function simpannomor() {
        $i = $this->input;

        $msisdn = array();
        if ($i->post('msisdn_1') != null) {
            $msisdn[] = $i->post('msisdn_1');
        }

        if ($i->post('msisdn_2') != null) {
            $msisdn[] = $i->post('msisdn_2');
        }
        if ($i->post('msisdn_3') != null) {
            $msisdn[] = $i->post('msisdn_3');
        }
        if ($i->post('msisdn_4') != null) {
            $msisdn[] = $i->post('msisdn_4');
        }
        if ($i->post('msisdn_5') != null) {
            $msisdn[] = $i->post('msisdn_5');
        }
        if ($i->post('msisdn_6') != null) {
            $msisdn[] = $i->post('msisdn_6');
        }
        redirect(site_url('registrasi/detail/' . $this->Registrasi_model->simpan_msisdn($i->post('id'), $msisdn)));
    }

    public function detail($x) {
        $id = $this->uri->segment(3, 0);
        $where = array('id' => $id);
        $registrasi = $data['registrasi'] = $this->Registrasi_model->get_data(array('id' => $x))->result()[0];
        $msisdn = $data['msisdn'] = $this->Registrasi_model->get_data_msisdn($x)->result();
        $this->load->view('registrasi/detail', $data);
    }

    public function index() {
        $offset = null;
        if ($this->uri->segment(3, 0) != null) {
            $offset = $this->uri->segment(3, 0);
        };
        $logbook = array();
        $logbook[0] = $this->db->where('c_t !=', 9)->get('registrasi');
        $data['logbook'] = $logbook;
        $this->load->view('registrasi/list.php', $data);
    }

    public function sign() {
        $i = $this->input;
        $this->db->where('id', $i->post('id'));
        $this->db->update('registrasi', array('digital_sign' => $i->post('output')));
        redirect(site_url('registrasi/detail/' . $i->post('id')));
    }

    public function baru($x) {
        $i = $this->input;
        if ($i->post() != null) {
            redirect(site_url('registrasi/detail/' . $this->Registrasi_model->simpan($i->post())));
            //redirect();
        }
        $data['val'] = $x;
        $data['v'] = 'Registrasi/new.php';
        $this->load->view('init', $data);
    }

    public function create() {
        $i = $this->input;
        if ($i->post('ktp') != null) {
            if ($this->Registrasi_model->get_data(array('ktp' => $i->post('ktp')))->row() == null) {
                redirect(site_url('Registrasi/baru/' . $i->post('ktp')));
            } else {
                redirect(site_url('Registrasi/detail/' . $this->Registrasi_model->get_data(array('ktp' => $i->post('ktp')))->row()->id));
            }
        }
        $this->load->view('registrasi/inputktp');
    }

    public function r_print($x) {
        $registrasi = $data['registrasi'] = $this->db->get_where('registrasi', array('id' => $x))->row();
        $msisdn = $data['msisdn'] = $this->Registrasi_model->get_data_msisdn($x)->result();
        $data['print'] = true;
        $data['logbook'] = $registrasi;

        $this->load->view('registrasi/registrasi_print', $data);
    }

    public function hapus() {
        $uri = $this->uri->segment(3.0);
        if ($uri != null) {
            $this->db->where('id', $uri);
            $this->db->update('registrasi', array('c_t' => 9));
            redirect(site_url('registrasi'));
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
