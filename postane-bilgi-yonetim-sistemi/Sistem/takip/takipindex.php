<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <title>PBYS - Takip</title>
    <link rel="stylesheet" href="../postane_iskelet/postane_iskelet.css">
    <link rel="stylesheet" href="takip.css">
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
        <form action="" method="POST">
            <div class="form1">
                <b><u>Gönderi Bilgileri</u></b> <br> Barkod <br> <input type="number" name="gonderi_barkod"> <br><br>
            </div>
            <input type="submit" name="ara" value="Ara" style="float: left;
            margin-left: 30px;
            width: 100px;
            height: 30px;
            background-color: #447821ff;
            color: white;
            cursor: pointer;
            border: none;">
        </form>
        <div class="takip" name="takip">
            <p>
                <b><u>Kargo Bilgileri</u></b>
            </p>
            <?php
            include "takip.php";
            ?>
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