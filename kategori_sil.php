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

if($_SESSION['tur'] != 1){
    // yetkisi yok yonlendir
    header("Location: index.php");
}

if($_GET){

	if(!empty($_GET['id'])){

		$kategori_id = $_GET['id'];
		$sonuc = kategori_sil($kategori_id);

		if($sonuc){
			$_SESSION['mesaj'] = "Kategori silindi!";

		} else {
			$_SESSION['mesaj'] = "Silindigi zaman bir hata olustu!";
		}

		header("Location: kategori.php");



	}

}





?>



