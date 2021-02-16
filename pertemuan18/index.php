<?php
session_start();

if( !isset($_SESSION['login']) ) {
	header("Location: login.php");
	exit;
}

require "functions.php";

// pagination
// konfigurasi
$jumlahDataPerHalaman = 3;
$jumlahData = count(query("SELECT * FROM mahasiswa"));
$jumlahHalaman = ceil($jumlahData / $jumlahDataPerHalaman);
// if - else pakai ternary
$halamanAktif = ( isset($_GET['halaman']) ) ? $_GET['halaman'] : 1;
$awalData = ($jumlahDataPerHalaman * $halamanAktif) - $jumlahDataPerHalaman;

$mahasiswa = query("SELECT * FROM mahasiswa ORDER BY nama ASC LIMIT $awalData, $jumlahDataPerHalaman");

if( isset($_POST["cari"]) ) {
	$mahasiswa = cari($_POST["keyword"]);
}

?>

<!DOCTYPE html>
<html>
<head>
	<title>Halaman Admin</title>
</head>
<body>

<ul>
<a href="logout.php">Logout</a>

<h1>Daftar Mahasiswa</h1>

<a href="tambah.php">Tambah Data Mahasiswa</a>
<br><br>

<form action="" method="post">
	<input type="text" name="keyword" size="30" placeholder="Masukkan keyword pencarian.." autocomplete="off" autofocus>
	<button type="submit" name="cari">Cari</button>
</form>
<br>

<!-- Navigasi -->
<?php if( $halamanAktif > 1 ) : ?>
	<a href="?halaman=<?= $halamanAktif - 1; ?>">&laquo;</a>
<?php endif; ?>

<?php for( $i = 1; $i <= $jumlahHalaman; $i++ ) : ?>
	<?php if( $i == $halamanAktif ) : ?>
		<a href="?halaman=<?= $i; ?>" style="font-weight: bold; color: red;"><?= $i; ?></a>
	<?php else : ?>
		<a href="?halaman=<?= $i; ?>"><?= $i; ?></a>
	<?php endif; ?>
<?php endfor; ?>

<?php if( $halamanAktif < $jumlahHalaman ) : ?>
	<a href="?halaman=<?= $halamanAktif + 1; ?>">&raquo;</a>
<?php endif; ?>

<br><br>

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

	<?php $i = $awalData + 1; ?>
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
</ul>

</body>
</html>