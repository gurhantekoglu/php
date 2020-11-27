<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <title>PBYS - Anasayfa</title>
    <link rel="stylesheet" href="../postane_iskelet/postane_iskelet.css">
    <link rel="stylesheet" href="anasayfa.css">
</head>

<body>
    <div class="header">
        <ul>
            <li><a href="../kabul/kabulindex.php">Kabul</a></li>
            <li><a href="../teslim/teslimindex.php">Teslim</a></li>
            <li><a href="../sevk/sevkindex.php">Sevk</a></li>
            <li><a href="../takip/takipindex.php">Takip</a></li>
            <li><a href="../zimmet/zimmetindex.php">Zimmet</a></li>
            <li><a href="../kampanyalar/kampanyalarindex.php">Kampanyalar</a></li>
        </ul>
    </div>
    <div class="icerik">
        <div class="anasayfa">
            <p>
                <b>Postane Bilgi Yönetim Sistemi (PBYS)'ne hoşgeldiniz.</b>
            </p>
            <p>
                <u>Postane Bilgi Yönetim Sistemi'ni kullanarak:</u>
                <ul>
                    <li>Kargo kabul, teslim, sevk işlemlerini ve gönderi barkodunu girerek kargo takip işlemlerini yapabilir,
                    <li>Mevcut zimmeti kontrol edebilir,</li>
                    <li>Kampanyalara göz atabilirsiniz.</li>
                </ul>
            </p>
            <p>
                <img src="bilgilendirme.png" width="15" height="15"> <b>Yaptığınız işlemler ID'niz üzerinden kayıt altına alınmaktadır.</b>
            </p>
            <hr>
            <p>
                <b>Önerileriniz için bize yazabilirsiniz...</b>
            </p>
            <form action="anasayfa.php" method="POST" class="form">
                <textarea rows="5" cols="40" name="mesaj_metin"></textarea> <br><br>
                <input type="submit" name="gonder" value="Gönder" style="width: 100px;
                height: 30px;
                background-color: #447821ff;
                color: white;
                cursor: pointer;
                border: none;
                text-align: 30px;">
            </form>
        </div>
    </div>
    <div class="footer">
        <p>
            Postane Bilgi Yönetim Sistemi © 2020
        </p>
        <div class="cikis">
            <p>
                <a href="../giris/girisindex.php">Çıkış</a>
            </p>
        </div>
    </div>
</body>

</html>