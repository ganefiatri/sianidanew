<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Rast extends CI_Controller {

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

    
    public function hapus() {
        $uri = $this->uri->segment(3.0);
        if ($uri != null) {
            echo $uri;
            $this->db->where('id', $uri);
            $this->db->update('logbook', array('c_t' => 9));
        }
    }

    public function index() {
    $offset = $contain = null;

        if ($this->uri->segment(3, 0) != null) {
            $offset = $this->uri->segment(3, 0);
        };

        if (isset($_GET['no'])) {
            $contain = $_GET['no'];
        }
        if ($this->ion_auth->get_users_groups()->row()->id == 1) {
            $logbook = $this->Logbook_model->get_all_logbook(1, null, $contain, array(20, $offset));
        } else {
            $logbook = $this->Logbook_model->get_all_logbook(1, $this->ion_auth->user()->row()->id, $contain, array(20, $offset));
        }

//pagination
        $config['full_tag_open'] = '<ul class="pagination pagination-sm inline">';
        $config['full_tag_close'] = '</ul>';
        $config['prev_tag_open'] = '<li>';
        $config['prev_tag_close'] = '</li>';
        $config['first_tag_open'] = '<li>';
        $config['first_tag_close'] = '</li>';
        $config['next_tag_open'] = '<li>';
        $config['next_tag_close'] = '</li>';
        $config['last_tag_open'] = '<li>';
        $config['last_tag_close'] = '</li>';
        $config['cur_tag_open'] = '<li><a style="background-color: #eee">';
        $config['cur_tag_close'] = '</a></li>';
        $config['num_tag_open'] = '<li>';
        $config['num_tag_close'] = '</li>';

        $config['base_url'] = site_url('logbook/telkomsel');
        $config['total_rows'] = $logbook[1];
        $config['per_page'] = 20;
        $this->pagination->initialize($config);
        $data['logbook'] = $logbook[0];
        $data['page_title'] = 'BERITA ACARA RESTITUSI & TICKETING';
        $data['v'] = 'rast/list.php';

        $this->load->view('init', $data);
    }

    public function edit() {
        $i = $this->input;

        $logbook = $data['logbook'] = $this->db->get_where('logbook', array('id' => $this->uri->segment(3, 0)))->row();
        if ($i->post() == NULL) {
            $data['v'] = 'logbook/edit.php';

            $this->load->view('init', $data);
        } else {
            if ($this->ion_auth->user()->row()->id == null) {
                redirect(site_url('user/login?onsaveLoggedout'));
            }

            if ($logbook->tipe == 1) {
                $rev = preg_replace('/[^0-9]/', '', $i->post('rev'));
                $data = array(
                    'kronologis' => $i->post('Kronologis'),
                    'nama_plgn'=> $i->post('msisdn_name'),
                    'revenue' => $rev,
                    'msisdn'        => $i->post('msisdn_number')
                );
            }
            if ($logbook->tipe == 2) {
                $data = array(
                    'kronologis' => $i->post('Kronologis'),
                    'status' => $i->post('options'),
                    'internet_no' => $i->post('internet_no'),
                    'ndem_no' => $i->post('ndem_no'),
                    'tiket_no' => $i->post('tiket_no')
                );
            }



            $this->db->where('id', $logbook->id);
            $this->db->update('logbook', $data);

            if ($logbook->tipe == 2) {
                $redir = 'logbook/telkom';
            } elseif ($logbook->tipe == 1) {
                $redir = 'logbook/telkomsel';
            }

var_dump($i->post());
            redirect(site_url($redir));
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
                'no_tiket'=> $i->post('notiket'),
                'jenis_tiket' => $i->post('jenis_tiket'),
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
            
            $redir = 'rast_controler';
            
            redirect(site_url($redir));
        } else {

//            $data['page_title'] = 'New Restitusi / Tiketing';
            $data['page_title'] = 'Klaim / Tiketing';
            $this->load->view('rast/new', $data);
        }
    }

    public function cek(){
        if ($this->input->post() != null) {

            if ($this->ion_auth->user()->row()->id == null) {
                redirect(site_url('user/login?onsaveLoggedout'));
            }
            $i = $this->input;
            $this->db->where('id', $i->post('id'));
            $this->db->update('rast', array('cek' => $i->post('cek')));
            redirect(site_url('Rast_controler/'));
        }
    }

    public function bast_print() {

        $logbook = $data['logbook'] = $this->db->get_where('logbook', array('id' => $this->uri->segment(3, 0)))->row();
        $penutupan = null;
        if (strtoupper($logbook->case_type) == 'BAST PERANGKAT') {
            $penutupan = $this->db->get_where('penutupan', array('id_workbook' => $this->uri->segment(3, 0)))->row();
        }
        $data['print'] = true;
        $data['penutupan'] = $penutupan;
        $data['at'] = array('Tidak Ada', 'Ada');

        $this->load->view('logbook/bast_print', $data);
    }

    public function detail() {
        $logbook = $data['logbook'] = $this->db->get_where('logbook', array('id' => $this->uri->segment(3, 0)))->row();
        $penutupan = null;
        $data['at'] = array('Tidak Ada', 'Ada');
        $data['page_title'] = $data['logbook']->nama_plgn;

        if (strtoupper($logbook->case_type) == 'BAST PERANGKAT') {
            $penutupan = $this->db->get_where('penutupan', array('id_workbook' => $this->uri->segment(3, 0)))->row();
        }

        $data['penutupan'] = $penutupan;
        $data['v'] = 'logbook/detail.php';
        $this->load->view('init', $data);
    }

}
