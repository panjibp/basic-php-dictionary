// ambil elemen yg dibutuhkan
var keyword = document.getElementById('keyword');
var tombolCari = document.getElementById('tombolCari');
var container = document.getElementById('container');

// tambahkan event ketika keyword ditulis
keyword.addEventListener('keyup', function() {
	// bikin objek ajax
	var xhr = new XMLHttpRequest();
	// cek kesiapan ajax
	xhr.onreadystatechange = function() {
		// 4 = ready; 200 = ready
		if( xhr.readyState == 4 && xhr.status == 200 ) {
			container.innerHTML = xhr.responseText;
		}
	}

	// eksekusi ajax; true: asynchronous; false: synchronous
	xhr.open('GET', 'ajax/mahasiswa.php?keyword=' + keyword.value, true);
	xhr.send();
});