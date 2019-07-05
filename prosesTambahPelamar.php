<?php

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
$pass = $_POST['password'];
$password = hash('sha256', $pass);
$level = "pelamar";
$sertifikat = $_FILES['sertifikat']['name'];
$tmp = $_FILES['sertifikat']['tmp_name'];
$gambar = $_FILES['gambar']['name'];
$tmpp = $_FILES['gambar']['tmp_name'];

$sertifikatbaru = $nama_pelamar."_".$sertifikat;
$gambarbaru = $nama_pelamar."_".$gambar;

$pathsertifikat = "sertifikat/".$sertifikatbaru;
$pathgambar = "gambar/".$gambarbaru;

include 'config.php';

if(move_uploaded_file($tmp, $pathsertifikat) AND move_uploaded_file($tmpp, $pathgambar))
{
	$query = "INSERT INTO pelamar (nama_pelamar, jenis_kelamin, tempat_lahir, tanggal_lahir, alamat, agama, no_telp, pendidikan, ketrampilan, sertifikat, gambar, email)VALUES('$nama_pelamar', '$jenis_kelamin', '$tempat_lahir', '$tanggal_lahir', '$alamat', '$agama', '$no_telp', '$pendidikan', '$ketrampilan', '$sertifikatbaru', '$gambarbaru', '$email')";
	$query1 = "INSERT INTO user (email, password, level) VALUES ('$email', '$password', '$level')";
	$sql = mysqli_query($conn, $query);
	$sql = mysqli_query($conn, $query1);

	if ($sql) 
	{
		include('PHPMailer/class.phpmailer.php');
		include('PHPmailer/class.smtp.php');


		$nama_penerima=$nama_pelamar;
		$email_penerima=$email;
		$subjek="Password Login";
		$pesan="Gunakan Password berikut untuk login : <b>".$pass."</b>";

		$mail = new PHPMailer();
		$mail->isSMTP();
		$mail->Port = 465;
		$mail->SMTPSecure = false;

		$mail->Host     = "ssl://smtp.gmail.com"; 
		$mail->Mailer   = "smtp";
		$mail->SMTPAuth = true; 

		$mail->Username = "bkkdifabel@gmail.com";
		$mail->Password = "bkkdifabel123";
		$webmaster_email = "bkkdifabel@gmail.com";
		$email = $email_penerima;
		$name = $nama_penerima;
		$mail->From= $webmaster_email;
		$mail->FromName="Admin";
		$mail->AddAddress($email, $name);

		$mail->AddReplyTo($webmaster_email, "Admin");
		$mail->WordWrap = 50;

		$mail->IsHTML(true);
		$mail->Subject = $subjek;
		$mail->Body = $pesan;

		$mail->AltBody = "YOOO E-Mail Gw UDAH SIAP BRO";
		if(!$mail->Send()) {
			echo "mail error" . $mail->ErrorInfo;
		} else {
			echo "email berhasil di kirim";
		}
		header('location:pelamar.php');
	}else
	{
		echo "Maaf, Terjadi kesalahan saat mencoba untuk menyimpan data ke database.";
		echo "<br><a href='tambahPelamar.php'>Kembali Ke Form</a>";
	}
}else
{
	echo "Maaf, Gambar dan Sertifikat gagal untuk diupload.";
	echo "<br><a href='tambahPelamar.php'>Kembali Ke Form</a>";
}
?>