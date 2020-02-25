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
    );                                          // Set mailer to use SMTP
    $mail->Host = 'smtp.office365.com';  				  // Specify main and backup SMTP servers
    $mail->SMTPAuth = true;                               // Enable SMTP authentication
    $mail->Username = 'wikran_d@cmu.ac.th';               // SMTP username
    $mail->Password = 'Lannacom@1';                       // SMTP password
    $mail->SMTPSecure = 'tls';                            // Enable TLS encryption, `ssl` also accepted
    $mail->Port = 587;                                    // TCP port to connect to

    //Recipients
    $mail->setFrom('wikran_d@cmu.ac.th', 'Wikran Detoop');
    $mail->addAddress($_POST['email'], $_POST['fullname']);
    //$mail->addAddress('ellen@example.com');               // Name is optional
    //$mail->addReplyTo('info@example.com', 'Information');
    //$mail->addCC('cc@example.com');
    //$mail->addBCC('bcc@example.com');

    //Attachments
    // $mail->addAttachment('/var/tmp/file.tar.gz');         // Add attachments
    // $mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name

    //Content
    $mail->isHTML(true);                                  // Set email format to HTML

    $mail->Subject = '(No-reply) SPEEXX : Monthly report : '.$_POST['month']."/".$_POST['year']; 
    $header = 'เรียนท่านอาจารย์'.$_POST["fullname"].'<br/><br/><br/>';
    $body = 'ขออนุญาตนำส่งรายงานสรุปผลการใช้งาน <b>SPEEX<font color="#FFA500">X</font></b> ผ่านเครื่องมือสร้างรายงาน (Business Intelligence‎)<br/>';
    $body = $body.'Link สรุปผลรายงานการใช้งาน <b>SPEEX<font color="#FFA500">X</font></b> : <a href="'.$_POST["link"].'">BI report</a><br/><br/>';
    $table = '';
    $footer = 'หากคุณมีคำถามใดๆ สามารถติดต่อเราได้ผ่านช่องทางดังนี้<br/>'.
            '<b>Email</b> : support@speexx.co.th<br/>'.
            '<b>Tel</b> : 02-581-1222-5, 081-350-8044<br/>'.
            '<b>Facebook</b> : Speexx@cmu<br/>'.
            '<b>Line ID</b>: speexxsupport<br/><br/><br/>'.
            '<img src="http://www.lanna.co.th/speexx/img/speexx-logo.png" width="30%">';

	$mail->Body = $header.$body.$table.$footer;

    $mail->send();
    echo 'Message has been sent';
} catch (Exception $e) {
    echo 'Message could not be sent. Mailer Error: ', $mail->ErrorInfo;
}
?>