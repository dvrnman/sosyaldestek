-- phpMyAdmin SQL Dump
-- version 4.9.7
-- https://www.phpmyadmin.net/
--
-- Anamakine: localhost:3306
-- Üretim Zamanı: 30 Kas 2021, 19:26:39
-- Sunucu sürümü: 10.2.39-MariaDB-cll-lve
-- PHP Sürümü: 7.3.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Veritabanı: `sosyalne_destektaleb`
--

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `departman`
--

CREATE TABLE `departman` (
  `id` int(11) NOT NULL,
  `departman` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Tablo döküm verisi `departman`
--

INSERT INTO `departman` (`id`, `departman`) VALUES
(1, 'YAZILIM'),
(2, 'DEVRAN GELİŞTİRME'),
(12, 'Eyüp'),
(13, 'Özgür');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `giris`
--

CREATE TABLE `giris` (
  `id` int(11) NOT NULL,
  `kullanici_adi` varchar(255) NOT NULL,
  `sifre` varchar(255) NOT NULL,
  `isim` varchar(255) NOT NULL,
  `keysifre` varchar(255) NOT NULL,
  `songiris` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Tablo döküm verisi `giris`
--

INSERT INTO `giris` (`id`, `kullanici_adi`, `sifre`, `isim`, `keysifre`, `songiris`) VALUES
(1, 'ozgurgunduz41@yandex.com', '451236', 'ÖZGÜR', '', '31.10.2021 16:40:55'),
(2, 'erayhan41@yandex.com', '451236', 'ERAY', '789fe74f4ba63168c00fe2fb537dd4365648c40c', '31.10.2021 16:37:56'),
(3, 'eesenx@yandex.com', 'Mehmet123...s', 'EYÜP', '', ''),
(4, 'dvrngndz1997@gmail.com', '451236', 'DEVRAN', 'cd4d311ad1d08e988c41545d63e3d3b6efc394d0', '24.11.2021 01:54:41');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `kayıtlar`
--

CREATE TABLE `kayıtlar` (
  `id` int(11) NOT NULL,
  `icerik` varchar(1000) NOT NULL,
  `departman` int(11) NOT NULL,
  `kullanici` int(11) NOT NULL,
  `okundu` tinyint(1) NOT NULL DEFAULT 0,
  `oncelik` tinyint(1) NOT NULL DEFAULT 0,
  `sakla` tinyint(1) NOT NULL DEFAULT 1,
  `tarih` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Tablo döküm verisi `kayıtlar`
--

INSERT INTO `kayıtlar` (`id`, `icerik`, `departman`, `kullanici`, `okundu`, `oncelik`, `sakla`, `tarih`) VALUES
(4, 'Görevi Üzerine Alma Özelliği', 1, 1, 1, 0, 0, '2021-04-09 02:32:50'),
(5, 'servis eklemelerinde 500 error hatası', 1, 1, 1, 0, 0, '2021-04-09 02:32:50'),
(7, 'android ve IOS görevleri sadece android IOS işletim sistemine sahip cihazlarda gösterilmeli', 1, 1, 0, 0, 0, '2021-04-09 02:32:50'),
(9, 'pixel face ekleyeceğiz', 1, 1, 1, 0, 0, '2021-04-09 02:32:50'),
(10, 'zorunlu görevlerde her görevden bir tane görünmeli. aşağıya kadar uzaması sorun değil.', 1, 1, 0, 0, 0, '2021-04-09 02:32:50'),
(12, 'Editör', 1, 1, 1, 0, 0, '2021-04-09 02:32:50'),
(16, 'Tanımlanmış görev tamamlandıysa tamamlandı butonu olsun. basınca tamamlananlar bir yerde listelensin', 2, 1, 0, 0, 0, '2021-04-09 02:32:50'),
(20, 'Paramolsun login sonrası 419 hatası', 1, 1, 0, 0, 0, '2021-04-09 02:32:50'),
(23, 'Kanıt yüklerken boyut düşük geliyor. Yükleme boyutu arttırmalı', 1, 1, 1, 0, 0, '2021-04-09 02:32:50'),
(25, 'Sona al butonu eklenecek. Bu butonları sadece adminler görecek', 1, 1, 0, 0, 0, '2021-04-09 02:32:50'),
(27, 'Eklenen kayıtların önceliğini belirlemek\r\n', 2, 1, 0, 1, 0, '2021-04-09 02:32:50'),
(30, 'Hariç bırak dahil et özelliğinin ekle tuşuna basınca kutu bazılarında buton gibi görünüyor', 1, 1, 0, 1, 0, '2021-04-09 02:32:50'),
(31, 'Yeni servis oluştururken 500 error hatası veriyor. Herşeyi doldurmamıza ve kategori seçmemize rağmen', 1, 1, 1, 0, 0, '2021-04-09 02:32:50'),
(32, 'Bu görev için adress alanı zorunluluğunu kaldırabilirsiniz(Kapalı/Açık) Butonu admin paneline kapalı konumda geliyor. Müşterinin açık mı kapalı mı yaptığını göremiyoruz', 1, 1, 0, 1, 0, '2021-04-09 02:32:50'),
(33, 'Zorunlu görevlerin listelendiği ekranda gösterilen görev sayısı sınırlı olduğundan her kategoriden bir görev görünmüyor. İnstagram gibi önemli kategorilere ait görev sistemde mevcutken zorunlu görevler alanında zaman zaman gözükmüyor. Her kategoriden 1 görev görünecek şekilde liste uzatılabilir', 1, 1, 1, 0, 0, '2021-04-09 02:32:50'),
(34, 'Paramolsun.com’da üyelik bilgilerini girip giriş yap butonuna tıkladıktan sonra zaman zaman 419 hatası veriyor. Çıkış yaparken de bu hatayı veriyor bazen https://prnt.sc/10qxisj', 1, 1, 0, 0, 1, '2021-04-09 02:32:50'),
(35, '“Roller ve izinler” alanına eklenecek bir özellik ile “Görev Yönetimi” sayfasında görevi onaylama veya düzenleme aşamasında sona alabileceğimiz bir özellik olmalı. Böylece sisteme ekleyeceğimiz admin görevlerini sona alabiliriz.', 1, 1, 1, 1, 0, '2021-04-09 02:32:50'),
(36, 'Android kategorisinde açılan görevler sadece Android işletim sistemine sahip kullanıcılara, IOS kategorisinde açılan görevler sadece IOS işletim sistemine sahip kullanıcılara gösterilmeli. ', 1, 1, 0, 0, 1, '2021-04-09 02:32:50'),
(37, '“Bu görev için adress alanı zorunluluğunu kaldırabilirsiniz(Kapalı/Açık)” Butonu admin paneline kapalı konumda geliyor. Müşterinin açık mı kapalı mı yaptığını göremiyoruz. https://prnt.sc/10pee59', 1, 1, 1, 1, 0, '2021-04-09 02:32:50'),
(38, 'Hariç bırak dahil et özelliği, bazı kullanıcılarda düzgün görünmüyor. “Ekle” butonuna bastıklarında görselde gösterdiğim gibi “Görev numarası” alanı çok uzun görünüyor. Görev id’si girilen alan (Kırmızı renk ile belirttim) çok küçük kalıyor. Kullanıcılar bunu fark edemiyor. https://prnt.sc/10pebno', 1, 1, 1, 1, 0, '2021-04-09 02:32:50'),
(39, 'Daha önceden eklenmiş yazıyı silmeden yazıyı güncelleyebilme özelliği', 2, 1, 1, 0, 0, '2021-04-09 02:32:50'),
(40, 'Eklenen kaydı departmanlar arası taşıyabilme özelliği', 2, 1, 0, 0, 0, '2021-04-09 02:32:50'),
(41, 'guncelle butonu yesil olsun bayrak renklerimizi yansitsin', 2, 2, 1, 1, 0, '2021-04-09 02:32:50'),
(42, 'Kanıt yüklerken kullanıcıların bazılarında 4 kanıt yüklemelerine rağmen 2 kanıt yükleniyor. Servis yönetiminden gerekli ayarlar yapılı durumda. (Bu sorun yeni değil, yaptığımız yeni güncellemelerle bağlantısı yok)\r\n\r\nhttps://prnt.sc/10prcde\r\n\r\nTestlerde sorun cikmadi #Kontrol edilmesi gerekli', 1, 1, 1, 0, 0, '2021-04-09 02:32:50'),
(43, 'Kayıt olurken gönderilen sms kodu eksik gidiyor', 1, 1, 1, 0, 0, '2021-04-09 02:32:50'),
(44, 'Paramolsun\'da \"Profilim\" Sayfasında kullanıcıların mail adresleri görünmüyor. Görünmeli\r\n\r\n####Oyun sayfasina eklendi', 1, 1, 1, 0, 0, '2021-04-09 02:32:50'),
(45, '360Sosyal Bakiye Yüklerken 500 Error Hatası.\r\n\r\nMüşteriler herhangi bir paketi seçip \"ödeme ekranına geç\" butonuna tıkladığında 500 Error hatası ile karşılaştığını söylüyor. \r\nEn son konuştuğum müşteri windows 10/ opera kullandığını söyledi. Girip test ettim fakat ben bir sorunla karşılaşmadım.\r\n\r\nBu sorun farklı tarayıcılar ile farklı zamanlarda farklı müşteriler tarafından yaşanıyor', 1, 1, 1, 1, 0, '2021-04-09 02:32:50'),
(46, '360 sosyal bekleyen kanit sayisi hatali gorunuyordu duzelttim', 1, 2, 1, 1, 0, '2021-04-09 02:32:50'),
(47, 'Oyunlardan kazanilan parayi gosterme sadece puan goster', 1, 2, 1, 1, 0, '2021-04-09 02:32:50'),
(48, 'Örneğin 50 kişilik bir görevde eğer 2 adet red isteği varsa 52/50 şeklinde görünüyor. https://prnt.sc/10rzrgh\r\n[gecenki hatadan dolayi bazi gorevlerin sayilarini dusurmustuk bu onunla ilgili normal gorevlerde boyle bir olay yok]', 1, 1, 1, 1, 0, '2021-04-09 02:32:50'),
(49, 'Görevi üzerine alan kullanıcılar tekrar bulamıyor. Görev yap ekranına şerif olarak eklenmeli. ', 1, 1, 1, 1, 0, '2021-04-09 02:32:50'),
(53, '360 Editörü eski değişecek. ', 1, 3, 1, 1, 1, '2021-04-09 02:32:50'),
(55, 'Telefon onceden kullanilip hesap silindiyse deneme bakiyesi vermeyi iptal et.', 1, 2, 1, 0, 0, '2021-04-09 02:32:50'),
(56, 'ortak ip olan adresler listelenecek.', 1, 3, 1, 1, 1, '2021-04-09 02:32:50'),
(57, 'Gunluk gorev sayisinda gorevi ustune alma iptal (kullanicilarin bazilari uyariyi okumuyordu direkt ustune alma iptal edildi.)', 1, 2, 1, 0, 0, '2021-04-09 02:32:50'),
(58, '360Sosyal\r\nGörev açıklaması alanı düzenlenemez olmalı. Görev giren kullanıcı admine not ekleyecek', 13, 1, 0, 0, 0, '2021-04-09 02:32:50'),
(59, 'TripAdvisor kategorisinde ilk serim olan yorum kategorisinde düzenleme yapılamıyor.', 1, 3, 1, 1, 0, '2021-04-09 02:32:50'),
(60, 'Paramolsun\r\n\r\nGörev onaylama sayfasında her kategori için hazır red mesajları olmalı. Facebook hesapları geldiğinde facebook\'a özel mesajlar instagram geldiğinde instagram geldiğinde instagrama özel red mesajları görünecek', 13, 1, 0, 0, 0, '2021-04-09 02:32:50'),
(61, 'Paramolsun\r\n\r\nKullanıcıların reddedilen kanıtları görünmeli ve ceza sistemi yazılmalı. Şu kadar sürede şu kadar kanıtı reddedilirse şu kadar uzaklaştırma gibi.\r\n\r\nÜyeliğe giremediğinde niçin giremediğini gösteren metin. Örneğin kanıtlarınız çok fazla reddedildiği için şu tarihe kadar uzaklaştırıldınız.', 13, 1, 0, 0, 1, '2021-04-09 02:32:50'),
(62, 'Kanıt yükleme sorunu hem uygulamada hem mobil tarayıcıda bulunuyor. Çocuklar tüm gönderileri tek tek kontrol ediyorlar. Epey yavaşlatıyor. https://prnt.sc/10z6emz', 1, 1, 1, 1, 1, '2021-04-09 02:32:50'),
(63, 'Paramolsun kullanıcılar istemediği görevleri yoksayabilir. Yok sayılan görevler zorunlu görevlere de düşmez', 13, 1, 0, 0, 1, '2021-04-09 02:32:50'),
(72, 'Paramolsun mobilde &quot;Hesaplarım&quot; sayfasının listeleme sınırı 15 olarak ayarlanmış. Kullanıcılar hesaplarını eklediklerinde oradan görüntüleyemiyorlar 15\'den fazlasını', 1, 1, 1, 0, 1, '2021-04-09 02:32:50'),
(73, 'Kanıtı yanlış gönderdiğini fark eden kullanıcılar bunu düzeltemiyor. Kanıtı reddedildikten sonra düzenleyip tekrar gönderebilmeli', 13, 1, 0, 0, 1, '2021-04-09 02:32:50'),
(74, 'Kanıtlarım sayfasına girdiğinde bu sayfadan geri atıyor. Kullanıcı iphone 6s kullanıyor. https://bit.ly/3wHuL1a\r\n\r\nAdrese ulasamiyorum kendim denedigimde bir sorun ile karsilasmadim', 1, 1, 1, 0, 1, '2021-04-09 02:32:50'),
(78, 'bundan sonra kanit sayilari gecen gorevler otomatik olarak 0 olucak ve kullanicilara dusmeyecek\r\nGörevi yapacak kişi sayısı 40: https://prnt.sc/119q31t\r\nGöreve gelen kanıt sayısı 48: https://prnt.sc/119q3lg\r\nGörevi yapacak kişi sayısı 32: https://prnt.sc/119q41q\r\n\r\nGörevi üzerine almaya çalıştığında alınmıyor. 8 kişi fazla yapmış ve 32 kişi daha yapacak olarak görünüyor. \r\nGörev id: 9522', 1, 1, 1, 1, 1, '2021-04-11 18:39:40'),
(79, 'Görev yönetimindeki kişi sayısı düzenlenecek. 7/10 oluyor mesela tamamlandı yazıyor. 3 tane red isteğinden kaynaklanıyor. Müşteri eksik geldi zannediyor.\r\n\r\nRed isteklerini orada 3 olarak göstermek kişi sayısını da 10/10 yapmak lazım', 1, 3, 0, 0, 1, '2021-04-16 01:43:19'),
(80, 'Kanıtlar arasında Red istenenler de görünmeli.', 1, 3, 1, 0, 1, '2021-04-18 00:56:03'),
(81, 'Kontrol ettim ben de bir sorun goremedim\r\nhttps://prnt.sc/11o9l01\r\n\r\nŞu hata hakkında çok fazla destek talebi geldi. Ben denedim karşılaşmadım. Hangi durumda oluştuğu hakkında bir fikrim yok :/\r\n', 1, 1, 1, 0, 1, '2021-04-19 05:35:44'),
(82, 'Gönderilen kanıtlar eksik geliyor', 1, 1, 1, 0, 1, '2021-04-20 21:11:29'),
(83, 'Paralarin virgulden sonra 2 basamak goruntulenmesi paramolsun icin eklendi', 1, 2, 1, 0, 1, '2021-04-22 15:24:39'),
(84, 'Kayit kodu sms eksik hane gidiyor bazen', 1, 2, 1, 0, 1, '2021-04-22 17:44:37'),
(85, 'Admin paneli gorev sonlandirma aciklamasi.', 1, 2, 1, 0, 1, '2021-04-22 19:31:00'),
(86, 'Minimum kanit sayisi secenegi', 1, 2, 1, 0, 1, '2021-04-22 22:40:57'),
(87, 'kanit onayi loglari aktif edildi', 1, 2, 1, 0, 1, '2021-04-23 00:16:24'),
(88, 'promosyon ekranına mail ve tarihlerin yanında yatırılan Mikar ve toplam miktar görünse iyi olur.', 1, 3, 0, 0, 1, '2021-04-23 23:05:27'),
(89, 'Görevi günlere bölemde üzerine almadan kullanıcılar görev yapabiliyor. Buraya bakılması lazım.', 1, 3, 1, 0, 1, '2021-04-23 23:51:32'),
(90, '360 profil fotoğrafı yüklenme sorunu.', 1, 3, 1, 0, 1, '2021-04-24 05:08:35'),
(91, 'hangi kullanıcı kaç görev onaylamış\r\n\r\nx-x saatleri arasında gelen kanıtlar x kullanıcısına görünecek şeklinde bir özellik\r\n\r\nbunun icin cizerge falan da olusturmak lazim cunku , x kisisi pazartesi 10 ile 12 , sali gunu 20 ile x gibi\r\ngun icinde onaylanmayan kanitlar yine digerine kalir ama x kisisinden su kadar kanit kaldi diye gorebiliriz\r\nek olarak birde bu gun x kisisi izindeyse y ye de kanit onaylama vermek lazim derken karisik olucak biraz', 13, 1, 0, 0, 1, '2021-04-28 18:23:43'),
(92, 'Görev hesaplarını onaylarken hesabın kadın erkek veya diğer olarak 3 kategoriye ayrılması gerekiyor. Kadına basıp onayladığımda eğer hesabı giren kullanıcının profili erkekse hesap eklenmemeli ve bildirim gitmeli kullanıcıya', 13, 1, 0, 0, 1, '2021-04-28 21:09:44'),
(93, 'Paramolsun\'da hazır red mesajları olabilir. Belirli bir alan olur oradan kategori ve hizmet seçtikten sonra o hizmete özel mesajlar kaydedilebilir. Mesela instagram keşfet paketi için yapılabilecek 5 farklı hataya göre 5 farklı mesaj kaydedip kanıtları reddederken oradan seçip hızlıca redleri gerçekleştirebiliriz. Böylece hem mesajlar baştan savma olmaz hem de hızlıca redleri gerçekleştirebiliriz', 13, 1, 0, 0, 0, '2021-04-28 21:37:51'),
(94, 'Görev veren kullanıcıya yorumu düzeltme, kanıtı düzeltme talebi gönderebilir. Aynı şekilde kullanıcı da kanıtı kendi düzenleyip tekrar gönderebilir. Biz de kanıtı düzenlemesi için istek gönderebiliriz. Belirlenen süre içerisinde düzenlerse görevi geçerli sayılır', 13, 1, 0, 0, 1, '2021-04-28 22:17:30'),
(95, 'Paramolsun\'da görevi düzenlerken yaptığımız hatalardan doğan sıkıntıları bizim ödememiz gerekiyor. Sistem karşılasın diye bir buton olabilir. Bizim yüzümüzden reddedilmek zorunda kalan kanıtların bakiyesi bizden kesilip kullanıcıya eklenmeli. Bu olmadığı için mecburen reddediyoruz ve bir çok şilkayet geliyor.', 13, 1, 0, 0, 1, '2021-04-28 22:44:52'),
(96, 'kanıtları reddederken butona basınca kutu açılıyor. O hep açık kalsın', 13, 1, 0, 0, 1, '2021-04-29 01:26:55'),
(97, 'Param Olsun , title ve açıklama değişecek.', 1, 3, 1, 0, 1, '2021-05-02 15:17:28'),
(98, 'Servis ücretlerinde kapalı servis ve kategoriler düzennenmiycek.', 1, 3, 0, 0, 1, '2021-05-02 15:17:56'),
(99, '360sosyalde bir müşteri istemediği bir kullanıcıyı kanıtını reddettiği sayfadan yasaklayabilir. Böylece o kullanıcı bir daha o müşterinin görevlerini göremez', 13, 1, 0, 0, 1, '2021-05-02 22:29:42'),
(100, 'Paramolsun Özellikler:\r\n\r\nGörev Onaylama:\r\n1) Görev reddedilirken önceden hazırlanmış metinler ile reddetme özelliği\r\nKanıt Onaylama:\r\n1) Kanıtları her kategori ve hizmet için önceden hazırlanmış metinler ile reddetme özelliği ve ekstra metin kutusu\r\n2) Kanıtları her kategori ve hizmet için önceden hazırlanmış metinler ile onaylama özelliği ve ekstra metin kutusu\r\n3) \r\n\r\n2) Görev hesapları onaylanırken önceden hazırlanmış metinler ile reddetme özelliği', 13, 1, 0, 0, 0, '2021-05-05 02:28:55'),
(101, 'https://prnt.sc/12uak0t', 13, 1, 0, 0, 1, '2021-05-12 14:24:06'),
(102, 'asdasdasdasd', 2, 4, 0, 0, 0, '2021-10-24 16:51:03');

--
-- Dökümü yapılmış tablolar için indeksler
--

--
-- Tablo için indeksler `departman`
--
ALTER TABLE `departman`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `giris`
--
ALTER TABLE `giris`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `kayıtlar`
--
ALTER TABLE `kayıtlar`
  ADD PRIMARY KEY (`id`);

--
-- Dökümü yapılmış tablolar için AUTO_INCREMENT değeri
--

--
-- Tablo için AUTO_INCREMENT değeri `departman`
--
ALTER TABLE `departman`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- Tablo için AUTO_INCREMENT değeri `giris`
--
ALTER TABLE `giris`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Tablo için AUTO_INCREMENT değeri `kayıtlar`
--
ALTER TABLE `kayıtlar`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=103;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
