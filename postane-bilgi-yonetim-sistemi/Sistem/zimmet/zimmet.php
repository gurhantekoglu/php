<?php

$con = mysqli_connect("localhost", "root", "", "postane") or die("Hata");
$sql = "SELECT * FROM gonderi_bilgileri";
$res = mysqli_query($con, $sql);

while ($islem = mysqli_fetch_assoc($res)) {
    echo "<td>" . $islem["gonderi_barkod"] . "</td>";
    echo "<td>" . $islem["gonderi_agirlik_kg"] . "</td>";
    echo "<td>" . $islem["gonderi_en_cm"] . "</td>";
    echo "<td>" . $islem["gonderi_boy_cm"] . "</td>";
    echo "<td>" . $islem["gonderi_tipi"] . "</td>";
    echo "<td>" . $islem["gonderi_ek_hizmet"] . "</td>";
    echo "<td>" . $islem["gonderi_bedeli"] . "</td>";
    echo "<td>" . $islem["gonderi_tarihi"] . "</td>";
}
mysqli_close($con);

?>