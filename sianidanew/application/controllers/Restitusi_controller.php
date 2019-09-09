<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Restitusi_controller extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->helper('url');
        $this->load->library('session');
        $this->load->model('Auth_model');
        $this->load->model('User_model');
        $this->load->model('Disclaimer_model');
        $this->load->model('Logbook_model');
        $this->load->model('Mbanking_model');
        $this->load->model('Restitusi_model');
        $this->load->model('Mbanking_model', '', TRUE);
        $this->load->helper(array('form', 'url'));

        function validateDate($date) {
            $d = DateTime::createFromFormat('d F Y - H:i', $date);
            return $d && $d->format('d F Y - H:i') === $date;
        }

    }

    public function index() {
        if ($this->input->post() != null) {

            if ($this->ion_auth->user()->row()->id == null) {
                redirect(site_url('user/login?onsaveLoggedout'));
            }
            $i = $this->input;

            $data = array(
                'jenis_lap' => $i->post('jenis_lap'),
                'nama_pelanggan' => $i->post('nama_pelanggan'),
                'nama_pelapor' => $i->post('nama_pelapor'),
                'date' => time(),
                'author' => $this->ion_auth->user()->row()->id,
                'nomor_pelanggan' => $i->post('nomor_pelanggan'),
                // 'author_sign' => $i->post('author_sign'),
                'relasi' => $i->post('relasi'),
                'nominal' => $i->post('nominal'),
                'nominal_text' => $i->post('nominal_text'),
                'jangka_waktu' => $i->post('jangka_waktu'),
                'alasan' => $i->post('alasan'),
                'jenis_masalah' => $i->post('jenis_masalah'),
                'uraian' => $i->post('uraian'),

            );

            $this->db->insert('db_restitusi', $data);
            redirect('Restitusi_controller/restitusi_list', $data);
        } }

    public function restitusi(){
        $this->load->view('restitusi/res_view');
    }

    public function restitusi_list(){
        $offset = null;
        if ($this->uri->segment(3, 0) != null) {
            $offset = $this->uri->segment(3, 0);
        };
        $data['restitusi'] = $this->Restitusi_model->get_restitusi();
        $this->load->view('restitusi/res_list', $data);

    }

    public function res_detail(){
        $id = $this->uri->segment(3, 0);
        $where = array('id' => $id);
        $logbook = $data['res'] = $this->db->get_where('db_restitusi', $where)->result()[0];
        $this->load->view('restitusi/res_detail', $data);
    }

    public function hapus() {
        $uri = $this->uri->segment(3.0);
        if ($uri != null) {
            $this->db->where('id', $uri);
            $this->db->delete('db_restitusi');
            redirect(site_url('Restitusi_controller/restitusi_list'));
        }
    }

    public function restitusi_sign2(){
        if ($this->input->post() != null) {

            if ($this->ion_auth->user()->row()->id == null) {
                redirect(site_url('user/login?onsaveLoggedout'));
            }
            $i = $this->input;
            $this->db->where('id', $i->post('id'));
            $this->db->update('db_restitusi', array('signature_true2' => 1,'author_sign2' => $i->post('output')));
            redirect(site_url('Restitusi_controller/res_detail/' . $i->post('id')));
        }
    }

}