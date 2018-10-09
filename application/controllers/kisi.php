<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Kisi extends CI_Controller {


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
	    if(@$_GET['aile'])
	     $data['pgid'] = @$_GET['aile'];
	    else
         $data['pgid'] = 0;

		$this->load->view('header');
        $this->load->model('person_model');
        if($data['pgid']==0)
            $data['personGroups'] = $this->person_model->person_group_list(0,0);
        else
            $data['personGroups'] = $this->person_model->person_group_list_filter($data['pgid']);
		$this->load->view('kisi/index', $data);
		$this->load->view('footer');
	}
	
	public function liste($pgid,$s)
	{
        $start = 30 * ($s-1);
		$this->load->model('person_model');
		if($pgid==0)
		    $data['persons'] = $this->person_model->person_list(30,$start);
		else
            $data['persons'] = $this->person_model->person_list_filter($pgid);
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
        $data['personGroups'] = $this->person_model->person_group_list(0,0);
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
        $pgid = $this->input->post('pgid',TRUE);
		
		$values = array($nationality,$tc,$association_number,$passport_number,$name,$surname,$birthdate,$job,$education,$phone,$address,$shoe_size,$body_size,$height,$weight,$pgid);
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
        $pgid = $this->input->post('pgid',TRUE);
		
		$values = array($pid,$nationality,$tc,$association_number,$passport_number,$name,$surname,$birthdate,$job,$education,$pgid);
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
		$id = $this->input->post('id',TRUE);
		$name = $this->input->post('name',TRUE);
		$phone = $this->input->post('phone',TRUE);
		
		$values = array($id,$name,$phone);
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
	
	public function personAddressUpdate()
	{
		if(!$_POST){ exit("Bu sayfaya ulasim yetkiniz bulunmuyor!"); }
		$id = $this->input->post('id',TRUE);
		$name = $this->input->post('name',TRUE);
		$address = $this->input->post('address',TRUE);
		
		$values = array($id,$name,$address);
		$this->load->model('person_model');
		$sonuc = $this->person_model->personAddressUpdate($values);
		
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
	
	public function personMeasuresUpdate()
	{
		if(!$_POST){ exit("Bu sayfaya ulasim yetkiniz bulunmuyor!"); }
		$id = $this->input->post('id',TRUE);
		$shoe_size = $this->input->post('shoe_size',TRUE);
		$body_size = $this->input->post('body_size',TRUE);
		$height = $this->input->post('height',TRUE);
		$weight = $this->input->post('weight',TRUE);
		
		
		$values = array($id,$shoe_size,$body_size,$height,$weight);
		$this->load->model('person_model');
		$sonuc = $this->person_model->personMeasuresUpdate($values);
		
		if($sonuc)
			echo 1;
		else
			echo 0;
	}
	
	
	function persondetailPhoneUpdate($id)
	{
		$this->load->model('person_model');
		$values = $this->person_model->person_phone_item($id);
		
		print '<form>
				 <div class="form-row">
					<div class="col col-lg-6 col-md-12 col-sm-12 col-12">
                        <div class="form-group">
                            <label>İletişim Adı</label>
							<input type="text" style="display: none;" id="updatePhoneId"  value="'.$values->id.'">
                            <input type="text" class="form-control required" id="updatePhoneName"  value="'.$values->name.'" maxlength="30" data-lenght="30" >
                            <div class="invalid-feedback">
                                Lütfen iletişim adı giriniz.
                            </div>
                        </div>
                    </div><!-- col -->
					<div class="col col-lg-6 col-md-12 col-sm-12 col-12">
                        <div class="form-group">
                            <label>Telefon</label>
                            <input type="text" class="form-control required" id="updatePhoneValue" value="'.$values->phone.'"  maxlength="10" data-lenght="10" >
                            <div class="invalid-feedback">
                                Lütfen telefon giriniz.
                            </div>
                        </div>
                    </div><!-- col -->
					
				</div><!-- row -->
			</form>';
	}
	
	
	function persondetailAddressUpdate($id)
	{
		$this->load->model('person_model');
		$values = $this->person_model->person_address_item($id);
		
		print '<form>
				 <div class="form-row">
					<div class="col col-lg-12 col-md-12 col-sm-12 col-12">
                        <div class="form-group">
                            <label>İletişim Adı</label>
							<input type="text" style="display: none;" id="updateAddressId" value="'.$values->id.'"  >
                            <input type="text" class="form-control required" id="updateAddressName" value="'.$values->name.'"  maxlength="30" data-lenght="30" >
                            <div class="invalid-feedback">
                                Lütfen iletişim adı giriniz.
                            </div>
                        </div>
                    </div><!-- col -->
					</div><!-- row -->
					<div class="form-row">
					<div class="col col-lg-12 col-md-12 col-sm-12 col-12">
                        <div class="form-group">
                            <label>Adres</label>
                            <textarea class="form-control required" id="updateAddressValue">'.$values->address.'</textarea>
                            <div class="invalid-feedback">
                                Lütfen adres giriniz.
                            </div>
                        </div>
                    </div><!-- col -->
					
				</div><!-- row -->
			</form>';
	}
	
	function persondetailMeasuresUpdate($id)
	{
		$this->load->model('person_model');
		$values = $this->person_model->person_measures_item($id);
		
	print '<form>
				 <div class="form-row">
					<div class="col col-lg-6 col-md-12 col-sm-12 col-12">
                        <div class="form-group">
                            <label>Ayakkabı Numarası</label>
							<input type="text" style="display: none;" id="updateMeasuresId" value="'.$values->id.'"  maxlength="30" data-lenght="30" >
                            <input type="text" class="form-control required" id="updateShoeSizeValue" value="'.$values->shoe_size.'"  maxlength="30" data-lenght="30" >
                            <div class="invalid-feedback">
                                Lütfen ayakkabı numarası giriniz.
                            </div>
                        </div>
                    </div><!-- col -->
					<div class="col col-lg-6 col-md-12 col-sm-12 col-12">
                        <div class="form-group">
                            <label>Beden</label>
                            <input type="text" class="form-control required" id="updateBodySizeValue"  value="'.$values->body_size.'"  maxlength="10" data-lenght="10" >
                            <div class="invalid-feedback">
                                Lütfen beden giriniz.
                            </div>
                        </div>
                    </div><!-- col -->
					
				</div><!-- row -->
				<div class="form-row">
					<div class="col col-lg-6 col-md-12 col-sm-12 col-12">
                        <div class="form-group">
                            <label>Boy</label>
                            <input type="text" class="form-control required" id="updateHeightValue"   value="'.$values->height.'"  maxlength="30" data-lenght="30" >
                            <div class="invalid-feedback">
                                Lütfen boy giriniz.
                            </div>
                        </div>
                    </div><!-- col -->
					<div class="col col-lg-6 col-md-12 col-sm-12 col-12">
                        <div class="form-group">
                            <label>Ağırlık</label>
                            <input type="text" class="form-control required" id="updateWeightValue"  value="'.$values->weight.'"  maxlength="10" data-lenght="10" >
                            <div class="invalid-feedback">
                                Lütfen ağırlık giriniz.
                            </div>
                        </div>
                    </div><!-- col -->
					
				</div><!-- row -->
			</form>';
			
	}

    function aileJson(){
        print '{
  "results": [
    {
      "id": 1,
      "text": "Option 1"
    },
    {
      "id": 2,
      "text": "Option 2"
    }
  ],
  "pagination": {
    "more": true
  }
}';
    }


    public function sil()
    {
        if(!$_POST){ exit("Bu sayfaya ulaşım yetkiniz bulunmuyor!"); }
        $deleteList  = $this->input->post('selected',TRUE);

        $this->load->model('person_model');
        $result = $this->person_model->person_delete($deleteList);

        if($result)
            echo 1;
        else
            echo 0;


    }
		

	
	
}