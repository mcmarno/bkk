<?php
// include database connection file
include_once("config.php");

// Get id from URL to delete that user
$id = $_GET['id'];

// Delete user row from table based on given id
$query = mysqli_query($conn, "SELECT * FROM user WHERE id_user = '$id'");
$hasil = mysqli_fetch_array($query);
$nama = $hasil['email'];
$query1 = mysqli_query($conn, "DELETE FROM perusahaan WHERE email = '$nama'");
$query2 = mysqli_query($conn, "DELETE FROM user WHERE id_user = '$id'");

// After delete redirect to Home, so that latest user list will be displayed.
header("Location:user.php");
?>