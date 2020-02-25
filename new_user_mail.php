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

    $mail->Subject = '(No-reply) : '.$_POST['university'].' SPEEXX Account'; 

    $header = '<html><head><style>'.
            '</style></head><body>';

    $body = '<p>ถึง ผู้เรียน</p>'.
            '<p>ขอบคุณสำหรับการเริ่มหลักสูตรกับ Speexx! ตอนนี้คุณได้เข้าสู่การฝึกภาษาออนไลน์ที่จะช่วยพัฒนาทักษะการสื่อสารของคุณ</p>'.
            '<p lang="en-US">&nbsp;</p>'.
            '<p>เริ่มต้น ไปที่หน้าเข้าสู่ระบบ และกรอกชื่อบัญชีผู้ใช้และรหัสผ่าน </p>'.
            '<p><a href="https://portal.speexx.com/"><span lang="th">https://portal.speexx.com/</span></a></p>'.
            '<p>คุณ: '.$_POST['name'].'</p>'.
            '<p>ชื่อบัญชีผู้ใช้: '.$_POST['email'].'</p>'.
            '<p>รหัสผ่าน: '.$_POST['pw'].'</p>'.
            '<p lang="en-US">&nbsp;</p>'.
            '<p>เริ่มต้นอย่างไร? </p>'.
            '<p>- ศึกษาวิธีการใช้งาน Speexx <a href="http://speexx.co.th/up">http://speexx.co.th/up</a></p>'.
            '<p>- ดู <a href="https://portal.speexx.com/static/guidedtour/en/">วิดีโอทัวร์</a>ของหลักสูตรภาษาของคุณ</p>'.
            '<p lang="en-US">ในช่วงระหว่างหลักสูตร </p>'.
            '<p lang="en-US">- ทำบทเรียนต่างๆ ในแบบฝึกหัดของฉัน เพื่อพัฒนาทักษะภาษาด้านต่างๆ ของคุณอย่างเป็นระบบ ใช้แหล่งข้อมูลเพิ่มเติมเพื่อฝึกความเข้าใจภาษาให้ลึกยิ่งขึ้น</p>'.
            '<p lang="en-US">&nbsp;</p>';

	$footer = '<p lang="en-US">หากคุณมีคำถามใดๆ สามารถติดต่อเราได้ผ่านช่องทางดังนี้ </p>'.
            '<p lang="en-US">Email : support@speexx.co.th</p>'.
            '<p lang="en-US">Tel : 02-581-1222-5, 081-350-8044 </p>'.
            '<p lang="en-US">Facebook : support@UP </p>'.
            '<p lang="en-US">Line ID: speexxsupport </p>'.
            '<p lang="en-US">UP Community : Speexx@UP </p>'.
            '<p lang="en-US">&nbsp;</p>'.
            '<p lang="en-US">ด้วยความเคารพอย่างสูง </p>'.
            '<p lang="en-US">ทีม Speexx ประเทศไทย</p><br>'.
            '<p></p>'; 

	$footer = $footer.'</body></html>';

	$mail->Body = $header.$body.$footer;

    $mail->send();
    echo 'Message has been sent';
} catch (Exception $e) {
    echo 'Message could not be sent. Mailer Error: ', $mail->ErrorInfo;
}
?>