<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Aile extends CI_Controller {


	 public function __construct()
       {
			parent::__construct();
			$kontrol = $this->session->userdata('logged_in');
            $rid = $this->session->userdata('rid');
			if($kontrol == false){ redirect('/giris', 'location'); }
			if($rid!=1 and $rid!=2){  exit("Bu Alana erişim yetkiniz bulunmamaktadır."); }
       }
	
	public function index()
	{
		$this->load->view('header');
		$this->load->view('aile/index');
		$this->load->view('footer');
	}
	
	public function liste($s)
	{
        $start = 30 * ($s-1);
		$this->load->model('person_model');
		$data['personGroups'] = $this->person_model->person_group_list(30,$start);
		$this->load->view('aile/liste', $data);	
	}

	
	public function personGroupInsert()
	{
		if(!$_POST){ exit("Bu sayfaya ulasim yetkiniz bulunmuyor!"); }
		$name = $this->input->post('name',TRUE);
		$oksuz = $this->input->post('oksuz',TRUE);
		$yetim = $this->input->post('yetim',TRUE);
		
		$values = array($name,$oksuz,$yetim);
		$this->load->model('person_model');
		$sonuc = $this->person_model->personGroupInsert($values);
		
		if($sonuc)
			echo 1;
		else
			echo 0;
	}

    public function personGroupUpdate()
    {
        if(!$_POST){ exit("Bu sayfaya ulasim yetkiniz bulunmuyor!"); }
        $pgid = $this->input->post('pgid',TRUE);
        $name = $this->input->post('name',TRUE);
        $oksuz = $this->input->post('oksuz',TRUE);
        $yetim = $this->input->post('yetim',TRUE);

        $values = array($pgid,$name,$oksuz,$yetim);
        $this->load->model('person_model');
        $sonuc = $this->person_model->personGroupUpdate($values);

        if($sonuc)
            echo 1;
        else
            echo 0;
    }
	

	
	function personGroupUpdateForm($id)
	{
		$this->load->model('person_model');
		$values = $this->person_model->person_group_item($id);

		if($values->oksuz==1)
		    $oksuz = "checked";
		else
		    $oksuz = "";

        if($values->yetim==1)
            $yetim = "checked";
        else
            $yetim = "";
		
		print '<form>

                    <div class="form-row">
                        <div class="col col-lg-12 col-md-12 col-sm-12 col-12">
                            <div class="form-group">
                                <label>Ad</label>
                                <input type="text" class="form-control" style="display: none;" id="pgidUpdate" value="'.$values->pgid.'"  >
                                <input type="text" class="form-control required" id="nameUpdate" value="'.$values->name.'"   maxlength="50" data-lenght="50" >
                                <div class="invalid-feedback">
                                    Lütfen ad giriniz.
                                </div>
                            </div>
                        </div><!-- col -->

                    </div><!-- row -->
                    <div class="form-row">
                        <div class="col col-lg-6 col-md-12 col-sm-12 col-12" >
                            <div class="form-group">
                                <label>Öksüz</label>
                                <input type="checkbox" value="1" class="form-control" id="oksuzUpdate" '.$oksuz.'>
                            </div>
                        </div><!-- col -->
                        <div class="col col-lg-6 col-md-12 col-sm-12 col-12">
                            <div class="form-group">
                                <label>Yetim</label>
                                <input type="checkbox" value="1" class="form-control" id="yetimUpdate"  '.$yetim.' >
                            </div>
                        </div><!-- col -->
                    </div><!-- row -->



                </form>';
	}


    public function sil()
    {
            if(!$_POST){ exit("Bu sayfaya ulaşım yetkiniz bulunmuyor!"); }
            $deleteList  = $this->input->post('selected',TRUE);

            $this->load->model('person_model');
            $result = $this->person_model->person_group_delete($deleteList);

            if($result)
                echo 1;
            else
                echo 0;


    }
	

	

		

	
	
}