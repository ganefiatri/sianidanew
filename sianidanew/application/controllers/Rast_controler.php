<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Rast_controler extends CI_Controller {

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
        $logbook = $data['logbook'] = $this->db->get_where('rast', $where)->result()[0];
        $this->load->view('rast/detail_view', $data);
    }

    public function index() {
        $offset = null;
        if ($this->uri->segment(3, 0) != null) {
            $offset = $this->uri->segment(3, 0);
        };

        $data['logbook'] = $logbook = $this->Logbook_model->get_all_rast(array(20, $offset));
        $this->load->view('rast/list_view', $data);
    }


    public function sign() {
        $i = $this->input;
        $this->db->where('id', $i->post('id'));
        $this->db->update('rast', array('digital_sign' => $i->post('output')));
        redirect(site_url('rast/list_view/' . $i->post('id')));
    }

    public function create() {

        $data['v'] = 'rast/new_form.php';
        $this->load->view('init', $data);
    }

    public function r_print() {
        $logbook = $data['logbook'] = $this->db->get_where('rast', array('id' => $this->uri->segment(3, 0)))->row();

        $data['print'] = true;
        $data['logbook'] = $logbook;

        $this->load->view('rast/bash_print', $data);
    }

    public function hapus() {
        $uri = $this->uri->segment(3.0);
        if ($uri != null) {
            $this->db->where('id', $uri);
            $this->db->delete('rast');
            redirect(site_url('rast_controler'));
        }
    }

   public function new(){
        if ($this->input->post() != null) {

            if ($this->ion_auth->user()->row()->id == null) {
                redirect(site_url('user/login?onsaveLoggedout'));
            }


            $i = $this->input;


            var_dump($i->post());
            //$rev = preg_replace('/\D/', '', );
            $adjdate = DateTime::createFromFormat('d/m/Y', $i->post('Adjustmentdate'));
            $data = array(
                'nofastel' => $i->post('nofastel'),
                'date' => time(),
                'author' => $this->ion_auth->user()->row()->id,
                'namaplgn' => $i->post('namaplgn'),
                'alamat' => $i->post('alamat'),
                'rekomendasi' => $i->post('rekomendasi'),
                'permasalahan' => $i->post('permasalahan'),
                'kesimpulan' => $i->post('kesimpulan'),
                'adjustmentdate' => $adjdate->format('U'),
                'adjustmentval' => preg_replace('/[^0-9]/', '', $i->post('Adjustmentval'))
            );

            $this->db->insert('rast', $data);
            
            $redir = 'rast';
            
            redirect(site_url($redir));
        } else {

            $data['page_title'] = 'New Restitusi / Tiketing';
            $data['v'] = 'rast/new_form.php';
            $this->load->view('init', $data);
        }
    }

}
