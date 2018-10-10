<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Report_model extends CI_Model {

	function __construct(){
		$this->load->database();
	}


    function basic_list($values)
    {

        $name = $this->db->escape_str($values[0]);
        $surname = $this->db->escape_str($values[1]);
        $association_number = $this->db->escape_str($values[2]);
        $tc = $this->db->escape_str($values[3]);
        $phone = $this->db->escape_str($values[4]);
        $oksuz= $this->db->escape_str($values[5]);
        $yetim= $this->db->escape_str($values[6]);


        $this->db->select('*');
        $this->db->from('view_person_group_list');
        if($name!="")
            $this->db->like('name',$name);
        if($surname!="")
            $this->db->like('surname',$surname);
        if($association_number!="")
            $this->db->where('association_number',$association_number);
        if($tc!="")
            $this->db->where('tc',$tc);
        if($phone!="")
            $this->db->like('phone',$phone);
        if($oksuz!="")
            $this->db->where('oksuz',$oksuz);
        if($yetim!="")
            $this->db->where('yetim',$yetim);
        $veri = $this->db->get();
        return $veri->result_array();
    }

    /**
     * @param $day
     * @param $dtid
     * @return mixed
     */
    function donation_day_list($day, $dtid){
	    $sql = "select `dts_person`.`name` AS `name`,`dts_person`.`surname` AS `surname`,`dts_person`.`birthdate` AS `birthdate`,`dts_person`.`association_number` AS `association_number`,`dts_person`.`nationality` AS `nationality`,`dts_person`.`tc` AS `tc`,`dts_person`.`passport_number` AS `passport_number`,`dts_person`.`education` AS `education`,`dts_person`.`job` AS `job`,`dts_person_group`.`name` AS `group_name`,`dts_person`.`pgid` AS `pgid`,`dts_person`.`pid` AS `pid`,`dts_person_group`.`oksuz` AS `oksuz`,`dts_person_group`.`yetim` AS `yetim` from (`dts_person` left join `dts_person_group` on((`dts_person`.`pgid` = `dts_person_group`.`pgid`))) where (not((`dts_person`.`pgid` like 0)) and (select count(0) from `dts_donation` where ((`dts_donation`.`pgid` = `dts_person_group`.`pgid`) and (`dts_donation`.`donation_date` between (now() - interval ".$day." day) and now() )) ";
	     if($dtid!=0)
	         $sql .= " and dts_donation.dtid = ".$dtid;
        $sql .= " ) > 0 ) order by `dts_person_group`.`name`";
        $query = $this->db->query($sql);
        return $query->result_array();
    }

}

?>