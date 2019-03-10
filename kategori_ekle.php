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

// Hata mesajlari
$mesaj = "";



if($_POST){



	if(!empty($_POST['kategori_adi'])){

		$kategori_adi = $_POST['kategori_adi'];

		$sonuc = kategori_ekle($kategori_adi);

		if($sonuc){
			$_SESSION['mesaj'] = "Yeni kategori eklendi!";

			header("Location: kategori.php");

		} else {
			$mesaj = "Eklendigi zaman bir hata olustu!";
		}
	}




}





?>
<?php
include("bk/ust.php");
?>	
<?php
include("bk/menu.php");
?>
	<div class="uk-grid">
        <div class="uk-width-3-4@m">
                <h3>Kitap kategori ekle</h3>

                <?php 

				// Hatayi goster
				if(!empty($mesaj)){
							
					print "<div class='uk-alert-danger' uk-alert>" . $mesaj . " </div>";
							
				}

				?>


                <form action="" method="post" class="uk-form-horizontal uk-margin-large">

				    <div class="uk-margin">

				        <label class="uk-form-label" for="kategori_adi">Kategori adı</label>

				        <div class="uk-form-controls">
				            <input class="uk-input" id="kategori_adi" type="text" name="kategori_adi">
				        </div>

				        <br>

				        <div class="uk-form-controls">
				        	<button type="submit" class="uk-button uk-button-primary">Kaydet</button>
				        </div>

				    </div>

				</form>

        </div>

<?php
include("bk/sag.php");
?>
    </div>
<?php
include("bk/alt.php");
?>