<?php

class Dashboard extends CI_Controller {

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

    public function index() {

        if ($this->ion_auth->get_users_groups()->row()->id == 3) {
            redirect(site_url('VisitCashier'));
            exit();
        };

        $data['content_wrapper_css'] = // sprintf('background-img="%s"', base_url('assets/dashboard-hero.jpg'));
                $data['content_wrapper_css'] = sprintf('background-image: url(%s);background-size:cover;', base_url('assets/digitalbg.png'));
        $data['v'] = 'dashboard.php';
        $data['template_footer'] = false;
        $this->load->model('Logbook_model');
        $data['daily_revenue'] = $this->Logbook_model->get_my_total_revenues($this->ion_auth->user()->row()->id, 'daily');
        $data['monthly_revenue'] = $this->Logbook_model->get_my_total_revenues($this->ion_auth->user()->row()->id, 'monthly');
        $data['year_revenue'] = $this->Logbook_model->get_my_total_revenues($this->ion_auth->user()->row()->id, 'year');
        $data['total_revenue'] = $this->Logbook_model->get_my_total_revenues($this->ion_auth->user()->row()->id, 'total');
        $this->load->view('init', $data);
    }

}
