<?php
$isi = $_POST['isi'];
$nama = $_POST['nama'];

 include('PHPMailer/class.phpmailer.php');
 include('PHPmailer/class.smtp.php');

$subjek="Pesan dari ".$nama;
$pesan=$isi;

$mail = new PHPMailer();
$mail->isSMTP();
$mail->Port = 465;
$mail->SMTPSecure = false;

$mail->Host     = "ssl://smtp.gmail.com"; 
$mail->Mailer   = "smtp";
$mail->SMTPAuth = true; 
 
 $mail->Username = "bkkprogramta@gmail.com";
 $mail->Password = "Onram08041995";
 $webmaster_email = "bkkprogramta@gmail.com";
 $email = "bkkdifabel@gmail.com";
 $name = "Admin";
 $mail->From= $webmaster_email;
 $mail->FromName=$nama;
 $mail->AddAddress($email, $name);
 
 $mail->AddReplyTo($webmaster_email, $nama);
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
 
 


header('location:pesan.php');

?>