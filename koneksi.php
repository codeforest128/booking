<?php
// $servername = "localhost";
// $database = "lupulhok_webreservation_db";
// $username = "lupulhok_webreservation_user";
// $password = "booking";
$servername = "localhost";
$database = "lupulhok_webreservation_db";
$username = "root";
$password = "";
// Create connection
$koneksi = mysqli_connect($servername, $username, $password, $database);
// Check connection
if (!$koneksi) {
    die("Connection failed: " . mysqli_connect_error());
}
// echo "Connected successfully";
// mysqli_close($koneksi);
?>