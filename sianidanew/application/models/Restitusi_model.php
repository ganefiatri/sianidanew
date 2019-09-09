<?php

class Restitusi_model extends CI_Model {

    public function __construct() {
        parent::__construct();
    }

    public function get_restitusi(){
        $this->db->select('*');
        $this->db->from('db_restitusi');
        $query = $this->db->get()->result();
        return $query;
    }

}