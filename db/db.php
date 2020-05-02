<?php
$host = 'localhost'; //127.0.0.1
$user = 'root';
$pass = ''; //root
$db   = 'absensi_uptdam';

$link = mysqli_connect($host, $user, $pass, $db) or die(mysqli_error());