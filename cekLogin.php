<?php 
// mengaktifkan session pada php
session_start();
 
// menghubungkan php dengan koneksi database
include 'config.php';
 
// menangkap data yang dikirim dari form login
$email = $_POST['email'];
$pass = $_POST['password'];
$password = hash('sha256', $pass);
 
 
// menyeleksi data user dengan username dan password yang sesuai
$login = mysqli_query($conn,"SELECT * FROM user WHERE email='$email' AND password='$password'");
// menghitung jumlah data yang ditemukan
$cek = mysqli_num_rows($login);
 
// cek apakah username dan password di temukan pada database
if($cek > 0){
 
	$data = mysqli_fetch_assoc($login);
 
	// cek jika user login sebagai admin
	if($data['level']=="admin"){
 
		// buat session login dan username
		$_SESSION['email'] = $email;
		$_SESSION['level'] = "admin";
		// alihkan ke halaman dashboard admin
		header("location:loker.php");
 
	// cek jika user login sebagai pegawai
	}else if($data['level']=="perusahaan"){
		// buat session login dan username
		$_SESSION['email'] = $email;
		$_SESSION['level'] = "perusahaan";
		// alihkan ke halaman dashboard pegawai
		header("location:loker.php");
	}else if($data['level']=="pelamar"){
		// buat session login dan username
		$_SESSION['email'] = $email;
		$_SESSION['level'] = "pelamar";
		// alihkan ke halaman dashboard pegawai
		header("location:profilPelamar.php");
	}else{
 
		// alihkan ke halaman login kembali
		header("location:login.php");
	}	
}else{
	header("location:login.php");
}
 
?>