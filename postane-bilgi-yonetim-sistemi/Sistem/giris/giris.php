<?php

try{

session_start();

$db = new PDO('mysql:host=localhost;dbname=postane;charset=utf8', 'root', '');

} catch (PDOException $e){
    echo $e-> getMessage();
}

$sicilno = $_POST['sicilno'];
$sifre = $_POST['sifre'];


if (!$sicilno || !$sifre) {
    die("Boş alan bırakmayınız!");
}

$user = $db->query("SELECT * FROM kullanici WHERE kullanici_sicilNo = '$sicilno' AND kullanici_sifre = '$sifre'")->fetch();

if ($user) {
    $_SESSION['user'] = $user;
    header("location:../anasayfa/anasayfaindex.php");
}else {
    echo "Bilgiler hatalı!";
}

?>