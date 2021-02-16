<?php
require 'functions.php';

$id = $_GET["id"];

$mhs = query("SELECT * FROM mahasiswa WHERE id=$id")[0];

if( isset($_POST["submit"]) ) {
	if( ubah($_POST) > 0 ) {
		echo "<script>
				alert('Data berhasil diubah');
				document.location.href = 'index.php';
			</script>";
	} else {
		echo "<script>
				alert('Data gagal diubah');
				document.location.href = 'index.php';
			</script>";
	}
}

?>

<!DOCTYPE html>
<html>
<head>
	<title>Ubah Data Mahasiswa</title>
</head>
<body>

<ul>
<h1>Ubah Data Mahasiswa</h1>
</ul>

<form action="" method="post">
	<input type="hidden" name="id" value="<?= $mhs["id"] ?>">
	<ul>
		<div>
			<label for="nim">NIM</label><br>
			<input type="text" name="nim" id="nim" value="<?= $mhs["nim"]; ?>" required>
		</div>
		<br>
		<div>
			<label for="nama">Nama</label><br>
			<input type="text" name="nama" id="nama" value="<?= $mhs["nama"]; ?>" required>
		</div>
		<br>
		<div>
			<label for="email">Email</label><br>
			<input type="text" name="email" id="email" value="<?= $mhs["email"] ?>" required>
		</div>
		<br>
		<div>
			<label for="jurusan">Jurusan</label><br>
			<input type="text" name="jurusan" id="jurusan" value="<?= $mhs["jurusan"]; ?>" required>
		</div>
		<br>
		<div>
			<label for="gambar">Gambar</label><br>
			<input type="text" name="gambar" id="gambar" value="<?= $mhs["gambar"]; ?>" required>
		</div>
		<br>
		<br>
		<div>
			<button type="submit" name="submit" style="margin-right: 10px;">Ubah</button>
			<a href="index.php">Kembali</a>
		</div>
	</ul>
</form>

</body>
</html>