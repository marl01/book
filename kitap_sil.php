<?php

// Oturumu baslat
session_start();

// Fonksiyonlar dosyasini al
require("bk/fonksiyonlar.php");

// Oturum degiskeni kontrol et
if(!isset($_SESSION['kullanici'])){
	
	// Oturumu acmis, kayit yapmaya gerek yok
	// Ana sayfaya yonlendir
	header("Location: index.php");
} 


if($_GET){

	if(!empty($_GET['id'])){

		$kitap_id = intval($_GET['id']);
		$sonuc = kitap_sil($kitap_id);

		if($sonuc){
			$_SESSION['mesaj'] = "Kitap silindi!";

		} else {
			$_SESSION['mesaj'] = "Silindigi zaman bir hata olustu!";
		}

		header("Location: kitap.php");



	}

}





?>



