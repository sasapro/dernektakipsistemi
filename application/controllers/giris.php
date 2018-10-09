<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Giris extends CI_Controller {


	 public function __construct()
       {
			parent::__construct();
			$kontrol = $this->session->userdata('logged_in');
			if($kontrol == true){ redirect('/anasayfa', 'location'); }
	   }
	
	public function index()
	{
			$this->load->view('giris');
	}
		
	
	
	public function kontrol()
	{
		if(!$_POST) 
			exit("Bu sayfaya ulasim yetkiniz bulunmuyor!"); 
		
		$username = $this->input->post('username',TRUE);
		$password = $this->input->post('password',TRUE);
		$md5password = md5($password);
		
		$this->load->model("log_model");
		$this->load->model("session_model");
		$usersession = $this->session_model->control($username,$md5password);
		
		
		
		if(!$usersession)
		{
			$date = date('Y.m.d H:i:s');
			$ip = ipbul();
			$values = array($username, $date, $ip,$password);
			$this->log_model->session_error_insert($values);
			echo 0;
		}else
		{
			$uid = $usersession->uid;
            $rid = $usersession->rid;
			$session_data = array(
				'uid'  => $uid,  
				'username'     => $username,  
				'password'     => $md5password,
				'rid' => $rid,
				'logged_in' => TRUE  
			);
			$this->session->set_userdata($session_data); 
			$date = date('Y.m.d H:i:s');
			$ip = ipbul();
			$values = array($uid, $date, $ip);
			$this->log_model->session_insert($values);
			
			echo $rid;
		}// if
	}
	
	public function dogrulama()
	{
		session_start();
/* Olusturulan kodu diger sayfalara tasiyabilmemiz icin oturum baslatiyoruz.
0-999 araliginda bir sayi olusturup bunu md5 ile sifreliyoruz.
*/
$md5yap=md5(rand(0,9999));
 
//md5 ile sifrelenen sayimizin uzunlugu 32 karakter olacaktir. Biz 6 karakterli alacagiz.
$captchaCode = strtoupper(substr($md5yap, 8, 6));
 
//Dogrulama icin kullanicak kodumuzu acilan oturuma kaydediyoruz.
$this->session->set_userdata("captchaCode",$captchaCode); 
 
//Resim boyutlari belirleniyor
$en = 75;
$boy = 30;
 
//Uzerinde calisacagimiz resim olusturuluyor.
$image = ImageCreate($en, $boy);
 
//Beyaz,Siyah ve Kirmizi renkler olusturuyoruz. Rakamlar renkleri ifade etmektedir.
$beyaz = ImageColorAllocate($image, 255, 255, 255);
$siyah = ImageColorAllocate($image, 0, 0, 0);
$kirmizi = ImageColorAllocate($image, 242, 0, 0);
 
//Arka plani beyaz yapiyoruz
ImageFill($image, 0, 0, $beyaz);
 
//Olusturulan dogrulama kodunu resime yaziyoruz.
ImageString($image, 6, 9, 5, $this->session->userdata("captchaCode"), $siyah);
 
//Gorunumu biraz karistirmak icin cizgilerle gorunumu zorlastiriyoruz.
//Dilerseniz imageline() satirlarini kaldirarak cizgileri yok edebilirsiniz.
imageline($image, 5, 25, $boy, 5, $kirmizi);
imageline($image, 5, 45, $boy, 0, $kirmizi);
imageline($image, 20, 65, 40, 10, $kirmizi);
imageline($image, $en, $boy, 40, 2, $kirmizi);
imageline($image, $en, $boy, 60, 0, $kirmizi);
imageline($image, $en, $boy, 50, 10, $kirmizi);
imageline($image, $en, 55, 60, 2, $kirmizi);
 
// Tarayiciya dosyamizin tipini yolluyoruz.
header("Content-Type: image/jpeg");
 
//Resmimizi Jpg formatinda basiyoruz.
ImageJpeg($image);
 
//Bir kereye mahsus kullanacagimiz icin siliyoruz.
ImageDestroy($image);
exit();

	}
	
	
}