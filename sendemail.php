<?php

if(isset($_POST["fname"])) {
	// Read the form values
	$success = false;
	$fName = isset( $_POST['fname'] ) ? preg_replace( "/[^\s\S\.\-\_\@a-zA-Z0-9]/", "", $_POST['fname'] ) : "";
	$lName = isset( $_POST['lname'] ) ? preg_replace( "/[^\s\S\.\-\_\@a-zA-Z0-9]/", "", $_POST['lname'] ) : "";
	$phone = isset( $_POST['phone'] ) ? preg_replace( "/[^\s\S\.\-\_\@a-zA-Z0-9]/", "", $_POST['phone'] ) : "";
	$senderEmail = isset( $_POST['email'] ) ? preg_replace( "/[^\.\-\_\@a-zA-Z0-9]/", "", $_POST['email'] ) : "";
	$message = isset( $_POST['contact_message'] ) ? preg_replace( "/(From:|To:|BCC:|CC:|Subject:|Content-Type:)/", "", $_POST['contact_message'] ) : "";

	//Headers
	$to = "mccastills@gmail.com"; // 
    $subject = 'Contact Us';
	$headers  = 'From: Website Contact Form' . "\r\n";
	$headers .= "MIME-Version: 1.0\r\n";
	$headers .= "Content-type: text/html; charset=iso-8859-1\r\n";

	//body message
	$message = "Primer nombre: ". $fName . "<br> Apellido: ". $lName . "<br> Email: ". $senderEmail . "<br> teléfono: ". $phone . "<br> mensaje: " . $message . "";

	//Email Send Function
    $send_email = mail($to, $subject, $message, $headers);

    echo ($send_email) ? '<div class="success alert alert-success">Email ha sido enviado exitósamente .</div>' : '<div class="failed alert alert-danger">Error: Email not Sent.</div>';
} else {
	echo '<div class="failed alert alert-danger">Failed sending your email.</div>';
}
