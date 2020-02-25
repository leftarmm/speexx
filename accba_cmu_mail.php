<?php
/* Project: Lanna/SPEEXX Report */
/* Author: Jiramet Kaewsiri (jirametk@lanna.co.th) */
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL); 

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'src/Exception.php';
require 'src/PHPMailer.php';
require 'src/SMTP.php';

//Load Composer's autoloader
//require 'vendor/autoload.php';

$mail = new PHPMailer(true); 
                             // Passing `true` enables exceptions
if(isset($_POST)){
	try {
	    //Server settings
	    $mail->CharSet = "utf-8";
	    $mail->SMTPDebug = 2;                                 // Enable verbose debug output
	    $mail->isSMTP(); 
	    $mail->SMTPOptions = array(
	        'ssl' => array(
	            'verify_peer' => false,
	            'verify_peer_name' => false,
	            'allow_self_signed' => true
	        )
	    );                                         // Set mailer to use SMTP
	    $mail->Host = 'smtp.office365.com';  				  // Specify main and backup SMTP servers
	    $mail->SMTPAuth = true;                               // Enable SMTP authentication
	    $mail->Username = 'speexx@lanna.co.th';               // SMTP username
	    $mail->Password = 'LannaCom@1';                       // SMTP password
	    $mail->SMTPSecure = 'tls';                            // Enable TLS encryption, `ssl` also accepted
	    $mail->Port = 587;                                    // TCP port to connect to

	    //Recipients
	    $mail->setFrom('speexx@lanna.co.th', 'SPEEXX');
	    $mail->addAddress($_POST['Email_Address'], $_POST['Fullname']);     // Add a recipient
	    //$mail->addAddress('ellen@example.com');               // Name is optional
	    //$mail->addReplyTo('info@example.com', 'Information');
	    //$mail->addCC('cc@example.com');
	    //$mail->addBCC('bcc@example.com');

	    //Attachments
	    // $mail->addAttachment('/var/tmp/file.tar.gz');         // Add attachments
	    // $mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name

	    //Content
	    $mail->isHTML(true);                                  // Set email format to HTML

	    $mail->Subject = 'รายงานสรุปการใช้งานรูปแบบ Business intelligent (BI) สำหรับ '.$_POST['Fullname']; 

	    $header = '<html><head><style>'.
	            '</style></head><body>';

	    $body = '<p>เรียนท่าน <b>'.$_POST['Fullname'].'</b></p>'.
				'<p>รายงานสรุปการใช้งานรูปแบบ Business intelligent (BI) โดยท่าน click ที่ link เพื่อเข้าสู่หน้ารายงาน</p>'.
				'<p>link : <a href="'.$_POST['Link'].'">'.$_POST['Link'].'</a></p>'.
				'<p><br></p>';


		$footer = '<p>ด้วยความเคารพอย่างสูง</p>'. 
				'<p><b>Team support</b></p><br>'.
				'<img src="http://www.educathai.com/wp-content/uploads/2018/10/LOGO-300x98.png">';

		$footer = $footer.'</body></html>';

		$mail->Body = $header.$body.$footer;

	    $mail->send();
	    return 'Message has been sent';
	} catch (Exception $e) {
	    return 'Message could not be sent. Mailer Error: '. $mail->ErrorInfo;
	}
}

?>