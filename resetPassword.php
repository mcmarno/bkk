<?php
$email = $_POST['email'];
$pass = $_POST['password'];
$password = hash('sha256', $pass);

include('config.php');
$result = mysqli_query($conn, "UPDATE user SET password = '$password' WHERE email = '$email'");

include('PHPMailer/class.phpmailer.php');
 include('PHPmailer/class.smtp.php');


$nama_penerima=$nama;
$email_penerima=$email;
$subjek="Password Telah Direset";
$pesan="Gunakan Password baru berikut untuk login : <b>".$pass."</b>";

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
header('location:profil.php');
?>