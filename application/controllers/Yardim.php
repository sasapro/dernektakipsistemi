<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Yardim extends CI_Controller {


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

        $this->load->model('person_model');
        if($data['pgid']==0)
            $data['personGroups'] = $this->person_model->person_group_list(0,0);
        else
            $data['personGroups'] = $this->person_model->person_group_list_filter($data['pgid']);

		$this->load->view('header');
        $this->load->model('donation_model');
        $data['donationTypes'] = $this->donation_model->donation_type_list();
		$this->load->view('yardim/index',$data);
		$this->load->view('footer');
	}
	
	public function liste($pgid,$s)
	{
        $start = 30 * ($s-1);
		$this->load->model('donation_model');
        if($pgid==0)
		    $data['donations'] = $this->donation_model->basic_list(30,$start);
        else
            $data['donations'] = $this->donation_model->list_filter($pgid);
		$this->load->view('yardim/liste', $data);
	}

	
	public function donationInsert()
	{
		if(!$_POST){ exit("Bu sayfaya ulasim yetkiniz bulunmuyor!"); }
        $donation_date = $this->input->post('donation_date',TRUE);
		$donor = $this->input->post('donor',TRUE);
		$dtid = $this->input->post('dtid',TRUE);
        $description = $this->input->post('description',TRUE);
        $pgid = $this->input->post('pgid',TRUE);
		
		$values = array($donation_date,$donor,$dtid,$description,$pgid);
		$this->load->model('donation_model');
		$sonuc = $this->donation_model->donationInsert($values);
		
		if($sonuc)
			echo 1;
		else
			echo 0;
	}

    public function donationUpdate()
    {
        if(!$_POST){ exit("Bu sayfaya ulasim yetkiniz bulunmuyor!"); }
        $did = $this->input->post('did',TRUE);
        $donation_date = $this->input->post('donation_date',TRUE);
        $donor = $this->input->post('donor',TRUE);
        $dtid = $this->input->post('dtid',TRUE);
        $description = $this->input->post('description',TRUE);
        $pgid = $this->input->post('pgid',TRUE);

        $values = array($did,$donation_date,$donor,$dtid,$description,$pgid);
        $this->load->model('donation_model');
        $sonuc = $this->donation_model->donationUpdate($values);

        if($sonuc)
            echo 1;
        else
            echo 0;
    }
	

	
	function donationUpdateForm($pgid,$id)
	{
		$this->load->model('donation_model');
		$values = $this->donation_model->donation_item($id);
        $donationTypes = $this->donation_model->donation_type_list();

        $this->load->model('person_model');
        if($pgid==0)
            $personGroups = $this->person_model->person_group_list(0,0);
        else
            $personGroups = $this->person_model->person_group_list_filter($pgid);

		print '<form>

				<div class="form-row">
                    <div class="col col-lg-12 col-md-12 col-sm-12 col-12">
                        <div class="form-group">
                            <label>Yardım Tarihi</label>
                            <input type="text" class="form-control" style="display: none;" id="didUpdate" value="'.$values->did.'" >
                            <input type="text" class="form-control required" id="donation_dateUpdate" value="'.$values->donation_date.'" >
                            <div class="invalid-feedback">
                                Lütfen Yardım Tarihi giriniz.
                            </div>
                        </div>
                    </div><!-- col -->



				</div><!-- row -->
				<div class="form-row">
                    <div class="col col-lg-6 col-md-12 col-sm-12 col-12">
                        <div class="form-group">
                            <label>Yardım Eden</label>
                            <input type="text" class="form-control required" id="donorUpdate"  value="'.$values->donor.'" >
                            <div class="invalid-feedback">
                                Lütfen Yardım Edeni giriniz.
                            </div>
                        </div>
                    </div><!-- col -->
                    <div class="col col-lg-6 col-md-12 col-sm-12 col-12">
                        <div class="form-group">
                            <label>Yardım Türü</label>
                            <select  class="form-control required" id="dtidUpdate" >
                            <option>Lütfen Yardım Türü Seçiniz</option>';
                            foreach($donationTypes AS $donationType){
                                print '<option value="'.$donationType['dtid'].'"';
                                if($values->dtid==$donationType['dtid'])
                                    print ' selected ';
                                print '>'.$donationType['name'].'</option>';
                            }
                           print '</select>
                            <div class="invalid-feedback">
                                Lütfen Yardım Türü seçiniz.
                            </div>
                        </div>
                    </div><!-- col -->
				</div><!-- row -->
                    
                    <div class="form-row">
                    <div class="col col-lg-12 col-md-12 col-sm-12 col-12">
                        <div class="form-group">
                            <label>Açıklama</label>
                            <textarea class="form-control required" id="descriptionUpdate">'.$values->description .'</textarea>
                            <div class="invalid-feedback">
                                Lütfen Açıklama giriniz.
                            </div>
                        </div>
                    </div><!-- col -->



				</div><!-- row -->
				
				 <div class="form-row">
                  <div class="col col-lg-12 col-md-12 col-sm-12 col-12" >
                      <div class="form-group">
                          <label>Aile Tanımla</label>
                          <select id="pgidUpdate"  class="form-control js-example-basic-single" style="width: 100%;">';
                               if($pgid==0):
                                 print  '<option>-Lütfen Aile Seçiniz-</option>';
                              endif;
                               foreach($personGroups AS $personGroup):
                                 print  '<option value="'.$personGroup['pgid'].'" ';
                               if($values->pgid==$personGroup['pgid'])
                                   print " selected ";
                                 print ' >'.$personGroup['name'].'</option>';
                               endforeach;
                          print '</select>
                          <div class="invalid-feedback">
                              Lütfen bir aile seçiniz.
                          </div>
                      </div>
                  </div><!-- col -->
              </div><!-- row -->


			</form>';
	}


    public function sil()
    {
        if(!$_POST){ exit("Bu sayfaya ulaşım yetkiniz bulunmuyor!"); }
        $deleteList  = $this->input->post('selected',TRUE);

        $this->load->model('donation_model');
        $result = $this->donation_model->donation_delete($deleteList);

        if($result)
            echo 1;
        else
            echo 0;


    }
	
	

	

		

	
	
}