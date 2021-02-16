<?php
$numbers = ['01', '02', '03', '04', '05', '06', '07', '08'];
?>

<!DOCTYPE html>
<html>
<head>
	<title>Latihan PHP</title>
	<style>
		.kotak {
			width: 50px;
			height: 50px;
			background-color: salmon;
			text-align: center;
			line-height: 50px;
			margin: 3px;
			float: left;
		}
		.clear {
			clear: both;
		}
	</style>
</head>
<body>

<?php for($i = 0; $i < count($numbers); $i++) { ?>
	<div class="kotak"><?= $numbers[$i]; ?></div>
<?php } ?>

<div class="clear"></div>

<?php foreach($numbers as $number) : ?>
	<div class="kotak"><?= $number; ?></div>
<?php endforeach; ?>

</body>
</html>