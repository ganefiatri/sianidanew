<?php

class BreakTime extends CI_Controller {

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

//$this->Auth_model->authorization($this->session->userdata('role'));
//$this->Auth_model->login_info();
        function validateDate($date) {
            $d = DateTime::createFromFormat('d F Y - H:i', $date);
            return $d && $d->format('d F Y - H:i') === $date;
        }

    }

    public function hapus($x) {
        $this->db->delete('breaktime', array('id' => $x));
        redirect(site_url('laporan'));
    }

    public function index() {

    }

    public function stop() {
        $today = date('Y-m-d 00:00:00', time());
        $todaytimestamp = DateTime::createFromFormat('Y-m-d H:i:s', $today);
        $todaytimestamp = $todaytimestamp->getTimestamp();
        $x = $this->db->get_where('breaktime', array('time' => $todaytimestamp, 'author' => $this->ion_auth->user()->row()->id));
        var_dump($x->row());
        if ($x->row()->start > 0 AND $x->row()->end == 0) {
            $this->db->where('author', $this->ion_auth->user()->row()->id);
            $this->db->where('time', $todaytimestamp);
            $this->db->update('breaktime', array('end' => time()));
        }
        redirect('dashboard');
    }

    public function start() {
        $today = date('Y-m-d 00:00:00', time());
        $todaytimestamp = DateTime::createFromFormat('Y-m-d H:i:s', $today);
        $todaytimestamp = $todaytimestamp->getTimestamp();
        $x = $this->db->get_where('breaktime', array('time' => $todaytimestamp, 'author' => $this->ion_auth->user()->row()->id));

        if ($x->row() == null)
            $this->db->insert('breaktime', array(
                'time' => $todaytimestamp,
                'author' => $this->ion_auth->user()->row()->id,
                'start' => time()));
        redirect(base_url());
    }

}
