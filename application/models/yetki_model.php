<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Yetki_model extends CI_Model {

	function control($user,$password){
		
		$query = $this->db->query("SELECT * FROM ".$this->db->dbprefix('user')." WHERE username='$user' AND sifre='$password'");
		
		if($query->num_rows() > 0)
		
			return $query->row();
		
		return FALSE;
	}
	
	
	function __construct(){
		$this->load->database();
	}

	
	function liste()
	{
		$this->db->select('*');
		$this->db->from('yetkili');
		$admin = $this->db->get();
		return $admin->result_array();
	}
	
	function getir($id)
	{
		$this->db->select('*');
		$this->db->from('yetkili');
		$this->db->where('yetkili_id',$id);
		$admin = $this->db->get();
		return $admin->row();
	}
	
	function mailGetir($mail)
	{
		$this->db->select('*');
		$this->db->from('yetkili');
		$this->db->where('mail',$mail);
		$veri = $this->db->get();
		if($veri->num_rows>0)
			return $veri->row();
		else
			return FALSe;
	}
	
	function kaydet($degerler)
	{
		$mail = $this->db->escape_str($degerler[0]);
		$sifre	= $this->db->escape_str($degerler[1]);
		$ad = $this->db->escape_str($degerler[2]);
		$soyad = $this->db->escape_str($degerler[3]);
		$durum = $this->db->escape_str($degerler[4]);
		$ekleyen = $this->db->escape_str($degerler[5]);
		$ekleyen_ip = $this->db->escape_str($degerler[6]);
		$ekleme_tarihi = $this->db->escape_str($degerler[7]);
		$tc = $this->db->escape_str($degerler[8]);
		$gorev = $this->db->escape_str($degerler[9]);
		$yetki = $this->db->escape_str($degerler[10]);
		$uyruk = $this->db->escape_str($degerler[11]);
		$nufus_cuzdan_no = $this->db->escape_str($degerler[12]);
		$cilt_no = $this->db->escape_str($degerler[13]);
		$aile_sira_no = $this->db->escape_str($degerler[14]);
		$sira_no = $this->db->escape_str($degerler[15]);
		$anne_adi = $this->db->escape_str($degerler[16]);
		$baba_adi = $this->db->escape_str($degerler[17]);
		$adres = $this->db->escape_str($degerler[18]);
		$telefon = $this->db->escape_str($degerler[19]);
		$medeni_durum = $this->db->escape_str($degerler[20]);
		$mezun_okul = $this->db->escape_str($degerler[21]);
		$mezuniyet = $this->db->escape_str($degerler[22]);
		$kan = $this->db->escape_str($degerler[23]);
		$sertifika = $this->db->escape_str($degerler[24]);
		$dogum_yeri = $this->db->escape_str($degerler[25]);
		$dogum_tarihi = $this->db->escape_str($degerler[26]);
		$il = $this->db->escape_str($degerler[27]);
		$ilce = $this->db->escape_str($degerler[28]);
		$cinsiyet = $this->db->escape_str($degerler[29]);
		
		
		$data = array(
						'mail'     => $mail,
						'sifre'     => $sifre,
						'ad'       => $ad,
						'soyad'    => $soyad,
						'durum'         => $durum,
					    'ekleyen'       => $ekleyen,
						'ekleyen_ip'    => $ekleyen_ip,
						'ekleme_tarihi' => $ekleme_tarihi,
						'tc'            => $tc,
						'gorevi'        => $gorev,
						'yetki'         => $yetki,
						'uyruk'         => $uyruk,
						'nufus_cuzdan_no'         => $nufus_cuzdan_no,
						'cilt_no'         => $cilt_no,
						'aile_sira_no'         => $aile_sira_no,
						'sira_no'         => $sira_no,
						'anne_adi'         => $anne_adi,
						'baba_adi'         => $baba_adi,
						'adres'         => $adres,
						'telefon'         => $telefon,
						'medeni_durum'         => $medeni_durum,
						'mezun_okul'         => $mezun_okul,
						'mezuniyet'         => $mezuniyet,
						'kan_grubu'         => $kan,
						'sertifika'         => $sertifika,
						'dogum_yeri'         => $dogum_yeri,
						'dogum_tarihi'         => $dogum_tarihi,
						'il_id'         => $il,
						'ilce_id'         => $ilce,
						'cinsiyet'         => $cinsiyet
					 );
					 
		$ekle = $this->db->insert('yetkili',$data);
		$yetkili_id = $this->db->insert_id('yetkili'); 
		
		if($ekle)
		{			
			return $yetkili_id;
			
		}else
		{
			return FALSE;
		}
	
	}
	
	function guncelle($degerler,$id)
	{
		$mail = $this->db->escape_str($degerler[0]);
		$ad = $this->db->escape_str($degerler[1]);
		$soyad = $this->db->escape_str($degerler[2]);
		$durum = $this->db->escape_str($degerler[3]);
		$guncelleyen = $this->db->escape_str($degerler[4]);
		$guncelleyen_ip = $this->db->escape_str($degerler[5]);
		$guncelleme_tarihi = $this->db->escape_str($degerler[6]);
		$tc = $this->db->escape_str($degerler[7]);
		$gorev = $this->db->escape_str($degerler[8]);
		$yetki = $this->db->escape_str($degerler[9]);
		$uyruk = $this->db->escape_str($degerler[10]);
		$nufus_cuzdan_no = $this->db->escape_str($degerler[11]);
		$cilt_no = $this->db->escape_str($degerler[12]);
		$aile_sira_no = $this->db->escape_str($degerler[13]);
		$sira_no = $this->db->escape_str($degerler[14]);
		$anne_adi = $this->db->escape_str($degerler[15]);
		$baba_adi = $this->db->escape_str($degerler[16]);
		$adres = $this->db->escape_str($degerler[17]);
		$telefon = $this->db->escape_str($degerler[15]);
		$medeni_durum = $this->db->escape_str($degerler[19]);
		$mezun_okul = $this->db->escape_str($degerler[20]);
		$mezuniyet = $this->db->escape_str($degerler[21]);
		$kan = $this->db->escape_str($degerler[22]);
		$sertifika = $this->db->escape_str($degerler[23]);
		$dogum_yeri = $this->db->escape_str($degerler[24]);
		$dogum_tarihi = $this->db->escape_str($degerler[25]);
		$il = $this->db->escape_str($degerler[26]);
		$ilce = $this->db->escape_str($degerler[27]);
		$cinsiyet = $this->db->escape_str($degerler[28]);
		
		
		$data = array(
						'mail'         => $mail,
						'ad'           => $ad,
						'soyad'        => $soyad,
						'durum'             => $durum,
					    'guncelleyen'       => $guncelleyen,
						'guncelleyen_ip'    => $guncelleyen_ip,
						'guncelleme_tarihi' => $guncelleme_tarihi,
						'tc'            => $tc,
						'gorevi'        => $gorev,
						'yetki'         => $yetki,
						'uyruk'         => $uyruk,
						'nufus_cuzdan_no'         => $nufus_cuzdan_no,
						'cilt_no'         => $cilt_no,
						'aile_sira_no'         => $aile_sira_no,
						'sira_no'         => $sira_no,
						'anne_adi'         => $anne_adi,
						'baba_adi'         => $baba_adi,
						'adres'         => $adres,
						'telefon'         => $telefon,
						'medeni_durum'         => $medeni_durum,
						'mezun_okul'         => $mezun_okul,
						'mezuniyet'         => $mezuniyet,
						'kan_grubu'         => $kan,
						'sertifika'         => $sertifika,
						'dogum_yeri'         => $dogum_yeri,
						'dogum_tarihi'         => $dogum_tarihi,
						'il_id'         => $il,
						'ilce_id'         => $ilce,
						'cinsiyet'         => $cinsiyet
					 );
		
		$this->db->where('yetkili_id', $id);		
		$guncelle = $this->db->update('yetkili',$data);
		
		if($guncelle)
		{
				return TRUE;
		}else
		{
			return FALSE;
		}
	
	}
	
	function sifre_guncelle($sifre,$id)
	{
		
		
		$data = array(
						'sifre'         => $sifre
					 );
		
		$this->db->where('yetkili_id', $id);		
		$guncelle = $this->db->update('yetkili',$data);
		
		if($guncelle)
		{
				return TRUE;
		}else
		{
			return FALSE;
		}
	
	}
	
	function benGuncelle($degerler)
	{
		$mail = $this->db->escape_str($degerler[0]);
		$ad = $this->db->escape_str($degerler[1]);
		$soyad = $this->db->escape_str($degerler[2]);
		$tc = $this->db->escape_str($degerler[3]);
		$gorev = $this->db->escape_str($degerler[4]);
		$uyruk = $this->db->escape_str($degerler[5]);
		$nufusCuzdanNo = $this->db->escape_str($degerler[6]);
		$ciltNo = $this->db->escape_str($degerler[7]);
		$aileSiraNo = $this->db->escape_str($degerler[8]);
		$siraNo = $this->db->escape_str($degerler[9]);
		$anneAdi = $this->db->escape_str($degerler[10]);
		$babaAdi = $this->db->escape_str($degerler[11]);
		$adres = $this->db->escape_str($degerler[12]);
		$telefon = $this->db->escape_str($degerler[13]);
		$medeniDurum = $this->db->escape_str($degerler[14]);
		$mezunOkul = $this->db->escape_str($degerler[15]);
		$mezuniyet = $this->db->escape_str($degerler[16]);
		$kan = $this->db->escape_str($degerler[17]);
		$sertifika = $this->db->escape_str($degerler[18]);
		$dogumYeri = $this->db->escape_str($degerler[19]);
		$dogumTarihi = $this->db->escape_str($degerler[20]);
		$cinsiyet = $this->db->escape_str($degerler[21]);
		$evlilikTarihi = $this->db->escape_str($degerler[22]);
		
		
		$data = array(
						'mail'      	   => $mail,
						'ad'        	   => $ad,
						'soyad'      	  => $soyad,
						'tc'             => $tc,
					    'gorevi'       => $gorev,
						'uyruk'    => $uyruk,
						'nufus_cuzdan_no' => $nufusCuzdanNo,
						'cilt_no'            => $ciltNo,
						'aile_sira_no'        => $aileSiraNo,
						'sira_no'         => $siraNo,
						'anne_adi'         => $anneAdi,
						'baba_adi'         => $babaAdi,
						'adres'         => $adres,
						'telefon'         => $telefon,
						'medeni_durum'         => $medeniDurum,
						'mezun_okul'         => $mezunOkul,
						'mezuniyet'         => $mezuniyet,
						'kan_grubu'         => $kan,
						'sertifika'         => $sertifika,
						'dogum_yeri'         => $dogumYeri,
						'dogum_tarihi'         => $dogumTarihi,
						'cinsiyet'         => $cinsiyet,
						'evlilik_tarihi'         => $evlilikTarihi
					 );
		
		$this->db->where('yetkili_id', $this->session->userdata('kullaniciid'));		
		$guncelle = $this->db->update('yetkili',$data);
		
		if($guncelle)
		{
				return TRUE;
		}else
		{
			return FALSE;
		}
	
	}
	
	function resimKaydet($resim)
	{
		
		
		$data = array(
						'resim'      	   => $resim
					 );
		
		$this->db->where('yetkili_id', $this->session->userdata('kullaniciid'));		
		$guncelle = $this->db->update('yetkili',$data);
		
		if($guncelle)
				return TRUE;
		else
			return FALSE;
	
	}
	
	function guncelles($degerler,$id)
	{
		$uye_email = $this->db->escape_str($degerler[0]);
		$uye_sifre = $this->db->escape_str($degerler[1]);
		$uye_adi = $this->db->escape_str($degerler[2]);
		$uye_soyadi = $this->db->escape_str($degerler[3]);
		$durum = $this->db->escape_str($degerler[4]);
		$guncelleyen = $this->db->escape_str($degerler[5]);
		$guncelleyen_ip = $this->db->escape_str($degerler[6]);
		$guncelleme_tarihi = $this->db->escape_str($degerler[7]);
		$tc = $this->db->escape_str($degerler[8]);
		$gorev = $this->db->escape_str($degerler[9]);
		$yetki = $this->db->escape_str($degerler[10]);
		
		
		$data = array(
						'mail'      	   => $mail,
						'sifre'      	   => $sifre,
						'ad'        	   => $ad,
						'soyad'      	  => $soyad,
						'durum'             => $durum,
					    'guncelleyen'       => $guncelleyen,
						'guncelleyen_ip'    => $guncelleyen_ip,
						'guncelleme_tarihi' => $guncelleme_tarihi,
						'tc'            => $tc,
						'gorevi'        => $gorev,
						'yetki'         => $yetki
					 );
		
		$this->db->where('yetkili_id', $id);		
		$guncelle = $this->db->update('yetkili',$data);
		
		if($guncelle)
		{
				return TRUE;
		}else
		{
			return FALSE;
		}
	
	}
	
	function sil($s)
	{
		
		foreach($s AS $id)
		{
			$tablolar = array('yetkili', 'yetkili_grup', 'site_yetki');
			$this->db->where('yetkili_id', $id);
			$this->db->delete($tablolar);			
		}
		
		return TRUE;
		
	}
	
	
	
	
	
	function yetki($yetkili_id, $alan_id)
	{
			$query = $this->db->query("SELECT * FROM ".$this->db->dbprefix('yetkili_yetki')." WHERE yetkili_id='$yetkili_id' AND alan_id='$alan_id'");
		
		if($query->num_rows() > 0)
		
			return $query->row();
		
		return FALSE;
		
	
	}
	
	function yetki_grup($yetkili_id, $grup_id)
	{
			$query = $this->db->query("SELECT * FROM ".$this->db->dbprefix('yetkili_grup')." WHERE yetkili_id='$yetkili_id' AND yetki_grup_id='$grup_id'");
		
		if($query->num_rows() > 0)
		
			return $query->row();
		
		return FALSE;
		
	
	}
	
	function yetki_kontrol($id, $alan_id)
	{
	
		$this->db->select('*');
		$this->db->from('yetkili_yetki');
		$this->db->where('yetkili_id',$id);
		$this->db->where('alan_id',$alan_id);
		$admin = $this->db->get();
		return $admin->row();
	}
	
	function yetkisil($id,$grup_id)
	{
		
		
			
			$this->db->where('yetkili_id', $id);
			$this->db->where('yetki_grup_id', $grup_id);
			$sil = $this->db->delete('yetkili_grup');			
			
			if($sil)
			{
				return TRUE;
			}else
			{
				return FALSE;
			}
		
	}
	
	function yetkiekle($id,$grup_id)
	{
		
		$data = array(
						'yetkili_id'  => $id,
						'yetki_grup_id'     => $grup_id
					 );
					 
		$ekle = $this->db->insert('yetkili_grup',$data);
		
		if($ekle)
		{
			return TRUE;
		}else
		{
			return FALSE;
		}
	}
	
	function yetkiguncelle($degerler,$id,$alanid)
	{
	
		$ekle = $this->db->escape_str($degerler[0]);
		$silme = $this->db->escape_str($degerler[1]);
		$duzenle = $this->db->escape_str($degerler[2]);
		
		$data = array(
						'ekle'      => $ekle,
						'duzenle'   => $duzenle,
						'sil'       => $silme
					 );
					 
		$this->db->where('yetkili_id', $id);	
		$this->db->where('alan_id', $alanid);			
		$guncelle = $this->db->update('yetkili_yetki',$data);
		
		
		if($guncelle)
		{
			return TRUE;
		}else
		{
			return FALSE;
		}
	}
	
	function ykontrol($id, $alan_id)
	{
		$this->db->select('*');
		$this->db->from('yetki_sorgula');
		$this->db->where('yetkili_id',$id);
		$this->db->where('alan_id',$alan_id);
		$this->db->where('site_id',$this->session->userdata("okulid"));
		$site = $this->db->get();
		if($site->num_rows() > 0)
		{
		return $site->row();
		}else
		{
			return FALSE;
		}
	
	}
	
	
	function atamaListe($id)
	{
		$this->db->select('*');
		$this->db->from('yetkili_atama');
		$this->db->where('yetkili_id',$id);
		$this->db->where('okul_id',$this->session->userdata("okulid"));
		$veri = $this->db->get();
		return $veri->result_array();
	}
	
	function atamaGetir($id)
	{
		$this->db->select('*');
		$this->db->from('yetkili_atama');
		$this->db->where('yetkili_id',$id);
		$veri = $this->db->get();
		return $veri->row();
	}
	
	function atamaEkle($degerler)
	{
		$okul = $this->db->escape_str($degerler[0]);
		$sinif_kat	= $this->db->escape_str($degerler[1]);
		$sinif = $this->db->escape_str($degerler[2]);
		$ders_kat = $this->db->escape_str($degerler[3]);
		$ders = $this->db->escape_str($degerler[4]);
		$yetkili_id = $this->db->escape_str($degerler[5]);
		
		$data = array(
						'okul_id'     => $okul,
						'sinif_kat_id'     => $sinif_kat,
						'sinif_id'       => $sinif,
						'ders_kat_id'    => $ders_kat,
						'ders_id'         => $ders,
						'yetkili_id'         => $yetkili_id
					 );
					 
		$ekle = $this->db->insert('yetkili_atama',$data);
		
		if($ekle)
		{			
			return TRUE;
			
		}else
		{
			return FALSE;
		}
	
	}
	
	function atamaSil($id)
	{
		
		
			
			$this->db->where('yetkili_atama_id', $id);
			$sil = $this->db->delete('yetkili_atama');			
			
			if($sil)
			{
				return TRUE;
			}else
			{
				return FALSE;
			}
		
	}
	
	function dersAtamaGetir($dersId)
	{
		$this->db->select('*');
		$this->db->from('yetkili_atama');
		$this->db->where('ders_id',$dersId);
		$admin = $this->db->get();
		return $admin->row();
	}
	
	function otoGuncelle($alan, $veri)
	{		
		
		$data = array(
						$alan  => $veri
					 );
		
		$this->db->where('yetkili_id', $this->session->userdata('kullaniciid'));			 
		$guncelle = $this->db->update('yetkili',$data);
		
		if($guncelle)
			return TRUE;
		else
			return FALSE;
	
	}
	
	function aktivasyonKontrol($mail, $onayKodu)
	{
		$this->db->select('*');
		$this->db->from('yetkili');
		$this->db->where('mail',$mail);
		$this->db->where('onay_kodu',$onayKodu);
		$veri = $this->db->get();
		
		if($veri->num_rows()<=0)
			return FALSE;
			
		return $veri->row();
	}
	
	function aktivasyonGuncelle($id, $onayKodu)
	{		
		
		$data = array(
						'onay_kodu'  => $onayKodu,
						'mail_onay' => 1
					 );
		
		$this->db->where('yetkili_id', $id);			 
		$guncelle = $this->db->update('yetkili',$data);
		
		if($guncelle)
			return TRUE;
		else
			return FALSE;
	
	}
	
	function aktivasyonSifreGuncelle($id, $onayKodu, $sifre)
	{		
		
		$data = array(
						'sifre'  => $sifre
					 );
		
		$this->db->where('yetkili_id', $id);	
		$this->db->where('onay_kodu', $onayKodu);		
		$guncelle = $this->db->update('yetkili',$data);
		
		if($guncelle)
			return TRUE;
		else
			return FALSE;
	
	}
	
	
	
}

?>