<?php

// Oturumu baslat
session_start();

// Fonksiyonlar dosyasini al
require("bk/fonksiyonlar.php");

// Oturum degiskeni kontrol et
if(isset($_SESSION['kullanici'])){
	
	// Oturumu acmis, kayit yapmaya gerek yok
	// Ana sayfaya yonlendir
	header("Location: index.php");
} 

// Hata mesajlari
$mesaj = "";

// Kontrol et
if($_POST){
	
	
	// Ad ve soyadi kontrol et. 1'den azsa o zaman hatayi goster
	if(strlen($_POST['ad']) < 1 || strlen($_POST['soyad']) < 1){
		$mesaj .= "Lutfen adınız veya soyadınız 1 karakterden fazla olsun";
	}
	
	// Epostayi kontrol et
	if(!filter_var($_POST['eposta'],FILTER_VALIDATE_EMAIL)){
		$mesaj .= "Eposta yanlış girildi<br>";
	}
	
	
	// Kullanici bir karakterden fazla olsun
	if(strlen($_POST['kullanici']) < 1){
		$mesaj .= "Lütfen kullanıcı 1 karakterden fazla olsun<br>";
	}
	
	// Sifre 4 karakterden fazla olsun
	if(strlen($_POST['kullanici']) < 3){
		$mesaj .= "Lütfen şifre 4 karakterden fazla olsun<br>";
	}
	
	// Mesaj hatasi yoksa kayit ol
	if(empty($mesaj)){
		
		$ad 		= $_POST['ad'];
		$soyad 		= $_POST['soyad'];
		$eposta 	= $_POST['eposta'];
		$kullanici 	= $_POST['kullanici'];
		$sifre		= $_POST['sifre'];
		
		$kayit = kayit ($ad, $soyad, $eposta, $kullanici, $sifre);
		
		if($kayit){
			$mesaj .= "Kayıt oldunuz! Şimdi giriş yapiniz <b><a href='giris.php'>giriş yap</a></b>";
		} else {
			$mesaj .= "Kayıt yaparken hata oluştu";
		}
	}
	
}


?>
<?php
include("bk/ust.php");
?>

        <div class="uk-flex-middle uk-text-center uk-height-1-1">
            <div class="uk-position-center" style="width: 250px;">
                <img class="uk-margin-bottom" width="140" height="120" src="data:image/svg+xml;base64,PD94bWwgdmVyc2lvbj0iMS4wIiBlbmNvZGluZz0idXRmLTgiPz4NCjwhLS0gR2VuZXJhdG9yOiBBZG9iZSBJbGx1c3RyYXRvciAxNi4wLjQsIFNWRyBFeHBvcnQgUGx1Zy1JbiAuIFNWRyBWZXJzaW9uOiA2LjAwIEJ1aWxkIDApICAtLT4NCjwhRE9DVFlQRSBzdmcgUFVCTElDICItLy9XM0MvL0RURCBTVkcgMS4xLy9FTiIgImh0dHA6Ly93d3cudzMub3JnL0dyYXBoaWNzL1NWRy8xLjEvRFREL3N2ZzExLmR0ZCI+DQo8c3ZnIHZlcnNpb249IjEuMSIgaWQ9IkViZW5lXzEiIHhtbG5zPSJodHRwOi8vd3d3LnczLm9yZy8yMDAwL3N2ZyIgeG1sbnM6eGxpbms9Imh0dHA6Ly93d3cudzMub3JnLzE5OTkveGxpbmsiIHg9IjBweCIgeT0iMHB4Ig0KCSB3aWR0aD0iMTQwcHgiIGhlaWdodD0iMTIwcHgiIHZpZXdCb3g9Ii0yOS41IDI3NS41IDE0MCAxMjAiIGVuYWJsZS1iYWNrZ3JvdW5kPSJuZXcgLTI5LjUgMjc1LjUgMTQwIDEyMCIgeG1sOnNwYWNlPSJwcmVzZXJ2ZSI+DQo8ZyBvcGFjaXR5PSIwLjciPg0KCTxwYXRoIGZpbGw9IiNEOEQ4RDgiIGQ9Ik0tNi4zMzMsMjk4LjY1NHY3My42OTFoOTMuNjY3di03My42OTFILTYuMzMzeiBNNzkuNzg4LDM2NC4zNTVIMS42NTZ2LTU3LjcwOWg3OC4xMzJWMzY0LjM1NXoiLz4NCgk8cG9seWdvbiBmaWxsPSIjRDhEOEQ4IiBwb2ludHM9IjUuODYsMzU4LjE0MSAyMS45NjIsMzQxLjIxNiAyNy45OTUsMzQzLjgyNyA0Ny4wMzIsMzIzLjU2MSA1NC41MjQsMzMyLjUyMyA1Ny45MDUsMzMwLjQ4IA0KCQk3Ni4yMDMsMzU4LjE0MSAJIi8+DQoJPGNpcmNsZSBmaWxsPSIjRDhEOEQ4IiBjeD0iMjQuNDYyIiBjeT0iMzIxLjMyMSIgcj0iNy4wMzQiLz4NCjwvZz4NCjwvc3ZnPg0K" alt="">

						<?php 
						// Hatayi goster
						if(!empty($mesaj)){
							
							print "<div class='uk-alert-danger' uk-alert>" . $mesaj . " </div>";
							
						}

						?>


                		<form action="kayit.php" class="uk-panel uk-card" method="POST">




							<div class="uk-margin">
								<label class="uk-form-label" for="ad">Ad</label>
								
								<div class="uk-form-controls">
									<input type="text" class="uk-input"  name="ad" id="ad" value="" required>
								</div>
							</div>

							<div class="uk-margin">
								<label class="uk-form-label" for="soyad">Soyad:</label>
								<div class="uk-form-controls">
									<input type="text" class="uk-input" name="soyad" id="soyad" value="" required>
								</div>
							</div>

							<div class="uk-margin">
								<label class="uk-form-label" for="eposta">Eposta</label>
								<div class="uk-form-controls">
									<input type="email" class="uk-input" name="eposta" id="eposta" value="" required>
								</div>
							</div>

							<div class="uk-margin">
								<label class="uk-form-label" for="kullanici">Kullanıcı adı</label>
								<div class="uk-form-controls">
									<input type="text" class="uk-input"  name="kullanici" id="kullanici" value="" required>
								</div>
							</div>

							<div class="uk-margin">
								<label class="uk-form-label" for="sifre">Şifre</label>
									<div class="uk-form-controls">
										<input type="password" class="uk-input" name="sifre" id="sifre" value="" required>
									</div>
							</div>


							<input type="hidden" name="kaydet" value="1"/>

							<button type="submit" class="uk-width-1-1 uk-button uk-button-primary uk-button-large">Kayıt ol</button>

							<div class="uk-margin">
			                    <div class="uk-text-center">
			                        <a href="giris.php">Giriş yap</a>
			                    </div>
			                </div>

						</form>


            </div>
        </div>
<?php
include("bk/alt.php");
?>