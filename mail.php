<?php

require '/usr/share/php/libphp-phpmailer/src/PHPMailer.php';

require '/usr/share/php/libphp-phpmailer/src/SMTP.php';

 

//Declare the object of PHPMailer

$email = new PHPMailer\PHPMailer\PHPMailer();

//Set up necessary configuration to send email

$email->IsSMTP();

$email->SMTPAuth = true;

$email->SMTPSecure = 'ssl';

$email->Host = "smtp.gmail.com";

$email->Port = 465;

//Set the gmail address that will be used for sending email

$email->Username = "ashishthomas06@gmail.com";

//Set the valid password for the gmail address

$email->Password = "password";

//Set the sender email address

$email->SetFrom("admin@example.com");

//Set the receiver email address

$email->AddAddress("ahelperbd@gmail.com");

//Set the subject

$email->Subject = "Testing Email";

//Set email content

$email->Body = "Hello! use PHPMailer to send email using PHP";


if(!$email->Send()) {

  echo "Error: " . $email->ErrorInfo;

} else {

  echo "Email has been sent.";

}

?>