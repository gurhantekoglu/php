<?php

require 'Medoo.php';
// Using Medoo namespace
use Medoo\Medoo;

$database = new Medoo([
    // required
    'database_type' => 'mysql',
    'database_name' => 'php_final',
    'server' => 'localhost',
    'username' => 'root',
    'password' => ''
]);

if (isset($_GET['kullaniciID']) && isset($_GET['seriNo'])) {
    $kullaniciID = $_GET['kullaniciID'];
    $seriNo = $_GET['seriNo'];
    $kayitSayisi = $database->count("385179_tbl_urunbilgileri", "*");
    $sil = $database->delete("385179_tbl_urunbilgileri", ["AND" => ["kullaniciID" => $kullaniciID, "seriNo" => $seriNo]]);
    $sonKayitSayisi = $database->count("385179_tbl_urunbilgileri", "*");
    if ($kayitSayisi > $sonKayitSayisi) {
        echo '<script>alert("Kayıt silindi.");</script>';
        header("Refresh: 1; url=kullaniciPaneli.php");
    } else {
        echo '<script>alert("Hata: Kayıt silinemedi.");</script>';
    }
}

?>