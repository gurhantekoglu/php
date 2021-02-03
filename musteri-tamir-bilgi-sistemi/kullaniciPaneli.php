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

        .col-3 {
            float: left;
            margin-left: 15px;
            width: 50%;
            margin-bottom: 15px;
        }

        #baslik {
            color: #f6fbf4ff;
        }

        #profilFotografi {
            border-radius: 100%;
        }

        #adSoyad {
            color: black;
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

        #yeniBildirimBaslik {
            color: #032b2fff;
        }

        label {
            color: #032b2fff;
        }

        select {
            width: 50%;
            height: 40px;
            border-radius: 50px;
            border: 1px solid black;
            padding: 10px;
        }

        #seriNo {
            width: 45%;
            height: 5px;
            border-radius: 50px;
            border: 1px solid;
            padding: 15px;
        }

        textarea {
            resize: none;
            width: 45%;
            border-radius: 10px;
            border: 1px solid;
            padding: 15px;
        }

        #olustur {
            width: 100px;
            color: #f6fbf4ff;
            background-color: #8dd35fff;
            border-radius: 50px;
            border: none;
            padding: 10px;
            transition: opacity 0.3s;
        }

        #sifreDegistir {
            width: 125px;
            color: #f6fbf4ff;
            background-color: #56b1bfff;
            border-radius: 50px;
            border: none;
            padding: 10px;
            transition: opacity 0.3s;
        }

        #bildirimlerim {
            color: #032b2fff;
        }

        #filtreleme {
            color: #032b2fff;
        }

        #ticket:hover,
        #cikis:hover,
        #olustur:hover,
        #sifreDegistir:hover,
        #filtreleButon:hover {
            cursor: pointer;
            opacity: 0.8;
        }

        #filtreleButon {
            width: 100px;
            color: #f6fbf4ff;
            background-color: #8dd35fff;
            border-radius: 50px;
            border: none;
            padding: 10px;
            transition: opacity 0.3s;
        }

        table {
            border: 1px solid #032b2fff;
            border-collapse: collapse;
            text-align: center;
            width: 40%;
            height: 100px;
            margin-bottom: 3%;
        }

        td {
            height: 50px;
        }

        tr {
            border-bottom: 1px solid #032b2fff;
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
        <div class="row">
            <div class="col-3">
                <br>
                <h3 id="yeniBildirimBaslik">
                    Yeni Bildirim Oluştur
                </h3>
                <br>
                <form action="" method="POST">
                    <label for="tamirKodu">
                        Tamir Kodu
                    </label>
                    <br><br>
                    <select name="tamirKodu" id="tamirKodu" required>
                        <option value="0">
                            Seçiniz
                        </option>
                        <option value="1 - Batarya hasarı">
                            1 - Batarya hasarı
                        </option>
                        <option value="2 - Kasa hasarı">
                            2 - Kasa hasarı
                        </option>
                        <option value="3 - Aksesuar hasarı">
                            3 - Aksesuar hasarı
                        </option>
                        <option value="4 - Ekran hasarı">
                            4 - Ekran hasarı
                        </option>
                    </select>
                    <br><br>
                    <label for="seriNo">
                        Seri No
                    </label>
                    <br><br>
                    <input type="text" name="seriNo" id="seriNo" maxlength="9" required>
                    <br><br>
                    <label for="model">
                        Model
                    </label>
                    <br><br>
                    <select name="model" id="model" required>
                        <option value="0">
                            Seçiniz
                        </option>
                        <option value="Model A">
                            Model A
                        </option>
                        <option value="Model B">
                            Model B
                        </option>
                        <option value="Model C">
                            Model C
                        </option>
                        <option value="Model D">
                            Model D
                        </option>
                        <option value="Model E">
                            Model E
                        </option>
                        <option value="Model F">
                            Model F
                        </option>
                        <option value="Model G">
                            Model G
                        </option>
                        <option value="Model H">
                            Model H
                        </option>
                        <option value="Model I">
                            Model I
                        </option>
                        <option value="Model J">
                            Model J
                        </option>
                    </select>
                    <br><br>
                    <label for="aciklama">
                        Açıklama
                    </label>
                    <br><br>
                    <textarea name="aciklama" id="aciklama" cols="50" rows="5" required></textarea>
                    <br><br>
                    <input type="submit" name="olustur" id="olustur" value="Oluştur">
                </form>
                <?php

                $kullaniciID = $_SESSION['kullaniciID'];
                $tamirKodu = "";
                $seriNo = "";
                $model = "";
                $aciklama = "";

                if (isset($kullaniciID) && isset($_POST['tamirKodu']) && isset($_POST['seriNo']) && isset($_POST['model']) && isset($_POST['aciklama'])) {
                    if ($_POST['tamirKodu'] != "" && $_POST['seriNo'] != "" && $_POST['model'] != "" && $_POST['aciklama'] != "") {
                        $tamirKodu = $_POST['tamirKodu'];
                        $seriNo = $_POST['seriNo'];
                        $model = $_POST['model'];
                        $aciklama = $_POST['aciklama'];

                        $seriNoSorgu = $database->get("385179_tbl_urunbilgileri", "seriNo", ["seriNo" => $seriNo]);
                        if (isset($seriNoSorgu) == 1) {
                            echo '<script>alert("Hata: Seri no mevcut, farklı bir seri no girin.");</script>';
                            echo '<script>window.location = "kullaniciPaneli.php";</script>';
                        } else {
                            $database->insert("385179_tbl_urunbilgileri", ["kullaniciID" => $kullaniciID, "tamirKodu" => $tamirKodu, "seriNo" => $seriNo, "model" => $model, "aciklama" => $aciklama]);
                            $sonId = $database->id();
                            if ($sonId > 0) {
                                echo '<script>alert("Tamir kaydı oluşturuldu.");</script>';
                                echo '<script>window.location = "kullaniciPaneli.php";</script>';
                            } else {
                                echo '<script>alert("Hata: Kayıt gerçekleştirilemedi.");</script>';
                                echo '<script>window.location = "kullaniciPaneli.php";</script>';
                            }
                        }
                    } else {
                        echo '<script>alert("Boş alan bırakmayın!");</script>';
                    }
                }

                ?>
            </div>
            <div class="col-4">
                <div class="profil">
                    <br>
                    <?php

                    $kullanici = $database->get("385179_tbl_kullanicilar", "*", ["id" => $_SESSION['kullaniciID']]);
                    echo '<img id="profilFotografi" src="' . $kullanici['fotograf'] . '"alt="Profil Fotografi" width="100" height="100">';

                    ?>
                    <br><br>
                    <label for="">
                        Merhaba, <span id="adSoyad">
                            <?php

                            $kullanici = $database->get("385179_tbl_kullanicilar", "*", ["id" => $_SESSION['kullaniciID']]);
                            echo '<b>' . $kullanici['ad'] . ' ' . $kullanici['soyad'] . '</b>';

                            ?>
                        </span>
                    </label>
                    <br><br>
                    <a href="sifreDegistir.php"><button type="button" id="sifreDegistir">Şifre Değiştir</button></a>
                </div>
                <br>
                <h3 id="bildirimlerim">
                    Bildirimlerim
                </h3>
                <br>
                <label for="filtreleme">
                    Filtreleme
                </label>
                <br><br>
                <form action="" method="POST">
                    <select style="width: 25%;" name="model">
                        <option value="Model A">
                            Model A
                        </option>
                        <option value="Model B">
                            Model B
                        </option>
                        <option value="Model C">
                            Model C
                        </option>
                        <option value="Model D">
                            Model D
                        </option>
                        <option value="Model E">
                            Model E
                        </option>
                        <option value="Model F">
                            Model F
                        </option>
                        <option value="Model G">
                            Model G
                        </option>
                        <option value="Model H">
                            Model H
                        </option>
                        <option value="Model I">
                            Model I
                        </option>
                        <option value="Model J">
                            Model J
                        </option>
                    </select>
                    <input type="submit" id="filtreleButon" value="Filtrele">
                </form>
                <br><br>
                <table>
                    <thead>
                        <tr>
                            <th>Tamir Kodu</th>
                            <th>Seri No</th>
                            <th>Model</th>
                            <th>İşlem</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php

                        $urunModel = "";
                        $urunKayitlari = "";
                        if (isset($_POST['model'])) {
                            $urunModel = $_POST['model'];
                            $kullaniciBilgi = $database->get("385179_tbl_kullanicilar", "*", ["id" => $_SESSION['kullaniciID']]);
                            $urunKayitlari = $database->select("385179_tbl_urunbilgileri", "*", ["AND" => ["kullaniciID" => $_SESSION['kullaniciID'], "model" => $urunModel]]);
                            foreach ($urunKayitlari as $urunKayit) {
                                echo '<tr>
                                    <td>' . $urunKayit['tamirKodu'] . '</td>
                                    <td>' . $urunKayit['seriNo'] . '</td>
                                    <td>' . $urunKayit['model'] . '</td>
                                    <td><a href="kayitSil.php?kullaniciID=' . $_SESSION['kullaniciID'] . '&seriNo=' . $urunKayit['seriNo'] . '" style="color: #f6fbf4ff; background-color: #d73a31ff; border: none; padding: 5px; border-radius: 100%;"><svg width="20" height="20" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" clip-rule="evenodd" d="M17 5V4C17 2.89543 16.1046 2 15 2H9C7.89543 2 7 2.89543 7 4V5H4C3.44772 5 3 5.44772 3 6C3 6.55228 3.44772 7 4 7H5V18C5 19.6569 6.34315 21 8 21H16C17.6569 21 19 19.6569 19 18V7H20C20.5523 7 21 6.55228 21 6C21 5.44772 20.5523 5 20 5H17ZM15 4H9V5H15V4ZM17 7H7V18C7 18.5523 7.44772 19 8 19H16C16.5523 19 17 18.5523 17 18V7Z" fill="currentColor" /><path d="M9 9H11V17H9V9Z" fill="currentColor" /><path d="M13 9H15V17H13V9Z" fill="currentColor" /></svg></a></td>
                                    </tr>';
                            }
                        } else {
                            $urunKayitlari = $database->query("SELECT tamirKodu, seriNo, model FROM 385179_tbl_urunbilgileri WHERE kullaniciID IN (SELECT id FROM 385179_tbl_kullanicilar WHERE id=" . $_SESSION['kullaniciID'] . ")")->fetchAll();
                            foreach ($urunKayitlari as $urunKayit) {
                                echo '<tr>
                                    <td>' . $urunKayit['tamirKodu'] . '</td>
                                    <td>' . $urunKayit['seriNo'] . '</td>
                                    <td>' . $urunKayit['model'] . '</td>
                                    <td><a href="kayitSil.php?kullaniciID=' . $_SESSION['kullaniciID'] . '&seriNo=' . $urunKayit['seriNo'] . '" style="color: #f6fbf4ff; background-color: #d73a31ff; border: none; padding: 5px; border-radius: 100%;"><svg width="20" height="20" viewBox="0 -3 24 24" fill="none" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" clip-rule="evenodd" d="M17 5V4C17 2.89543 16.1046 2 15 2H9C7.89543 2 7 2.89543 7 4V5H4C3.44772 5 3 5.44772 3 6C3 6.55228 3.44772 7 4 7H5V18C5 19.6569 6.34315 21 8 21H16C17.6569 21 19 19.6569 19 18V7H20C20.5523 7 21 6.55228 21 6C21 5.44772 20.5523 5 20 5H17ZM15 4H9V5H15V4ZM17 7H7V18C7 18.5523 7.44772 19 8 19H16C16.5523 19 17 18.5523 17 18V7Z" fill="currentColor" /><path d="M9 9H11V17H9V9Z" fill="currentColor" /><path d="M13 9H15V17H13V9Z" fill="currentColor" /></svg></a></td>
                                    </tr>';
                            }
                        }

                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</body>

</html>