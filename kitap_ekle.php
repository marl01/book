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



	if(!empty($_POST['kitap_adi']) && !empty($_POST['kitap_isbn']) && !empty($_POST['kitap_resim']) && !empty($_POST['kitap_kategori'])  && !empty($_POST['kitap_yazar'])  && !empty($_POST['kitap_ozet'])  ){

		$kitap_adi = $_POST['kitap_adi'];
		$kitap_isbn = $_POST['kitap_isbn'];
		$kitap_resim = $_POST['kitap_resim'];
		$kitap_kategori = $_POST['kitap_kategori'];
		$kitap_yazar = $_POST['kitap_yazar'];
		$kitap_ozet = $_POST['kitap_ozet'];

		$sonuc = kitap_ekle($kitap_adi, $kitap_isbn, $kitap_resim, $kitap_kategori, $kitap_yazar, $kitap_ozet);

		if($sonuc){
			$_SESSION['mesaj'] = "Yeni kitap eklendi!";

			header("Location: kitap.php");

		} else {
			$mesaj = "Eklendigi zaman bir hata olustu!";
		}
	}




}


$kategoriler = kategori_goster();

$yazarlar = yazar_goster();





?>
<?php
include("bk/ust.php");
?>	
<?php
include("bk/menu.php");
?>
	<div class="uk-grid">
                <div class="uk-width-3-4@m">



                <h3>Kitap ekle</h3>

                <?php 

				// Hatayi goster
				if(!empty($mesaj)){
							
					print "<div class='uk-alert-danger' uk-alert>" . $mesaj . " </div>";
							
				}

				?>


                <form action="" method="post" class="uk-form-horizontal uk-margin-large">

				    <div class="uk-margin">

				    	<div class="uk-margin">
					        <label class="uk-form-label" for="kitap_adi">Kitap adı</label>

					        <div class="uk-form-controls">
					            <input class="uk-input" id="kitap_adi" type="text" name="kitap_adi">
					        </div>
				    	</div>

				    	<div class="uk-margin">
					        <label class="uk-form-label" for="kitap_isbn">Kitap ISBN</label>
					        <div class="uk-form-controls">
					            <input class="uk-input" id="kitap_isbn" type="text" name="kitap_isbn">
					        </div>
					    </div>

					    <div class="uk-margin">
					        <label class="uk-form-label" for="kitap_resim">Kitap resim</label>
					        <div class="uk-form-controls">
					            <input class="uk-input" id="kitap_resim" type="text" name="kitap_resim">
					        </div>
					    </div>

				         <div class="uk-margin">
					        <label class="uk-form-label" for="kitap_yazar">Kitap yazar</label>
					        <div class="uk-form-controls">
					            <select class="uk-select" id="kitap_yazar" name="kitap_yazar">
					            	<?php if($yazarlar) { 

							    	foreach ($yazarlar as $yazar) { ?>
					                	<option value="<?php print $yazar['id']; ?>"><?php print $yazar['adi']; ?></option>
					                <?php } } ?>
					            </select>
					        </div>
					    </div>

					    <div class="uk-margin">
					        <label class="uk-form-label" for="kitap_kategori">Kitap kategorisi</label>
					        <div class="uk-form-controls">
					            <select class="uk-select" id="kitap_kategori" name="kitap_kategori">
					            	<?php if($kategoriler) { 

							    	foreach ($kategoriler as $kategori) { ?>
					                	<option value="<?php print $kategori['id']; ?>"><?php print $kategori['adi']; ?></option>
					                <?php } } ?>
					            </select>
					        </div>
					    </div>

					    <div class="uk-margin">
					        <label class="uk-form-label" for="kitap_kategori">Kitap özeti</label>
					        <div class="uk-form-controls">
					            <textarea class="uk-textarea" name="kitap_ozet" rows="5" placeholder=""></textarea>
					        </div>
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