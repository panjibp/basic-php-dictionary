<?php
session_start();
require 'functions.php';

// cek cookie
if( isset($_COOKIE['id']) && isset($_COOKIE['key']) ) {
	$id = $_COOKIE['id'];
	$key = $_COOKIE['key'];

	// ambil username berdasarkan id
	$result = mysqli_query($conn, "SELECT * FROM user where id = $id");
	$row = mysqli_fetch_assoc($result);

	// cek cookie dan username
	if( $key === hash('sha256', $row['username']) ) {
		$_SESSION['login'] = true;
	}
}

if( isset($_SESSION['login']) ) {
	header('Location: index.php');
	exit;
}

if( isset($_POST['login']) ) {
	$username = $_POST['username'];
	$password = $_POST['password'];

	$result = mysqli_query($conn, "SELECT * FROM user WHERE username = '$username'");

	// cek username; 1 = ada; 0 = tidak ada
	if( mysqli_num_rows($result) === 1 ) {
		// cek password
		$row = mysqli_fetch_assoc($result);
		if( password_verify($password, $row["password"]) ) {
			// set session
			$_SESSION['login'] = true;

			// cek remember me
			if( isset($_POST['remember']) ) {
				// bikin cookie

				setcookie('id', $row['id'], time() + 60);
				setcookie('key', hash('sha256', $row['username']), time() + 60);
			}

			header("Location: index.php");
			exit;
		}
	}

	$error = true;
}

?>

<!DOCTYPE html>
<html>
<head>
	<title>Halaman Login</title>
</head>
<body>

<ul>
	<h1>Halaman Login</h1>
	
	<?php if( isset($error) ) : ?>
		<p style="color: red; font-style: italic;">Username/Password salah!</p>
	<?php endif; ?>
</ul>

<form action="" method="post">
	<ul>
		<div>
			<label for="username">Username</label><br>
			<input type="text" name="username" id="username" required>
		</div><br>
		<div>
			<label for="password">Password</label><br>
			<input type="password" name="password" id="password">
		</div><br>
		<div>
			<input type="checkbox" name="remember" id="remember">
			<label for="remember">Remember me</label>
		</div>
		<br><br>
		<button type="submit" name="login">Login</button>
	</ul>
</form>

</body>
</html>