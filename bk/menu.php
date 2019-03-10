			<nav class="uk-navbar-container uk-margin">

        		<div class="uk-navbar">

				    <div class="uk-navbar-left">

				        <a class="uk-navbar-item uk-logo" href="index.php">Kitap tanıtım</a>

				        <ul class="uk-navbar-nav">
				        	<?php
							// Yonetici degiskeni kontrol et
								
							if(!empty($_SESSION['tur']) && $_SESSION['tur'] == 1 ){ ?>
					        <li>

					        	<a href="kategori.php">
					                Kategori
					            </a>
					            
					        </li>

					        <li>
					        	
					            <a href="yazar.php">
					                Yazar
					            </a>

					        </li>

					        <li>
					        
					            <a href="kitap.php">
					                Kitaplar
					            </a>

					        </li>
					    	<?php } ?>
				        </ul>

				        



				    </div>
				    <div class="uk-navbar-right">
						 <ul class="uk-navbar-nav">

						 	<div class="uk-navbar-item">
					            <form class="uk-search uk-search-navbar" method="GET" action="index.php">
					                <span uk-search-icon></span>
					                <input class="uk-search-input" type="search" placeholder="Arama..." name="kelime">

					                <input type="hidden" name="goster" value="arama">
					            </form>
					        </div>



						 <?php
						// Oturum degiskeni kontrol et
							
						if(!isset($_SESSION['kullanici'])){ ?>
				            <li>
				                <a href="giris.php">
				                    Giriş
				                </a>
				            </li>
				            <li>
				                <a href="kayit.php">
				                    Kayıt
				                </a>
				            </li>

				         <?php } else { ?>

				         	<li>
				                <a href="cikis.php">
				                    Çıkıs yap
				                </a>
				            </li>


				         <?php } ?>
				        </ul>

				    </div>
			   	</div>
			</nav>
