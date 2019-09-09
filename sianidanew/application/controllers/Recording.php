<?php

class Recording extends CI_Controller {
	
 	function __construct() {
        parent::__construct();
        $this->load->helper('url');
	}
        
        
        public function index(){
            $query = $this->db->get_where('recording_case', array('type' => 1), 10, 0);
            $data['cases'] = $query->result();
            $data['v'] = 'recording/dashboard';
            $this->load->view('init', $data);
        }
        
        


        public function detail(){
            echo $this->uri->segment(4,0);
            $query = $this->db->get_where('recording_case', array('post_id' => $this->uri->segment(3.0)), 10, 0);
            $data['case']= $query->row();
            $data['v'] = 'recording/detail'; 
            $this->load->view('init', $data);
        }
        
        public function summary(){
            $query = $this->db->get_where('recording_case', array('post_id' => $this->uri->segment(3.0)), 10, 0);
            $data['case']= $query->row();
            $this->load->view('recording/detail.php', $data);
        }

        public function newcase(){
            $data['v'] = 'recording/new_case';
            $this->load->view('init', $data);
        }
        public function post_case(){
            var_dump($_POST);
            //strtotime("")

            $data_insert = array(
                    "title"     => $this->input->post('judul'),
                    "type"      => 1,
                    "timestamp" => time(),
                    "status"    => 1,
                    "userid"    => $this->ion_auth->user()->row()->id,
                    "post"      => $this->input->post('case'),
                    "rec_msisdn"      => $this->input->post('msisdn'),
                    "rec_time_start"    => $this->input->post('startdate'),
                    "rec_time_end"    => $this->input->post('enddate'),
                    "rec_login_agent"    => $this->input->post('login_agent'),
                    "parent_post"    => NULL
            );

            $this->db->insert('recording_case',$data_insert);

        }
        public function upload() {
            echo 'xxx';
            var_dump($_POST);
            var_dump($_FILES);
            $this->load->library('ftp');
            $time = time();
        $filename = md5($_FILES["file"]["name"].$time).'.wav';
            
        $config['hostname'] = '192.168.18.6';
        $config['username'] = 'infratel';
        $config['password'] = 'telkomsel';
        $config['debug']        = TRUE;
          
        $this->ftp->connect($config);

        $this->ftp->upload($_FILES["file"]["tmp_name"], '/public_html/arec/'.$filename, 'ascii', 0775);
    
        $this->ftp->close();
        }
}
