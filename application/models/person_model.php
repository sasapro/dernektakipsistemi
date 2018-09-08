<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class person_model extends CI_Model {

	function __construct(){
		$this->load->database();
	}
	

	function person_list()
	{
		$this->db->select('*');
		$this->db->from('person');
		$this->db->order_by("insert_date", "desc");
		$veri = $this->db->get();
		return $veri->result_array();
	}
	
	function person_item($id)
	{
		$this->db->select('*');
		$this->db->from('person');
		$this->db->where('pid',$id);
		$veri = $this->db->get();
		return $veri->row();
	}
	
	function personInsert($values)
	{
		$nationality = $this->db->escape_str($values[0]);
		$tc = $this->db->escape_str($values[1]);
		$association_number = $this->db->escape_str($values[2]);
		$passport_number = $this->db->escape_str($values[3]);
		$name = $this->db->escape_str($values[4]);
		$surname = $this->db->escape_str($values[5]);
		$birthdate = $this->db->escape_str($values[6]);
		
		
		$data = array(
						'nationality'  => $nationality,
						'tc'    => $tc,
						'association_number'    => $association_number,
						'passport_number'    => $passport_number,
						'name'    => $name,
						'surname'    => $surname,
						'birthdate'    => $birthdate
					 );
					 
		$ekle = $this->db->insert('person',$data);
		
		if($ekle)
			return TRUE;
		else
			return FALSE;
	
	}
	
	
}