<?php
$name = $_POST["name"];
$emailn = $_POST["email"];
$budget = $_POST["budget"];
$subject = $_POST["subject"];
$message = $_POST["message"];


$Body = "";
$Body .= "Name: ";
$Body .= $name;
$Body .= "\n";
$Body .= "\r\n";
$Body .= "Email: ";
$Body .= $emailn;
$Body .= "\n";
$Body .= "\r\n";
$Body .= "Budget: ";
$Body .= $budget;
$Body .= "\n";
$Body .= "\r\n";
$Body .= "Subject: ";
$Body .= $subject;
$Body .= "\n";
$Body .= "\r\n";
$Body .= "Message: ";
$Body .= $message;

require 'php/class.phpmailer.php';


try {
	$mail = new PHPMailer(true); //New instance, with exceptions enabled

	$mail->IsSMTP();                           // tell the class to use SMTP
	$mail->SMTPAuth   = true; 
	$mail->Port       = 465;   
    $mail->SMTPSecure = 'ssl';
	$mail->SMTPOptions = array(
                'ssl' => array(
                'verify_peer' => false,
                'verify_peer_name' => false,
                'allow_self_signed' => true)
               );
	$mail->Host       = ""; // SMTP server
	$mail->Username   = "";     // SMTP server username
	$mail->Password   = "";            // SMTP server password


	$mail->AddReplyTo($emailn,$name);

	$mail->From       = $emailn;
	$mail->FromName   = $name;

	$to = "";  // Email Address where you want to receive email

	$mail->AddAddress($to);

	$mail->Subject  = "Mail Inquiry";

	$mail->Body = $Body;


	$mail->Send();
	echo 'Message  sent.';
	
} catch (phpmailerException $e) {
	echo $e->errorMessage();
}

?>
