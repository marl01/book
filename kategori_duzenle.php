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



	if(!empty($_POST['kategori_adi']) && !empty($_POST['kategori_id'])){


		$kategori_id = intval($_POST['kategori_id']);
		$kategori_adi = $_POST['kategori_adi'];


		$sonuc = kategori_duzenle($kategori_adi, $kategori_id);

		if($sonuc){
			$_SESSION['mesaj'] = "Kategori düzenledi!";

			header("Location: kategori.php");

		} else {
			$mesaj = "Eklendigi zaman bir hata olustu!";
		}
	}


}


if(!empty($_GET['id'])){

	$kategori_id = intval($_GET['id']);
	$kategori = kategori_goster_tek($kategori_id);

} else {
	$_SESSION['mesaj'] = "Boyle bir kategori yok!";

	header("Location: kategori.php");
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



                <h3>Kitap kategori duzenle</h3>

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
				            <input class="uk-input" id="kategori_adi" type="text" name="kategori_adi" value="<?php print $kategori['adi']; ?>">
				        </div>

				        <br>

				        <input type="hidden" name="kategori_id" value="<?php print $kategori['id']; ?>">

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