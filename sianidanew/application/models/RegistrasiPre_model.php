<?php

class RegistrasiPre_model extends CI_Model {

    public function __construct() {
        parent::__construct();
    }

    public function get_ktp($ktp) {
        $db = $this->db;
        $s = $db->get_where('registrasi', array('ktp' => $ktp));
        return $s;
    }

    public function get_data($where = null) {
        $db = $this->db;
        if ($where != null) {
            foreach ($where as $r) {
                $db->where(array_keys($where)[0], $r);
            }
        }
        $s = $db->get('regprepaid');
        return $s;
    }

    public function get_data_msisdn($id = null) {
        $db = $this->db;

        if ($id != null) {
            $db->where('reg_id', $id);
        }
        $s = $db->get('regprepaid_msisdn');
        //echo $db->last_query();
        return $s;
    }

    public function simpan_msisdn($id, $msisdn) {

        $this->db->delete('regprepaid_msisdn', array('reg_id' => $id));


        foreach ($msisdn as $row) {
            $this->db->insert('regprepaid_msisdn', array('msisdn' => $row, 'reg_id' => $id));
        }

        return $id;
    }

    public function simpan($val) {
        $db = $this->db;
        $s = $db->insert('regprepaid', $val);

        return $db->insert_id();
    }

}
