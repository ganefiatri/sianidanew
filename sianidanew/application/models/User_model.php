<?php
class User_model extends CI_Model{
    
    public function __construct() {
        parent::__construct();
        $this->load->database();
    }
  public function get_all()
  {
    return $this->db->get('user')->result();
  }
 
  public function insert($data)
  {
    $this->db->insert('user', $data);
  }

    public function get_user_by_username($username){
        $row = null;
        $query = $this->db->get_where('user', array('username' => $username));
        if($query->num_rows() > 0)
        {
            $row = $query->row();
        }
        return $row;
    }
    
    public function get_all_user(){
        $query = $this->db->get('user');
        $row = $query->row();
        return $row;
    }
}