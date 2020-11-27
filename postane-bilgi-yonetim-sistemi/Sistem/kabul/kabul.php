<?php

$db = new PDO("mysql:host=localhost;dbname=postane;charset=utf8", "root", "");

$gonderici_ad = $_POST['gonderici_ad'];
$gonderici_soyad = $_POST['gonderici_soyad'];
$gonderici_il = $_POST['gonderici_il'];
$gonderici_adres = $_POST['gonderici_adres'];
$gonderici_tel = $_POST['gonderici_tel'];
$gonderici_tc= $_POST['gonderici_tc'];
$alici_ad = $_POST['alici_ad'];
$alici_soyad = $_POST['alici_soyad'];
$alici_il = $_POST['alici_il'];
$alici_adres = $_POST['alici_adres'];
$alici_tel = $_POST['alici_tel'];
$alici_tc= $_POST['alici_tc'];
$gonderi_barkod = $_POST['gonderi_barkod'];
$gonderi_agirlik_kg= $_POST['gonderi_agirlik_kg'];
$gonderi_en_cm = $_POST['gonderi_en_cm'];
$gonderi_boy_cm = $_POST['gonderi_boy_cm'];
$gonderi_tipi = $_POST['gonderi_tipi'];
$gonderi_ek_hizmet = $_POST['gonderi_ek_hizmet'];
$gonderi_bedeli = $_POST['gonderi_bedeli'];
$gonderi_tarihi= $_POST['gonderi_tarihi'];

$sqlekle1=$db->prepare("INSERT INTO gonderici_bilgileri SET gonderici_ad = ?, gonderici_soyad = ?, gonderici_il = ?, gonderici_adres = ?, gonderici_tel = ?, gonderici_tc = ?");
$sqlekle2=$db->prepare("INSERT INTO alici_bilgi SET alici_ad = ?, alici_soyad = ?, alici_il = ?, alici_adres = ?, alici_tel = ?, alici_tc = ?");
$sqlekle3=$db->prepare("INSERT INTO gonderi_bilgileri SET gonderi_barkod = ?, gonderi_agirlik_kg = ?, gonderi_en_cm = ?, gonderi_boy_cm = ?, gonderi_tipi = ?, gonderi_ek_hizmet = ?, gonderi_bedeli = ?, gonderi_tarihi = ?");

$sqlekle1->execute([$gonderici_ad, $gonderici_soyad, $gonderici_il, $gonderici_adres, $gonderici_tel, $gonderici_tc]);
$sqlekle2->execute([$alici_ad, $alici_soyad, $alici_il, $alici_adres, $alici_tel, $alici_tc]);
$sqlekle3->execute([$gonderi_barkod, $gonderi_agirlik_kg, $gonderi_en_cm, $gonderi_boy_cm, $gonderi_tipi, $gonderi_ek_hizmet, $gonderi_bedeli, $gonderi_tarihi]);

if ($sqlekle1 and $sqlekle2 and $sqlekle3){
    header("location:kabulindex.php");
} else {
    echo "Kayıt yapılamadı.";
}

?>