<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Rapor extends CI_Controller {


	 public function __construct()
       {
			parent::__construct();
			$kontrol = $this->session->userdata('logged_in');
			if($kontrol == false){ redirect('/giris', 'location'); }
	   }
	
	public function index()
	{
	    if($_GET):
	    $name = $_GET['name'];
        $surname= $_GET['surname'];
        $association_number= $_GET['association_number'];
        $tc= $_GET['tc'];
        $phone= $_GET['phone'];
        @$oksuz= $_GET['oksuz'];
        @$yetim= $_GET['yetim'];
        else:
            $name = "";
            $surname= "";
            $association_number= "";
            $tc= "";
            $phone= "";
            $oksuz= "";
            $yetim= "";
            endif;

        $values = array($name,$surname,$association_number,$tc,$phone,$oksuz,$yetim);

		$this->load->view('header');
        $this->load->model('report_model');
        $data['reports'] = $this->report_model->basic_list($values);
		$this->load->view('rapor/index',$data);
		$this->load->view('footer');
	}
	
	public function liste($s)
	{
        $start = 30 * ($s-1);
		$this->load->model('report_model');
         $data['reports'] = $this->report_model->basic_list(30,$start);

		$this->load->view('rapor/liste', $data);
	}

	public function yardim(){
	    if($_GET):
            $data['day'] = @$_GET["day"];
            $data['dtid'] = @$_GET["type"];
        else:
            $data['day'] = 0;
            $data['dtid'] = 0;
        endif;
        $this->load->view('header');
        $this->load->model('donation_model');
        $data["donationTypes"] = $this->donation_model->donation_type_list();

        $this->load->model('report_model');
        $data['reports'] = $this->report_model->donation_day_list($data['day'],$data['dtid']);
        $this->load->view('rapor/yardim', $data);
        $this->load->view('footer');
    }


}