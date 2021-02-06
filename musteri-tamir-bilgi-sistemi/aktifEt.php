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

if (isset($_GET["eposta"]) && isset($_GET["aktivasyonKodu"])) {
    $eposta = $_GET["eposta"];
    $aktivasyonKodu = $_GET["aktivasyonKodu"];

    $kullanici = $database->get("385179_tbl_kullanicilar", "id", ["AND" => ["eposta" => $eposta, "aktivasyonKodu" => $aktivasyonKodu]]);
    if ($kullanici > 0) {
        $data = $database->update("385179_tbl_kullanicilar", ["aktifMi" => 1], ["id" => $kullanici]);
        echo '<script>alert("Aktivasyonunuz gerçekleşti.")</script>';
        header("Refresh: 1; url=giris.php");
    } else{
        header("Location:giris.php?m=kod hatalı");
    }
}

?>