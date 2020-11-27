<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <title>PBYS - Zimmet</title>
    <link rel="stylesheet" href="../postane_iskelet/postane_iskelet.css">
    <link rel="stylesheet" href="zimmet.css">
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
        <div class="zimmet">
            <table class="table">
                <thead>
                    <tr>
                        <th>
                            Gönderi Barkod
                        </th>
                        <th>
                            Gönderi Ağırlık (kg)
                        </th>
                        <th>
                            Gönderi En (cm)
                        </th>
                        <th>
                            Gönderi Boy (cm)
                        </th>
                        <th>
                            Gönderi Tipi
                        </th>
                        <th>
                            Gönderi Ek Hizmet
                        </th>
                        <th>
                            Gönderi Bedeli (₺)
                        </th>
                        <th>
                            Gönderi Tarihi
                        </th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <?php
                        include "zimmet.php";
                        ?>
                    </tr>
                </tbody>
            </table>
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