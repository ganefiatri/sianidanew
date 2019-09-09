<?php
class Ping_model extends CI_Model {
    
    public function __construct() {
        parent::__construct();
		$db_ping = $this->load->database('ping', TRUE);  
    }
	
	public function get_last_ping_from($sel)
	{
            $db_ping = $this->load->database('ping', TRUE);  
		$db_ping->select('*');
		$db_ping->from('ping');
		$db_ping->where("serverid",$sel);
		$db_ping->order_by("timestamp","DESC");
		$db_ping->limit(1,0);
		$query = $db_ping->get();
		return $query->row();
	}
        public function data_server(){
        $s = array
            (
            array('2','172.28.2.102','ultra'),
            array('3','ccmdn','ccmdn'),
            array('4','prdcrmjnlp','crm') ,
            array('5','172.182.70.3','mikrotik'),
            array('6','172.16.21.249','VPN-IP MPLS TELKOMSEL TO JATINEGARA'),
            array('7','172.28.1.16','TFTP SERVER PABX CISCO (JATINEGARA)'),
            array('8','172.28.33.13','TFTP SERVER PABX CISCO (JATINEGARA)'),
            array('9','172.28.2.15','CTIOS SERVER (JATINEGARA)'),
            array('10','172.28.34.15','CTIOS SERVER (KEBALEN)'),
            array('11','172.28.66.192','SWITCH TTC AMIR HAMZAH'),
            array('12','172.28.66.194','CUBE CISCO (TTC AMIR HAMZAH)'),
            array('13','172.28.66.195','CUBE CISCO (TTC AMIR HAMZAH)'),
            array('14','172.28.66.196','CUBE CISCO (TTC AMIR HAMZAH)'),
            array('15','172.28.66.197','CUBE CISCO (TTC AMIR HAMZAH)'),  
            array('16','172.28.66.198','CUBE CISCO (TTC AMIR HAMZAH)'),  
            array('17','172.28.66.199','CUBE CISCO (TTC AMIR HAMZAH)'),   
            array('18','google.com','HTTP'),  
            array('19','cookies.telkomsel.co.id','HTTP'),                      
            array('20','indira-web.telkomsel.co.id','HTTP'),       
            array('21','preti.telkomsel.co.id','HTTP'),       
            array('22','iknow.telkomsel.co.id','HTTP'),       
            array('23','propper.telkomsel.co.id','HTTP'),       
            array('24','merahputih.telkomsel.co.id','HTTP'),       
            array('25','www.telkomsel.com','HTTP'),       
            array('26','my.telkomsel.com','HTTP'),       
            array('27','sso.telkomsel.co.id','HTTP'),       
            array('28','siro.telkomsel.co.id','HTTP'),       
            array('29','itoc.telkomsel.co.id','HTTP'),                           
        );
        return $s;
        }

                public function get_server_detail($serverid,$req_time)
        {
            echo $req_time;
            $date00 = strtotime('Midnight',$req_time);
            $date24 = strtotime('+1day',$date00);
            
                $db_ping = $this->load->database('ping', TRUE);  
                $db_ping->select('*');
		$db_ping->from('ping');
		$db_ping->where("serverid",$serverid);
                $db_ping->where("timestamp between ". $date00 ." AND ".$date24);
                //$this->db->where("serverid",$serverid);
		$db_ping->order_by("timestamp","DESC");
                $query = $db_ping->get();
                
		return $query->result();
        }
	
}

