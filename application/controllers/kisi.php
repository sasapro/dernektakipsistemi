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
		$this->load->view('kisi/liste');
	}
		

	
	
}