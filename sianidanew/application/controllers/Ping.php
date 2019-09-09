<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Ping extends CI_Controller {
	
 	function __construct() {
        parent::__construct();
        $this->load->helper('url');
        $this->load->model('User_model');
        $this->load->model('Ping_model');
	}
        
        public function detail()
        {
            $req_time = time();
            if(!isset($this->input->post->timestamp))
            {
                
            }
            $ping_row = $this->Ping_model->get_server_detail($this->uri->segment(3, 0),$req_time);
            if(!empty($ping_row))
            {
                $data['ping_row'] = $ping_row;
            }
            
            $data['userdata'] = $this->User_model->get_user_by_username($this->session->userdata('username'));
            $s = $this->Ping_model->data_server();
            $data['s'] = $s;
            $data['v'] = 'ping/detail';
            $this->load->view('init', $data);            
        }
	
        
        public function widget(){
            $s = $this->Ping_model->data_server();
            echo '<div class="col-md-12">';
            echo sprintf('last refresh %s',date('d-M-Y H:i:s',time())); 
            echo '</div>';
            foreach ($s as $server)
            {
                if(!empty($this->Ping_model->get_last_ping_from($server[0])))
		{
                    $row =$this->Ping_model->get_last_ping_from($server[0]) ;
                    if(strtoupper($row->status) == 'UP'){ $ping_box_status = 'bg-green';}else{ $ping_box_status = 'bg-red';}
		}
            echo sprintf('
                <style>
                .small-box>.inner{
                    padding: 5px 10px;}
                .ping_box_ind{
                    margin: 0;  
        white-space: nowrap;
        overflow: hidden;
        text-align:center;
        text-overflow: ellipsis;
        display: inline-block;
        max-width: 100%%;  }              </style>
<div class="col-lg-3 col-xs-3 no-padding" style="padding: 5px !important;">
          <!-- small box -->
          <div class="small-box %s">
            <div class="inner">
              <h5 class="ping_box_ind">%s<br> %s</h5>
            </div>
            <div class="icon">
              <i class="ion ion-stats-bars"></i>
            </div>
          </div>
            </div>',$ping_box_status,$server[1],date('H:i:s',$row->timestamp));
            }
            
        }
	public function index()
	{
            //$this->Auth_model->authorization($this->session->userdata('role'));
            //$this->Auth_model->login_info();       
            $data['userdata'] = $this->ion_auth->user()->row();
            
            $db_ping = $this->load->database('ping', TRUE);  
            $data['s'] = $this->Ping_model->data_server();
            $data['v'] = 'ping';
            $this->load->view('init', $data);
	}
	public function update()
	{
            $this->db = $this->load->database('ping', TRUE);  	
             $s = $this->Ping_model->data_server();
            foreach ($s as $server)
            {
                    $link = 'down';
                    $output_str = NULL;
                    $command = 'ping -c 2 %s';
                    $output = shell_exec(sprintf($command,$server[1]));
                    $output_str =  $output;
                    $packetLoss = null; 
                    if (preg_match('/([0-9]*\.?[0-9]+)%(?:\s+packet)?\s+loss/', $output, $match) === 1) {
                        $packetLoss = (float)$match[1]; 
                    }
                    if($packetLoss == 0){
                        $link = 'up';
                    }
                    if($output_str == NULL)
                    {
                        $link = 'down';
                        $output_str = 'Not Connected';
                    }
                    
    

                    $data_insert = array(
                            "serverid"		=> $server[0],
                            "timestamp" => time(),
                            "status"		=> $link,
                            "log"			=> $output_str
                    );
                    var_dump($data_insert);
                    $this->db->insert('ping',$data_insert);
                    $output = null;
            }
	}
}
