<?php
session_start();
unset($_SESSION['id']);
unset($_SESSION['user_name']);
// session_destroy();
header('Location:../index.php?logout=success');
?>