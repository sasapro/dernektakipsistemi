<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class anasayfa extends CI_Controller {


	 public function __construct()
       {
			parent::__construct();
			$kontrol = $this->session->userdata('logged_in');
			if($kontrol == false){ redirect('/giris', 'location'); }
	   }
	
	public function index()
	{
			$this->load->view('header');
			$this->load->view('anasayfa');
			$this->load->view('footer');
	}
		

	
	
}