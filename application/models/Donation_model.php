<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Donation_model extends CI_Model {

	function __construct(){
		$this->load->database();
	}
	

	function basic_list($limit,$start)
	{
		$this->db->select('*');
		$this->db->from('donation');
		$this->db->order_by("insert_date", "desc");
		$this->db->limit($limit, $start);
		$veri = $this->db->get();
		return $veri->result_array();
	}

    function list_filter($pgid)
    {
        $this->db->select('*');
        $this->db->from('donation');
        $this->db->where('pgid', $pgid);
        $this->db->order_by("insert_date", "desc");
        $veri = $this->db->get();
        return $veri->result_array();
    }

    function donation_type_list()
    {
        $this->db->select('*');
        $this->db->from('donation_type');
        $this->db->order_by("dtid", "asc");
        $veri = $this->db->get();
        return $veri->result_array();
    }
	

	function donation_item($id)
	{
		$this->db->select('*');
		$this->db->from('donation');
		$this->db->where('did',$id);
		$veri = $this->db->get();
		return $veri->row();
	}

	

	function donationInsert($values)
	{
        $donation_date = $this->db->escape_str($values[0]);
        $donor = $this->db->escape_str($values[1]);
        $dtid = $this->db->escape_str($values[2]);
        $description = $this->db->escape_str($values[3]);
        $pgid = $this->db->escape_str($values[4]);
		
		$now = date('Y-m-d H:i:s');
		
		
		$data = array(
						'donation_date'  => $donation_date,
						'donor'  => $donor,
						'dtid'    => $dtid,
						'description' => $description,
                        'pgid' => $pgid,
						'insert_date' => $now
					 );
					 
		$insert = $this->db->insert('donation',$data);
		
		if($insert):
			return TRUE;
		else:
			return FALSE;
		endif;
	}
	
	
	function donationUpdate($values)
	{
		$did = $this->db->escape_str($values[0]);
        $donation_date = $this->db->escape_str($values[1]);
        $donor = $this->db->escape_str($values[2]);
        $dtid = $this->db->escape_str($values[3]);
        $description = $this->db->escape_str($values[4]);
        $pgid = $this->db->escape_str($values[5]);

		
		
		$data = array(
						'donation_date'  => $donation_date,
						'donor'    => $donor,
                        'dtid'    => $dtid,
                        'description'    => $description,
                        'pgid' => $pgid
					 );
		$this->db->where('did',$did);
		$update = $this->db->update('donation',$data);
		
		if($update):
			return TRUE;
		else:
			return FALSE;
		endif;
	}

    function donation_delete($s)
    {
        foreach($s AS $id)
        {
            $tablolar = array('dts_donation');
            $this->db->where('did', $id);
            $this->db->delete($tablolar);
        }
        return TRUE;
    }
	
	
	
}