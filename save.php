<?php

$nama_pelamar = "aku";
$email = "marno08041995@gmail.com";
$pass = "123";
$password = hash('sha256', $pass);

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

		$mail->Username = "kanaval@yahoo.com";
		$mail->Password = "kan082091";
		$webmaster_email = "kanaval@yahoo.com";
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
		//header('location:pelamar.php');
	
?>