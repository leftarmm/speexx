<?php
/* Project: Lanna/SPEEXX Report */
/* Author: Jiramet Kaewsiri (jirametk@lanna.co.th) */

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'src/Exception.php';
require 'src/PHPMailer.php';
require 'src/SMTP.php';

//Load Composer's autoloader
//require 'vendor/autoload.php';

$mail = new PHPMailer(true);                              // Passing `true` enables exceptions
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
    $mail->Host = 'smtp.office365.com';                   // Specify main and backup SMTP servers
    $mail->SMTPAuth = true;                               // Enable SMTP authentication
    $mail->Username = $_POST['admin_email'];               // SMTP username
    $mail->Password = $_POST['admin_password'];                  // SMTP password
    $mail->SMTPSecure = 'tls';                            // Enable TLS encryption, `ssl` also accepted
    $mail->Port = 587;                                    // TCP port to connect to

    //Recipients
    $mail->setFrom($_POST['admin_email'], '');
    $mail->addAddress($_POST['email'], $_POST['name']);     // Add a recipient
    //$mail->addAddress('ellen@example.com');               // Name is optional
    //$mail->addReplyTo('info@example.com', 'Information');
    //$mail->addCC('cc@example.com');
    //$mail->addBCC('bcc@example.com');

    //Attachments
    // $mail->addAttachment('/var/tmp/file.tar.gz');         // Add attachments
    // $mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name

    //Content
    $mail->isHTML(true);                                  // Set email format to HTML

    $mail->Subject = 'DynEd : (No-reply) Username สำหรับเข้าสู่ระบบ '.$_POST['name']; 

    $header = '<html><head><link href="https://fonts.googleapis.com/css?family=Bai+Jamjuree&display=swap" rel="stylesheet"><style>'.
            "body{font-family: 'Bai Jamjuree', sans-serif;}".
            '</style></head><body>';

    $body = '<p>ถึง คุณ '.$_POST['name'].'</p>'.
            '<p>ขอบคุณสำหรับการเริ่มหลักสูตรกับ DynEd ตอนนี้คุณได้เข้าสู่การฝึกภาษาออนไลน์ที่จะช่วยพัฒนาทักษะการสื่อสารของคุณ</p>'.
            '<p>&nbsp;</p>'.
            '<p>เริ่มต้น ไปที่หน้าเข้าสู่ระบบ และกรอกชื่อบัญชีผู้ใช้และรหัสผ่าน</p>'.
            '<p>ชื่อบัญชีผู้ใช้ของคุณคือ: '.$_POST['email'].'</p>'.
            '<p>รหัสผ่าน: รับรหัสผ่าน ณ สถานที่และวันเวลาที่ลงทะเบียนเข้าร่วมฟังคำแนะนำการใช้งานและทดสอบวัดระดับมาตรฐาน CEFR</p>'.
            '<p>&nbsp;</p>'.
            '<p>เริ่มต้นอย่างไร?</p>'.
            '<p>- ศึกษาวิธีการใช้งาน DynEd : <a href="http://www.ba.cmu.ac.th/th/dyned">http://www.ba.cmu.ac.th/th/dyned</a></p>';

	$footer = '<p>ด้วยความเคารพอย่างสูง</p>'; 

	$footer = $footer.'</body></html>';

	$mail->Body = $header.$body.$footer;

    $mail->send();
    echo 'Message has been sent';
} catch (Exception $e) {
    echo 'Message could not be sent. Mailer Error: ', $mail->ErrorInfo;
}
?>