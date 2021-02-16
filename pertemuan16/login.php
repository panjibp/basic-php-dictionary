<?php
session_start();

if( isset($_SESSION['login']) ) {
	header('Location: index.php');
	exit;
}

require 'functions.php';

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
		</div><br><br>
		<button type="submit" name="login">Login</button>
	</ul>
</form>

</body>
</html>