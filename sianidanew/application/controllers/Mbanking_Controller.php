<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Mbanking_controller extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->helper('url');
        $this->load->library('session');
        $this->load->model('Auth_model');
        $this->load->model('User_model');
        $this->load->model('Disclaimer_model');
        $this->load->model('Logbook_model');
        $this->load->model('Mbanking_model');
        $this->load->model('Mbanking_model', '', TRUE);
        $this->load->helper(array('form', 'url'));

        function validateDate($date) {
            $d = DateTime::createFromFormat('d F Y - H:i', $date);
            return $d && $d->format('d F Y - H:i') === $date;
        }

    }

    public function index() {
        if ($this->input->post() != null) {

            if ($this->ion_auth->user()->row()->id == null) {
                redirect(site_url('user/login?onsaveLoggedout'));
            }
        $i = $this->input;

            $data = array(
                'nik' => $i->post('nik'),
                'msisdn' => $i->post('msisdn_name'),
                'date' => time(),
                'author' => $this->ion_auth->user()->row()->id,
                'nama_customer' => $i->post('nama_customer'),
                // 'author_sign' => $i->post('author_sign'),
                'ck1' => $i->post('ck1'),
                'ck2' => $i->post('ck2'),   
                'ck3' => $i->post('ck3'),
                'ck4' => $i->post('ck4'),
                'ck5' => $i->post('ck5'),
                'ck6' => $i->post('ck6'),
                'ck7' => $i->post('ck7'),
                'ck8' => $i->post('ck8'),
                'ck9' => $i->post('ck9'),
                'ck10' => $i->post('ck10'),
                'ck11' => $i->post('ck11'),
                'ck12' => $i->post('ck12'),
                'ck13' => $i->post('ck13'),
                'ck14' => $i->post('ck14'),
                'ck15' => $i->post('ck15'),
                'ck16' => $i->post('ck16'),
                'tipe1' => $i->post('tipe1'),
            );
        
        $this->db->insert('gk_banking', $data);
        redirect('Mbanking_Controller/mbanking_list', $data);
     } }

    public function mbanking(){
        $this->load->view('ceklistcard/formcard');
    }

    public function mbanking_list(){
        $offset = null;
        if ($this->uri->segment(3, 0) != null) {
            $offset = $this->uri->segment(3, 0);
        };

        $data['mbanking'] = $mbanking = $this->Mbanking_model->get_mbanking();
        $this->load->view('ceklistcard/carddetails', $data);
    }

    public function mbanking_detail() {
        $id = $this->uri->segment(3, 0);
        $where = array('id' => $id);
        $logbook = $data['mbanking'] = $this->db->get_where('gk_banking', $where)->result()[0];
        $this->load->view('ceklistcard/detail_view', $data);
    }

    public function syarat(){
        $this->load->view('ceklistcard/syaratform.php');
    }

    public function hapus() {
        $uri = $this->uri->segment(3.0);
        if ($uri != null) {
            $this->db->where('id', $uri);
            $this->db->delete('gk_banking');
            redirect(site_url('Mbanking_Controller/mbanking_list'));
        }
    }

    public function edit_test(){
        if($this->input->post('submit')){
            $this->Mbanking_model->update($id);
            redirect('Mbanking_Controller/mbanking_list');
        }
        $id = $this->uri->segment(3);
        $data['mbanking'] = $this->Mbanking_model->edit($id);
        $data['v'] = 'ceklistcard/editform.php';
        $this->load->view('init', $data);
    }

    public function edit(){
        // $i = $this->input;
        // $this->db->where('id', $i->post('id'));
        // $this->db->update('gk_banking',
        //  array(
        //     'nik' => $i->post('nik'),
        //     'msisdn' => $i->post('msisdn_name'),
        //     'nama_customer' => $i->post('nama_customer'),
        //     'ck1' => $i->post('ck1'),
        //     'ck2' => $i->post('ck2'),
        //     'ck3' => $i->post('ck3'),
        //     'ck4' => $i->post('ck4'),
        //     'ck5' => $i->post('ck5'),
        //     'ck6' => $i->post('ck6'),
        //     'ck7' => $i->post('ck7'),
        //     'ck8' => $i->post('ck8'),
        //     'ck9' => $i->post('ck9'),
        //     'ck10' => $i->post('ck10'),
        //     'ck11' => $i->post('ck11'),
        //     'ck12' => $i->post('ck12'),
        //     'ck13' => $i->post('ck13'),
        //     'ck14' => $i->post('ck14'),
        //     'ck15' => $i->post('ck15'),
        //     'ck16' => $i->post('ck16'),
        
        // ));
        // redirect(site_url('Mbanking_Controller/mbanking_list/'));
        $id = $this->uri->segment(3);
        $data['mbankings'] = $this->Mbanking_model->update($id);
        $data['v'] = 'ceklistcard/editform.php';
        $this->load->view('init', $data);
    }

    public function edit_view(){
        if ($this->input->post() != null) {

            if ($this->ion_auth->user()->row()->id == null) {
                redirect(site_url('user/login?onsaveLoggedout'));
            }
        $i = $this->input;
        $this->db->where('id', $i->post('id'));
        $this->db->update('gk_banking', array(
            'nik' => $i->post('nik'),
            'msisdn' => $i->post('msisdn_name'), 
            'nama_customer' => $i->post('nama_customer'),
            'ck1' => $i->post('ck1'),
            'ck2' => $i->post('ck2'),
            'ck3' => $i->post('ck3'),
            'ck4' => $i->post('ck4'),
            'ck5' => $i->post('ck5'),
            'ck6' => $i->post('ck6'),
            'ck7' => $i->post('ck7'),
            'ck8' => $i->post('ck8'),
            'ck9' => $i->post('ck9'),
            'ck10' => $i->post('ck10'),
            'ck11' => $i->post('ck11'),
            'ck12' => $i->post('ck12'),
            'ck13' => $i->post('ck13'),
            'ck14' => $i->post('ck14'),
            'ck15' => $i->post('ck15'),
            'ck16' => $i->post('ck16')
        ));
        redirect(site_url('Mbanking_Controller/mbanking_list'));
    }
        // $id = $this->uri->segment(3);
        // $data['mbankings'] = $this->Mbanking_model->update($id);
        // $data['v'] = 'ceklistcard/editform.php';
        // $this->load->view('init', $data);
    }
    
    public function mbanking_sign() {
        if ($this->input->post() != null) {

            if ($this->ion_auth->user()->row()->id == null) {
                redirect(site_url('user/login?onsaveLoggedout'));
            }
        $i = $this->input;
        $this->db->where('id', $i->post('id'));
        $this->db->update('gk_banking', array('cek' => $i->post('cek'),'author_sign' => $i->post('author_sign')));
        redirect(site_url('Mbanking_Controller/mbanking_list'));
    }
    }

//    public function mbanking_sign() {
//        if ($this->input->post() != null) {
//
//            if ($this->ion_auth->user()->row()->id == null) {
//                redirect(site_url('user/login?onsaveLoggedout'));
//            }
//            $i = $this->input;
//            $this->db->where('id', $i->post('id'));
//            $this->db->update('gk_banking', array('digital_sign2_true' => 1,'digital_sign2' => $i->post('output'), 'author_sign' => $i->post('author_sign'),));
//            redirect(site_url('Mbanking_Controller/mbanking_detail/' . $i->post('id')));
//        }
//    }


// controller untuk FORM SURAT PERNYATAAN

    public function sp(){
        $data['v'] = 'ceklistcard/formsp.php';
        $this->load->view('init', $data);
    }

    public function sp_input(){
        if ($this->input->post() != null) {

            if ($this->ion_auth->user()->row()->id == null) {
                redirect(site_url('user/login?onsaveLoggedout'));
            }
        $i = $this->input;

            $data = array(
                'nama_customer' => $i->post('nama_customer'),
                'nik' => $i->post('nik'),
                'msisdn' => $i->post('msisdn_name'),
                'alamat' => $i->post('alamat'),
                'date' => time(),
                'author' => $this->ion_auth->user()->row()->id,
                'tipe2' => $i->post('tipe2'),
            );
        
        $this->db->insert('gk_banking', $data);
        redirect('Mbanking_Controller/sp_list', $data);
     }
    }
    public function sp_list(){
        $offset = null;
        if ($this->uri->segment(3, 0) != null) {
            $offset = $this->uri->segment(3, 0);
        };

        $data['formsp'] = $formsp = $this->Mbanking_model->get_formsp(array(20, $offset));
        $data['v'] = 'ceklistcard/formsp_list.php';
        $this->load->view('init', $data);
    }

    public function sp_detail() {
        $id = $this->uri->segment(3, 0);
        $where = array('id' => $id);
        $logbook = $data['formsp'] = $this->db->get_where('gk_banking', $where)->result()[0];
        $data['v'] = 'ceklistcard/formsp_view.php';
        $this->load->view('init', $data);
    }

    public function hapus_sp() {
        $uri = $this->uri->segment(3.0);
        if ($uri != null) {
            $this->db->where('id', $uri);
            $this->db->delete('gk_banking');
            redirect(site_url('Mbanking_Controller/mbanking_list'));
        }
    }

    public function edit_sp(){
        $id = $this->uri->segment(3);
        $data['mbankings'] = $this->Mbanking_model->edit($id);
        $data['v'] = 'ceklistcard/editform.php';
        $this->load->view('init', $data);
    }

// masih dalam pembelajaran
    function mbanking_json() {             
        $fetch_data = $this->Mbanking_model->make_datatables();  
        $data = array();  
        foreach($fetch_data as $row)  
        {  
             $sub_array = array();
             $sub_array[] = $this->ion_auth->user($row->author)->row()->full_name;                  
             $sub_array[] = $row->nama_customer;  
             $sub_array[] = $row->nik;
             $sub_array[] = $row->msisdn; 
             $sub_array[] = $row->alamat;    
             $sub_array[] = '<button type="button" name="update" id="'.$row->id.'" class="btn btn-info btn-xs update">Update</button>,<button type="button" name="delete" id="'.$row->id.'" class="btn btn-danger btn-xs delete">Delete</button>';  
            
             $data[] = $sub_array;  
        }  
        $output = array(  
            "draw"                     =>     intval($_POST["draw"]),  
            "recordsTotal"             =>     $this->Mbanking_model->get_all_data(),  
            "recordsFiltered"          =>     $this->Mbanking_model->get_filtered_data(),  
            "data"                     =>     $data  
        );  
        echo json_encode($output);  
   }  

   function json(){
    $this->load->library('datatables');
    $this->datatables->select('*');
    $this->datatables->from('gk_banking');
    $this->datatables->where('tipe2= "2"');
    return print_r($this->datatables->generate());
}

}
