<?php
session_start();
session_destroy();
header('location:../authentication/login-regis.php');
?>