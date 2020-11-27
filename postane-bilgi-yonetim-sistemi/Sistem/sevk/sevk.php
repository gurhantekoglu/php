<?php

$db = new PDO("mysql:host=localhost;dbname=postane;charset=utf8", "root", "");

$sevk_gonderiBarkod = $_POST['sevk_gonderiBarkod'];
$sevk_il = $_POST['sevk_il'];
$sevk_sube = $_POST['sevk_sube'];

$ekle=$db->prepare("INSERT INTO sevk_bilgi SET sevk_gonderiBarkod = ?, sevk_il = ?, sevk_sube = ?");

$ekle->execute([$sevk_gonderiBarkod, $sevk_il, $sevk_sube]);

if ($ekle){
    header("location:sevkindex.php");
} else {
    echo "Sevk kaydı yapılamadı.";
}

?>