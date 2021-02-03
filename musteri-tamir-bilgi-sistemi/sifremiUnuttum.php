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

        #bilgilendirme {
            color: #ffffffff;
            background-color: #0b708aff;
            padding: 15px;
            display: inline-block;
            text-align: start;
        }

        #eposta {
            width: 25%;
            border-radius: 50px;
            border: 1px solid;
            padding: 15px;
        }

        input:focus {
            outline: none !important;
        }

        #gonder {
            width: 15%;
            color: #f6fbf4ff;
            background-color: #8dd35fff;
            border-radius: 50px;
            border: none;
            padding: 10px;
            transition: opacity 0.3s;
        }

        #gonder:hover {
            cursor: pointer;
            opacity: 0.8;
        }

        #giris-yazisi {
            color: #8dd35fff;
            transition: 0.3s;
            text-decoration: none;
        }

        #giris-yazisi:hover {
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
        <p id="bilgilendirme">
            Şifre hatırlatması için e-posta adresinizi giriniz ve <br>
            "Gönder" tuşuna basınız. Bu işlem sonrasında <br>
            şifreniz e-posta adresinize gönderilecek.
        </p>
        <form action="" method="POST">
            <input type="email" name="eposta" id="eposta" placeholder="E-posta adresi" required>
            <br><br>
            <input type="submit" name="gonder" id="gonder" value="Gönder">
        </form>
        <?php

        use PHPMailer\PHPMailer\PHPMailer;
        use PHPMailer\PHPMailer\SMTP;
        use PHPMailer\PHPMailer\Exception;

        require 'vendor/autoload.php';

        $eposta = "";
        $sifre  = "";

        if (isset($_POST["eposta"])) {
            if ($_POST["eposta"] != "") {
                $eposta = $_POST["eposta"];
                $sifre = $database->get("385179_tbl_kullanicilar", "*", ["eposta" => $eposta]);
                if (isset($sifre) == 0) {
                    echo '<script>alert("E-posta adresi bulunamadı.")</script>';
                } else {
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
                        $mail->addAddress($sifre["eposta"], $sifre["ad"]);
                        $mail->CharSet = 'UTF-8';

                        $mail->isHTML(true);                      // Set email format to HTML
                        $mail->Subject = 'Şifre';
                        $mail->Body = '<p>Sayın ' . '<b>' . $sifre["ad"] . ' ' . $sifre["soyad"] . '</b>' . ',<br><br>Şifreniz: ' . '<b>' .$sifre["sifre"] . '</b>' . '<br><br>- Müşteri Tamir Bilgi Sistemi</p>';

                        $mail->send();
                        echo '<script>alert("Şifreniz e-posta adresinize gönderildi.");</script>';
                        echo '<script>window.location = "giris.php";</script>';
                    } catch (Exception $e) {
                        echo "Mesaj gönderilemedi. Posta hatası: {$mail->ErrorInfo}";
                    }
                }
            } else {
                echo '<script>alert("E-posta alanını boş bırakmayın!")</script>';
            }
        }

        ?>
        <p>
            <a href="giris.php" id="giris-yazisi"><b>Giriş yap</b></a>
        </p>
    </div>

</body>

</html>