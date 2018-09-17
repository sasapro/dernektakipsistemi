<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class kisi extends CI_Controller {


	 public function __construct()
       {
			parent::__construct();
			$kontrol = $this->session->userdata('logged_in');
			if($kontrol == false){ redirect('/giris', 'location'); }
	   }
	
	public function index()
	{
		$this->load->view('header');
		$this->load->view('kisi/index');
		$this->load->view('footer');
	}
	
	public function liste($s)
	{
		
		$this->load->model('person_model');
		$data['persons'] = $this->person_model->person_list();
		$this->load->view('kisi/liste', $data);
		
		
	}
	
	public function detay($id)
	{
		$this->load->view('header');
		$this->load->model('person_model');
		$data['person'] = $this->person_model->person_item($id);
		$data['personPhones'] = $this->person_model->person_phone_list($id);
		$data['personAddresses'] = $this->person_model->person_address_list($id);
		$data['personMeasureses'] = $this->person_model->person_measures_list($id);
		$this->load->view('kisi/detay', $data);
		$this->load->view('footer');
	}
	
	public function personInsert()
	{
		if(!$_POST){ exit("Bu sayfaya ulasim yetkiniz bulunmuyor!"); }
		$nationality = $this->input->post('nationality',TRUE);
		$tc = $this->input->post('tc',TRUE);
		$association_number = $this->input->post('association_number',TRUE);
		$passport_number = $this->input->post('passport_number',TRUE);
		$name = $this->input->post('name',TRUE);
		$surname = $this->input->post('surname',TRUE);
		$birthdate = $this->input->post('birthdate',TRUE);
		$job = $this->input->post('job',TRUE);
		$education = $this->input->post('education',TRUE);
		$phone = $this->input->post('phone',TRUE);
		$address = $this->input->post('address',TRUE);
		$shoe_size = $this->input->post('shoe_size',TRUE);
		$body_size = $this->input->post('body_size',TRUE);
		$height = $this->input->post('height',TRUE);
		$weight = $this->input->post('weight',TRUE);
		
		$values = array($nationality,$tc,$association_number,$passport_number,$name,$surname,$birthdate,$job,$education,$phone,$address,$shoe_size,$body_size,$height,$weight);
		$this->load->model('person_model');
		$sonuc = $this->person_model->personInsert($values);
		
		if($sonuc)
			echo 1;
		else
			echo 0;
	}
	
	public function personUpdate()
	{
		if(!$_POST){ exit("Bu sayfaya ulasim yetkiniz bulunmuyor!"); }
		$pid = $this->input->post('pid',TRUE);
		$nationality = $this->input->post('nationality',TRUE);
		$tc = $this->input->post('tc',TRUE);
		$association_number = $this->input->post('association_number',TRUE);
		$passport_number = $this->input->post('passport_number',TRUE);
		$name = $this->input->post('name',TRUE);
		$surname = $this->input->post('surname',TRUE);
		$birthdate = $this->input->post('birthdate',TRUE);
		$job = $this->input->post('job',TRUE);
		$education = $this->input->post('education',TRUE);
		
		$values = array($pid,$nationality,$tc,$association_number,$passport_number,$name,$surname,$birthdate,$job,$education);
		$this->load->model('person_model');
		$sonuc = $this->person_model->personUpdate($values);
		
		if($sonuc)
			echo 1;
		else
			echo 0;
	}
	
	
	public function personPhoneInsert()
	{
		if(!$_POST){ exit("Bu sayfaya ulasim yetkiniz bulunmuyor!"); }
		$pid = $this->input->post('pid',TRUE);
		$name = $this->input->post('name',TRUE);
		$phone = $this->input->post('phone',TRUE);
		
		$values = array($pid,$name,$phone);
		$this->load->model('person_model');
		$sonuc = $this->person_model->personPhoneInsert($values);
		
		if($sonuc)
			echo 1;
		else
			echo 0;
	}
	
	public function personPhoneUpdate()
	{
		if(!$_POST){ exit("Bu sayfaya ulasim yetkiniz bulunmuyor!"); }
		$pid = $this->input->post('pid',TRUE);
		$name = $this->input->post('name',TRUE);
		$phone = $this->input->post('phone',TRUE);
		
		$values = array($pid,$name,$phone);
		$this->load->model('person_model');
		$sonuc = $this->person_model->personPhoneUpdate($values);
		
		if($sonuc)
			echo 1;
		else
			echo 0;
	}
	
	public function personAddressInsert()
	{
		if(!$_POST){ exit("Bu sayfaya ulasim yetkiniz bulunmuyor!"); }
		$pid = $this->input->post('pid',TRUE);
		$name = $this->input->post('name',TRUE);
		$address = $this->input->post('address',TRUE);
		
		$values = array($pid,$name,$address);
		$this->load->model('person_model');
		$sonuc = $this->person_model->personAddressInsert($values);
		
		if($sonuc)
			echo 1;
		else
			echo 0;
	}
	
	public function personMeasuresInsert()
	{
		if(!$_POST){ exit("Bu sayfaya ulasim yetkiniz bulunmuyor!"); }
		$pid = $this->input->post('pid',TRUE);
		$shoe_size = $this->input->post('shoe_size',TRUE);
		$body_size = $this->input->post('body_size',TRUE);
		$height = $this->input->post('height',TRUE);
		$weight = $this->input->post('weight',TRUE);
		
		
		$values = array($pid,$shoe_size,$body_size,$height,$weight);
		$this->load->model('person_model');
		$sonuc = $this->person_model->personMeasuresInsert($values);
		
		if($sonuc)
			echo 1;
		else
			echo 0;
	}
		

	
	
}