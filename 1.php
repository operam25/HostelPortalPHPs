<?php
session_start();
require 'init.php';
$_SESSION['myValue'] = 3;
header("Location:2.php");
?>