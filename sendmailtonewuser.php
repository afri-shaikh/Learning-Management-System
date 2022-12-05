<?php 

		$actkey=rand(1001,9999);
		include("inc/db.php");
		$query=$con->prepare("update contact set actkey='$actkey' where email='".$_GET['mail']."'");
		
		$query->execute();

		// Import PHPMailer classes into the global namespace
		// These must be at the top of your script, not inside a function
		use PHPMailer\PHPMailer\PHPMailer;
		use PHPMailer\PHPMailer\Exception;
		echo !extension_loaded('openssl')?"Not Available":"Available";
		//Load Composer's autoloader
		require 'vendor/autoload.php';

		$mail = new PHPMailer(); // create a new object
		$mail->IsSMTP(); // enable SMTP
		$mail->SMTPDebug = 2; // debugging: 1 = errors and messages, 2 = messages only
		$mail->SMTPAuth = true; // authentication enabled
		$mail->SMTPSecure = 'ssl'; // secure transfer enabled REQUIRED for Gmail
		$mail->Host = "smtp.gmail.com";
		$mail->Port = 465; // or 587
		$mail->IsHTML(true);
		$mail->Username = "rajeshreddyappi@gmail.com";
		$mail->Password = "raju7258";
		$mail->SetFrom("rajeshreddyappi@gmail.com","E-learn");
		$mail->Subject = "Verification Code E-learn";
		$mail->Body = "Hi dear Student Your Verification Code is $actkey";
		$mail->AddAddress("".$_GET['mail']."");

		 if(!$mail->Send()) {
			echo"Mailer Error: " . $mail->ErrorInfo;
		 } else {
			echo "Message has been sent";
			
			echo"<script>alert('!...Activation Key Send Your email...')</script>";
			echo"<script>window.open('verificationkey.php?mail=".$_GET['mail']."','_self')</script>";
			
			
		 }
/*
else
{
		
		echo"<script>alert('!...email is Invalid...')</script>";
		echo"<script>window.open('index.php','_selt')</script>";
			
}*/
?>