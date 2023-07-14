<?php
// Message Vars
$msg = '';
$msgClass = '';

$postdata = file_get_contents("php://input");
$request = $_POST['data']; 
$request = $request;  
// Check For Submit
if ($postdata) {
	// Get Form Data 
	$name = htmlspecialchars($request[0]['value']);
	$email = htmlspecialchars($request[1]['value']);
	$dob = htmlspecialchars($request[2]['value']); 
	 
	// $message = htmlspecialchars($_POST['message']);
	// print_r($request->data);
	// Check Required Fields
	if ( !empty($name) &&    !empty($email) &&    !empty($dob)) {
		// Passed
		// Check Email
// 		if (filter_var($email, FILTER_VALIDATE_EMAIL) === false) {
// 			// Failed
// 			$msg = 'Please use a valid email';
// 			$msgClass = 500;
// 		} else {
			// Passed
			$toEmail = 'tribe@joharitea.com';
			$subject = 'New Tribesman';
			$body = '<h3>Name;</h3>
				 <p>' . $name . '</p>
				 <h3>Email;</h3>
                    <p>' . $email . '</p>
                     <h3>Date Of Birth;</h3>
					<p> '. $dob. ' </p>';

			// Email Headers
			$headers = "MIME-Version: 1.0" . "\r\n";
			$headers .= "Content-Type:text/html;charset=UTF-8" . "\r\n";

			// Additional Headers
			$headers .= "From: tribe@joharitea.com\r\n";
			// echo mail($toEmail, $subject, $body, $headers);
			if (mail($toEmail, $subject, $body, $headers)) {
				// Email Sent
				$msg = 'Your email has been sent';
				$msgClass = 200;
			} else {
				// Failed
				$msg = 'Your email was not sent';
				$msgClass = 500;
			}
// 		}
	} else {
		// Failed
		$msg = 'Please fill in all fields';
		$msgClass = 500;
	}
	echo json_encode([$msg, $msgClass]);
} else {
	echo (500);
}
