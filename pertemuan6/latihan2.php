<?php 
// $students = [
// 	['Panji', '1612491496', 'Sistem Informasi', 'panji@raharja.info'],
// 	['Fansiska', '1512490417 ', 'Sistem Informasi', 'fransiska.dika@raharja.info']
// ];

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
<?php foreach($students as $student) : ?>
<ul>
	<div>
		<img src="img/<?= $student["gambar"]; ?>" style="max-width: 100px; max-height: 100px;">
	</div>
	<li>Nama: <?= $student["nama"]; ?></li>
	<li>NIM: <?= $student["nim"]; ?></li>
	<li>Prodi: <?= $student["email"]; ?></li>
	<li>Email: <?= $student["jurusan"]; ?></li>
</ul>
<br>
<?php endforeach; ?>


 </body>
 </html>