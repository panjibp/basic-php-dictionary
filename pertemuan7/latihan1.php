<?php
$students = [
	[
		"nama" => "Panji",
		"nim" => "1612491496",
		"email" => "panji@gmail.com",
		"jurusan" => "Sistem Informasi",
		"gambar" => "panji.jpg"
	],
	[
		"nama" => "Fransiska",
		"nim" => "1512490417",
		"email" => "fransiska.dika@gmail.com",
		"jurusan" => "Sistem Informasi",
		"gambar" => "siska.jpg"
	]
];
?>

<!DOCTYPE html>
<html>
<head>
	<title>Daftar Mahasiswa</title>
</head>
<body>
	<h1>Daftar Mahasiswa</h1>
	<ul>
		<?php foreach($students as $student) : ?>
			<li>
				<a href="latihan2.php?nama=<?= $student["nama"]; ?>&nim=<?= $student["nim"]; ?>&email=<?= $student["email"]; ?>&jurusan=<?= $student["jurusan"]; ?>&gambar=<?= $student["gambar"]; ?>"><?= $student["nama"]; ?></a>	
			</li>
		<?php endforeach; ?>
	</ul>

</body>
</html>