<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class session_model extends CI_Model {

	function __construct(){
		$this->load->database();
	}

	
	function control($user,$password){
		
		$query = $this->db->query("SELECT * FROM ".$this->db->dbprefix('user')." WHERE username='$user' AND password='$password'");
		
		if($query->num_rows() > 0)
			return $query->row();
		
		return FALSE;
	}
	
	
	
}

?>