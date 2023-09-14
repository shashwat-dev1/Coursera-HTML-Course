<?php
include('smtp/PHPMailerAutoload.php');
echo smtp_mailer('shashwatjain739@gmail.com','New Message');
function smtp_mailer($to,$subject){
	$mail = new PHPMailer(); 
	$mail->IsSMTP(); 
	$mail->SMTPAuth = true; 
	$mail->SMTPSecure = 'ssl'; 
	$mail->Host = "smtp.gmail.com";
	$mail->Port = "465"; 
	$mail->IsHTML(true);
	$mail->CharSet = 'UTF-8';
	$mail->Username = "jshashwat167@gmail.com";
	$mail->Password = 'zfvfvmmtddftcnvw';
	$mail->SetFrom('jshashwat167@gmail.com', 'Msg');
	$mail->Subject = $subject;
	$name = $_POST['name'];
    $email = $_POST['email'];
    $message = $_POST['message'];
    $mail->Body ="Name: {$_POST['name']}\n" .
                 "Email: {$_POST['email']}\n" .
				 "Subject:{$_POST['subject']}\n" .
                 "Message: {$_POST['message']}\n";
	$mail->AddAddress($to);
	$mail->SMTPOptions=array('ssl'=>array(
		'verify_peer'=>false,
		'verify_peer_name'=>false,
		'allow_self_signed'=>false
	));
	if(!$mail->Send()){
		echo $mail->ErrorInfo;
	}else{
		echo 'I will get in touch with you soon !!!';
	}
}
?>