<?php

$db = new PDO("mysql:host=localhost;dbname=postane;charset=utf8", "root", "");

$mesaj_metin = $_POST ["mesaj_metin"];

if (!$mesaj_metin){
  die("Lütfen bu alanı boş bırakmayınız.");
}

$ekle = $db->prepare("INSERT INTO mesaj_bilgi SET mesaj_metin = ?");

$ekle->execute([$mesaj_metin]);

if ($ekle){
  header("location:anasayfaindex.php");
} else {
  echo "Mesaj gönderilemedi.";
}

?>