<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <title>PBYS - Kabul</title>
    <link rel="stylesheet" href="../postane_iskelet/postane_iskelet.css">
    <link rel="stylesheet" href="kabul.css">
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
        <form action="kabul.php" method="POST">
            <div class="form1">
                <b><u>Gönderici Bilgileri</u></b> <br>
                Ad <br>
                <input type="text" name="gonderici_ad" required> <br><br>
                Soyad <br>
                <input type="text" name="gonderici_soyad" required> <br><br>
                İl <br> <select name="gonderici_il" required>
                    <option value="0">Seçiniz</option>
                    <option value="1">Adana</option>
                    <option value="2">Adıyaman</option>
                    <option value="3">Afyonkarahisar</option>
                    <option value="4">Ağrı</option>
                    <option value="5">Amasya</option>
                    <option value="6">Ankara</option>
                    <option value="7">Antalya</option>
                    <option value="8">Artvin</option>
                    <option value="9">Aydın</option>
                    <option value="10">Balıkesir</option>
                    <option value="11">Bilecik</option>
                    <option value="12">Bingöl</option>
                    <option value="13">Bitlis</option>
                    <option value="14">Bolu</option>
                    <option value="15">Burdur</option>
                    <option value="16">Bursa</option>
                    <option value="17">Çanakkale</option>
                    <option value="18">Çankırı</option>
                    <option value="19">Çorum</option>
                    <option value="20">Denizli</option>
                    <option value="21">Diyarbakır</option>
                    <option value="22">Edirne</option>
                    <option value="23">Elazığ</option>
                    <option value="24">Erzincan</option>
                    <option value="25">Erzurum</option>
                    <option value="26">Eskişehir</option>
                    <option value="27">Gaziantep</option>
                    <option value="28">Giresun</option>
                    <option value="29">Gümüşhane</option>
                    <option value="30">Hakkâri</option>
                    <option value="31">Hatay</option>
                    <option value="32">Isparta</option>
                    <option value="33">Mersin</option>
                    <option value="34">İstanbul</option>
                    <option value="35">İzmir</option>
                    <option value="36">Kars</option>
                    <option value="37">Kastamonu</option>
                    <option value="38">Kayseri</option>
                    <option value="39">Kırklareli</option>
                    <option value="40">Kırşehir</option>
                    <option value="41">Kocaeli</option>
                    <option value="42">Konya</option>
                    <option value="43">Kütahya</option>
                    <option value="44">Malatya</option>
                    <option value="45">Manisa</option>
                    <option value="46">Kahramanmaraş</option>
                    <option value="47">Mardin</option>
                    <option value="48">Muğla</option>
                    <option value="49">Muş</option>
                    <option value="50">Nevşehir</option>
                    <option value="51">Niğde</option>
                    <option value="52">Ordu</option>
                    <option value="53">Rize</option>
                    <option value="54">Sakarya</option>
                    <option value="55">Samsun</option>
                    <option value="56">Siirt</option>
                    <option value="57">Sinop</option>
                    <option value="58">Sivas</option>
                    <option value="59">Tekirdağ</option>
                    <option value="60">Tokat</option>
                    <option value="61">Trabzon</option>
                    <option value="62">Tunceli</option>
                    <option value="63">Şanlıurfa</option>
                    <option value="64">Uşak</option>
                    <option value="65">Van</option>
                    <option value="66">Yozgat</option>
                    <option value="67">Zonguldak</option>
                    <option value="68">Aksaray</option>
                    <option value="69">Bayburt</option>
                    <option value="70">Karaman</option>
                    <option value="71">Kırıkkale</option>
                    <option value="72">Batman</option>
                    <option value="73">Şırnak</option>
                    <option value="74">Bartın</option>
                    <option value="75">Ardahan</option>
                    <option value="76">Iğdır</option>
                    <option value="77">Yalova</option>
                    <option value="78">Karabük</option>
                    <option value="79">Kilis</option>
                    <option value="80">Osmaniye</option>
                    <option value="81">Düzce</option>
                </select><br><br>
                Adres <br>
                <textarea name="gonderici_adres" rows="5" cols="40" required></textarea> <br><br>
                Telefon (+90) <br>
                <input type="tel" name="gonderici_tel" maxlength="10" required> <br><br>
                T.C. Kimlik Numarası <br>
                <input type="text" name="gonderici_tc" maxlength="11" required> <br><br>
            </div>
            <div class="form2">
                <b><u>Alıcı Bilgileri</u></b> <br>
                Ad <br>
                <input type="text" name="alici_ad" required> <br><br>
                Soyad <br>
                <input type="text" name="alici_soyad" required> <br><br>
                İl <br> <select name="alici_il" required>
                    <option value="0">Seçiniz</option>
                    <option value="1">Adana</option>
                    <option value="2">Adıyaman</option>
                    <option value="3">Afyonkarahisar</option>
                    <option value="4">Ağrı</option>
                    <option value="5">Amasya</option>
                    <option value="6">Ankara</option>
                    <option value="7">Antalya</option>
                    <option value="8">Artvin</option>
                    <option value="9">Aydın</option>
                    <option value="10">Balıkesir</option>
                    <option value="11">Bilecik</option>
                    <option value="12">Bingöl</option>
                    <option value="13">Bitlis</option>
                    <option value="14">Bolu</option>
                    <option value="15">Burdur</option>
                    <option value="16">Bursa</option>
                    <option value="17">Çanakkale</option>
                    <option value="18">Çankırı</option>
                    <option value="19">Çorum</option>
                    <option value="20">Denizli</option>
                    <option value="21">Diyarbakır</option>
                    <option value="22">Edirne</option>
                    <option value="23">Elazığ</option>
                    <option value="24">Erzincan</option>
                    <option value="25">Erzurum</option>
                    <option value="26">Eskişehir</option>
                    <option value="27">Gaziantep</option>
                    <option value="28">Giresun</option>
                    <option value="29">Gümüşhane</option>
                    <option value="30">Hakkâri</option>
                    <option value="31">Hatay</option>
                    <option value="32">Isparta</option>
                    <option value="33">Mersin</option>
                    <option value="34">İstanbul</option>
                    <option value="35">İzmir</option>
                    <option value="36">Kars</option>
                    <option value="37">Kastamonu</option>
                    <option value="38">Kayseri</option>
                    <option value="39">Kırklareli</option>
                    <option value="40">Kırşehir</option>
                    <option value="41">Kocaeli</option>
                    <option value="42">Konya</option>
                    <option value="43">Kütahya</option>
                    <option value="44">Malatya</option>
                    <option value="45">Manisa</option>
                    <option value="46">Kahramanmaraş</option>
                    <option value="47">Mardin</option>
                    <option value="48">Muğla</option>
                    <option value="49">Muş</option>
                    <option value="50">Nevşehir</option>
                    <option value="51">Niğde</option>
                    <option value="52">Ordu</option>
                    <option value="53">Rize</option>
                    <option value="54">Sakarya</option>
                    <option value="55">Samsun</option>
                    <option value="56">Siirt</option>
                    <option value="57">Sinop</option>
                    <option value="58">Sivas</option>
                    <option value="59">Tekirdağ</option>
                    <option value="60">Tokat</option>
                    <option value="61">Trabzon</option>
                    <option value="62">Tunceli</option>
                    <option value="63">Şanlıurfa</option>
                    <option value="64">Uşak</option>
                    <option value="65">Van</option>
                    <option value="66">Yozgat</option>
                    <option value="67">Zonguldak</option>
                    <option value="68">Aksaray</option>
                    <option value="69">Bayburt</option>
                    <option value="70">Karaman</option>
                    <option value="71">Kırıkkale</option>
                    <option value="72">Batman</option>
                    <option value="73">Şırnak</option>
                    <option value="74">Bartın</option>
                    <option value="75">Ardahan</option>
                    <option value="76">Iğdır</option>
                    <option value="77">Yalova</option>
                    <option value="78">Karabük</option>
                    <option value="79">Kilis</option>
                    <option value="80">Osmaniye</option>
                    <option value="81">Düzce</option>
                </select><br><br>
                Adres <br>
                <textarea name="alici_adres" rows="5" cols="40" required></textarea> <br><br>
                Telefon (+90) <br>
                <input type="tel" name="alici_tel" maxlength="10" required> <br><br>
                T.C. Kimlik Numarası <br>
                <input type="text" name="alici_tc" maxlength="11" required> <br><br>
            </div>
            <div class="form3">
                <br> <b><u>Gönderi Bilgileri</u></b> <br>
                Barkod
                <input type="number" name="gonderi_barkod" required> <br><br>
                Ağırlık (kg)
                <input type="number" name="gonderi_agirlik_kg" required> <br><br>
                En (cm)
                <input type="number" name="gonderi_en_cm" required> <br><br>
                Boy (cm)
                <input type="number" name="gonderi_boy_cm" required> <br><br>
                <b><u>Gönderi Tipi</u></b> <br>
                <input type="radio" id="koli" name="gonderi_tipi" value="Koli">Koli
                <input type="radio" id="evrak" name="gonderi_tipi" value="Evrak">Evrak <br><br>
                <b><u>Ek Hizmet</u></b> <br>
                <input type="checkbox" id="odemesartli" name="gonderi_ek_hizmet" value="Ödeme Şartlı">Ödeme Şartlı
                <input type="checkbox" id="degerli_sigortali" name="gonderi_ek_hizmet" value="Değerli/Sigortalı">Değerli/Sigortalı
                <input type="checkbox" id="kontrolluteslim" name="gonderi_ek_hizmet" value="Kontrollü Teslim">Kontrollü
                Teslim <br><br>
                Gönderi Bedeli (₺) <input type="number" name="gonderi_bedeli" required> <br><br>
                Kargo Kabul Tarihi <input type="date" name="gonderi_tarihi" required> <br><br>
            </div>
            <input type="submit" name="onayla" value="Onayla" style="text-align: center;
            float: right;
            margin-right: 30px;
            width: 100px;
            height: 30px;
            background-color: #447821ff;
            color: white;
            cursor: pointer;
            border: none;">
        </form>

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