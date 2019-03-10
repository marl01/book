<?php

// Ayarlar.php dosyasini bu fonksiyonlar dosyasina dahil et ve ordaki veritabani ayarlarini burda kullanmak icin aliyoruz
require("ayarlar.php");


// Giris yapmak icin fonksiyon. Bize kolaylik sagliyor.
function giris ($kullanici, $sifre) {
	
	$sifre = md5($sifre);
	
	$giris_sql = "SELECT * FROM `kullanicilar` WHERE `kullanici` = '" . $kullanici . "' AND `sifre` = '" . $sifre . "'";
	
	$sonuc = veritabani_sorgu($giris_sql);
	
	$sonuc_ayikla = mysql_fetch_array($sonuc,MYSQL_ASSOC);
	$sonuc_sayi = mysql_num_rows($sonuc);
	
	if($sonuc_sayi > 0){
		
		return $sonuc_ayikla;
		
	} else {
		
		return false;
	
	}
	
	
}


// Kayit yapmak icin fonksiyon. Bize tekrar kolaylik saglar
function kayit ($ad, $soyad, $eposta, $kullanici, $sifre){
	
	$sifre = md5($sifre);
	
	$kayit_sql = "INSERT INTO `kullanicilar` (`ad`, `soyad`, `eposta`, `kullanici`, `sifre`) VALUES ('" . $ad . "', '" . $soyad . "', '" .$eposta . "', '" . $kullanici . "', '" . $sifre . "')";
	
	$sonuc = veritabani_sorgu($kayit_sql);
	
	if($sonuc){
		
		return true;
		
	} else {
		
		return false;
	
	}
}


// Burda biz veri tabanina baglaniyoruz.
function veritabani_sorgu($sql) {
	
	// Baglanti kur
	$baglanti = mysql_connect($GLOBALS['veritabani_sunucu'], $GLOBALS['veritabani_kullanici_adi'], $GLOBALS['veritabani_sifre']);

	// Baglanti yoksa hata ver
	if (!$baglanti) {
		die("Hata oldu");
	}
	
	// Veri tabani 
	$veritabani = mysql_select_db($GLOBALS['veritabani_adi'], $baglanti) or die("Veritabaný Seçilemedi");
	
	$sonuc = mysql_query($sql, $baglanti);
	
	return $sonuc;
	
}



// Kategori ekle
function kategori_ekle($adi){

	$sorgu = "INSERT INTO `kategori` (`adi`) VALUES ('" . $adi . "');";

	$sonuc = veritabani_sorgu($sorgu);
	
	if($sonuc){
		
		return true;
		
	} else {
		
		return false;
	
	}

}


// Kategori duzenle
function kategori_duzenle($kategori_adi, $kategori_id){
	
	$sorgu = "UPDATE `kategori` SET `adi` = '" . $kategori_adi . "' WHERE `kategori`.`id` = " . $kategori_id . ";";

	$sonuc = veritabani_sorgu($sorgu);
	
	if($sonuc){
		
		return true;
		
	} else {
		
		return false;
	
	}

}

// Kategori sil
function kategori_sil($kategori_id){

	$sorgu = "DELETE FROM `kategori` WHERE `kategori`.`id` = " . $kategori_id . ";";

	$sonuc = veritabani_sorgu($sorgu);
	
	if($sonuc){
		
		return true;
		
	} else {
		
		return false;
	
	}
	
}



// Kitap goster
function kategori_goster(){

	$sorgu = "SELECT * FROM `kategori`";

	$sonuc = veritabani_sorgu($sorgu);
	
	$sonuc_sayi = mysql_num_rows($sonuc);
	
	if($sonuc_sayi > 0){

		$sonuclar = array();

		while($sonuc_ayikla = mysql_fetch_array($sonuc, MYSQL_ASSOC)) {
   			$sonuclar [] = $sonuc_ayikla;
		}
		
		return $sonuclar;
		
	} else {
		
		return false;
	
	}

}

// Kategori goster
function kategori_goster_tek($kategori_id){

	$sorgu = "SELECT * FROM `kategori` WHERE `kategori`.`id` = " . $kategori_id . ";";

	$sonuc = veritabani_sorgu($sorgu);
	
	$sonuc_sayi = mysql_num_rows($sonuc);
	
	if($sonuc_sayi > 0){

		$sonuclar = mysql_fetch_assoc($sonuc);
		return $sonuclar;
		
	} else {
		
		return false;
	
	}

}




// kitap ekle
function kitap_ekle($kitap_adi, $kitap_isbn, $kitap_resim, $kitap_kategori, $kitap_yazar, $kitap_ozet){

	$sorgu = "INSERT INTO `kitaplar` ( `adi`, `isbn`, `resim`, `kategori`, `yazar`, `ozet`) VALUES ('" . $kitap_adi . "', '" . $kitap_isbn . "',  '" . $kitap_resim . "', '" . $kitap_kategori . "', '" . $kitap_yazar . "','" . $kitap_ozet . "');";

	$sonuc = veritabani_sorgu($sorgu);
	
	if($sonuc){
		
		return true;
		
	} else {
		
		return false;
	
	}

}


// kitap duzenle
function kitap_duzenle($kitap_id, $kitap_adi, $kitap_isbn, $kitap_resim, $kitap_kategori, $kitap_yazar, $kitap_ozet){
	
	$sorgu = "UPDATE `kitaplar` SET `adi` = '" . $kitap_adi . "', `isbn` = '" . $kitap_isbn . "', `resim` = '" . $kitap_resim . "', `kategori` = '" . $kitap_kategori . "', `yazar` = '" . $kitap_yazar . "', `ozet` = '" . $kitap_ozet . " ' WHERE `kitaplar`.`id` = " . $kitap_id . ";";

	$sonuc = veritabani_sorgu($sorgu);
	
	if($sonuc){
		
		return true;
		
	} else {
		
		return false;
	
	}

}

// kitap sil
function kitap_sil($kitap_id){

	$sorgu = "DELETE FROM `kitaplar` WHERE `kitaplar`.`id` = " . $kitap_id . ";";

	$sonuc = veritabani_sorgu($sorgu);
	
	if($sonuc){
		
		return true;
		
	} else {
		
		return false;
	
	}
	
}

// Kitap goster tek
function kitap_goster_tek($kitap_id){

	$sorgu = "SELECT * FROM `kitaplar` WHERE `kitaplar`.`id` = " . $kitap_id . ";";

	$sonuc = veritabani_sorgu($sorgu);
	
	$sonuc_sayi = mysql_num_rows($sonuc);
	
	if($sonuc_sayi > 0){

		$sonuclar = mysql_fetch_assoc($sonuc);
		return $sonuclar;
		
	} else {
		
		return false;
	
	}

}

// Kitap goster
function kitaplar_goster(){

	$sorgu = "SELECT * FROM `kitaplar`";

	$sonuc = veritabani_sorgu($sorgu);
	
	$sonuc_sayi = mysql_num_rows($sonuc);
	
	if($sonuc_sayi > 0){

		$sonuclar = array();

		while($sonuc_ayikla = mysql_fetch_array($sonuc, MYSQL_ASSOC)) {
   			$sonuclar [] = $sonuc_ayikla;
		}
		
		return $sonuclar;
		
	} else {
		
		return false;
	
	}

}


// Kitap kategoriye goster
function kitaplar_goster_kategori($kategori){

	$sorgu = "SELECT * FROM `kitaplar` WHERE `kitaplar`.`kategori` = " . $kategori . ";";

	$sonuc = veritabani_sorgu($sorgu);
	
	$sonuc_sayi = mysql_num_rows($sonuc);
	
	if($sonuc_sayi > 0){

		$sonuclar = array();

		while($sonuc_ayikla = mysql_fetch_array($sonuc, MYSQL_ASSOC)) {
   			$sonuclar [] = $sonuc_ayikla;
		}
		
		return $sonuclar;
		
	} else {
		
		return false;
	
	}

}

// Kitap yazara goster
function kitaplar_goster_yazar($yazar){

	$sorgu = "SELECT * FROM `kitaplar` WHERE `kitaplar`.`yazar` = " . $yazar . ";";

	$sonuc = veritabani_sorgu($sorgu);
	
	$sonuc_sayi = mysql_num_rows($sonuc);
	
	if($sonuc_sayi > 0){

		$sonuclar = array();

		while($sonuc_ayikla = mysql_fetch_array($sonuc, MYSQL_ASSOC)) {
   			$sonuclar [] = $sonuc_ayikla;
		}
		
		return $sonuclar;
		
	} else {
		
		return false;
	
	}

}
// Kitap arama yap
function kitaplar_arama($kelime){

	$sorgu = "SELECT * FROM `kitaplar` WHERE `kitaplar`.`adi` LIKE '%" . $kelime . "%';";

	$sonuc = veritabani_sorgu($sorgu);
	
	$sonuc_sayi = mysql_num_rows($sonuc);
	
	if($sonuc_sayi > 0){

		$sonuclar = array();

		while($sonuc_ayikla = mysql_fetch_array($sonuc, MYSQL_ASSOC)) {
   			$sonuclar [] = $sonuc_ayikla;
		}
		
		return $sonuclar;
		
	} else {
		
		return false;
	
	}

}


// yazar ekle
function yazar_ekle($adi){

	$sorgu = "INSERT INTO `yazar` (`adi`) VALUES ('" . $adi . "');";

	$sonuc = veritabani_sorgu($sorgu);
	
	if($sonuc){
		
		return true;
		
	} else {
		
		return false;
	
	}

}


// yazar duzenle
function yazar_duzenle($yazar_adi, $yazar_id){
	
	$sorgu = "UPDATE `yazar` SET `adi` = '" . $yazar_adi . "' WHERE `yazar`.`id` = " . $yazar_id . ";";

	$sonuc = veritabani_sorgu($sorgu);
	
	if($sonuc){
		
		return true;
		
	} else {
		
		return false;
	
	}

}

// yazar sil
function yazar_sil($yazar_id){

	$sorgu = "DELETE FROM `yazar` WHERE `yazar`.`id` = " . $yazar_id . ";";

	$sonuc = veritabani_sorgu($sorgu);
	
	if($sonuc){
		
		return true;
		
	} else {
		
		return false;
	
	}
	
}


// yazar goster
function yazar_goster(){

	$sorgu = "SELECT * FROM `yazar`";

	$sonuc = veritabani_sorgu($sorgu);
	
	$sonuc_ayikla = mysql_fetch_array($sonuc,MYSQL_ASSOC);
	$sonuc_sayi = mysql_num_rows($sonuc);
	
	$sonuc = veritabani_sorgu($sorgu);
	
	$sonuc_sayi = mysql_num_rows($sonuc);
	
	if($sonuc_sayi > 0){

		$sonuclar = array();

		while($sonuc_ayikla = mysql_fetch_array($sonuc, MYSQL_ASSOC)) {
   			$sonuclar [] = $sonuc_ayikla;
		}
		
		return $sonuclar;
		
	} else {
		
		return false;
	
	}

}

// Yazar goster tek
function yazar_goster_tek($yazar_id){

	$sorgu = "SELECT * FROM `yazar` WHERE `yazar`.`id` = " . $yazar_id . ";";

	$sonuc = veritabani_sorgu($sorgu);
	
	$sonuc_sayi = mysql_num_rows($sonuc);
	
	if($sonuc_sayi > 0){

		$sonuclar = mysql_fetch_assoc($sonuc);
		return $sonuclar;
		
	} else {
		
		return false;
	
	}

}