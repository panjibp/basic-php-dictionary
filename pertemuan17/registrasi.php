<?php
require 'functions.php';

if( isset($_POST["register"]) ) {
	if( registrasi($_POST) > 0 ) {
		echo "<script>
				alert('User baru berhasil ditambahkan');
			</script>";
	} else {
		echo mysqli_error($conn);	
	}
}

?>

<!DOCTYPE html>
<html>
<head>
	<title>Halaman Registrasi</title>
</head>
<body>

<ul>
<h1>Halaman Registrasi</h1>
</ul>

<form action="" method="post">
		
	<ul>
		<div>
			<label for="username">Username</label><br>
			<input type="text" name="username" id="username">
		</div><br>
		<div>
			<label for="password">Password</label><br>
			<input type="password" name="password" id="password">
		</div><br>
		<div>
			<label for="password2">Konfirmasi Password</label><br>
			<input type="password" name="password2" id="password2">
		</div><br><br>
		<button type="submit" name="register" style="margin-right: 10px;">Daftar</button>
		<a href="index.php">Kembali</a>
	</ul>

</form>

</body>
</html>