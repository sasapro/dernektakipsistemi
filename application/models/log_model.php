<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class log_model extends CI_Model {

	function __construct(){
		$this->load->database();
	}
	

	function session_insert($values)
	{
		$uid = $this->db->escape_str($values[0]);
		$date = $this->db->escape_str($values[1]);
		$ip_address = $this->db->escape_str($values[2]);
		
		$data = array(
						'uid'  => $uid,
						'date'         => $date,
					    'ip_address'       => $ip_address
					 );
					 
		$insert = $this->db->insert('log_session',$data);
		if($insert)
			return TRUE;
		else
			return FALSE;
	}
	
	function session_error_insert($values)
	{
		$username = $this->db->escape_str($values[0]);
		$date = $this->db->escape_str($values[1]);
		$ip_address = $this->db->escape_str($values[2]);
		$password = $this->db->escape_str($values[3]);
		
		$data = array(
						'username'  => $username,
						'date'         => $date,
					    'ip_address'       => $ip_address,
						'password'       => $password
					 );
					 
		$insert = $this->db->insert('log_session_error',$data);
		if($insert)
			return TRUE;
		else
			return FALSE;
	}
	
	function gezinti_sorgula()
	{
		$this->db->select('*');
		$this->db->from('yonetim_log_gezinti');
		$this->db->order_by("zaman", "desc"); 
		$this->db->limit(1,0);
		$a = $this->db->get();
		return $a->row();
	}
	
	function gezinti_ekle($degerler)
	{
		$yetkili = $this->db->escape_str($degerler[0]);
		$zaman = $this->db->escape_str($degerler[1]);
		$ip_adresi = $this->db->escape_str($degerler[2]);
		$link = $this->db->escape_str($degerler[3]);
		$tur = $this->db->escape_str($degerler[4]);
		
		$data = array(
						'yetkili'  => $yetkili,
						'tur'  => $tur,
						'zaman'         => $zaman,
					    'ip_adresi'       => $ip_adresi,
						'link'       => $link
					 );
					 
		$ekle = $this->db->insert('yonetim_log_gezinti',$data);
		if($ekle)
		{
			return TRUE;
		}else
		{
			return FALSE;
		}
	}
}

?>