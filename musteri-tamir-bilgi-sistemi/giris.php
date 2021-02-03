<?php
require 'Medoo.php';
session_start();
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
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Müşteri Tamir Bilgi Sistemi</title>
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@300&display=swap" rel="stylesheet">
    <style>
        * {
            font-family: 'Montserrat', sans-serif;
        }

        .container {
            text-align: center;
            margin-top: 150px;
        }

        #baslik {
            color: #032b2fff;
        }

        #eposta,
        #sifre {
            width: 25%;
            border-radius: 50px;
            border: 1px solid;
            padding: 15px;
        }

        input:focus,
        button:focus {
            outline: none !important;
        }

        #sifremiUnuttum {
            text-decoration: none;
            color: #d73a31ff;
            transition: opacity 0.3s;
        }

        #giris {
            width: 15%;
            color: #f6fbf4ff;
            background-color: #8dd35fff;
            border-radius: 50px;
            border: none;
            padding: 10px;
            transition: opacity 0.3s;
        }

        #kayit {
            width: 15%;
            color: #f6fbf4ff;
            background-color: #56b1bfff;
            border-radius: 50px;
            border: none;
            padding: 10px;
            transition: opacity 0.3s;
        }

        #giris:hover,
        #kayit:hover,
        #sifremiUnuttum:hover {
            cursor: pointer;
            opacity: 0.8;
        }
    </style>
</head>

<body>
    <div class="container">
        <h1 id="baslik">
            Müşteri Tamir Bilgi Sistemi
        </h1>
        <form action="" method="POST">
            <input type="email" name="eposta" id="eposta" placeholder="E-posta adresi" required>
            <br><br>
            <input type="password" name="sifre" id="sifre" placeholder="Şifre" required>
            <br><br>
            <a href="sifremiUnuttum.php" name="sifremiUnuttum" id="sifremiUnuttum"> Şifremi Unuttum </a>
            <br><br>
            <input type="submit" name="giris" id="giris" value="Giriş">
        </form>
        <?php

        $eposta = "";
        $sifre = "";

        if (isset($_POST["eposta"]) && isset($_POST["sifre"])) {
            if ($_POST["eposta"] != "" && $_POST["sifre"] != "") {
                $eposta = $_POST["eposta"];
                $sifre  = $_POST["sifre"];
                $kullanici = $database->get("385179_tbl_kullanicilar", "*", ["AND" => ["eposta" => $eposta, "sifre" => $sifre]]);

                if (isset($kullanici['id']) == true) {
                    if ($kullanici["aktifMi"] == "1") {
                        $_SESSION['kullaniciID'] = $kullanici["id"];
                        header("Location:kullaniciPaneli.php");
                        exit;
                    } else {
                        echo '<script>alert("E-posta adresinizden hesabınızı aktif etmeniz gerekiyor!");</script>';
                    }
                } else {
                    echo '<script>alert("Bilgileriniz hatalı!");</script>';
                }
            } else {
                echo '<script>alert("Lütfen boş alan bırakmayın!");</script>';
            }
        }
        
        ?>
        <br>
        <a href="kayit.php"><button type="button" id="kayit"> Kayıt </button></a>
    </div>
</body>

</html>