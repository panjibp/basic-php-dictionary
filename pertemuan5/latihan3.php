<?php 
$students = [
	['Panji', '1612491496', 'Sistem Informasi', 'panji@raharja.info'],
	['Fansiska', '1512490417 ', 'Sistem Informasi', 'fransiska.dika@raharja.info']
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
	<li>Nama: <?= $student[0]; ?></li>
	<li>NIM: <?= $student[1]; ?></li>
	<li>Prodi: <?= $student[2]; ?></li>
	<li>Email: <?= $student[3]; ?></li>
</ul>
<?php endforeach; ?>

 </body>
 </html>