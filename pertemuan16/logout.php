<?php
// session start
// timpa session dengan array kosong untuk memastikan sebelum destroy
// unset session untuk memastikan sebelum destroy
// destroy session
session_start();
$_SESSION = [];
session_unset();
session_destroy();

header('Location: login.php');
exit;

?>