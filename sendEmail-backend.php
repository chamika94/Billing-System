<?php
require 'PHPMailer/PHPMailerAutoload.php';
try {
	if(isset($_POST['email_send'])) {
		$mail = new PHPMailer;
		$mail->FromName   = $_POST['u_name'];
		$to_email = $_POST['u_email'];
		$mail->AddAddress($to_email);
		$mail->From       = "ken@voxauto.com.au";		
		$mail->Subject  = "Service/Repair documents";
		$body = "<table>	
			<tr>
			  <td></td>
			  <td>".$_POST['message']." - Service/Repair documents are attached</td>
			</tr>
			<table>";
		$body = preg_replace('/\\\\/','', $body);
		$mail->MsgHTML($body);		
		$mail->IsSendmail();
		$mail->AddReplyTo("ken@voxauto.com.au");
		$mail->AltBody    = "To view the message, please use an HTML compatible email viewer!"; 
		$mail->WordWrap   = 80; 
		$mail->AddAttachment($_FILES['attach']['tmp_name'], $_FILES['attach']['name']);
		$mail->AddAttachment($_FILES['attach1']['tmp_name'], $_FILES['attach1']['name']);
		$mail->AddAttachment($_FILES['attach2']['tmp_name'], $_FILES['attach2']['name']);
		$mail->AddAttachment($_FILES['attach3']['tmp_name'], $_FILES['attach3']['name']);
		$mail->IsHTML(true);
		$mail->Send();

		header('Location: sendEmail.php?status=done');
		//echo 'The message has been sent.';
	}
} catch (phpmailerException $e) {
	echo $e->errorMessage();
	header('Location: sendEmail.php?status=error');
}
?>