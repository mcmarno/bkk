<?php
$nama = $_POST['nama_perusahaan'];
$email = $_POST['email'];
$alamat = $_POST['alamat'];
$no_telp = $_POST['no_telp'];
$pass = $_POST['password'];
$password = hash('sha256', $pass);
$level = "perusahaan";

include('config.php');
$query = "INSERT INTO perusahaan (nama_perusahaan, alamat, no_telp, email) VALUES ('$nama', '$alamat', '$no_telp', '$email')";
$query1 = "INSERT INTO user (email, password, level) VALUES ('$email', '$password', '$level')";
$result = mysqli_query($conn, $query);
$result = mysqli_query($conn, $query1);

 include('PHPMailer/class.phpmailer.php');
 include('PHPmailer/class.smtp.php');


$nama_penerima=$nama;
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
 
 


header('location:login.php');

?>