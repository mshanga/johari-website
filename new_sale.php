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
	$name = htmlspecialchars($request[3]['value']);
	$type = htmlspecialchars($request[2]['value']);
	$location = htmlspecialchars($request[4]['value']);
	$phonenumber = htmlspecialchars($request[5]['value']);
	$quantity = htmlspecialchars($request[1]['value']);
	$sku = htmlspecialchars($request[0]['value']);

	// $email = htmlspecialchars('knizedennis1@gmail.com');
	// $message = htmlspecialchars($_POST['message']);
	// print_r($request->data);
	// Check Required Fields
	if (!empty($type) && !empty($name) && !empty($location) && !empty($quantity) && !empty($sku) && !empty($phonenumber)) {
		// Passed
		// Check Email
		// 		if (filter_var($email, FILTER_VALIDATE_EMAIL) === false) {
		// 			// Failed
		// 			$msg = 'Please use a valid email';
		// 			$msgClass = 500;
		// 		} else {
		// Passed
		$toEmail = 'sales@joharitea.com';
		$subject = 'New Sale From Website';
		$body = '<h2>New Sale From;</h2>
				 <p>' . $name . '</p>
                    <p>' . $phonenumber . '</p>
					<h3>Items</h3> 
					<p>' . $type . ' ' . $sku . ' ' . $quantity . ' packs</p>';

		// Email Headers
		$headers = "MIME-Version: 1.0" . "\r\n";
		$headers .= "Content-Type:text/html;charset=UTF-8" . "\r\n";

		// Additional Headers
		$headers .= "From: sales@joharitea.com\r\n";
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
