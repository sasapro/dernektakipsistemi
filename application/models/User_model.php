<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class User_model extends CI_Model {

	function __construct(){
		$this->load->database();
	}
	

	function list($limit,$start)
	{
		$this->db->select('*');
		$this->db->from('user');
		$this->db->limit($limit, $start);
		$veri = $this->db->get();
		return $veri->result_array();
	}

    function role_list()
    {
        $this->db->select('*');
        $this->db->from('user_role');
        $veri = $this->db->get();
        return $veri->result_array();
    }

	function item($id)
	{
		$this->db->select('*');
		$this->db->from('user');
		$this->db->where('uid',$id);
		$veri = $this->db->get();
		return $veri->row();
	}

	

	function insert($values)
	{
        $username = $this->db->escape_str($values[0]);
        $mail = $this->db->escape_str($values[1]);
        $password = $this->db->escape_str($values[2]);
        $name = $this->db->escape_str($values[3]);
        $surname = $this->db->escape_str($values[4]);
        $rid = $this->db->escape_str($values[5]);
		
		$now = date('Y-m-d H:i:s');
		
		
		$data = array(
						'username'  => $username,
						'mail'  => $mail,
						'password'    => $password,
						'name' => $name,
                        'surname' => $surname,
                        'rid' => $rid,
						'insert_date' => $now,
                        'status' => 1
					 );
					 
		$insert = $this->db->insert('user',$data);
		
		if($insert):
			return TRUE;
		else:
			return FALSE;
		endif;
	}
	
	
	function update($values)
	{
		$uid = $this->db->escape_str($values[0]);
        $username = $this->db->escape_str($values[1]);
        $mail = $this->db->escape_str($values[2]);
        $name = $this->db->escape_str($values[3]);
        $surname = $this->db->escape_str($values[4]);
        $rid = $this->db->escape_str($values[5]);



		$data = array(
                        'username'  => $username,
                        'mail'  => $mail,
                        'name' => $name,
                        'surname' => $surname,
                        'rid' => $rid,
                        'insert_date' => $now
					 );
		$this->db->where('uid',$uid);
		$update = $this->db->update('user',$data);

		if($update):
			return TRUE;
		else:
			return FALSE;
		endif;
	}

    function updatePassword($values)
    {
        $uid = $this->db->escape_str($values[0]);
        $username = $this->db->escape_str($values[1]);
        $mail = $this->db->escape_str($values[2]);
        $password = $this->db->escape_str($values[3]);
        $name = $this->db->escape_str($values[4]);
        $surname = $this->db->escape_str($values[5]);
        $rid = $this->db->escape_str($values[6]);



        $data = array(
            'username'  => $username,
            'mail'  => $mail,
            'password'    => $password,
            'name' => $name,
            'surname' => $surname,
            'rid' => $rid,
            'insert_date' => $now
        );
        $this->db->where('uid',$uid);
        $update = $this->db->update('user',$data);

        if($update):
            return TRUE;
        else:
            return FALSE;
        endif;
    }

    function delete($s)
    {
        foreach($s AS $id)
        {
            $tablolar = array('dts_user');
            $this->db->where('uid', $id);
            $this->db->delete($tablolar);
        }
        return TRUE;
    }
	
	
	
}