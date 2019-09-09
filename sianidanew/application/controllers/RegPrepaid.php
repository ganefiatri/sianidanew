<?php

defined('BASEPATH') OR exit('No direct script access allowed');
//require getcwd() . '/vendor/autoload.php';
//
//use Spipu\Html2Pdf\Html2Pdf;

class RegPrepaid extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->helper('url');
        $this->load->library('session');
        $this->load->model('Auth_model');
        $this->load->model('User_model');
        $this->load->model('Logbook_model');
        $this->load->model('RegistrasiPre_model');

        function validateDate($date) {
            $d = DateTime::createFromFormat('m/d/Y', $date);
            return $d && $d->format('m/d/Y') === $date;
        }

    }

    public function simpannomor() {
        $i = $this->input;

        $msisdn = array();
        $x = 1;
        while ($x <= 30) {
            if ($_POST['msisdn_' . $x] != null) {
                $msisdn[] = $_POST['msisdn_' . $x];
            }
            $x++;
        }

        var_dump($msisdn);
        redirect(site_url('regprepaid/detail/' . $this->RegistrasiPre_model->simpan_msisdn($i->post('id'), $msisdn)));
    }

    public function detail($x) {
        $id = $this->uri->segment(3, 0);
        $where = array('id' => $id);
        $registrasi = $data['registrasi'] = $this->RegistrasiPre_model->get_data(array('id' => $x))->result()[0];
        $msisdn = $data['msisdn'] = $this->RegistrasiPre_model->get_data_msisdn($x)->result();

        $data['addrbyktp'] = $addrbyktp = explode('|', $registrasi->addrbyktp);
        $data['addr'] = $addr = explode('|', $registrasi->addr);
        $this->load->view('registrasipre/detail', $data);
    }

    public function index() {
        $offset = null;
        if ($this->uri->segment(3, 0) != null) {
            $offset = $this->uri->segment(3, 0);
        };
        $logbook = array();
        $logbook[0] = $this->db->where('c_t !=', 9)->order_by('WAKTU', 'DESC')->get('regprepaid');
        $data['logbook'] = $logbook;
        $this->load->view('registrasipre/list', $data);
    }

    public function sign() {
        $i = $this->input;
        $this->db->where('id', $i->post('id'));
        $this->db->update('regprepaid', array('digital_sign' => $i->post('output')));
        redirect(site_url('regprepaid/detail/' . $i->post('id')));
    }

    public function baru($x, $y) {
        $i = $this->input;
        if ($i->post() != null) {
            var_dump($i->post());
            $alamat_ktp = sprintf('%s|%s|%s|%s', $i->post('ktpalamat'), $i->post('ktpzip'), $i->post('ktpkota'), $i->post('ktpprovinsi'));
            $alamat = sprintf('%s|%s|%s|%s', $i->post('alamat'), $i->post('zip'), $i->post('kota'), $i->post('provinsi'));
            $tipe = null;
            if ($i->post('type') != null) {
                $tipe = $i->post('type');
            }

            $data = array('waktu' => time(),
                'author' => $this->ion_auth->user()->row()->id,
                'nama' => $i->post('nama'),
                'ktp' => $i->post('ktp'),
                'kk' => $i->post('kk'),
                'addrbyktp' => $alamat_ktp,
                'addr' => $alamat,
                'birthplace' => $i->post('tempatlahir'),
                'birthdate' => DateTime::createFromFormat("m/d/Y", $i->post('tanggallahir'))->getTimestamp(),
                'nationality' => $i->post('nationality'),
                'ktplifetime' => $i->post('lifetime'),
                'type' => $tipe,
                'statement' => $i->post('statement')
            );
            echo '<hr>';
            redirect(site_url('regprepaid/detail/' . $this->RegistrasiPre_model->simpan($data)));
            //redirect();
        }
        $data['val'] = $x;
        $data['val_lifetime'] = $y;
        $data['v'] = 'Registrasipre/new.php';
        $this->load->view('init', $data);
    }

    public function create() {
        $i = $this->input;
        if ($i->post('ktp') != null) {

            if ($i->post('lifetime_u')) {
                $date = 'unlimited';
            } else {
                $date = DateTime::createFromFormat("m/d/Y", $i->post('lifetimedate'))->getTimestamp();
            }
            if ($this->RegistrasiPre_model->get_data(array('ktp' => $i->post('ktp')))->row() == null) {
                redirect(site_url(sprintf('regPrepaid/baru/%s/%s', $i->post('ktp'), $date)));
                //redirect(site_url('regPrepaid/detail/' . $this->RegistrasiPre_model->get_data(array('ktp' => $i->post('ktp')))->row()->id));
            } else {
                redirect(site_url(sprintf('regPrepaid/baru/%s/%s', $i->post('ktp'), $date)));
                //redirect(site_url('regPrepaid/detail/' . $this->RegistrasiPre_model->get_data(array('ktp' => $i->post('ktp')))->row()->id));
            }
        }
//        $data['v'] = '.php';
        $this->load->view('registrasipre/inputktp');
    }

    public function r_print($x) {
        $html2pdf = $data['html2pdf'] = new Html2Pdf();
        $registrasi = $data['registrasi'] = $this->db->get_where('regprepaid', array('id' => $x))->row();
        $msisdn = $data['msisdn'] = $this->RegistrasiPre_model->get_data_msisdn($x)->result();
        $data['print'] = true;
        $data['logbook'] = $registrasi;
        $data['addrbyktp'] = $addrbyktp = explode('|', $registrasi->addrbyktp);
        $data['addr'] = $addr = explode('|', $registrasi->addr);
        $this->load->view('registrasipre/registrasi_print', $data);
    }

    public function test($x) {
        $registrasi = $data['registrasi'] = $this->db->get_where('regprepaid', array('id' => $x))->row();
        $msisdn = $data['msisdn'] = $this->RegistrasiPre_model->get_data_msisdn($x)->result();
        $data['print'] = true;
        $data['logbook'] = $registrasi;
        $data['addrbyktp'] = $addrbyktp = explode('|', $registrasi->addrbyktp);
        $data['addr'] = $addr = explode('|', $registrasi->addr);
        $pdf = new \Mpdf\Mpdf();
        $pdf->SetHTMLHeader('<img src="' . base_url("assets/header_232.jpg") . '"/>');
        $pdf->AddPage('', // L - landscape, P - portrait
                '', '', '', '', 5, // margin_left
                5, // margin right
                20, // margin top
                30, // margin bottom
                0, // margin header
                0); // margin footer
        $pdf->WriteHTML($this->load->view('registrasipre/registrasi_pdf', $data, true));
        $pdf->Output();
    }

    public function hapus() {
        $uri = $this->uri->segment(3.0);
        if ($uri != null) {
            $this->db->where('id', $uri);
            $this->db->update('regprepaid', array('c_t' => 9));
            redirect(site_url('regprepaid'));
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
