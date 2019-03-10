-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Anamakine: 127.0.0.1
-- Üretim Zamanı: 01 Ara 2017, 08:40:22
-- Sunucu sürümü: 10.1.19-MariaDB
-- PHP Sürümü: 5.5.38

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Veritabanı: `kitap`
--

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `kategori`
--

CREATE TABLE `kategori` (
  `id` int(11) NOT NULL,
  `adi` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Tablo döküm verisi `kategori`
--

INSERT INTO `kategori` (`id`, `adi`) VALUES
(11, 'Fantastik 1'),
(12, 'Roman'),
(13, 'Åžiir'),
(14, 'Korku');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `kitaplar`
--

CREATE TABLE `kitaplar` (
  `id` int(11) NOT NULL,
  `adi` varchar(50) NOT NULL,
  `kategori` int(11) NOT NULL,
  `yazar` int(11) NOT NULL,
  `ozet` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Tablo döküm verisi `kitaplar`
--

INSERT INTO `kitaplar` (`id`, `adi`, `kategori`, `yazar`, `ozet`) VALUES
(7, 'Sonat', 11, 6, 'jkhfkszdlfja<skdÅŸa<lzl '),
(8, 'Mavi Ev', 12, 7, 'KapÄ±lar vardÄ±r kapanan... iÃ§ten dÄ±ÅŸa, dÄ±ÅŸtan iÃ§e...\r\niÃ§imizden dÄ±ÅŸÄ±mÄ±zdakilere kapattÄ±klarÄ±mÄ±z ve dÄ±ÅŸÄ±mÄ±zdakilerin\r\niÃ§e doÄŸru yani bize kapattÄ±klarÄ±.\r\nVe bazen bir kapÄ± aralÄ±ÄŸÄ±nda unutuluyor\r\nadÄ±na aÅŸk denebilecek bÃ¼tÃ¼n bakÄ±ÅŸmalar.'),
(9, 'GÃ¶kyÃ¼zÃ¼ne Not', 12, 8, 'Ne balÄ±ÄŸÄ±n yeri akvaryum ne kuÅŸun yeri kafes...\r\nHerkesin bir vatanÄ± var benimki sensin...\r\n \r\nKÃ¼Ã§Ã¼k bir mucize istiyorum. Senin yanÄ±mda olduÄŸun ve benim sadece sana ait olduÄŸum bir mucize. Ä°kimiz iÃ§in yazÄ±lmÄ±ÅŸ ama ikimizin de okumadÄ±ÄŸÄ± bir kitap, bize birbirimizi anlatan ama dinlemeye korktuÄŸumuz bir ÅŸarkÄ± ve hiÃ§ bakmadÄ±ÄŸÄ±mÄ±z ama iÃ§inde sadece ikimizin olduÄŸu bir fotoÄŸraf olsun istiyorum.\r\n \r\nSenin hikÃ¢yende kendime bir yer arÄ±yorum. Belki de ikimiz iÃ§in yeni bir hikÃ¢ye yazmak istiyorum. Mutlu olsam da olmasam da bu benim hikÃ¢yem demek istiyorum. Bu dÃ¼nyada tek bir hayat yaÅŸayacaksak eÄŸer ve sonunda biten bizim hikÃ¢yemiz olacaksa yaÅŸadÄ±ÄŸÄ±mÄ±z hikÃ¢ye de bize ait olmalÄ±...\r\n \r\nBir sokak arasÄ±nda tuttun ellerimi, ki ben buna bile hazÄ±r deÄŸildim. GÃ¶zlerin gÃ¶zlerimdeydi. â€œÃ–mrÃ¼mÃ¼ vereceÄŸim kadÄ±n sen misin?â€ der gibi baktÄ±m. â€œSen benim iÃ§in yaratÄ±ldÄ±nâ€ dedin gÃ¶zlerinle. O sessizliÄŸin iÃ§inde gÃ¶zlerimizle konuÅŸtuÄŸumuz ne varsa gÃ¶kyÃ¼zÃ¼ne not olup uÃ§tu ve biz bir mucizeye inanÄ±p sonsuz bir hikÃ¢ye olmak istedik.\r\n'),
(10, 'KÃ¼rk Mantolu Madonna', 12, 9, '"Her gÃ¼n, daima Ã¶ÄŸleden sonra oraya gidiyor, koridorlardaki resimlere bakÄ±yormuÅŸ gibi aÄŸÄ±r aÄŸÄ±r, fakat bÃ¼yÃ¼k bir sabÄ±rsÄ±zlÄ±kla asÄ±l hedefine varmak isteyen adÄ±mlarÄ±mÄ± zorla zapt ederek geziniyor, rastgele gÃ¶zÃ¼me Ã§arpmÄ±ÅŸ gibi Ã¶nÃ¼nde durduÄŸum "KÃ¼rk Mantolu Madonna"yÄ± seyre dalÄ±yor, ta kapÄ±lar kapanÄ±ncaya kadar orada bekliyordum." Kimi tutkular rehberimiz olur yaÅŸam boyunca. KollarÄ±yla bizi sarar. Sorgulamadan peÅŸlerinden gideriz ve hiÃ§ piÅŸman olmayacaÄŸÄ±mÄ±zÄ± biliriz. YapÄ±tlarÄ±nda insanlarÄ±n gÃ¶rÃ¼nmeyen yÃ¼zlerini ortaya Ã§Ä±karan Sabahattin Ali, bu kitabÄ±nda gÃ¼Ã§lÃ¼ bir tutkunun resmini Ã§iziyor. DÃ¼zenin sildiÄŸi kiÅŸiliklere, yaÅŸamÄ±n uÃ§uculuÄŸuna ve aÅŸkÄ±n olanaksÄ±zlÄ±ÄŸÄ±na (?) dair, yanÄ±tlanmasÄ± zor sorular soruyor. '),
(11, 'BÃ¶ÄŸÃ¼rtlen KÄ±ÅŸÄ±', 12, 11, 'Kalbinizin derinliklerine iÅŸlenen acÄ±yÄ±, tek kelimeyle nasÄ±l dile getirirsiniz?\r\n\r\nâ€œCanÄ±m Danielâ€™Ä±m,\r\n\r\nKaybolduÄŸun gÃ¼n dÃ¼nyam sona erdi, canÄ±m oÄŸlum. Seni her kim alÄ±p gÃ¶tÃ¼rdÃ¼yse, seninle birlikte kalbimi, hayatÄ±mÄ± da Ã§aldÄ±. Ben senin gÃ¼lÃ¼msediÄŸini gÃ¶rmek, kahkahalarÄ±nÄ± duymak, mutluluÄŸunu paylaÅŸmak iÃ§in yaÅŸÄ±yordumâ€¦â€\r\n\r\nVera Ray 1933 yÄ±lÄ±nÄ±n o karlÄ± mayÄ±s akÅŸamÄ±nda Ã¼Ã§ yaÅŸÄ±ndaki oÄŸlu Danielâ€™Ä± son kez Ã¶ptÃ¼ÄŸÃ¼nÃ¼ bilmiyordur. Her ne kadar oÄŸlunu yalnÄ±z bÄ±rakma dÃ¼ÅŸÃ¼ncesinden nefret etse de hayatlarÄ±nÄ± devam ettirmek iÃ§in Ã§alÄ±ÅŸmak zorundadÄ±r. Tek avuntusu, gÃ¼n aÄŸardÄ±ÄŸÄ±nda kÃ¼Ã§Ã¼cÃ¼k oÄŸluna sarÄ±lacak olmasÄ±dÄ±r. Ancak Vera geri dÃ¶ndÃ¼ÄŸÃ¼nde karÅŸÄ±laÅŸtÄ±ÄŸÄ± manzara, Danielâ€™Ä±n boÅŸ yataÄŸÄ±dÄ±r. Bir de karlar iÃ§ine gÃ¶mÃ¼lmÃ¼ÅŸ olan oyuncak ayÄ±sÄ±â€¦\r\n\r\nSeksen sene sonra Seattle yine mayÄ±s ayÄ±nda karlar altÄ±ndadÄ±r. KÃ¶klÃ¼ bir gazetede muhabir olan Claire Aldridge, bu doÄŸaÃ¼stÃ¼ olayÄ± haber yapacaktÄ±r. AraÅŸtÄ±rmalarÄ±na devam eden Claire, kÃ¼Ã§Ã¼k Ã§ocuÄŸun bu zamana kadar sonuÃ§lanmamÄ±ÅŸ kaÃ§Ä±rÄ±lma davasÄ±yla karÅŸÄ±laÅŸÄ±r. Evlat kaybetmenin ne demek olduÄŸunu Ã§ok iyi bilen Claire, bu olayÄ± Ã§Ã¶zmeye karar verir. Ancak Ã§Ã¶zdÃ¼ÄŸÃ¼ her dÃ¼ÄŸÃ¼mÃ¼n, onu Veraâ€™yla olan baÄŸlantÄ±sÄ±na yaklaÅŸtÄ±rdÄ±ÄŸÄ±ndan habersizdirâ€¦\r\n\r\nBÃ¶ÄŸÃ¼rtlen KÄ±ÅŸÄ± aÅŸkÄ±, umudu ve umutsuzluÄŸu derinden anlatan muhteÅŸem bir kitap. Bu Ã¶ykÃ¼yÃ¼ yÃ¼reklerinizden kolay kolay silip atamayacaksÄ±nÄ±z.\r\n'),
(12, 'Su Cilgin Turkler', 12, 12, 'kmÄŸxdilkdfÄŸs'),
(13, 'Vuslat Vakti', 12, 15, 'GÃ¶rÃ¼cÃ¼ UsulÃ¼ Ask'),
(14, 'Vuslat', 12, 16, 'jhdfÄ±lsdhkjspziÅŸlasÄŸpÅŸ');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `kullanicilar`
--

CREATE TABLE `kullanicilar` (
  `id` int(11) NOT NULL,
  `ad` varchar(50) NOT NULL,
  `soyad` varchar(50) NOT NULL,
  `eposta` varchar(50) NOT NULL,
  `kullanici` varchar(50) NOT NULL,
  `sifre` varchar(32) NOT NULL,
  `tur` tinyint(1) NOT NULL DEFAULT '2'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Tablo döküm verisi `kullanicilar`
--

INSERT INTO `kullanicilar` (`id`, `ad`, `soyad`, `eposta`, `kullanici`, `sifre`, `tur`) VALUES
(1, 'Buket', 'Ayik', 'buketaykk58@gmail.com', 'buket', 'e10adc3949ba59abbe56e057f20f883e', 1),
(4, 'tohir', 'Hisaynov', 'tohir64@gmail.com', 'toohir', 'e10adc3949ba59abbe56e057f20f883e', 2),
(5, 'Ozge', 'Yesil', 'ozge27@hotmail.com', 'ozgeafb', 'e10adc3949ba59abbe56e057f20f883e', 2);

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `yazar`
--

CREATE TABLE `yazar` (
  `id` int(11) NOT NULL,
  `adi` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Tablo döküm verisi `yazar`
--

INSERT INTO `yazar` (`id`, `adi`) VALUES
(6, 'IÅŸÄ±lsu GÃ¼ltekin Aslan'),
(7, 'Kahraman TazeoÄŸlu'),
(8, 'Ahmet Batman'),
(9, 'Sabahattin Ali '),
(11, 'Sarah Jio'),
(12, 'Turgut Ã–zakman '),
(13, 'Nazan BekiroÄŸlu'),
(14, 'Elif Åžafak'),
(15, 'Nejla Arslan Kurt'),
(16, 'Buket Ayik');

--
-- Dökümü yapılmış tablolar için indeksler
--

--
-- Tablo için indeksler `kategori`
--
ALTER TABLE `kategori`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `kitaplar`
--
ALTER TABLE `kitaplar`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `kullanicilar`
--
ALTER TABLE `kullanicilar`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `kullanici` (`kullanici`);

--
-- Tablo için indeksler `yazar`
--
ALTER TABLE `yazar`
  ADD PRIMARY KEY (`id`);

--
-- Dökümü yapılmış tablolar için AUTO_INCREMENT değeri
--

--
-- Tablo için AUTO_INCREMENT değeri `kategori`
--
ALTER TABLE `kategori`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
--
-- Tablo için AUTO_INCREMENT değeri `kitaplar`
--
ALTER TABLE `kitaplar`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
--
-- Tablo için AUTO_INCREMENT değeri `kullanicilar`
--
ALTER TABLE `kullanicilar`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- Tablo için AUTO_INCREMENT değeri `yazar`
--
ALTER TABLE `yazar`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
