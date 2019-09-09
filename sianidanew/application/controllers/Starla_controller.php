<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Starla_controller extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->helper('url');
        $this->load->library('session');
        $this->load->model('Auth_model');
        $this->load->model('User_model');
        $this->load->model('Logbook_model');
        $this->load->model('Disclaimer_model');
        $this->load->model('Starla_model');
        function validateDate($date) {
            $d = DateTime::createFromFormat('d F Y - H:i', $date);
            return $d && $d->format('d F Y - H:i') === $date;
        }

    }

    public function insert(){
        if ($this->input->post() != null) {

            if ($this->ion_auth->user()->row()->id == null) {
                redirect(site_url('user/login?onsaveLoggedout'));
            }

            $i = $this->input;

            $data = array(
                'date' => time(),
                'tanggal' => $i->post('tanggal'),
                'author' => $i->post('csnameform'),
                'topik' => $i->post('topik'),
                'petugas' => $i->post('petugas')
            );
            $this->db->insert('starla', $data);
            redirect(site_url('Starla_controller/plcsr_list'));
        }
    }


    public function plcsr_list(){
        $offset = null;
        if ($this->uri->segment(3, 0) != null) {
            $offset = $this->uri->segment(3, 0);
        };

        $data['starla'] = $starla = $this->Starla_model->get_all_starla(array(20, $offset));
        $this->load->view('starla/list', $data);
    }

    public function plcsr(){
        $this->load->view('starla/new');
    }


    public function plcsr2(){
        $id = $this->uri->segment(3, 0);
        $where = array('id' => $id);
        $logbook = $data['starla'] = $this->db->get_where('starla', $where)->result()[0];
        $data['v']='starla/form_nilai.php';
        $this->load->view('init', $data);
    }

    public function insert_nilai(){
        if ($this->input->post() != null) {

            if ($this->ion_auth->user()->row()->id == null) {
                redirect(site_url('user/login?onsaveLoggedout'));
            }
            $i = $this->input;
            $this->db->where('id', $i->post('id'));
            $this->db->update('starla', array(
                'info' => $i->post('info'),
                'validasi' => $i->post('validasi'),
                'identifikasi' => $i->post('identifikasi'),
                'eskalasi' => $i->post('eskalasi'),
                'dokumentasi' => $i->post('dokumentasi'),
                'selling' => $i->post('selling'),
                'digital' => $i->post('digital'),
                'nego' => $i->post('nego'),
                'gromming' => $i->post('gromming'),
                'uniform' => $i->post('uniform'),
                'greeting' => $i->post('greeting'),
                'intimasi' => $i->post('intimasi'),
                'komunikasi' => $i->post('komunikasi'),
                'survey' => $i->post('survey')
            ));
            redirect(site_url('Starla_controller/insert_view/' . $i->post('id')));
        }
    }

    public function insert_view(){
        $id = $this->uri->segment(3, 0);
        $where = array('id' => $id);
        $logbook = $data['row'] = $this->db->get_where('starla', $where)->result()[0];
        $this->load->view('starla/insert_v', $data);
    }

    public function total_nilai(){
        $i = $this->input;
        $this->db->where('id', $i->post('id'));
        $this->db->update('starla', array(
            'total' => $i->post('total')
        ));
        redirect(site_url('Starla_controller/plcsr_list/' . $i->post('id')));
    }
    function validateDate($date) {
        $d = DateTime::createFromFormat('m/d/Y', $date);
        return $d && $d->format('m/d/Y') === $date;
    }

        public function report_starla() {
            $i = $this->input;

            if ($i->post() != null) {
                $tanggal = explode(" - ", $i->post('tanggal_range'));

                if ($this->validateDate($tanggal[0]) == true) {
                    $tanggalA = DateTime::createFromFormat("m/d/Y H:i:s", $tanggal[0] . '00:00:00')->getTimestamp();
                }
                if ($this->validateDate($tanggal[1]) == true) {
                    $tanggalB = DateTime::createFromFormat("m/d/Y H:i:s", $tanggal[1] . '23:59:59')->getTimestamp();
                }
                $where = sprintf(" date BETWEEN %s AND %s", $tanggalA, $tanggalB);
                $query = sprintf("select * FROM `starla` WHERE %s", $where);
                $data['lap_starla'] = $this->db->query($query);

                $data['tanggal'] = $tanggal;
            }

            $data['v'] = 'starla/form_report.php';
            $this->load->view('init', $data);
        }

    public function hapus() {
        $uri = $this->uri->segment(3.0);
        if ($uri != null) {
            $this->db->where('id', $uri);
            $this->db->delete('starla');
            redirect(site_url('Starla_controller/plcsr_list'));
        }
    }
 }


