<?php
$id_pelamar = $_POST['id_pelamar'];
$nama_pelamar = $_POST['nama_pelamar'];
$jenis_kelamin = $_POST['jenis_kelamin'];
$tempat_lahir = $_POST['tempat_lahir'];
$tanggal_lahir = $_POST['tanggal_lahir'];
$alamat = $_POST['alamat'];
$agama = $_POST['agama'];
$no_telp = $_POST['no_telp'];
$pendidikan = $_POST['pendidikan'];
$ketrampilan = $_POST['ketrampilan'];
$email = $_POST['email'];
$sertifikat = $_FILES['sertifikat']['name'];
$tmp = $_FILES['sertifikat']['tmp_name'];
$gambar = $_FILES['gambar']['name'];
$tmpp = $_FILES['gambar']['tmp_name'];
$email_awal = $_POST['email_awal'];

$sertifikatbaru = $nama_pelamar."_".$sertifikat;
$gambarbaru = $nama_pelamar."_".$gambar;

$pathsertifikat = "sertifikat/".$sertifikatbaru;
$pathgambar = "gambar/".$gambarbaru;

if (empty($_POST['tanggal_lahir']))
{
	$tanggal_lahir = $_POST['tgl'];
}
else
{
	$tanggal_lahir = $_POST['tanggal_lahir'];
}

include('config.php');
$cari = mysqli_query($conn, "SELECT * FROM user WHERE email = '$email_awal'");
$hasil = mysqli_fetch_array($cari);
$id_user = $hasil['id_user'];

if (empty($_FILES['sertifikat']['name']) AND empty($_FILES['gambar']['name']))
{
	$query = "UPDATE pelamar SET nama_pelamar = '$nama_pelamar', jenis_kelamin = '$jenis_kelamin', tempat_lahir = '$tempat_lahir', tanggal_lahir = '$tanggal_lahir', alamat = '$alamat', agama = '$agama', no_telp = '$no_telp', pendidikan = '$pendidikan', ketrampilan = '$ketrampilan', email = '$email' WHERE id_pelamar = '$id_pelamar'";
	$query1 = "UPDATE user SET email = '$email' WHERE id_user = '$id_user'";
	$sql = mysqli_query($conn, $query);
	$sql = mysqli_query($conn, $query1);
	header('location:pelamar.php');
}elseif (empty($_FILES['sertifikat']['name']))
{
	if (move_uploaded_file($tmpp, $pathgambar))
	{
		$carigambar = mysqli_query($conn, "SELECT * FROM pelamar WHERE id_pelamar = '$id_pelamar'");
		$hasilgambar = mysqli_fetch_array($carigambar);

		if(is_file("gambar/".$hasilgambar['gambar']))
		unlink("gambar/".$hasilgambar['gambar']);

		$query = "UPDATE pelamar SET nama_pelamar = '$nama_pelamar', jenis_kelamin = '$jenis_kelamin', tempat_lahir = '$tempat_lahir', tanggal_lahir = '$tanggal_lahir', alamat = '$alamat', agama = '$agama', no_telp = '$no_telp', pendidikan = '$pendidikan', ketrampilan = '$ketrampilan', email = '$email', gambar = '$gambarbaru' WHERE id_pelamar = '$id_pelamar'";
		$query1 = "UPDATE user SET email = '$email' WHERE id_user = '$id_user'";
		$sql = mysqli_query($conn, $query);
		$sql = mysqli_query($conn, $query1);
		header('location:pelamar.php');
	}else
	{
		echo "Maaf, Terjadi kesalahan saat mencoba untuk menyimpan data ke database.";
		echo "<br><a href='ubahPelamar.php'>Kembali Ke Form</a>";
	}
}elseif (empty($_FILES['gambar']['name']))
{
	if (move_uploaded_file($tmp, $pathsertifikat))
	{
		$carisertifikat = mysqli_query($conn, "SELECT * FROM pelamar WHERE id_pelamar = '$id_pelamar'");
		$hasilsertifikat = mysqli_fetch_array($carisertifikat);

		if(is_file("sertifikat/".$hasilsertifikat['sertifikat']))
		unlink("sertifikat/".$hasilsertifikat['sertifikat']);

		$query = "UPDATE pelamar SET nama_pelamar = '$nama_pelamar', jenis_kelamin = '$jenis_kelamin', tempat_lahir = '$tempat_lahir', tanggal_lahir = '$tanggal_lahir', alamat = '$alamat', agama = '$agama', no_telp = '$no_telp', pendidikan = '$pendidikan', ketrampilan = '$ketrampilan', email = '$email', sertifikat = '$sertifikatbaru' WHERE id_pelamar = '$id_pelamar'";
		$query1 = "UPDATE user SET email = '$email' WHERE id_user = '$id_user'";
		$sql = mysqli_query($conn, $query);
		$sql = mysqli_query($conn, $query1);
		header('location:pelamar.php');
	}else
	{
		echo "Maaf, Terjadi kesalahan saat mencoba untuk menyimpan data ke database.";
		echo "<br><a href='ubahPelamar.php'>Kembali Ke Form</a>";
	}
}
?>