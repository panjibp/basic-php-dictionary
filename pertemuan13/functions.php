<?php
// koneksi ke db
$conn = mysqli_connect("localhost", "root", "", "phpdasar");

function query($query) {
	global $conn;

	$result = mysqli_query($conn, $query);
	$rows = [];
	while( $row = mysqli_fetch_assoc($result) ) {
		$rows[] = $row;
	}
	return $rows;
}

function tambah($data) {
	global $conn;

	$nama = htmlspecialchars($data["nama"]);
	$nim = htmlspecialchars($data["nim"]);
	$email = htmlspecialchars($data["email"]);
	$jurusan = htmlspecialchars($data["jurusan"]);

	$gambar = upload();
	if( !$gambar ) {
		return false;
	}

	$query = "INSERT INTO mahasiswa VALUES
			('', '$nama', '$nim', '$email', '$jurusan', '$gambar')
			";

	mysqli_query($conn, $query);

	return mysqli_affected_rows($conn);
}

function upload() {
	$namaFile = $_FILES['gambar']['name'];
	$ukuranFile = $_FILES['gambar']['size'];
	$error = $_FILES['gambar']['error'];
	$tmpName = $_FILES['gambar']['tmp_name'];

	// 4 adalah kode error jika gambar kosong
	if( $error === 4 ) {
		echo "<script>
				alert('Pilih gambar terlebih dahulu!');
			</script>";
		return false;
	}

	// cek apakah yg diupload adalah gambar
	$ekstensiGambarValid = ['jpg', 'jpeg', 'png'];
	$ekstensiGambar = explode('.', $namaFile);
	$ekstensiGambar = strtolower(end($ekstensiGambar));
	if( !in_array($ekstensiGambar, $ekstensiGambarValid) ) {
		echo "<script>
				alert('File harus berformat jpg, jpeg, atau png!');
			</script>";
		return false;
	}

	//cek jika ukurannya terlalu besar (1 jt byte = 1 mb)
	if( $ukuranFile > 10000000 ) {
		echo "<script>
				alert('Ukuran gambar terlalu besar');
			</script>";
		return false;
	}

	// lolos validasi, siap upload
	// generate nama gambar baru
	$namaFileBaru = uniqid();
	$namaFileBaru .= '.';
	$namaFileBaru .= $ekstensiGambar;
	move_uploaded_file($tmpName, 'img/' . $namaFileBaru);

	return $namaFileBaru;
}

function hapus($id) {
	global $conn;

	mysqli_query($conn, "DELETE FROM mahasiswa WHERE id=$id");

	return mysqli_affected_rows($conn);
}

function ubah($data) {
	global $conn;

	$id = $data["id"];
	$nama = htmlspecialchars($data["nama"]);
	$nim = htmlspecialchars($data["nim"]);
	$email = htmlspecialchars($data["email"]);
	$jurusan = htmlspecialchars($data["jurusan"]);
	$gambarLama = htmlspecialchars($data["gambarLama"]);

	// cek apakah user pilih gambar baru
	// 4 adalah kode error bahwa gambarnya kosong/tdk dipilih
	if( $_FILES['gambar']['error'] === 4 ) {
		$gambar = $gambarLama;
	} else {
		$gambar = upload();
	}

	$query = "UPDATE mahasiswa SET
				nama = '$nama',
				nim = '$nim',
				email = '$email',
				jurusan = '$jurusan',
				gambar = '$gambar'
			WHERE id = $id
			";

	mysqli_query($conn, $query);

	return mysqli_affected_rows($conn);
}

function cari($keyword) {
	$query = "SELECT * FROM mahasiswa WHERE
				nama LIKE '%$keyword%' OR
				nim LIKE '%$keyword%' OR
				email LIKE '%$keyword%' OR
				jurusan LIKE '%$keyword%'
			";
	return query($query);
}

?>