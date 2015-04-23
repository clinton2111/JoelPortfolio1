<?php
if (isset($_POST['sendername'], $_POST['emailid'], $_POST['message'], $_POST['subject'])) {

	$sendername = $_POST['sendername'];
	$email_id = $_POST['emailid'];
	$message = $_POST['message'];
	$subject = $_POST['subject'];
	$email = "goa.joel@gmail.com";
	$from = $sendername . "<" . $email_id . ">";
	$headers = "From:" . $from;
	if ((mail($email, $subject, $message, $headers))) {
		echo 'Email Sent';
	}
}
?>