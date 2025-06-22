<?php
session_start();
session_destroy();
header("Location: mahasiswa_login.php");
exit;
?>
