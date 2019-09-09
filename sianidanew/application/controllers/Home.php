<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

    /**
     * Index Page for this controller.
     *
     * Maps to the following URL
     * 		http://example.com/index.php/welcome
     * 	- or -
     * 		http://example.com/index.php/welcome/index
     * 	- or -
     * Since this controller is set as the default controller in
     * config/routes.php, it's displayed at http://example.com/
     *
     * So any other public methods not prefixed with an underscore will
     * map to /index.php/welcome/<method_name>
     * @see https://codeigniter.com/user_guide/general/urls.html
     */
    function __construct() {
        parent::__construct();
        $this->load->helper('url');
        $this->load->library('session');
        $this->load->model('Auth_model');
        $this->load->model('User_model');
        $this->load->model('Disclaimer_model');
        $this->load->model('Logbook_model');

        //$this->Auth_model->authorization($this->session->userdata('role'));
        //$this->Auth_model->login_info();
        function validateDate($date) {
            $d = DateTime::createFromFormat('d F Y - H:i', $date);
            return $d && $d->format('d F Y - H:i') === $date;
        }

    }

    public function index() {
        $data['page_title'] = 'Form Disclaimer';
        $data['v'] = 'welcome_message.php';
        $this->load->view('init', $data);
    }

    public function NewForm() {
        $data['page_title'] = 'New Form';
        $data['v'] = 'form_disclaimer/newform.php';
        $this->load->view('init', $data);
    }

    public function FormRead() {
        $data['data'] = $this->db->get_where('form_disclaimer', array('id' => $this->uri->segment(3, 0)))->row();
        $data['template_head'] = $data['template_footer'] = $data['template_body'] = $data['template_header'] = false;

        $data['v'] = 'form_disclaimer/formsign.php';
        $this->load->view('init', $data);
    }

    public function delete_disclaimer($x) {
        if ($x != null) {
            $this->db->where('id', $x);
            $this->db->update('form_disclaimer', array('rowstat' => 9));
            redirect(site_url('home'));
        }
    }

    public function FormSign() {

        if ($this->input->post('output') != NULL) {
            $i = $this->input;
            $data = array(
                'msisdn' => $i->get('msisdn_number'),
                'msisdn_name' => $i->get('msisdn_name'),
                'msisdn_nik' => $i->get('nomor_induk'),
                'msisdn_alamat' => $i->get('alamat') . '<br>' . urldecode($i->get('alamat2')) . '<br>' . urldecode($i->get('alamat3')),
                'msisdn_nomorkk' => $i->get('nkk'),
                'msisdn_tempatlahir' => urldecode($i->get('tempat_lahir')),
                'msisdn_tanggallahir' => urldecode($i->get('tanggal_lahir')),
                'digital_sign' => $i->post('output'),
                'date' => time(),
                'author' => $this->ion_auth->user()->row()->id
            );

            $this->db->insert('form_disclaimer', $data);
            redirect(site_url('home/FormRead/' . $this->db->insert_id()));
        } else {

            $data['template_head'] = $data['template_footer'] = $data['template_body'] = $data['template_header'] = false;

            $data['v'] = 'form_disclaimer/formsign.php';
            $this->load->view('init', $data);
        }
    }

}
