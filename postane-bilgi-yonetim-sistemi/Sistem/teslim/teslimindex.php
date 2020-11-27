<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <title>PBYS - Teslim</title>
    <link rel="stylesheet" href="../postane_iskelet/postane_iskelet.css">
    <link rel="stylesheet" href="teslim.css">
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
        <form action="teslim.php" method="POST">
            <div class="form1">
                <b><u>Teslim Alan Bilgileri</u></b> <br>
                Ad <br> <input type="text" name="teslim_ad" required> <br><br>
                Soyad <br> <input type="text" name="teslim_soyad" required> <br><br>
                Telefon (+90) <br> <input type="tel" name="teslim_tel" maxlength="10" required> <br><br>
                T.C. Kimlik Numarası <br> <input type="text" name="teslim_tc" maxlength="11" required> <br><br>
            </div>
            <div class="form2">
                <b><u>Gönderi Bilgileri</u></b> <br>
                Barkod <input type="number" name="teslim_gonderi_barkod" required> <br><br>
                <b><u>Teslim Alan</u></b> <br>
                <input type="radio" name="teslim_teslim_alan" value="Kendisi"> Kendisi
                <input type="radio" name="teslim_teslim_alan" value="Eşi/Çocuğu"> Eşi/Çocuğu
                <input type="radio" name="teslim_teslim_alan" value="Annesi/Babası"> Annesi/Babası <br><br>
            </div>
            <input type="submit" name="onayla" value="Onayla" style="width: 100px;
            height: 30px;
            background-color: #447821ff;
            float: right;
            margin-right: 30px;
            color: white;
            cursor: pointer;
            border: none;">
        </form>
        <br><br>
        <p class="not">
            <img src="bilgilendirme.png" width="15" height="15"> <b>"Teslim Alan" seçeneğinde olmayan kişilere <u>kesinlikle</u> teslimat yapılmayacaktır.</b>
        </p>
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