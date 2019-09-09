<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Test extends CI_Controller {

    public function testajah(){
        $this->load->view('coba/coba1.php');
    }

    public function timer(){
        $this->load->view('test/timer1.php');
    }
}