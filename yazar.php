﻿<?php

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

if(!empty($_SESSION['mesaj'])){
	$mesaj = $_SESSION['mesaj'];
	unset($_SESSION['mesaj']);
}


if(!empty($_SESSION['mesaj'])){

	$mesaj = $_SESSION['mesaj'];

	unset($_SESSION['mesaj']);
}


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
                <h3>Kitap yazarları</h3>

                <?php 

				// Hatayi goster
				if(!empty($mesaj)){
							
					print "<div class='uk-alert-success' uk-alert>" . $mesaj . " </div>";
							
				}

				?>

                <a href="yazar_ekle.php" class="uk-align-right uk-button uk-button-primary">Yeni</a>

				<table class="uk-table uk-table-justify uk-table-divider">
				    <thead>
				        <tr>
				            <th class="uk-width-small">ID</th>
				            <th>Adı</th>
				            <th>Düzenle</th>
				            <th>Sil</th>
				        </tr>
				    </thead>
				    <tbody>
				    <?php if($yazarlar) { 

				    	foreach ($yazarlar as $yazar) {


				    	?>

				    	<tr>

				    		<td><?php print $yazar['id']; ?></td>
				    		<td><?php print $yazar['adi']; ?></td>
				    		<td><a href="yazar_duzenle.php?id=<?php print $yazar['id']; ?>" class="uk-button uk-button-primary">Düzenle</a></td>
				    		<td><a href="yazar_sil.php?id=<?php print $yazar['id']; ?>"  onclick="return confirm('Silinsin mi?')"  class="uk-button uk-button-danger">Sil</a></td>

				    	</tr>
				    

				    <?php	} 





				    } else {

				    	print "<tr><td>Yazarlar yok</td><td></td><td></td><td></td></tr>";
				    	
				    }



				    ?>

				    </tbody>
				</table>


        </div>
<?php
include("bk/sag.php");
?>
    </div>
<?php
include("bk/alt.php");
?>