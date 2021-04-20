<?php 

define('HOST', 'localhost');
define('USER', 'root');
define('DB', 'akademik_db');

// Ini password masing-masing
define('SANDI', '');

$conn = new mysqli(HOST, USER, SANDI, DB) or die('Connection to the database error');

?>