<?php
session_start();

if( !isset($_SESSION['login']) ) {
	header('Location: login.php');
	exit;
}

require 'functions.php';
if( isset($_POST["submit"]) ) {
	if( tambah($_POST) > 0 ) {
		echo "<script>
				alert('Data berhasil ditambahkan');
				document.location.href = 'index.php';
			</script>";
	} else {
		echo "<script>
				alert('Data gagal ditambahkan');
				document.location.href = 'index.php';
			</script>";
	}
}

?>

<!DOCTYPE html>
<html>
<head>
	<title>Tambah Data Mahasiswa</title>
</head>
<body>

<ul>
<h1>Tambah Data Mahasiswa</h1>
</ul>

<form action="" method="post" enctype="multipart/form-data">
	<ul>
		<div>
			<label for="nim">NIM</label><br>
			<input type="text" name="nim" id="nim" required>
		</div>
		<br>
		<div>
			<label for="nama">Nama</label><br>
			<input type="text" name="nama" id="nama" required>
		</div>
		<br>
		<div>
			<label for="email">Email</label><br>
			<input type="text" name="email" id="email" required>
		</div>
		<br>
		<div>
			<label for="jurusan">Jurusan</label><br>
			<input type="text" name="jurusan" id="jurusan" required>
		</div>
		<br>
		<div>
			<label for="gambar">Gambar</label><br>
			<input type="file" name="gambar" id="gambar">
		</div>
		<br>
		<br>
		<div>
			<button type="submit" name="submit" style="margin-right: 10px;">Submit</button>
			<a href="index.php">Kembali</a>
		</div>
	</ul>
</form>

</body>
</html>