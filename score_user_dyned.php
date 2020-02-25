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
    //Server settingsS
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
    $mail->addAddress($_POST['EMAIL'], $_POST['STUDENT_NAME']);     // Add a recipient
    //$mail->addAddress('ellen@example.com');               // Name is optional
    //$mail->addReplyTo('info@example.com', 'Information');
    //$mail->addCC('cc@example.com');
    //$mail->addBCC('bcc@example.com');

    //Attachments
    // $mail->addAttachment('/var/tmp/file.tar.gz');         // Add attachments
    // $mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name

    //Contents
    $mail->isHTML(true);                                  // Set email format to HTMLss

    $mail->Subject = 'แจ้งผลการเรียนภาษาอังกฤษ รายสัปดาห์ ข้อมูล ณ วันที่  '.$_POST["TODAY_DATE"]; 

    $header = '<html><head><link href="https://fonts.googleapis.com/css?family=Bai+Jamjuree&display=swap" rel="stylesheet"><style>'.
            "body{font-family: 'Bai Jamjuree', sans-serif;}".
            '</style></head><body>';


    $body = '<p>เรียนนักศึกษารหัส '.$_POST["STD_ID"].', '.$_POST["STUDENT_NAME"].'</p>'.
        '<p>&nbsp;</p>'.
        '<p>&#8227; ระดับผลการสอบ CEFR ของท่านคือ '.$_POST["CURRENTE_LEVEL"].'</p>'.  
        '<p>&#8227; ผลสอบเป้าหมายของท่านคือ '.$_POST["CEFR_GOAL"].'</p>'.
        '<p>&#8227; คะแนนการเรียนของท่านในสัปดาห์นี้คือ '.$_POST["WSS"].'</p>'.
        '<p>&#8227; เวลาในการเรียนทั้งหมด '.$_POST["HOUR"].' ชั่วโมง</p>'.
        '<p>&nbsp;</p>'.
        '<p>ข้อแนะนำในการเรียนภาษาอังกฤษ DynEd ให้มีประสิทธิภาพยิ่งขึ้น</p>'.
        '<p>1. ควรใช้เวลาเรียนอย่างน้อย 30 นาทีต่อครั้ง สูงสุดไม่เกินหนึ่งชั่วโมง</p>'.
        '<p>2. ควรเลือกเรียนบทเรียนให้หลากหลาย ไม่ควรเรียนบทใดบทหนึ่งซ้ำมากจนเกินไป แบ่งเนื้อหาการเรียนให้เท่าๆ กัน</p>'.
        '<p>3. ใช้ปุ่มฟังซ้ำเพื่อเพิ่มพูนทักษะการฟัง และฝึกพูดตามหลังจากฟังซ้ำ 1-2 ครั้ง</p>'.
        '<img src="http://www.lanna.co.th/img/pscore.jpg">'.
        '<p>หากพบปัญหาในการใช้งาน หรือต้องการสอบถามข้อมูลเพิ่มเติม</p>'.
        '<p>สามารถแจ้งได้ที่กลุ่มเพจ Facebook: CMU BA DynEd (<a href="https://www.facebook.com/groups/957770217897859/">https://www.facebook.com/groups/957770217897859/</a>)</p>'.
        '<p>&nbsp;</p>'.
        '<p>Best Regards</p>';


	$footer = '<p>ขอบคุณค่ะ</p>'; 

	$footer = $footer.'</body></html>';

	$mail->Body = $header.$body.$footer;
   //echo $mail->Body;
    //$mail->send();
    echo 'Message has been sent';
} catch (Exception $e) {
    echo 'Message could not be sent. Mailer Error: ', $mail->ErrorInfo;
}
?>