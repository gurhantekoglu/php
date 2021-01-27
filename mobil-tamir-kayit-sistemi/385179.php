<?php

// If you installed via composer, just use this code to require autoloader on the top of your projects.
require 'Medoo.php';

// Using Medoo namespace
use Medoo\Medoo;

$database = new Medoo([
	// required
	'database_type' => 'mysql',
	'database_name' => 'itp_vt',
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
	<title>Mobil Tamir Kayıt Sistemi</title>
	<link rel="preconnect" href="https://fonts.gstatic.com">
	<link href="https://fonts.googleapis.com/css2?family=Noto+Sans&display=swap" rel="stylesheet">
	<style>
		* {
			font-family: 'Noto Sans', sans-serif;
			background-color: #FCFFF5;
		}

		form {
			margin-left: 25%;
		}

		p {
			font-size: 300%;
			text-align: center;
			color: #193441;
		}

		label {
			text-align: left;
			color: #3E606F;
		}

		input {
			float: right;
			margin-right: 33%;
			width: 25%;
			color: #91AA9D;
			border: 1px solid #707070;
		}

		input:focus {
			outline: none !important;
		}

		#kaydet {
			padding: 0.5%;
			width: 10%;
			border: none;
			border-radius: 50px;
			color: #FCFFF5;
			background-color: #193441;
			transition: opacity 0.3s;
		}

		#kaydet:hover {
			opacity: 0.8;
		}

		select {
			float: right;
			margin-right: 33%;
			width: 25.5%;
			color: #91AA9D;
		}

		table {
			border-collapse: collapse;
			color: #3E606F;
			text-align: center;
			margin-left: 25%;
			margin-bottom: 5%;
			width: 50%;
		}

		tr {
			border-bottom: 1px solid #3E606F;
		}
	</style>
</head>

<body>
	<p>
		Mobil Tamir Kayıt Sistemi
	</p>
	<form action="" method="POST">
		<label for="label-1">
			<b>Tamir Kodu</b>
		</label>
		<select name="tamir_kodu" id="tamir_kodu" required>
			<option value="0">
				Seçiniz
			</option>
			<option value="1">
				1 - Batarya hasarı
			</option>
			<option value="2">
				2 - Kasa hasarı
			</option>
			<option value="3">
				3 - Aksesuar hasarı
			</option>
			<option value="4">
				4 - Ekran hasarı
			</option>
		</select>
		<br><br>
		<label for="label-2">
			<b>Seri No</b>
		</label>
		<input type="text" name="seri_no" id="seri_no" placeholder="9 haneli Seri No girin..." maxlength="9" required>
		<br><br>
		<label for="label-3">
			<b>Model</b>
		</label>
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
		<label for="label-4">
			<b>İşlem</b>
		</label>
		<select name="islem" id="islem" required>
			<option value="0">
				Seçiniz
			</option>
			<option value="Batarya değişimi">
				Batarya değişimi
			</option>
			<option value="Kasa onarımı">
				Kasa onarımı
			</option>
			<option value="Aksesuar değişimi">
				Aksesuar değişimi
			</option>
			<option value="Ekran değişimi">
				Ekran değişimi
			</option>
		</select>
		<br><br>
		<input type="submit" value="Kaydet" name="kaydet" id="kaydet">
	</form>
	<?php

	$tamirKodu = "";
	$seriNo = "";
	$model = "";
	$islem = "";
	if (isset($_POST["tamir_kodu"]) && isset($_POST["seri_no"]) && isset($_POST["model"]) && isset($_POST["islem"])) {
		if ($_POST["tamir_kodu"] != "" && $_POST["seri_no"] != "" && $_POST["model"] != "" && $_POST["islem"] != "") {
			$tamirKodu = $_POST["tamir_kodu"];
			$seriNo = $_POST["seri_no"];
			$model = $_POST["model"];
			$islem = $_POST["islem"];

			$son_eklenen_id = 0;
			$database->insert("tbl_385179", ["tamir_kodu" => $tamirKodu, "seri_no" => $seriNo, "model" => $model, "islem" => $islem]);
			$son_eklenen_id = $database->id();
			if ($son_eklenen_id > 0) {
				echo '<script>alert("Kayıt oluşturuldu.")</script>';
			} else {
				echo '<script>alert("Hata! Lütfen alanları kontrol ediniz.")</script>';
			}
		} else {
			echo '<script>alert("Lütfen bilgileri eksiksiz doldurunuz.")</script>';
		}
	}

	?>
	<br><br>
	<table>
		<thead>
			<tr>
				<th>
					ID
				</th>
				<th>
					Tamir Kodu
				</th>
				<th>
					Seri No
				</th>
				<th>
					Model
				</th>
				<th>
					İşlem
				</th>
			</tr>
		</thead>
		<tbody>
			<?php
			$tamirKayitlari = $database->select("tbl_385179", "*");
			$sira = 1;
			foreach ($tamirKayitlari as $satir) {
				echo "<tr>
				<td>$sira</td>
				<td>" . $satir["tamir_kodu"] . "</td>
				<td>" . $satir["seri_no"] . "</td>
				<td>" . $satir["model"] . "</td>
				<td>" . $satir["islem"] . "</td>
				</tr>";
				$sira++;
			}
			?>
		</tbody>
	</table>
</body>

</html>