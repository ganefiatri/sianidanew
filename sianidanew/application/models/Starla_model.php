<?php

class Starla_model extends CI_Model {

    public function __construct() {
        parent::__construct();
    }

    public function get_all_starla() {
        $this->db->select('*');
        $this->db->from('starla');
        //$this->db->join('users','users.id=starla.id');
        $query = $this->db->get();
        return $query->result();
    }

}