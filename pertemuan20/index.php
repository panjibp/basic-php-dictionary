<?php
session_start();

if( !isset($_SESSION['login']) ) {
	header("Location: login.php");
	exit;
}

require "functions.php";
$mahasiswa = query("SELECT * FROM mahasiswa ORDER BY nama ASC");

if( isset($_POST["cari"]) ) {
	$mahasiswa = cari($_POST["keyword"]);
}

?>

<!DOCTYPE html>
<html>
<head>
	<title>Halaman Admin</title>
	<style>
		.loader {
			width: 85px;
			position: absolute;
			top: 132px;
			left: 275px;
			z-index: -1;
			display: none;
		}
	</style>
</head>
<body>

<ul>
<a href="logout.php">Logout</a>

<h1>Daftar Mahasiswa</h1>

<a href="tambah.php">Tambah Data Mahasiswa</a>
<br><br>

<form action="" method="post">
	<input type="text" name="keyword" id="keyword" size="30" placeholder="Masukkan keyword pencarian.." autocomplete="off" autofocus>
	<button type="submit" name="cari" id="tombolCari">Cari</button>
	<img src="img/loading.gif" class="loader">
</form>
<br>
<div id="container">
<table border="1" cellpadding="10" cellspacing="0">
	<tr>
		<th>No.</th>
		<th>Aksi</th>
		<th>Gambar</th>
		<th>NIM</th>
		<th>Nama</th>
		<th>Email</th>
		<th>Jurusan</th>
	</tr>

	<?php $i = 1; ?>
	<?php foreach( $mahasiswa as $row ) : ?>
	<tr>
		<td><?= $i; ?></td>
		<td>
			<a href="ubah.php?id=<?= $row["id"]; ?>">Ubah</a> |
			<a href="hapus.php?id=<?= $row["id"]; ?>" onclick="return confirm('Yakin?')">Hapus</a>
		</td>
		<td><img src="img/<?= $row["gambar"]; ?>" style="max-width: 80px; max-height: 80px;"></td>
		<td><?= $row["nim"]; ?></td>
		<td><?= $row["nama"]; ?></td>
		<td><?= $row["email"]; ?></td>
		<td><?= $row["jurusan"]; ?></td>
	</tr>
	<?php $i++; ?>
	<?php endforeach; ?>
</table>
</div>
</ul>

<script src="js/jquery-3.5.1.min.js"></script>
<script src="js/script.js"></script>
</body>
</html>