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
	
	function person_phone_list($pid)
	{
		$this->db->select('*');
		$this->db->from('person_phone');
		$this->db->where('pid',$pid);
		$this->db->order_by("insert_date", "desc");
		$veri = $this->db->get();
		return $veri->result_array();
	}
	
	function person_measures_list($pid)
	{
		$this->db->select('*');
		$this->db->from('person_measures');
		$this->db->where('pid',$pid);
		$this->db->order_by("insert_date", "desc");
		$veri = $this->db->get();
		return $veri->result_array();
	}
	
	function person_address_list($pid)
	{
		$this->db->select('*');
		$this->db->from('person_address');
		$this->db->where('pid',$pid);
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
		$job = $this->db->escape_str($values[7]);
		$education = $this->db->escape_str($values[8]);
		
		$phone = $this->db->escape_str($values[9]);
		
		$address = $this->db->escape_str($values[10]);
		
		$shoe_size = $this->db->escape_str($values[11]);
		$body_size = $this->db->escape_str($values[12]);
		$height = $this->db->escape_str($values[13]);
		$weight = $this->db->escape_str($values[14]);
		
		$now = date('Y-m-d H:i:s');
		
		
		$data = array(
						'nationality'  => $nationality,
						'tc'    => $tc,
						'association_number'    => $association_number,
						'passport_number'    => $passport_number,
						'name'    => $name,
						'surname'    => $surname,
						'birthdate'    => $birthdate,
						'job'    => $job,
						'education'    => $education,
						'insert_date' => $now
					 );
					 
		$insert = $this->db->insert('person',$data);
		$pid = $this->db->insert_id();
		
		if($insert):
		
			$dataPhone = array(
						'phone'  => $phone,
						'pid'  => $pid,
						'insert_date' => $now
						);
					 
			$insertPhone = $this->db->insert('person_phone',$dataPhone);
			
			if($insertPhone):
				
				$dataAddress = array(
						'address'  => $address,
						'pid'  => $pid,
						'insert_date' => $now
						);
					 
				$insertAddress = $this->db->insert('person_address',$dataAddress);
					
					if($insertAddress):
					
						$dataMeasures = array(
							'shoe_size'  => $shoe_size,
							'body_size'  => $body_size,
							'height'  => $height,
							'weight'  => $weight,
							'pid'  => $pid,
							'insert_date' => $now
						);
					 
						$insertMeasures = $this->db->insert('person_measures',$dataMeasures);
						
						if($insertMeasures):
							return TRUE;
						else:
							return FALSE;
						endif;
						
					else:
						return FALSE;
					endif;
				
			else:
				return FALSE;
			endif;
			
		else:
			return FALSE;
		endif;
	}
	
	
	function personUpdate($values)
	{
		$pid = $this->db->escape_str($values[0]);
		$nationality = $this->db->escape_str($values[1]);
		$tc = $this->db->escape_str($values[2]);
		$association_number = $this->db->escape_str($values[3]);
		$passport_number = $this->db->escape_str($values[4]);
		$name = $this->db->escape_str($values[5]);
		$surname = $this->db->escape_str($values[6]);
		$birthdate = $this->db->escape_str($values[7]);
		$job = $this->db->escape_str($values[8]);
		$education = $this->db->escape_str($values[9]);
		
		$now = date('Y-m-d H:i:s');
		
		
		$data = array(
						'nationality'  => $nationality,
						'tc'    => $tc,
						'association_number'    => $association_number,
						'passport_number'    => $passport_number,
						'name'    => $name,
						'surname'    => $surname,
						'birthdate'    => $birthdate,
						'job'    => $job,
						'education'    => $education,
						'insert_date' => $now
					 );
					 
		$this->db->where('pid', $pid);
		$update = $this->db->update('person',$data);
		
		if($update):
			return TRUE;
		else:
			return FALSE;
		endif;
	}
	
	
	function personPhoneInsert($values)
	{
		$pid = $this->db->escape_str($values[0]);
		$name = $this->db->escape_str($values[1]);
		$phone = $this->db->escape_str($values[2]);
		
		$now = date('Y-m-d H:i:s');
		
		
		$data = array(
						'pid'  => $pid,
						'name'  => $name,
						'phone'    => $phone,
						'insert_date' => $now
					 );
					 
		$insert = $this->db->insert('person_phone',$data);
		
		if($insert):
			return TRUE;
		else:
			return FALSE;
		endif;
	}
	
	
	function personPhoneUpdate($values)
	{
		$pid = $this->db->escape_str($values[0]);
		$name = $this->db->escape_str($values[1]);
		$phone = $this->db->escape_str($values[2]);
		
		$now = date('Y-m-d H:i:s');
		
		
		$data = array(
						'name'  => $name,
						'phone'    => $phone,
						'insert_date' => $now
					 );
		$this->db->where('pid',$pid);
		$update = $this->db->update('person_phone',$data);
		
		if($update):
			return TRUE;
		else:
			return FALSE;
		endif;
	}
	
	
	function personAddressInsert($values)
	{
		$pid = $this->db->escape_str($values[0]);
		$name = $this->db->escape_str($values[1]);
		$address = $this->db->escape_str($values[2]);
		
		$now = date('Y-m-d H:i:s');
		
		
		$data = array(
						'pid'  => $pid,
						'name'  => $name,
						'address'    => $address,
						'insert_date' => $now
					 );
					 
		$insert = $this->db->insert('person_address',$data);
		
		if($insert):
			return TRUE;
		else:
			return FALSE;
		endif;
	}
	
	
	function personAddressUpdate($values)
	{
		$pid = $this->db->escape_str($values[0]);
		$name = $this->db->escape_str($values[1]);
		$address = $this->db->escape_str($values[2]);
		
		$now = date('Y-m-d H:i:s');
		
		
		$data = array(
						'name'  => $name,
						'address'    => $address,
						'insert_date' => $now
					 );
		$this->db->where('pid',$pid);
		$update = $this->db->update('person_address',$data);
		
		if($update):
			return TRUE;
		else:
			return FALSE;
		endif;
	}
	
	
	function personMeasuresInsert($values)
	{
		$pid = $this->db->escape_str($values[0]);
		$shoe_size = $this->db->escape_str($values[1]);
		$body_size = $this->db->escape_str($values[2]);
		$height = $this->db->escape_str($values[3]);
		$weight = $this->db->escape_str($values[4]);
		
		$now = date('Y-m-d H:i:s');
		
		
		$data = array(
						'pid'  => $pid,
						'shoe_size'  => $shoe_size,
						'body_size'    => $body_size,
						'height'    => $height,
						'weight'    => $weight,
						'insert_date' => $now
					 );
					 
		$insert = $this->db->insert('person_measures',$data);
		
		if($insert):
			return TRUE;
		else:
			return FALSE;
		endif;
	}
	
	
}