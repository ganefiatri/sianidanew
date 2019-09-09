<?php

class Log_model extends CI_Model {
    
    public function __construct() {
        parent::__construct();
            $db_logbook = $this->load->database('logbook', TRUE);  
    }

    public function get_all_logbook() {
            var_dump($db_logbook);
        
        return $db_logbook->db->get('logbook');
    }


    public function get_all_logbook_kategori() {
    	return $this->db->get('logbook_kategori');
    }

    public function save_logbook(){
        return $this->db->get('logbook');
    }
	
	public function get_logbook($sel)
	{
		$this->db->select('*');
		$this->db->from('logbook');
		$this->db->where("logbook_id",$sel);
		$this->db->join('kategori', 'logbook.logbook_kategori = kategori.kategori_id');
		$query = $this->db->get();
		return $query->row();
	}
	
	public function get_kronologi($sel)
	{
		$this->db->select('*');
		$this->db->from('kronologi');
		$this->db->where("pid",$sel);
		return $this->db->get();
	}
	public function get_kronologi_bycid($cid)
	{
		$this->db->select('*');
		$this->db->from('kronologi');
		$this->db->where("cid",$cid);
		$query = $this->db->get();
		return $query->row();
	}
	
	public function del_kronologi($cid){
 	 	$this->db->where('cid', $cid);
	 	$this->db->delete('kronologi');
	}
	
	public function del_logbook($logbook_id){
 	 	$this->db->where('logbook_id', $logbook_id);
	 	$this->db->delete('logbook');
	}
}