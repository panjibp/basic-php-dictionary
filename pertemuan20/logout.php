<?php
// session start
// timpa session dengan array kosong untuk memastikan sebelum destroy
// unset session untuk memastikan sebelum destroy
// destroy session
// hapus semua cookie
session_start();
$_SESSION = [];
session_unset();
session_destroy();
setcookie('id', '', time() - 3600);
setcookie('key', '', time() - 3600);

header('Location: login.php');
exit;

?>