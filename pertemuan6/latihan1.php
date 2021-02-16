<!DOCTYPE html>
<html>
<head>
	<title>Latihan Assoc Array</title>
	<style>
		.kotak {
			width: 30px;
			height: 30px;
			background-color: #BADA55;
			text-align: center;
			line-height: 30px;
			margin: 3px;
			float: left;
			transition: 1s;
		}

		.kotak:hover {
			transform: rotate(180deg);
			border-radius: 50%;
		}

		.clear {
			clear: both;
		}
	</style>
</head>
<body>

<?php
$numbers = [
	[1,2,3],[4,5,6],[7,8,9]
];
?>

<?php foreach($numbers as $number1) : ?>
	<?php foreach($number1 as $number2) : ?>
		<div class="kotak"><?= $number2; ?></div>
	<?php endforeach; ?>
	<div class="clear"></div>
<?php endforeach; ?>

</body>
</html>