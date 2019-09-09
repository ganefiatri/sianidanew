<?php

class Disclaimer_model extends CI_Model {

    private $db_disclaimer;

    public function __construct() {
        parent::__construct();
        $this->load->database();
    }

    public function get_kronologi($sel) {
        $s = $this->db_disclaimer;
        $s->select('*');
        $s->from('kronologi');
        $s->where("pid", $sel);
        $return = $s->get();
        //$s->close();
        return $return;
    }

    public function get_all_disclaimer() {
        $s = $this->db;
        #$s->limit(10,0);
        $s->order_by('date', 'DESC');
        $s->where('rowstat', '0');
        return $s->get('form_disclaimer');
    }

    public function count_all() {
        $s = $this->db;
        return $s->get('form_disclaimer')->num_rows();
    }

    public function get_all_logbook_kategori() {
        $s = $this->db_disclaimer;
        return $s->get('kategori');
    }

    public function get_logbook($limit = null, $offset = null, $filter = null, $order = null) {
        $s = $this->db_disclaimer;
        $s->select('*');
        $s->from('logbook');
        $s->join('kategori', 'kategori.kategori_id = logbook.logbook_kategori');
        if ($filter) {
            $s->where($filter);
        }
        if ($limit) {
            $s->limit($limit);
        }
        if ($order) {
            $s->order_by($order);
        }
        $return = $s->get();
        //$s->close();
        return $return;
    }

}
