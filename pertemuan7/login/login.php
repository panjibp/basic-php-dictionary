<?php
if(isset($_POST["submit"])) {
	if($_POST["username"] == "admin" && $_POST["password"] == "123") {
		header("Location: admin.php");
		exit;
	} else {
		$error = true;
	}
}
?>

<!DOCTYPE html>
<html>
<head>
	<title>Login</title>
</head>
<body>

<h1>Login Admin</h1>

<?php if(isset($error)) : ?>
	<p style="color: red; font-style: italic;">Username/password salah!</p>
<?php endif; ?>

<ul>
<form action="" method="post">

<div>
	<label for="username">Username</label><br>
	<input type="text" name="username" id="username">
</div>
<br>
<div>
	<label for="password">Password</label><br>
	<input type="password" name="password" id="password">
</div>
<br>
<div>
	<button type="submit" name="submit">Login</button>
</div>
	
</form>
</ul>

</body>
</html>