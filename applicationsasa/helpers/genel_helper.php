<?php 
	function jqueryMobileCss()
	{
		echo '<link href="'.base_url().'sdosya/jmobile/jquery.mobile-1.4.2.min.css" rel="stylesheet" type="text/css" />';
	}
	function jqueryMobileJs()
	{
		echo '<script type="text/javascript" src="'.base_url().'sdosya/jmobile/jquery.mobile-1.4.2.min.js"></script>';
	}
	function jqueryJs()
	{
		echo '<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>';
	}
	function ipbul()
	{
		if(getenv("HTTP_CLIENT_IP")) 
		{ 
			$ip = getenv("HTTP_CLIENT_IP"); 
		} 
		elseif(getenv("HTTP_X_FORWARDED_FOR")) 
		{ 
			$ip = getenv("HTTP_X_FORWARDED_FOR"); 
			if (strstr($ip, ','))
			{ 
				$tmp = explode (',', $ip); 
				$ip = trim($tmp[0]); 
			} 
		} else
		{ 
			$ip = getenv("REMOTE_ADDR"); 
		} 
		return $ip; 	
	}
	
	
	function uyari($mesaj,$url)
    {
		$CI =& get_instance();
		$CI->load->helper('url');
		$CI->config->item('site_url');
		$data["mesaj"] = $mesaj;
		$data["url"] = $url;
		$CI->load->view('uyari_view',$data);
    }
	
	function uyari_yenile($mesaj,$url,$yenile)
    {
		$CI =& get_instance();
		$CI->load->helper('url');
		$CI->config->item('site_url');
		$data["mesaj"] = $mesaj;
		$data["url"] = $url;
		$data["yenile"] = $yenile;
		$CI->load->view('uyari_yenile_view',$data);
    }
	
	function giris_kontrol()
    {
		$CI =& get_instance();
		if($CI->session->userdata('logged_in') != TRUE)
		{
			return FALSE;
		}else
		{
		$kullanici = $CI->session->userdata("kullanici");
		$sifre = $CI->session->userdata("sifre");
		$CI->load->model("yetkili_model");
		$kullanicigiris = $CI->yetkili_model->kontrol($kullanici,$sifre);
		if($kullanicigiris)
		{
			return TRUE;
		}else
		{
			return FALSE;
		}
		}
    }
	
	function yetkiKontrol($yetkiAlani){
		$CI =& get_instance();
		if($CI->session->userdata("tur")==2){
			$CI->load->model("yetkili_model");
			return $CI->yetkili_model->ykontrol($CI->session->userdata("kullaniciid"),$yetkiAlani);
		}else{
			$yetki = new stdClass;
			$yetki->duzenle = 0;
			$yetki->sil = 0;
			$yetki->ekle = 0;
			return $yetki;
		}
	}
	
		function veri_filtrele($text)
	{
		$text = trim($text);
$search = array('<script>','</script>','<script','alert(','<?php','<html>','<head>','<title>');
$replace = array(' ',' ',' ',' ',' ',' ',' ',' ');
$new_text = str_replace($search,$replace,$text);
return $new_text;
	}

	function karakter($text)
	{
		$text = trim($text);
$search = array('�','�','�','�','�','�','�','�','�','�','�','�',' ','&','"','/','?','*','+','%','{','}','=','#','!','[',']','(',')','^','@',',',';','\'');
$replace = array('C','c','G','g','i','I','O','o','S','s','U','u','_','','','_','_','','','_','_','_','_','_','','_','_','_','_','_','_','','','');
$new_text = str_replace($search,$replace,$text);
return $new_text;
	}
	
	function buyukHarf($str)
	{
		$str = str_replace(array('i', '�', '�', '�', '�', '�', '�'), array('�', 'I', '�', '�', '�', '�', '�'), $str);
return strtoupper($str);
	}
	
	function mailkarakter($text)
	{
		$text = trim($text);
$search = array('�','�','�','�','�','�','�','�','�','�','�','�','*','+','%','{','}','=','#','[',']','(',')','^','@');
$replace = array('C','c','G','g','i','I','O','o','S','s','U','u','','','_','_','_','_','_','_','_','_','_','_','_');
$new_text = str_replace($search,$replace,$text);
return $new_text;
	}
	
	function excelHarf($sira)
	{
		$harf = array('A','B','C','D','E','F','G','H','I','J','K','L','M','N','O','P','Q','R','S','T','U','V','W','X','Y','Z');
		$i=$sira/26-1; $j=$sira;
		
		if($j>25)
			return $harf[$i].$harf[$j%26];	
		else
			return $harf[$j];
	}

?>