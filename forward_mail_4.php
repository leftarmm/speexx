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
    $mail->addAddress($_POST['email']);     // Add a recipient
    //$mail->addAddress('ellen@example.com');               // Name is optional
    //$mail->addReplyTo('info@example.com', 'Information');
    $mail->addCC($_POST['cc']);
    if($_POST['cc2'] != 0){
        $mail->addCC($_POST['cc2']);
    }
    //$mail->addBCC('bcc@example.com');

    //Attachments
    //$mail->addAttachment('/var/tmp/file.tar.gz');         // Add attachments
    // $mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name

    //Content
    $mail->isHTML(true);                                  // Set email format to HTML

    $mail->Subject = $_POST['email_subject']; 

    $header = '<html><head><link href="https://fonts.googleapis.com/css?family=Bai+Jamjuree&display=swap" rel="stylesheet"><style>'.
            "body{font-family: 'Bai Jamjuree', sans-serif;font-size: 18px;}".
            '</style></head><body>';

    $body = '<p>ขอเรียนเชิญผู้สนใจเข้าร่วมงาน Serif Meeting Online 2019 by Lannacom</b>'.
            '<p>ในวันที่ 12 ธันวาคม 2562 เวลา 13.30 – 15.30 น.</p>'. 
            '<p>ผู้สนใจเข้าร่วมฟังข้อมูลเกี่ยวกับตัวผลิตภัณฑ์ สามารถลงทะเบียนได้ทาง Link :  <a href="http://bit.ly/Register_Serif">http://bit.ly/Register_Serif</a></p>'.

            '<p>โดยเนื้อหาการบรรยายเกี่ยวกับการออกแบบรูปภาพในระดับมืออาชีพ ด้วยการใช้โปรแกรม Affinity ซึ่งมีความสามารถในการออกแบบได้หลากหลายสื่อสิ่งพิมพ์ ประกอบด้วย Affinity Photo, Affinity Designer และ Affinity Publisher จากวิทยากรผู้เชี่ยวชาญ</p>'. 
            '<p>หลังจากลงทะเบียนเรียบร้อยแล้ว ทางบริษัทฯจะดำเนินการส่ง Link สำหรับเข้าร่วมสัมมนาออนไลน์ ผ่านทางอีเมลล์ที่ท่านได้ทำการลงทะเบียนไว้ใน Link ข้างต้น ภายในวันที่ 11 ธันวาคม 2562 ค่ะ</p>'.
            '<img src="https://www.lanna.co.th/speexx/img/Agenda.jpg"><br/>'.
            '<p>ติดต่อสอบถามข้อมูลเพิ่มเติม</p>'.
            '<p>Thanachart Vivattanaputi (Mike)</p>'.
            '<p>Senior Solution Manager</p>'.
            '<p>Learning Software 21st (Software & Cloud Business)</p>'.
            '<p>Lannacom Company Limited</p>'.
            '<p>Tel: (+66)-81-486-3186 | Email: thanachartv@lanna.co.th</p><br/>';


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