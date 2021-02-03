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

if (!isset($_SESSION['kullaniciID']) || $_SESSION['kullaniciID'] == "") {
    header("Location:giris.php");
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Müşteri Tamir Bilgi Sistemi</title>
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@300&display=swap" rel="stylesheet">
    <link href='https://css.gg/css' rel='stylesheet'>
    <link href='https://unpkg.com/css.gg/icons/all.css' rel='stylesheet'>
    <link href='https://cdn.jsdelivr.net/npm/css.gg/icons/all.css' rel='stylesheet'>
    <style>
        * {
            font-family: 'Montserrat', sans-serif;
            margin: 0;
            padding: 0;
        }

        a {
            text-decoration: none;
        }

        input:focus,
        button:focus,
        select:focus,
        textarea:focus {
            outline: none !important;
        }

        header {
            background-color: #032b2fff;
            padding: 10px;
        }

        .col-1 {
            float: left;
            margin-left: 5px;
            margin-top: 10px;
        }

        .col-2 {
            margin-right: 5px;
            text-align: end;
        }

        .container {
            float: left;
            margin-left: 15px;
            width: 50%;
            margin-bottom: 15px;
        }

        #baslik {
            color: #f6fbf4ff;
        }

        #ticket {
            width: 15%;
            color: #f6fbf4ff;
            background-color: #8dd35fff;
            border-radius: 50px;
            border: none;
            padding: 10px;
            transition: opacity 0.3s;
            margin-right: 15px;
            margin-bottom: 5px;
        }

        #cikis {
            color: #f6fbf4ff;
            background-color: #d73a31ff;
            border-radius: 100%;
            border: none;
            padding: 10px;
            transition: opacity 0.3s;
        }

        #sifreDegistirBaslik {
            color: #032b2fff;
        }

        label {
            color: #032b2fff;
        }

        #mevcutSifre,
        #yeniSifre {
            width: 45%;
            height: 5px;
            border-radius: 50px;
            border: 1px solid;
            padding: 15px;
        }

        #degistir {
            width: 100px;
            color: #f6fbf4ff;
            background-color: #56b1bfff;
            border-radius: 50px;
            border: none;
            padding: 10px;
            transition: opacity 0.3s;
        }

        #ticket:hover,
        #cikis:hover,
        #degistir:hover {
            cursor: pointer;
            opacity: 0.8;
        }
    </style>
</head>

<body>
    <header>
        <div class="row">
            <div class="col-1">
                <a href="kullaniciPaneli.php">
                    <h3 id="baslik">
                        Müşteri Tamir Bilgi Sistemi
                    </h3>
                </a>
            </div>
            <div class="col-2">
                <a href="ticket.php"><button type="button" id="ticket"> Ticket </button></a>
                <a href="cikis.php"><button type="button" id="cikis"><svg width="15" height="15" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M13 4.00894C13.0002 3.45665 12.5527 3.00876 12.0004 3.00854C11.4481 3.00833 11.0002 3.45587 11 4.00815L10.9968 12.0116C10.9966 12.5639 11.4442 13.0118 11.9965 13.012C12.5487 13.0122 12.9966 12.5647 12.9968 12.0124L13 4.00894Z" fill="currentColor" />
                            <path d="M4 12.9917C4 10.7826 4.89541 8.7826 6.34308 7.33488L7.7573 8.7491C6.67155 9.83488 6 11.3349 6 12.9917C6 16.3054 8.68629 18.9917 12 18.9917C15.3137 18.9917 18 16.3054 18 12.9917C18 11.3348 17.3284 9.83482 16.2426 8.74903L17.6568 7.33481C19.1046 8.78253 20 10.7825 20 12.9917C20 17.41 16.4183 20.9917 12 20.9917C7.58172 20.9917 4 17.41 4 12.9917Z" fill="currentColor" />
                        </svg></button></a>
            </div>
        </div>
    </header>
    <div class="container">
        <br>
        <h3 id="sifreDegistirBaslik">
            Şifre Değiştir
        </h3>
        <br>
        <form action="" method="POST">
            <label for="mevcutSifre">
                Mevcut Şifre
            </label>
            <br><br>
            <input type="password" name="mevcutSifre" id="mevcutSifre" required>
            <br><br>
            <label for="yeniSifre">
                Yeni Şifre
            </label>
            <br><br>
            <input type="password" name="yeniSifre" id="yeniSifre" required>
            <br><br>
            <input type="submit" name="degistir" id="degistir" value="Değiştir">
        </form>
        <?php

        $mevcutSifre = "";
        $yeniSifre = "";
        if (isset($_POST["mevcutSifre"]) && isset($_POST["yeniSifre"])) {
            if ($_POST["mevcutSifre"] != "" && $_POST["yeniSifre"] != "") {
                $mevcutSifre = $_POST["mevcutSifre"];
                $yeniSifre = $_POST["yeniSifre"];
                $kullanici = $database->get("385179_tbl_kullanicilar", "id", ["sifre" => $mevcutSifre]);
                if (isset($kullanici) == true) {
                    $data = $database->update("385179_tbl_kullanicilar", ["sifre" => $yeniSifre], ["id" => $kullanici]);
                    echo '<script>alert("Şifre değiştirildi, yeniden giriş yapın.")</script>';
                    echo '<script>window.location = "cikis.php";</script>';
                } else {
                    echo '<script>alert("Hata: Şifre değiştirilemedi.")</script>';
                }
            } else {
                echo '<script>alert("Boş alan bırakmayın!");</script>';
            }
        }

        ?>
    </div>
</body>

</html>