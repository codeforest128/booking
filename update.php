<?php
// koneksi database
include 'koneksi.php';

// menangkap data yang di kirim dari form
$ID = $_POST['ID'];
$NOTABLE = $_POST['NOTABLE'];

// update data ke database
mysqli_query($koneksi,"update tbl_webreservation set NOTABLE='$NOTABLE' where ID='$ID'");

// mengalihkan halaman kembali ke index.php
header("location:index.php");

?>