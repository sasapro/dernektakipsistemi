<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class tema extends CI_Controller {

	  public function __construct()
       {
			parent::__construct();
	   }
	
	public function js()
	{
		$data['kontrol'] = $this->session->userdata('logged_in');
		
		$this->load->view('js/js_view',$data);
	}
	
	public function css()
	{
		$this->load->view('css/css_view');
	}

}
