<?php

// Oturumu baslat
session_start();
// Fonksiyonlar dosyasini al
require("bk/fonksiyonlar.php");

// Hata mesajlari
$mesaj = "";

$goster = "";

if($_GET){

  if(!empty($_GET['goster'])){
    $goster = $_GET['goster'];
  }

  if($goster == "kategori" && !empty($_GET['id'])){

    $kategori_id = intval($_GET['id']);

    $kitaplar = kitaplar_goster_kategori($kategori_id);

  } else if($goster == "yazar" && !empty($_GET['id'])){

    $yazar_id = intval($_GET['id']);

    $kitaplar = kitaplar_goster_yazar($yazar_id);

  } else if($goster == "arama" && !empty($_GET['kelime'])){
    
    $kelime = $_GET['kelime'];

    $kitaplar = kitaplar_arama($kelime);
    
  } else if($goster == "kitap" && !empty($_GET['id'])){
    
    $kitap_id = $_GET['id'];

    $kitap = kitap_goster_tek($kitap_id);
    
  } else {
    $kitaplar = kitaplar_goster();
  }

} else {
  $kitaplar = kitaplar_goster();
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
                <?php 

                if(!empty($kitaplar)){ ?>

                <div class="uk-text-center uk-height-match uk-grid-divider" uk-grid>
                <?php //tasty ass 

                   foreach ($kitaplar as $kitap) { ?>
                    <div class="uk-width-1-3@m">
                        <div class="uk-card uk-card-default uk-card-small uk-card-body">
                            <div class="uk-card-badge uk-label"><?php $yazar = yazar_goster_tek($kitap['yazar']); print $yazar['adi']; ?></div>
                            <div class="uk-card-media-top">
                                <a href="index.php?goster=kitap&amp;id=<?php print $kitap['id']; ?>"><img src="<?php print $kitap['resim']; ?>" alt=""></a>
                            </div>
                            <h3 class="uk-card-title"><a href="index.php?goster=kitap&amp;id=<?php print $kitap['id']; ?>"><?php print $kitap['adi']; ?></a></h3>
                            <p></p>
                        </div>
                    </div>
                <?php } ?>

                </div>
                <?php } else if (!empty($kitap)) { ?>
                    <article class="uk-article">

                        <h1 class="uk-article-title"><?php print $kitap['adi']; ?></h1>
                        <div class="uk-cover-container">
                            <canvas width="150" height="250"></canvas>
                            <img src="<?php print $kitap['resim']; ?>" alt="" uk-cover>
                        </div>
                        <p class="uk-article-meta">Yazar <?php $yazar = yazar_goster_tek($kitap['yazar']); ?><a href="index.php?goster=yazar&amp;id=<?php print $kitap['yazar']; ?>"><?php print $yazar['adi']; ?></a> | Kategori <a href="index.php?goster=kategori&amp;id=<?php print $kitap['kategori']; ?>"><?php $kategori = kategori_goster_tek($kitap['kategori']); print $kategori['adi']; ?></a> | ISBN <?php print $kitap['isbn']; ?></p>

                        <p class="uk-text-lead"><?php print $kitap['ozet']; ?></p>


                    </article>

                    <?php } else { ?>
                    <div class="uk-alert-danger" uk-alert>
                        <p>İstediğiniz kitap, kategori, yazar bizde şimdilik yok veya olmayacaktır.</p>
                    </div>

                    <?php } ?>

                    <!--

                    <ul class="uk-pagination uk-flex-center">
                        <li class="uk-disabled"><span><i uk-icon="icon:angle-double-left""></i></span></li>
                        <li class="uk-active"><span>1</span></li>
                        <li><a href="#">2</a></li>
                        <li><a href="#">3</a></li>
                        <li><a href="#">4</a></li>
                        <li><span>...</span></li>
                        <li><a href="#">20</a></li>
                        <li><a href="#"><i uk-icon="icon:angle-double-right"></i></a></li>
                    </ul>
					 -->


                </div>

<?php
include("bk/sag.php");
?>
    </div>
<?php
include("bk/alt.php");
?>