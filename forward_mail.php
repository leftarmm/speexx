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

    $mail->Subject = $_POST['email_subject']; 

    //attachment file path
    //$file = "https://www.lanna.co.th/speexx/img/serif2019/Serif 2019 for LannaCom.pdf";

    $file_to_attach = 'D:\web\inetpub\wwwroot\speexx\img\serif2019\Serif 2019 for LannaCom.pdf';

    $header = '<html><head><style>body{font-family: Arial, Helvetica, sans-serif;font-size: 20px;}'.
            '</style></head><body>';

    $body = '<p>ขอเรียนเชิญผู้สนใจเข้าร่วมสัมมนาออนไลน์ Serif Meeting Online 2019 by Lannacom</p>'.
            '<p>ในวันที่ 4 กันยายน 2562 เวลา 10.00 – 12.00 น.</p>'. 
            '<p>สามารถลงทะเบียนเข้าร่วมสัมมนาได้ทาง Link : <a href="http://bit.ly/Register_Meeting_Serif_by_Lannacom">Register Meeting Serif by Lannacom</a></p><br/><br/>'.

            '<p>ทางเลือกใหม่ของซอฟต์แวร์ดีไซน์ โปรแกรมที่จะมาแทน Photoshop , Illustrator และ InDesign</p>'.
            '<p>ด้วยโปรแกรม Affinity ซึ่งมีความสามารถในการออกแบบได้หลากหลายสื่อสิ่งพิมพ์ ประกอบด้วย Affinity Photo, Affinity Designer และ Affinity Publisher</p><br/><br/>'.

            '<p>หลังจากลงทะเบียนเรียบร้อยแล้ว ทางบริษัทฯจะดำเนินการส่ง Link สำหรับเข้าร่วมฟังการบรรยายผ่านทางอีเมลล์ที่ท่านได้ทำการลงทะเบียนไว้ใน Link ข้างต้น</p>'.
            '<p>ทั้งนี้ทางบริษัทฯ ได้แนบเอกสารเกี่ยวกับผลิตภัณฑ์และโปรโมชั่นของ Affinity มาในเมลล์ฉบับนี้ด้วยค่ะ</p><br/>'.
            '<p>ติดต่อสอบถามข้อมูลเพิ่มเติม</p>'.
            '<p>Siriluck Talpa (ก้อย)</p>'.
            '<p>Solutions Manager</p>'.
            '<p>Lannacom Company Limited</p>'.
            '<p>Tel: (+66)-85-694-9944 | Email: siriluckt@lanna.co.th</p><br/>'.
            '<img src="https://www.lanna.co.th/speexx/img/serif2019/000.jpg"><br/><br/>'.
            '<img src="https://www.lanna.co.th/speexx/img/serif2019/001.jpg"><br/><br/>'.
            '<img src="https://www.lanna.co.th/speexx/img/serif2019/002.jpg"><br/><br/>'.
            '<img src="https://www.lanna.co.th/speexx/img/serif2019/003.jpg"><br/><br/>';


	$footer = '';

	$footer = $footer.'</body></html>';

	$mail->Body = $header.$body.$footer;

    $mail->AddAttachment( $file_to_attach , 'Serif 2019 for LannaCom.pdf' );

    $mail->send();
    echo 'Message has been sent';
} catch (Exception $e) {
    echo 'Message could not be sent. Mailer Error: ', $mail->ErrorInfo;
}
?>