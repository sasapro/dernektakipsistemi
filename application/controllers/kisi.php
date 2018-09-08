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
		
		$values = array($nationality,$tc,$association_number,$passport_number,$name,$surname,$birthdate);
		$this->load->model('person_model');
		$sonuc = $this->person_model->personInsert($values);
		
		if($sonuc)
			echo 1;
		else
			echo 0;
	}
		

	
	
}