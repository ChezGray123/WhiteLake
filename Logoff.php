<?php
session_start();
session_destroy();
$loggedin =0;
$_SESSION['$loggedin'] = $loggedin;
header("location:LoginScreen.php");
?>