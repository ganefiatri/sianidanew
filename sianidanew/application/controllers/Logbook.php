<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Logbook extends CI_Controller {

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

    public function plcsr(){
        if ($this->input->post() != null) {

            if ($this->ion_auth->user()->row()->id == null) {
                redirect(site_url('user/login?onsaveLoggedout'));
            }


            $i = $this->input;

            $data = array(
                'date' => time(),
                'csname' => $i->post('csnameform'),
                'topik_layanan' => $i->post('topik'),
            );
            $this->db->insert('logbook', $data);
            redirect(site_url('logbook/plcsrView2.php'));
        } else {
            $query = sprintf("SELECT author FROM `logbook`  GROUP BY author");
            $data['starla'] = $this->db->query($query);
            redirect('Logbook/plcsr2', $data);
        }
    }

    public function plcsr2(){
        $data['v'] = 'logbook/plcsrView2.php';
        $this->load->view('init', $data);
    }

    public function esign(){
        $this->load->view('logbook/esignView');
    }

    public function penutupan_simpan() {
        $adaptor = $remote = $kabel = false;
        $i = $this->input;
        if ($i->post('remote') != null) {
            $remote = 1;
        }
        if ($i->post('kabel') != null) {
            $kabel = 1;
        }
        if ($i->post('adaptor') != null) {
            $adaptor = 1;
        }


        $data = array(
            "id_workbook" => $i->post('workbook_id'),
            "jenis_modem" => $i->post('jenis_modem'),
            "serial_number" => $i->post('serial_number'),
            "alamat" => $i->post('alamat'),
            "remote" => $remote,
            "kabel" => $kabel,
            "adaptor" => $adaptor,
            "tanggal" => time(),
            "merk_stb" => $i->post('merk_stb'),
            "sn_stb" => $i->post('stb_serial_number')
        );


        $this->db->insert('penutupan', $data);
        redirect('logbook/detail/' . $data['id_workbook']);
    }

    public function telkom_report() {
        $logbook = $this->Logbook_model->get_all_logbook(2, null, null, null, 0);
        $data['logbook'] = $logbook[0];
        $this->load->view('report_xls.php', $data);
    }

    public function bast_sign() {
        $i = $this->input;
        $this->db->where('id_workbook', $i->post('id'));
        $this->db->update('penutupan', array('digital_sign2_true' => 1,'digital_sign2' => $i->post('output')));
        redirect(site_url('logbook/detail/' . $i->post('id')));
    }

    public function mbanking(){
        $data['v'] = 'ceklistcard/formcard';
        $this->load->view('init',$data);
    }

    public function bast() {
        $offset = $contain = null;
        if ($this->uri->segment(3, 0) != null) {
            $offset = $this->uri->segment(3, 0);
        };

        if (isset($_GET['no'])) {
            $contain = $_GET['no'];
        }
        if ($this->ion_auth->get_users_groups()->row()->id == 1) {
            $logbook = $this->Logbook_model->get_all_logbook(2, null, $contain, array(20, $offset), null, 'BAST PENUTUPAN INDIHOME');
        } else {
            $logbook = $this->Logbook_model->get_all_logbook(2, $this->ion_auth->user()->row()->id, $contain, array(20, $offset), null, 'BAST PENUTUPAN INDIHOME');
        }

        $config['base_url'] = site_url('logbook/bast');
        $config['total_rows'] = $logbook[1];
        $config['per_page'] = 20;
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


        $this->pagination->initialize($config);
        $data['logbook'] = $logbook[0];
        $data['page_title'] = 'WorkBook Telkom / BAST';
        $data['v'] = 'logbook/listtelkom.php';
        $this->load->view('init', $data);
    }

    public function psbtelkomsel() {
        $this->load->view('logbook/listtelkomselpsb');
    }

    public function exportpsbtelkomsel() {
        $logbook = $this->Logbook_model->get_all_listing();
        $data['logbook'] = $logbook;
        $this->load->view('logbook/exportlisttelkomselpsb.php', $data);
    }

    public function gantipakettelkomsel() {
        $data['v'] = 'logbook/listtelkomselgantipaket.php';
        $this->load->view('init', $data);
    }

    public function listbast() {
        $this->load->view('logbook/list_bast');
    }

//    public function listbast(){
//        $data['bast'] = $bast = $this->Logbook_model->get_all_bast();
//        $data['v'] = 'logbook/listbastmanual.php';
//        $this->load->view('init', $data);
//    }

    public function telkom2() {
        $this->load->view('logbook/listtelkom2');
    }

    // public function croselling() {
    //     $data['v'] = 'logbook/croselling.php';
    //     $this->load->view('init', $data);
    // }

    public function telkom() {

        $param = $sort = $offset = $contain = null;
        $param = '?';
        $order = 'DESC';
        if (isset($_GET['sort'])) {
            $sort = $_GET['sort'];
        }
        if (isset($_GET['order'])) {
            $order = $_GET['order'];
        }

        if (isset($_GET['per_page'])) {
            $offset = $_GET['per_page'];
        }

        if (isset($_GET['no'])) {
            $contain = $_GET['no'];
            $param .= sprintf('no=%s&', $contain);
        }
        $param .= 'telkom=true';

        if ($this->ion_auth->get_users_groups()->row()->id == 1) {
            $logbook = $this->Logbook_model->get_all_logbook(2, null, $contain, array(20, $offset), null, null, array($sort, $order));
        } else {
            $logbook = $this->Logbook_model->get_all_logbook(2, $this->ion_auth->user()->row()->id, $contain, array(20, $offset), null, null, array($sort, $order));
        }


        $config['base_url'] = site_url('logbook/telkom' . $param);

        $config['total_rows'] = $logbook[1];
        $config['per_page'] = 20;
        $config['page_query_string'] = TRUE;
        $config['enable_query_strings'] = TRUE;
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


        $this->pagination->initialize($config);
        $data['logbook'] = $logbook[0];
        $data['page_title'] = 'WorkBook Telkom';
        $data['v'] = 'logbook/listtelkom.php';
        $this->load->view('init', $data);
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

    }

    public function telkomsel2() {
        $data['page_title'] = 'WorkBook Telkomsel';
        $this->load->view('logbook/list2', $data);
    }

    public function telkomsel() {
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
        $data['page_title'] = 'WorkBook Telkomsel';
        $data['v'] = 'logbook/list.php';

        $this->load->view('init', $data);
    }

    public function edit() {
        $i = $this->input;
        $logbook = $data['logbook'] = $this->db->get_where('logbook', array('id' => $this->uri->segment(3, 0)))->row();
        if ($i->post() == NULL) {
            $this->load->view('logbook/edit', $data);
        } else {
            if ($this->ion_auth->user()->row()->id == null) {
                redirect(site_url('user/login?onsaveLoggedout'));
            }

            if ($logbook->tipe == 1) {
                $rev = preg_replace('/[^0-9]/', '', $i->post('rev'));
                $data = array(
                    'kronologis' => $i->post('Kronologis'),
                    'nama_plgn' => $i->post('msisdn_name'),
                    'revenue' => $rev,
                    'msisdn' => $i->post('msisdn_number')
                );
            }
            if ($logbook->tipe == 2) {
                $revtelkom = preg_replace('/[^0-9]/', '', $i->post('revtelkom'));
                $data = array(
                    'kronologis' => $i->post('Kronologis'),
                    'status' => $i->post('options'),
                    'internet_no' => $i->post('internet_no'),
                    'msisdn' => $i->post('msisdn_number'),
                    'no_telp' => $i->post('no_telp'),
                    'ndem_no' => $i->post('ndem_no'),
                    'revenuetelkom' => $revtelkom,
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

    public function create() {
        if ($this->input->post() != null) {

            if ($this->ion_auth->user()->row()->id == null) {
                redirect(site_url('user/login?onsaveLoggedout'));
            }


            $i = $this->input;

            //$rev = preg_replace('/\D/', '', );
            $rev = preg_replace('/[^0-9]/', '', $i->post('rev'));
            $revtelkom = preg_replace('/[^0-9]/', '', $i->post('revtelkom'));
            $data = array(
                'no_telp' => $i->post('no_telp'),
                'case_type' => $i->post('ccase'),
                'date' => time(),
                'author' => $this->ion_auth->user()->row()->id,
                'tipe' => $i->post('ctype'),
                'nama_plgn' => $i->post('msisdn_name'),
                'msisdn' => $i->post('msisdn_number'),
                'kronologis' => $i->post('Kronologis'),
                'revenue' => $rev,
                'internet_no' => $i->post('internet_no'),
                'ndem_no' => $i->post('ndem_no'),
                'tiket_no' => $i->post('tiket_no'),
                'indihome_alasan_tutup' => $i->post('alasantutup'),
                'jenis_product' => $i->post('jenisproduct'),
                'revenuetelkom' => $revtelkom,
                'antrian' => $i->post('antrian'),
                'antrian_hp' => $i->post('antrian_hp'),
                'paketlama' => $i->post('paket_lama'),
                'paketbaru' => $i->post('paket_baru'),
                'halopaket' => $i->post('halo'),
            );

            if ($i->post('status') != null) {
                $data['status'] = $i->post('status');
            }
            $this->db->insert('logbook', $data);
            $redir = 'logbook/telkomsel2';
            if ($data['case_type'] == "PSB HALO") {
                $redir = 'logbook/psbtelkomsel';
            }
            if ($data['tipe'] == 2) {
                $redir = 'logbook/telkom2';
                if (strtoupper($data['case_type']) == "BAST PENUTUPAN INDIHOME")
                    $redir = 'logbook/detail/' . $this->db->insert_id();
            }
            redirect(site_url($redir));
        } else {
            $data['page_title'] = 'Form Telkom';
            $this->load->view('logbook/new', $data);
        }
    }

    public function bast_print() {

        $logbook = $data['logbook'] = $this->db->get_where('logbook', array('id' => $this->uri->segment(3, 0)))->row();
        $penutupan = null;
        if (strtoupper($logbook->case_type) == 'BAST PENUTUPAN INDIHOME') {
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

        if (strtoupper($logbook->case_type) == 'BAST PENUTUPAN INDIHOME') {
            $penutupan = $this->db->get_where('penutupan', array('id_workbook' => $this->uri->segment(3, 0)))->row();
        }

        $data['penutupan'] = $penutupan;
        $this->load->view('logbook/detail', $data);
    }

}

