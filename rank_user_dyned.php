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
    $mail->addAddress($_POST['email'], $_POST['Student_Name']);     // Add a recipient
    //$mail->addAddress('ellen@example.com');               // Name is optional
    //$mail->addReplyTo('info@example.com', 'Information');
    //$mail->addCC('cc@example.com');
    //$mail->addBCC('bcc@example.com');

    //Attachments
    // $mail->addAttachment('/var/tmp/file.tar.gz');         // Add attachments
    // $mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name

    //Contents
    $mail->isHTML(true);                                  // Set email format to HTMLss

    $mail->Subject = 'ผลการสอบ DynEd: Placement Test'; 

    $header = '<html><head><link href="https://fonts.googleapis.com/css?family=Bai+Jamjuree&display=swap" rel="stylesheet"><style>'.
            "body{font-family: 'Bai Jamjuree', sans-serif;}".
            '</style></head><body>';

    $body = '<p>เรียนนักศึกษารหัส '.$_POST['STD_ID'].' '.$_POST['Student_Name'].'</p>'.
            '<p>&nbsp;</p>'.
            '<p>จากการสอบวัดระดับภาษาอังกฤษของท่านในวันที่ '.$_POST['Test_Date'].'</p>'.
            '<p>ท่านได้ผลการสอบ CEFR ในระดับ <font color="green">'.$_POST['Current_Level'].'</font></p>'.
            '<p>เป้าหมายการเรียนของท่าน คือ <font color="green">'.$_POST['CEFR_Goal'].'</font> ซึ่งทางระบบได้เปิดหลักสูตรให้ท่านเรียบร้อยแล้ว </p>'.
            '<p>**กรุณาเข้าเรียนให้ได้สัปดาห์ละ 3-4 วัน อย่างน้อยวันละ 30-45 นาที</p>'.
            '<p>**กดฟัง กดบันทึกเสียง กดฟังเสียงเปรียบเทียบให้สม่ำเสมอ</p>'.
            '<p>&nbsp;</p>'.
            '<p>ทั้งนี้ท่านสามารถดาวน์โหลดตัวโปรแกรมและคู่มือต่างๆ ได้ที่ <a href="http://www.ba.cmu.ac.th/th/dyned/">http://www.ba.cmu.ac.th/th/dyned/</a></p>'.
            '<p>หากมีข้อสงสัยเพิ่มเติมสามารถสอบถามได้ที่กลุ่ม Facebook : CMU BA DynEd</p>'.
            '<p>&nbsp;</p>'.
            '<p>Best Regards</p>';


	$footer = '<p>ด้วยความเคารพอย่างสูง</p>'; 

	$footer = $footer.'</body></html>';

	$mail->Body = $header.$body.$footer;

    $mail->send();
    echo 'Message has been sent';
} catch (Exception $e) {
    echo 'Message could not be sent. Mailer Error: ', $mail->ErrorInfo;
}
?>