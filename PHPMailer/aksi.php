<?php
 include('class.phpmailer.php');
 include('class.smtp.php');


$nama_penerima="marno";
$email_penerima="marnodev8@gmail.com";
$subjek="tes";
$pesan="uji coba";

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
 
 
?>