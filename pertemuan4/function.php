<?php 

function salam($nama1, $nama2) {
	return "Selamat datang, $nama1 dan $nama2!";
}

?>

<!DOCTYPE html>
<html>
<head>
	<title>Latihan Function</title>
</head>
<body>
	<h1><?= salam("Agus", "Salim
	"); ?></h1>
</body>
</html>