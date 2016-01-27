<?php
session_start();
/**
*	Functional e-mail forms using PHPMailer Class
*	Below settings are for usage with GMAIL SMTP servers. If you prefer other services, please use Google to search for appropriate settings.
*	
*	@see 	https://github.com/PHPMailer/PHPMailer
*/

if( !isset($_POST) ) {
	
	echo 'Direct access is forbidden';

} else {
		
	require_once "php-classes/PHPMailerAutoload.php";



	// posted to this page from our html contact form
	$email 		= $_POST['cfemail'];

	$subject 	= "Subscription Emails";
	$message 	= "Hello sir , I want to subscribe for your product`s Info and updates" ;

	$mail = new PHPMailer;

	//$mail->SMTPDebug = 3;                               	// Enable verbose debug output

	$mail->isSMTP();                                      	// Set mailer to use SMTP
	$mail->Host = 'secure.emailsrvr.com';  						// Specify main and backup SMTP servers (Ex: )
	$mail->SMTPAuth = true;                               	// Enable SMTP authentication
	$mail->Username = 'support@lazylad.com';            // SMTP username (Gmail username)
	$mail->Password = 'android*15';                    // SMTP password (Gmail password)
	$mail->SMTPSecure = 'ssl';                            	// Enable TLS encryption, `ssl` also accepted
	$mail->Port = 465;                                    	// TCP port to connect to

	$mail->From = $email;
	$mail->FromName = 'LazyLad';
	$mail->addAddress('paresh@lazylad.com');     		// Add a recipient -> You can add multiple recipients here. This is the e-mail address where you'll be receiving the e-mails
	$mail->isHTML(true);                                  		// Set email format to HTML

	$mail->Subject = $subject;
	$mail->Body    = $message;
	$mail->AltBody = $message;

	if(!$mail->send()) {
	       $_SESSION['msg'] = "Please try again . Some Internal Issue";
           $_SESSION['status'] ='false';
       	   header('location:index.php'); // redirect user to Thank you page on successful form submit
       	   exit();
	} else {

    $_SESSION['msg'] = "Thank you for subscribe us!";
    $_SESSION['status'] ='true';
	   header('location:index.php'); // redirect user to Thank you page on successful form submit
	   exit();
	}

} // end else here
