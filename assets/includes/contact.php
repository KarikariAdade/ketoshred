<?php
include 'connect.php';
require '../../../vendor/autoload.php';
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;
$success = false;
if (isset($_POST['contact_button'])) {
	$contact_full_name = htmlspecialchars(mysqli_real_escape_string($conn, $_POST['contact_full_name']));
	$contact_email = htmlspecialchars(mysqli_real_escape_string($conn, $_POST['contact_email']));
	$contact_option = htmlspecialchars(mysqli_real_escape_string($conn, $_POST['contact_option']));
	$contact_message = htmlspecialchars(mysqli_real_escape_string($conn, $_POST['contact_message']));

	if (!empty($contact_full_name) && !empty($contact_email) && !empty($contact_option) && !empty($contact_message)) {
		if (!filter_var($contact_email, FILTER_VALIDATE_EMAIL)) {
			echo "Invalid email address";
		}elseif ($contact_option == "Select Complain") {
			echo "Please select complain type";
		}else{
$mail = new PHPMailer(true);                              // Passing `true` enables exceptions
try {
	$mail->SMTPDebug = SMTP::DEBUG_SERVER;
	$mail->isSMTP();  
	$mail->Host       = 'mail.nakroteck.site';
	$mail->SMTPAuth   = true;    
	$mail->Username   = 'support@ghbrain.com';
	$mail->Password   = 'GodOverMoney0548';
	$mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
	$mail->Port       = 587;
	$mail->SMTPDebug  = 0;

    //Recipients
	$mail->setFrom('support@ghbrain.com', 'Karikari Adade');
	$mail->addAddress('juniorlecrae@gmail.com', 'Karikari');
	$mail->SMTPOptions = array(
		'ssl' => array(
			'verify_peer' => false,
			'verify_peer_name' => false,
			'allow_self_signed' => true
		)
	);
    //Content
    $mail->isHTML(true);                                  // Set email format to HTML
    $mail->Subject = $contact_option;
    $mail->Body    = '<div class="container" align="center" style="width: 100%; transform: translate(50%, 20%);">

    <h2>'.$contact_option.'</h2>
    <div class="content">
    <h5 style="font-size: 20px;">Hello there,</h5>
    <p style="padding: 4px 19%;">
    '.$contact_message.'
    <br><br>
    Best,
    KetoShred Team 
    </p>
    </div>';
    $mail->AltBody = $contact_message;

    $mail->send();
    $success = true;
    echo 'Message has been sent';
} catch (Exception $e) {
	echo 'Message could not be sent. Mailer Error: ', $mail->ErrorInfo;
}		
}
}else{
	echo "Fill all fields before submitting";
}
}
?>
<script type="text/javascript">
	var success = '<?= $success; ?>';
	if (success == true) {
		$('#form-error-section').css('background-color', '#28a745');
	}
</script>