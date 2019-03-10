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
	
	
	
	// Kullanici bir karakterden fazla olsun
	if(strlen($_POST['kullanici']) < 1){
		$mesaj .= "Lütfen kullanici 1 karakterden fazla olsun<br>";
	}
	
	// Sifre 4 karakterden fazla olsun
	if(strlen($_POST['kullanici']) < 3){
		$mesaj .= "Lutfen şifre 4 karakterden fazla olsun<br>";
	}
	
	// Mesaj hatasi yoksa kayit ol
	if(empty($mesaj)){
		
		$kullanici 	= $_POST['kullanici'];
		$sifre		= $_POST['sifre'];
		
		$giris = giris($kullanici, $sifre);
		
		if($giris){
			
			$_SESSION['kullanici'] 	= $giris['kullanici'];
			$_SESSION['ad']			= $giris['ad'];
			$_SESSION['soyad']		= $giris['soyad'];
			$_SESSION['eposta']		= $giris['eposta'];
			$_SESSION['tur']		= $giris['tur'];
			
			header("Location: index.php");
			
		} else {
			$mesaj .= "Giriş yapılmadi. Tekrar deneyiniz";
		}
	}
	
}


?>
<?php
include("bk/ust.php");
?>

        <div class="uk-flex-middle uk-text-center uk-height-1-1">
            <div class="uk-position-center" style="width: 250px;">
            	<h3>Giriş</h3>
                <img class="uk-margin-bottom" width="140" height="120" src="data:image/svg+xml;base64,PD94bWwgdmVyc2lvbj0iMS4wIiBlbmNvZGluZz0idXRmLTgiPz4NCjwhLS0gR2VuZXJhdG9yOiBBZG9iZSBJbGx1c3RyYXRvciAxNi4wLjQsIFNWRyBFeHBvcnQgUGx1Zy1JbiAuIFNWRyBWZXJzaW9uOiA2LjAwIEJ1aWxkIDApICAtLT4NCjwhRE9DVFlQRSBzdmcgUFVCTElDICItLy9XM0MvL0RURCBTVkcgMS4xLy9FTiIgImh0dHA6Ly93d3cudzMub3JnL0dyYXBoaWNzL1NWRy8xLjEvRFREL3N2ZzExLmR0ZCI+DQo8c3ZnIHZlcnNpb249IjEuMSIgaWQ9IkViZW5lXzEiIHhtbG5zPSJodHRwOi8vd3d3LnczLm9yZy8yMDAwL3N2ZyIgeG1sbnM6eGxpbms9Imh0dHA6Ly93d3cudzMub3JnLzE5OTkveGxpbmsiIHg9IjBweCIgeT0iMHB4Ig0KCSB3aWR0aD0iMTQwcHgiIGhlaWdodD0iMTIwcHgiIHZpZXdCb3g9Ii0yOS41IDI3NS41IDE0MCAxMjAiIGVuYWJsZS1iYWNrZ3JvdW5kPSJuZXcgLTI5LjUgMjc1LjUgMTQwIDEyMCIgeG1sOnNwYWNlPSJwcmVzZXJ2ZSI+DQo8ZyBvcGFjaXR5PSIwLjciPg0KCTxwYXRoIGZpbGw9IiNEOEQ4RDgiIGQ9Ik0tNi4zMzMsMjk4LjY1NHY3My42OTFoOTMuNjY3di03My42OTFILTYuMzMzeiBNNzkuNzg4LDM2NC4zNTVIMS42NTZ2LTU3LjcwOWg3OC4xMzJWMzY0LjM1NXoiLz4NCgk8cG9seWdvbiBmaWxsPSIjRDhEOEQ4IiBwb2ludHM9IjUuODYsMzU4LjE0MSAyMS45NjIsMzQxLjIxNiAyNy45OTUsMzQzLjgyNyA0Ny4wMzIsMzIzLjU2MSA1NC41MjQsMzMyLjUyMyA1Ny45MDUsMzMwLjQ4IA0KCQk3Ni4yMDMsMzU4LjE0MSAJIi8+DQoJPGNpcmNsZSBmaWxsPSIjRDhEOEQ4IiBjeD0iMjQuNDYyIiBjeT0iMzIxLjMyMSIgcj0iNy4wMzQiLz4NCjwvZz4NCjwvc3ZnPg0K" alt="">

						<?php 
						// Hatayi goster
						if(!empty($mesaj)){
							
							print "<div class='uk-alert-danger' uk-alert>" . $mesaj . " </div>";
							
						}

						?>


                		<form action="giris.php" class="uk-panel uk-card" method="POST">

								<div class="uk-margin">

									<label class="uk-form-label" for="kullanici">Kullanıcı adı</label>

									<div class="uk-form-controls">
										<input class="uk-input" type="text" name="kullanici" id="kullanici" value="" required>
									</div>

								</div>

								<div class="uk-margin">

									<label class="uk-form-label" for="sifre">Şifre</label>

									<div class="uk-form-controls">
										<input class="uk-input" type="password" name="sifre" id="sifre" value="" required>
									</div>

								</div>



								<input type="hidden" name="giris" value="1"/>

								<button type="submit" class="uk-width-1-1 uk-button uk-button-primary uk-button-large">Giriş yap</button>

								<div class="uk-margin">
			                        <div class="uk-text-center">
			                        	<a href="kayit.php">Kayıt ol</a>
			                        </div>
			                    </div>

						</form>


            </div>
        </div>

<?php
include("bk/alt.php");
?>