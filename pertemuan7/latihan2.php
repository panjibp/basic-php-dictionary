<?php
if(!isset($_GET["nama"]) ||
	!isset($_GET["nim"]) ||
	!isset($_GET["email"]) ||
	!isset($_GET["jurusan"]) ||
	!isset($_GET["gambar"])) {
	header("Location: latihan2a.php");
}
?>

<!DOCTYPE html>
<html>
<head>
	<title>Detail Mahasiswa</title>
</head>
<body>

<h1>Data Mahasiswa <?= $_GET["nama"]; ?></h1>
<ul>
	<div>
		<img src="img/<?= $_GET["gambar"]; ?>" style="max-width: 100px; max-height: 100px;">
	</div>
	<li><?= $_GET["nama"]; ?></li>
	<li><?= $_GET["nim"]; ?></li>
	<li><?= $_GET["email"]; ?></li>
	<li><?= $_GET["jurusan"]; ?></li>
</ul>

<a href="latihan1.php">Kembali</a>

</body>
</html>