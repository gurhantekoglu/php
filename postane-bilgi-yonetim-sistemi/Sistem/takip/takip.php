<?php

error_reporting(E_ALL ^ E_NOTICE);
ini_set('error_reporting', E_ALL ^ E_NOTICE);

$db = new PDO("mysql:host=localhost;dbname=postane;charset=utf8", "root", "");

$gonderi_barkod = $_POST['gonderi_barkod'];

$sorgu = $db->prepare("SELECT * FROM gonderi_bilgileri WHERE gonderi_barkod = ?");
$sorgu->execute(array($gonderi_barkod));
$islem=$sorgu->fetch();
    echo "•"."<b>"."Gönderi Barkod: "."</b>".$islem ["gonderi_barkod"]."<br>";
    echo "•"."<b>"."Gönderi Ağırlık (kg): "."</b>".$islem ["gonderi_agirlik_kg"]."<br>";
    echo "•"."<b>"."Gönderi En (cm): "."</b>".$islem ["gonderi_en_cm"]."<br>";
    echo "•"."<b>"."Gönderi Boy (cm): "."</b>".$islem ["gonderi_boy_cm"]."<br>";
    echo "•"."<b>"."Gönderi Tipi: "."</b>".$islem ["gonderi_tipi"]."<br>";
    echo "•"."<b>"."Gönderi Ek Hizmet: "."</b>".$islem ["gonderi_ek_hizmet"]."<br>";
    echo "•"."<b>"."Gönderi Bedeli (₺): "."</b>".$islem ["gonderi_bedeli"]."<br>";
    echo "•"."<b>"."Gönderi Tarihi: "."</b>".$islem ["gonderi_tarihi"]."<br>";

?>