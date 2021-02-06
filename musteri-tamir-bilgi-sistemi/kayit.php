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
            margin-top: 100px;
        }

        #baslik {
            color: #032b2fff;
        }

        #ad,
        #soyad,
        #eposta,
        #sifre {
            width: 25%;
            border-radius: 50px;
            border: 1px solid;
            padding: 15px;
        }

        label {
            margin-left: 5%;
        }

        #fotograf {
            width: 25%;
            margin-left: 2%;
        }

        input:focus {
            outline: none !important;
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

        #giris-yazisi {
            color: #8dd35fff;
            transition: 0.3s;
            text-decoration: none;
        }


        #giris-yazisi:hover,
        #kayit:hover {
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
        <form action="" method="POST" enctype="multipart/form-data">
            <input type="text" name="ad" id="ad" placeholder="Ad" required>
            <br><br>
            <input type="text" name="soyad" id="soyad" placeholder="Soyad" required>
            <br><br>
            <input type="email" name="eposta" id="eposta" placeholder="E-posta adresi" required>
            <br><br>
            <input type="password" name="sifre" id="sifre" placeholder="Şifre" required>
            <br><br>
            <label for="fotograf">Fotoğraf</label>
            <input type="file" name="fileToUpload" id="fotograf" required>
            <br><br>
            <input type="submit" name="kayit" id="kayit" value="Kayıt">
        </form>
        <?php

        use PHPMailer\PHPMailer\PHPMailer;
        use PHPMailer\PHPMailer\SMTP;
        use PHPMailer\PHPMailer\Exception;

        require 'vendor/autoload.php';

        $kod1 = date('d.m.Y H:i:s');
        $kod2 = rand(0, 99999);
        $aktivasyonKodu = hash('sha256', $kod1 . $kod2);

        $ad = "";
        $soyad = "";
        $eposta = "";
        $sifre = "";

        if (isset($_POST["ad"]) && isset($_POST["soyad"]) && isset($_POST["eposta"]) && isset($_POST["sifre"])) {
            if ($_POST["ad"] != "" && $_POST["soyad"] != "" && $_POST["eposta"] != "" && $_POST["sifre"] != "") {
                $ad = $_POST["ad"];
                $soyad = $_POST["soyad"];
                $eposta = $_POST["eposta"];
                $sifre = $_POST["sifre"];

                $fotograflar = "fotograflar/";
                $dosya = $fotograflar . basename($_FILES["fileToUpload"]["name"]);
                $yuklenmisMi = 1;
                $imageFileType = strtolower(pathinfo($dosya, PATHINFO_EXTENSION));

                if (isset($_POST["kayit"])) {
                    $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
                    if ($check !== false) {
                        echo "<br>Dosya bir fotoğraf - " . $check["mime"] . ".";
                        $yuklenmisMi = 1;
                    } else {
                        echo '<script>alert("Dosya bir fotoğraf değil. Lütfen .jpg veya .png uzantılı dosya ekleyin.");</script>';
                        $yuklenmisMi = 0;
                    }
                }

                if ($_FILES["fileToUpload"]["size"] > 1000000) {
                    echo '<script>alert("Dosya boyutu 1 MBdan büyük.");</script>';
                    $yuklenmisMi = 0;
                }

                if (
                    $imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
                ) {
                    echo '<script>alert("Sadece .jpg ve .png uzantılı dosya yükleyebilirsiniz.");</script>';
                    $yuklenmisMi = 0;
                }

                if ($yuklenmisMi == 0) {
                    echo '<script>alert("Dosya yüklenemedi.");</script>';
                } else {
                    if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $dosya)) {
                        $database->insert("385179_tbl_kullanicilar", ["ad" => $ad, "soyad" => $soyad, "eposta" => $eposta, "sifre" => $sifre, "fotograf" => $dosya, "aktivasyonKodu" => $aktivasyonKodu]);
                        echo htmlspecialchars(basename($_FILES["fileToUpload"]["name"])) . " dosyası yüklendi.";
                        $sonId = $database->id();

                        if ($sonId > 0) {
                            $mail = new PHPMailer(true);
                            try {
                                //Server settings
                                $mail->SMTPDebug = SMTP::DEBUG_SERVER;                      // Enable verbose debug output
                                $mail->isSMTP();                                            // Send using SMTP
                                $mail->Host = 'smtp.gmail.com';                    // Set the SMTP server to send through
                                $mail->SMTPAuth = true;                                   // Enable SMTP authentication
                                $mail->Username = '385179KTU@gmail.com';                     // SMTP username
                                $mail->Password = 'Gurhan_KTU';                               // SMTP password
                                $mail->SMTPSecure = 'tls';         // Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` encouraged
                                $mail->Port = 587;                                    // TCP port to connect to, use 465 for `PHPMailer::ENCRYPTION_SMTPS` above

                                //Recipients
                                $mail->setFrom('385179KTU@gmail.com', 'Müşteri Tamir Bilgi Sistemi');
                                $mail->addAddress($eposta, $ad);
                                $mail->CharSet = 'UTF-8';

                                $mail->isHTML(true);                      // Set email format to HTML
                                $mail->Subject = 'Aktivasyon Linki';
                                $mail->Body = 'Hesabınızı aktif etmek için <b> <a href="localhost/385179/aktifEt.php?eposta=' . $eposta . '&aktivasyonKodu=' . $aktivasyonKodu . '">tıklayınız</a></b><br><br>- Müşteri Tamir Bilgi Sistemi';
                                $mail->AltBody = 'This is the body in plain text for non-HTML mail clients.';

                                $mail->send();
                                echo '<script>alert("Aktivasyon linki e-posta adresinize gönderildi.");</script>';
                                echo '<script>window.location = "giris.php";</script>';
                            } catch (Exception $e) {
                                echo "Mesaj gönderilemedi. Posta hatası: {$mail->ErrorInfo}";
                            }
                        }
                    } else {
                        echo '<script>alert("Üzgünüz, dosyanız yüklerken bir sorun oluştu.");</script>';
                    }
                }
            } else {
                echo '<script>alert("Boş alan bırakmayın!");</script>';
                header("Refresh: 1; url=kayit.php");
            }
        }

        ?>
        <p>
            Zaten hesabın var mı? <a href="giris.php" id="giris-yazisi"><b>Giriş yap</b></a>
        </p>
    </div>

</body>

</html>