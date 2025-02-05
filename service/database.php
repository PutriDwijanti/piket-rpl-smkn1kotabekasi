<?php
$hostname = "localhost";
$username = "root";
$password = "";
$database_name = "data_piket";

$db = new mysqli($hostname, $username, $password, $database_name);

if ($db->connect_error) {
    die("Koneksi database gagal: " . $db->connect_error);
}

$db->set_charset("utf8mb4");
?>
