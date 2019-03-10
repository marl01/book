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



	if(!empty($_POST['yazar_adi']) && !empty($_POST['yazar_id'])){


		$yazar_id = $_POST['yazar_id'];
		$yazar_adi = $_POST['yazar_adi'];


		$sonuc = yazar_duzenle($yazar_adi, $yazar_id);

		if($sonuc){
			$_SESSION['mesaj'] = "Yazar düzenledi!";

			header("Location: yazar.php");

		} else {
			$mesaj = "Duzenledigi zaman bir hata olustu!";
		}
	}


}


if(!empty($_GET['id'])){

	$yazar_id = $_GET['id'];
	$yazar = yazar_goster_tek($yazar_id);

} else {
	$_SESSION['mesaj'] = "Boyle bir yazar yok!";

	header("Location: yazar.php");
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



                <h3>Kitap yazar duzenle</h3>

                <?php 

				// Hatayi goster
				if(!empty($mesaj)){
							
					print "<div class='uk-alert-danger' uk-alert>" . $mesaj . " </div>";
							
				}

				?>


                <form action="" method="post" class="uk-form-horizontal uk-margin-large">

				    <div class="uk-margin">

				        <label class="uk-form-label" for="yazar_adi">Yazar adı</label>

				        <div class="uk-form-controls">
				            <input class="uk-input" id="yazar_adi" type="text" name="yazar_adi" value="<?php print $yazar['adi']; ?>">
				        </div>

				        <br>

				        <input type="hidden" name="yazar_id" value="<?php print $yazar['id']; ?>">

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