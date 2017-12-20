
<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

			//Load composer's autoloader
require 'src/vendor/autoload.php';

include 'dbconnection.php';
include 'sql.php';
$sql = new sql();


if (isset($_POST['resetPassword'])) {





   



   // first we ccheck for the email validatiy 


	$checkEmail = $sql->checkUsername($_POST['ResetEmail']);
    

	// echo "<pre>";
	// print_r($checkEmail);
	// die();


	if ($checkEmail[1] > 0) {




		$sentTo = $checkEmail[2][0]['user_email'];
		$newPassword = generatePassword(8);


		$updatePassword = $sql->updatePassword($newPassword, $_POST['ResetEmail']);






		if ($updatePassword[0] == true) {






// Import PHPMailer classes into the global namespace
// These must be at the top of your script, not inside a function


			$mail = new PHPMailer(true);                              // Passing `true` enables exceptions
			try {
			    //Server settings
				$mail->SMTPDebug = 2;                                 // Enable verbose debug output
				$mail->isSMTP();                                      // Set mailer to use SMTP
				$mail->Host = 'smtp.gmail.com';  // Specify main and backup SMTP servers
				$mail->SMTPAuth = true;                               // Enable SMTP authentication
				$mail->Username = 'alihewaigh@gmail.com';                 // SMTP username
				$mail->Password = '!96freeLibya';                           // SMTP password
				$mail->SMTPSecure = 'tls'; 
			    //$mail->SMTPSecure = 'ssl';                           // Enable TLS encryption, `ssl` also accepted
				$mail->Port = 25;                                    // TCP port to connect to

			    //Recipients
				$mail->setFrom('alihewaigh@gmail.com', 'ISitter');
				$mail->addAddress($sentTo, $_POST['ResetEmail']);     // Add a recipient
			   // $mail->addAddress('ellen@example.com');               // Name is optional
			   // $mail->addReplyTo('info@example.com', 'Information');
			  //  $mail->addCC('cc@example.com');
			 //   $mail->addBCC('bcc@example.com');

			    //Attachments
			   // $mail->addAttachment('/var/tmp/file.tar.gz');         // Add attachments
			   // $mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name

			    //Content
				$mail->isHTML(true);                                  // Set email format to HTML
				$mail->Subject = 'Reset Password from ISitter';
				$mail->Body = 'Your new passeord is ' . $newPassword;

			    //$mail->AltBody = 'This is the body in plain text for non-HTML mail clients';


				$mail->send();
			    //echo 'Message has been sent';
				header("Location:login.php?sent=sent");




			} catch (Exception $e) {
				echo 'Message could not be sent.';
				echo 'Mailer Error: ' . $mail->ErrorInfo;
				header("Location:forgetPassword.php?notsent=notsent");
			}

		} else {



			header("Location:forgetPassword.php?invalidUsername=invalidUsername");




		}




	} else {



		header("Location:forgetPassword.php?invalidUsername=invalidUsername");




	}


   // second we generate random password




   // third we send an email	



}







function generatePassword($length)
{
	$chars = 'abcdefghijklmnopqrstuvwxyz0123456789';
	$count = mb_strlen($chars);

	for ($i = 0, $result = ''; $i < $length; $i++) {
		$index = rand(0, $count - 1);
		$result .= mb_substr($chars, $index, 1);
	}

	return $result;
}