<?php

class Mbanking_model extends CI_Model {

    public function __construct() {
        parent::__construct();
    }

    public function banking(){
        $this->db->select('*');
        $this->db->from('gk_banking');
        $query = $this->db->get();
        return $query->result();
    }

    public function get_mbanking(){
        $this->db->select('*');
        $this->db->from('gk_banking');
        $this->db->where('tipe1 = "1"');
        $this->db->order_by('date','DESC');
        $query = $this->db->get();
        return $query->result();
    }

    public function get_formsp(){
        $this->db->select('*');
        $this->db->from('gk_banking');
        $this->db->where('tipe2 = "2"');
        $query = $this->db->get();
        return $query->result();
    }


    public function get_user(){
        $this->db->select('
        gk_banking.*, users.id AS id, users.username');
        $this->db->join('users', 'gk_banking.id = users.id');
        $this->db->from('gk_banking');
        $query = $this->db->get();
        return $query->result();
    }

    public function edit($id){
        $query = $this->db->get_where('gk_banking', array('id' => $id));
        return $query;
    }

    function update($id) {
        $nama_customer = $this->input->post('nama_customer');
        $nik  = $this->input->post('nik');
        $msisdn_name = $this->input->post('msisdn_name');
        $ck1 = $this->input->post('ck1');
        $ck2 = $this->input->post('ck2');
        $ck3 = $this->input->post('ck3');
        $ck4 = $this->input->post('ck4');
        $ck5 = $this->input->post('ck5');
        $ck6 = $this->input->post('ck6');
        $ck7 = $this->input->post('ck7');
        $ck8 = $this->input->post('ck8');
        $ck9 = $this->input->post('ck9');
        $ck10 = $this->input->post('ck10');
        $ck11 = $this->input->post('ck11');
        $ck12 = $this->input->post('ck12');
        $ck13 = $this->input->post('ck13');
        $ck14 = $this->input->post('ck14');
        $ck15 = $this->input->post('ck15');
        $ck16 = $this->input->post('ck16');
        $data = array (
            'nama_customer' => $nama_customer,
            'nik'  => $nik,
            'msisdn'=> $msisdn_name,
            'ck1' => $ck1,
            'ck2' => $ck2,
            'ck3' => $ck3,
            'ck4' => $ck4,
            'ck5' => $ck5,
            'ck6' => $ck6,
            'ck7' => $ck7,
            'ck8' => $ck8,
            'ck9' => $ck9,
            'ck10' => $ck10,
            'ck11' => $ck11,
            'ck12' => $ck12,
            'ck13' => $ck13,
            'ck14' => $ck14,
            'ck15' => $ck15,
            'ck16' => $ck16,
        );
        $this->db->where('id', $id);
        $this->db->update('gk_banking', $data);
    }

    function getById($id) {
        return $this->db->get_where('gk_banking', array('id' => $id))->row();
    }

    var $table = "gk_banking";  //table yang ingin di tampilkan
    var $select_column = array("id", "nik", "msisdn", "ck1", "ck2", "ck3", "ck4", "ck5", "ck6", "ck7", "ck8", "ck9", "ck10", "ck11", "ck12", "ck13", "ck14", "ck15", "ck16",  "date", "author", "digital_sign", "digital_sign2", "digital_sign2_true", "nama_customer", "alamat","tipe1","tipe2"); 
    var $order_column = array(null, "nik", "msisdn", null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null,  "date", "author", "digital_sign", "digital_sign2", "digital_sign2_true", "nama_customer", "alamat",null, null);  

    function make_query()  
    {  
         $this->db->select($this->select_column);  
         $this->db->from($this->table);  
         $this->db->where('tipe2 = "2"');
         if(isset($_POST["search"]["value"]))  
         {  
              $this->db->like("nik", $_POST["search"]["value"]);  
              $this->db->or_like("msisdn", $_POST["search"]["value"]);  
         }  
         if(isset($_POST["order"]))  
         {  
              $this->db->order_by($this->order_column[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);  
         }  
         else  
         {  
              $this->db->order_by('id', 'DESC');  
         }  
    }  
    function make_datatables(){  
         $this->make_query();  
         if($_POST["length"] != -1)  
         {  
              $this->db->limit($_POST['length'], $_POST['start']);  
         }  
         $query = $this->db->get();  
         return $query->result();  
    }  
    function get_filtered_data(){  
         $this->make_query();  
         $query = $this->db->get();  
         return $query->num_rows();  
    }       
    function get_all_data()  
    {  
         $this->db->select("*");  
         $this->db->from($this->table);
         $this->db->where('tipe2 = "2"');  
         return $this->db->count_all_results();  
    }


}