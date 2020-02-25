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
    $mail->addCC($_POST['cc']);
    if($_POST['cc2'] != 0){
        $mail->addCC($_POST['cc2']);
    }
    //$mail->addBCC('bcc@example.com');

    //Attachments
    // $mail->addAttachment('/var/tmp/file.tar.gz');         // Add attachments
    // $mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name

    //Content
    $mail->isHTML(true);                                  // Set email format to HTML

    $mail->Subject = $_POST['email_subject']; 

    $header = '<html><head><link href="https://fonts.googleapis.com/css?family=Bai+Jamjuree&display=swap" rel="stylesheet"><style>'.
            "body{font-family: 'Bai Jamjuree', sans-serif;font-size: 18px;}".
            '</style></head><body>';

    $body = '<p>ขอเรียนเชิญผู้สนใจเข้าร่วม Lannacom Webinar ในหัวข้อ “ทำความรู้จักอุปกรณ์การสร้าง Digital Content for Learning อย่างมืออาชีพและเรียนรู้วิธีการสร้างบทเรียนดิจิทัลด้วยตนเองด้วยเครื่องมือ PowerPoint Recording (Office Mix)”</p>'.
            '<p>ในวันที่ 14 พฤศจิกายน 2562 เวลา 13.30 – 15.30 น.</p>'. 
            '<p>สามารถลงทะเบียนเข้าร่วมสัมมนาได้ทาง Link : <a href="http://bit.ly/Regiser_DigitalContent_PPTRecording">http://bit.ly/Regiser_DigitalContent_PPTRecording</a></p><br/>'.

            '<p>Agenda:</p>'.
            '<p>• ทำความรู้จักกับอุปกรณ์ที่เกี่ยวกับการสร้างสื่อการเรียนการสอนด้วยตนเอง (Digital Self Content Creation) อย่างมืออาชีพ</p>'.
            '<p>• เรียนรู้การสร้าง Digital content บทเรียนในการเรียนการสอนด้วยตัวเองอย่างง่าย โดยใช้ PowerPoint Recording (Office Mix)</p>'.
            '<p>• ถาม-ตอบ ข้อสงสัย Q&A</p>'.

            '<p>โดยวิทยากรผู้เชี่ยวชาญที่มีประสบการณ์ มาแชร์และสอนวิธีการทำข้อมูลดังกล่าว</p>'. 
            '<p>หลังจากลงทะเบียนเรียบร้อยแล้ว ทางบริษัทฯจะดำเนินการส่ง Link สำหรับเข้าร่วมสัมมนาออนไลน์ ผ่านทางอีเมลล์ที่ท่านได้ทำการลงทะเบียนไว้ใน Link ข้างต้น ภายในวันที่ 13 พฤศจิกายน 2562</p><br/>'.
            '<p>ติดต่อสอบถามข้อมูลเพิ่มเติม</p>'.
            '<p>Siriluck Talpa (ก้อย)</p>'.
            '<p>Solutions Manager</p>'.
            '<p>Lannacom Company Limited</p>'.
            '<p>Tel: (+66)-85-694-9944 | Email: siriluckt@lanna.co.th</p><br/>';


	$footer = '';

	$footer = $footer.'</body></html>';

	$mail->Body = $header.$body.$footer;

    //$mail->AddAttachment( $file_to_attach , 'Serif 2019 for LannaCom.pdf' );

    $mail->send();
    echo 'Message has been sent';
} catch (Exception $e) {
    echo 'Message could not be sent. Mailer Error: ', $mail->ErrorInfo;
}
?>