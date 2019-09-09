<?php

class Excel_import_model extends CI_Model{

   function importgrapariall() {
        $this->db->select('*');
        $this->db->from('import_excel');
        $query = $this->db->get();
        return $query->result();
    }

    function select(){
        $this->db->order_by('id', 'DESC');
        $query = $this->db->get('import_excel');
        return $query;

    }

    function selectgraparimitra(){
        $this->db->select('*');
        $this->db->from('import_excel');
        $this->db->where('case=2');
        $query = $this->db->get();
        return $query->result();

    }

    function selectgrapariown(){
        $this->db->select('*');
        $this->db->from('import_excel');
        $this->db->where('case=1');
        $query = $this->db->get();
        return $query->result();

    }

    function selectgrapariloop(){
        $this->db->select('*');
        $this->db->from('import_excel');
        $this->db->where('case=3');
        $query = $this->db->get();
        return $query->result();
    }

    function selectgraparigtg(){
        $this->db->select('*');
        $this->db->from('import_excel');
        $this->db->where('case=4');
        $query = $this->db->get();
        return $query->result();
    }

    function insert(){
        $this->db->insert_batch('import_excel', $data);
    }

}