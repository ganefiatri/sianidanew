<?php

class MediaManager extends CI_Controller {
	
 	function __construct() {
        parent::__construct();
        $this->load->helper('url');
	}
        
        
        public function index(){
            $data['v'] = 'recording/dashboard';
            $this->load->view('init', $data);
        }

        public function media_browser(){
            $data= null;
            $this->load->view('mediamanager/media_browser.php', $data);
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
