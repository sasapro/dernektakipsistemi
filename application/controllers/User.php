<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class User extends CI_Controller {


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
        $this->load->model('user_model');
        $data['roles'] = $this->user_model->role_list();
		$this->load->view('user/index',$data);
		$this->load->view('footer');
	}
	
	public function list($s)
	{
        $start = 30 * ($s-1);
		$this->load->model('user_model');
		$data['users'] = $this->user_model->list(30,$start);
		$this->load->view('user/list', $data);
	}

	
	public function insert()
	{
		if(!$_POST){ exit("Bu sayfaya ulasim yetkiniz bulunmuyor!"); }
        $username = $this->input->post('username',TRUE);
		$mail = $this->input->post('mail',TRUE);
		$password = $this->input->post('password',TRUE);
        $password = md5($password);
        $name = $this->input->post('name',TRUE);
        $surname = $this->input->post('surname',TRUE);
        $rid = $this->input->post('rid',TRUE);
		
		$values = array($username,$mail,$password,$name,$surname,$rid);
		$this->load->model('user_model');
		$sonuc = $this->user_model->insert($values);
		
		if($sonuc)
			echo 1;
		else
			echo 0;
	}

    public function update()
    {
        if(!$_POST){ exit("Bu sayfaya ulasim yetkiniz bulunmuyor!"); }
        $uid = $this->input->post('uid',TRUE);
        $username = $this->input->post('username',TRUE);
        $mail = $this->input->post('mail',TRUE);
        $password = $this->input->post('password',TRUE);
        $name = $this->input->post('name',TRUE);
        $surname = $this->input->post('surname',TRUE);
        $rid = $this->input->post('rid',TRUE);

        $this->load->model('user_model');
        if($password==""):
            $values = array($uid,$username,$mail, $name,$surname,$rid);
            $sonuc = $this->user_model->update($values);
        else:
            $password = md5($password);
            $valuesPassword = array($uid,$username,$mail,$password,$name,$surname,$rid);
            $sonuc = $this->user_model->updatePassword($valuesPassword);
        endif;

        if($sonuc)
            echo 1;
        else
            echo 0;
    }
	

	
	function updateForm($id)
	{
		$this->load->model('user_model');
		$user = $this->user_model->item($id);
        $roles = $this->user_model->role_list();

		print '  <form>

				<div class="form-row">
                    <div class="col col-lg-12 col-md-12 col-sm-12 col-12">
                        <div class="form-group">
                            <label>Kullanıcı Adı</label>
                            <input type="text" class="form-control required" id="usernameUpdate" value="'.$user->username.'" >
                            <input type="text" class="form-control required" id="uidUpdate" value="'.$user->uid.'" style="display: none;" >
                            <div class="invalid-feedback">
                                Lütfen Kullanıcıadı giriniz.
                            </div>
                        </div>
                    </div><!-- col -->
                    
                     <div class="col col-lg-12 col-md-12 col-sm-12 col-12">
                        <div class="form-group">
                            <label>E-Posta</label>
                            <input type="text" class="form-control required" id="mailUpdate"  value="'.$user->mail.'" >
                            <div class="invalid-feedback">
                                Lütfen E-Posta giriniz.
                            </div>
                        </div>
                    </div><!-- col -->



				</div><!-- row -->
				<div class="form-row">
                    <div class="col col-lg-12 col-md-12 col-sm-12 col-12">
                        <div class="form-group">
                            <label>Ad</label>
                            <input type="text" class="form-control required" id="nameUpdate"  value="'.$user->name.'" >
                            <div class="invalid-feedback">
                                Lütfen Ad giriniz.
                            </div>
                        </div>
                    </div><!-- col -->
                    <div class="col col-lg-12 col-md-12 col-sm-12 col-12">
                        <div class="form-group">
                            <label>Soyad</label>
                            <input type="text" class="form-control required" id="surnameUpdate"  value="'.$user->surname.'"  >
                            <div class="invalid-feedback">
                                Lütfen Soyad giriniz
                            </div>
                        </div>
                    </div><!-- col -->
				</div><!-- row -->

              <div class="form-row">
                  <div class="col col-lg-12 col-md-12 col-sm-12 col-12">
                      <div class="form-group">
                          <label>Parola</label>
                          <input type="password" class="form-control required" id="passwordUpdate"   >
                          <div class="invalid-feedback">
                              Lütfen Parola giriniz
                          </div>
                      </div>
                  </div><!-- col -->



              </div><!-- row -->

              <div class="form-row">
                  <div class="col col-lg-12 col-md-12 col-sm-12 col-12" >
                      <div class="form-group">
                          <label>Rol</label>
                          <select id="ridUpdate"  class="form-control js-example-basic-single" style="width: 100%;">';

                            foreach($roles AS $role):
                                print '<option ';
                                    if($user->rid==$role['rid'])
                                        print 'selected';
                                print ' value="'.$role["rid"].'">'.$role["name"].'</option>';
                            endforeach;

                          print '</select>
                          <div class="invalid-feedback">
              Lütfen bir rol seçiniz.
      </div>
    </div>
  </div><!-- col -->
</div><!-- row -->



</form>';
	}


    public function delete()
    {
        if(!$_POST){ exit("Bu sayfaya ulaşım yetkiniz bulunmuyor!"); }
        $deleteList  = $this->input->post('selected',TRUE);

        $this->load->model('user_model');
        $result = $this->user_model->delete($deleteList);

        if($result)
            echo 1;
        else
            echo 0;


    }
	
	

	

		

	
	
}