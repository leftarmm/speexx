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
    $mail->Host = 'smtp.office365.com';  				  // Specify main and backup SMTP servers
    $mail->SMTPAuth = true;                               // Enable SMTP authentication
    $mail->Username = 'speexx@lanna.co.th';               // SMTP username
    $mail->Password = 'LannaCom@1';                       // SMTP password
    $mail->SMTPSecure = 'tls';                            // Enable TLS encryption, `ssl` also accepted
    $mail->Port = 587;                                    // TCP port to connect to

    //Recipients
    $mail->setFrom('speexx@lanna.co.th', 'SPEEXX Lannacom');
    $mail->addAddress($_POST['email'], $_POST['fname']." ".$_POST['lname']);     // Add a recipient
    //$mail->addAddress('ellen@example.com');               // Name is optional
    //$mail->addReplyTo('info@example.com', 'Information');
    //$mail->addCC('cc@example.com');
    //$mail->addBCC('bcc@example.com');

    //Attachments
    // $mail->addAttachment('/var/tmp/file.tar.gz');         // Add attachments
    // $mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name

    //Content
    $mail->isHTML(true);                                  // Set email format to HTML

    $mail->Subject = '(No-reply) Weekly score : '.$_POST['fname']." ".$_POST['lname']; 

    $header = '<html><head><style>'.
            'table { font-family: "Trebuchet MS", Arial, Helvetica, sans-serif; border-collapse: collapse; width: 100%; text-align: center; }'.
            'table td, table th { border: 1px solid #ddd; padding: 8px; }'.
            'table th { padding-top: 12px; padding-bottom: 12px; background-color: #FFA500; color: #000; }'.
            '</style></head><body>';

    $body = 'ถึง คุณ '.$_POST['fname']." ".$_POST['lname'].'<br/>'.
    		'ขอบคุณสำหรับการใช้งาน <b>SPEEX<font color="#FFA500">X</font></b> online<br/><br/>'.
    		'สถิติการใช้งานประจำสัปดาห์ของคุณคือ<br/><br/><br/>';

    $table = '<table width="100%"><thead><tr><th>Level</th><th>คะแนนรวม</th><th>คะแนนที่ได้ในสัปดาห์นี้</th><th>เวลาสะสม</th><th>เวลาที่ทำได้ในสัปดาห์นี้</th><th>คะแนนเฉลี่ยในรุ่น/แผน/หลักสูตร</th><th>ลำดับคะแนนของท่านเมื่อเทียบกับรุ่น/แผน/หลักสูตร</th></tr></thead><tbody>';

	$table = $table.'<tr><td><b>English A1</b></td><td>'.$_POST["a1_score"].'</td><td>'.($_POST["a1_score"] == 100 ? ($_POST["a1_update_score"] > 0 ? "<font color='green'>+{$_POST["a1_update_score"]}" : $_POST["a1_update_score"]) : ($_POST["a1_update_score"] > 0 ? "<font color='green'>+{$_POST["a1_update_score"]}</font>" : "<font color='red'>0</font>" )).'</td><td>'.$_POST["a1_time"].'</td><td>'.($_POST['a1_score'] == 100 ? ($_POST["a1_update_time"] != "0:00:00" ? "<font color='green'>+{$_POST["a1_update_time"]}</font>" : $_POST["a1_update_time"]) : ($_POST["a1_update_time"] != "0:00:00" ? "<font color='green'>+{$_POST["a1_update_time"]}</font>" : "<font color='red'>0:00:00</font>" )).'</td><td>'.$_POST["a1_average_score"].'%</td><td>'.$_POST["a1_rank"].'</td></tr>';

	$table = $table.'<tr><td><b>English A2</b></td><td>'.$_POST["a2_score"].'</td><td>'.($_POST["a2_score"] == 100 ? ($_POST["a2_update_score"] > 0 ? "<font color='green'>+{$_POST["a2_update_score"]}" : $_POST["a2_update_score"]) : ($_POST["a2_update_score"] > 0 ? "<font color='green'>+{$_POST["a2_update_score"]}</font>" : "<font color='red'>0</font>" )).'</td><td>'.$_POST["a2_time"].'</td><td>'.($_POST['a2_score'] == 100 ? ($_POST["a2_update_time"] != "0:00:00" ? "<font color='green'>+{$_POST["a2_update_time"]}</font>" : $_POST["a2_update_time"]) : ($_POST["a2_update_time"] != "0:00:00" ? "<font color='green'>+{$_POST["a2_update_time"]}</font>" : "<font color='red'>0:00:00</font>" )).'</td><td>'.$_POST["a2_average_score"].'%</td><td>'.$_POST["a2_rank"].'</td></tr>';

	$table = $table.'<tr><td><b>English B1.1</b></td><td>'.$_POST["b11_score"].'</td><td>'.($_POST["b11_score"] == 100 ? ($_POST["b11_update_score"] > 0 ? "<font color='green'>+{$_POST["b11_update_score"]}" : $_POST["b11_update_score"]) : ($_POST["b11_update_score"] > 0 ? "<font color='green'>+{$_POST["b11_update_score"]}</font>" : "<font color='red'>0</font>" )).'</td><td>'.$_POST["b11_time"].'</td><td>'.($_POST['b11_score'] == 100 ? ($_POST["b11_update_time"] != "0:00:00" ? "<font color='green'>+{$_POST["b11_update_time"]}</font>" : $_POST["b11_update_time"]) : ($_POST["b11_update_time"] != "0:00:00" ? "<font color='green'>+{$_POST["b11_update_time"]}</font>" : "<font color='red'>0:00:00</font>" )).'</td><td>'.$_POST["b11_average_score"].'%</td><td>'.$_POST["b11_rank"].'</td></tr>';

	$table = $table.'<tr><td><b>English B1.2</b></td><td>'.$_POST["b12_score"].'</td><td>'.($_POST["b12_score"] == 100 ? ($_POST["b12_update_score"] > 0 ? "<font color='green'>+{$_POST["b12_update_score"]}" : $_POST["b12_update_score"]) : ($_POST["b12_update_score"] > 0 ? "<font color='green'>+{$_POST["b12_update_score"]}</font>" : "<font color='red'>0</font>" )).'</td><td>'.$_POST["b12_time"].'</td><td>'.($_POST['b12_score'] == 100 ? ($_POST["b12_update_time"] != "0:00:00" ? "<font color='green'>+{$_POST["b12_update_time"]}</font>" : $_POST["b12_update_time"]) : ($_POST["b12_update_time"] != "0:00:00" ? "<font color='green'>+{$_POST["b12_update_time"]}</font>" : "<font color='red'>0:00:00</font>" )).'</td><td>'.$_POST["b12_average_score"].'%</td><td>'.$_POST["b12_rank"].'</td></tr>';

	$table = $table.'<tr><td><b>English B2.1</b></td><td>'.$_POST["b21_score"].'</td><td>'.($_POST["b21_score"] == 100 ? ($_POST["b21_update_score"] > 0 ? "<font color='green'>+{$_POST["b21_update_score"]}" : $_POST["b21_update_score"]) : ($_POST["b21_update_score"] > 0 ? "<font color='green'>+{$_POST["b21_update_score"]}</font>" : "<font color='red'>0</font>" )).'</td><td>'.$_POST["b21_time"].'</td><td>'.($_POST['b21_score'] == 100 ? ($_POST["b21_update_time"] != "0:00:00" ? "<font color='green'>+{$_POST["b21_update_time"]}</font>" : $_POST["b21_update_time"]) : ($_POST["b21_update_time"] != "0:00:00" ? "<font color='green'>+{$_POST["b21_update_time"]}</font>" : "<font color='red'>0:00:00</font>" )).'</td><td>'.$_POST["b21_average_score"].'%</td><td>'.$_POST["b21_rank"].'</td></tr>';

	$table = $table.'<tr><td><b>English B2.2</b></td><td>'.$_POST["b22_score"].'</td><td>'.($_POST["b22_score"] == 100 ? ($_POST["b22_update_score"] > 0 ? "<font color='green'>+{$_POST["b22_update_score"]}" : $_POST["b22_update_score"]) : ($_POST["b22_update_score"] > 0 ? "<font color='green'>+{$_POST["b22_update_score"]}</font>" : "<font color='red'>0</font>" )).'</td><td>'.$_POST["b22_time"].'</td><td>'.($_POST['b22_score'] == 100 ? ($_POST["b22_update_time"] != "0:00:00" ? "<font color='green'>+{$_POST["b22_update_time"]}</font>" : $_POST["b22_update_time"]) : ($_POST["b22_update_time"] != "0:00:00" ? "<font color='green'>+{$_POST["b22_update_time"]}</font>" : "<font color='red'>0:00:00</font>" )).'</td><td>'.$_POST["b22_average_score"].'%</td><td>'.$_POST["b22_rank"].'</td></tr>';

	$table = $table.'<tr><td><b>English C1.1</b></td><td>'.$_POST["c11_score"].'</td><td>'.($_POST["c11_score"] == 100 ? ($_POST["c11_update_score"] > 0 ? "<font color='green'>+{$_POST["c11_update_score"]}" : $_POST["c11_update_score"]) : ($_POST["c11_update_score"] > 0 ? "<font color='green'>+{$_POST["c11_update_score"]}</font>" : "<font color='red'>0</font>" )).'</td><td>'.$_POST["c11_time"].'</td><td>'.($_POST['c11_score'] == 100 ? ($_POST["c11_update_time"] != "0:00:00" ? "<font color='green'>+{$_POST["c11_update_time"]}</font>" : $_POST["c11_update_time"]) : ($_POST["c11_update_time"] != "0:00:00" ? "<font color='green'>+{$_POST["c11_update_time"]}</font>" : "<font color='red'>0:00:00</font>" )).'</td><td>'.$_POST["c11_average_score"].'%</td><td>'.$_POST["c11_rank"].'</td></tr>';

	$table = $table.'<tr><td><b>English C1.2</b></td><td>'.$_POST["c12_score"].'</td><td>'.($_POST["c12_score"] == 100 ? ($_POST["c12_update_score"] > 0 ? "<font color='green'>+{$_POST["c12_update_score"]}" : $_POST["c12_update_score"]) : ($_POST["c12_update_score"] > 0 ? "<font color='green'>+{$_POST["c12_update_score"]}</font>" : "<font color='red'>0</font>" )).'</td><td>'.$_POST["c12_time"].'</td><td>'.($_POST['c12_score'] == 100 ? ($_POST["c12_update_time"] != "0:00:00" ? "<font color='green'>+{$_POST["c12_update_time"]}</font>" : $_POST["c12_update_time"]) : ($_POST["c12_update_time"] != "0:00:00" ? "<font color='green'>+{$_POST["c12_update_time"]}</font>" : "<font color='red'>0:00:00</font>" )).'</td><td>'.$_POST["c12_average_score"].'%</td><td>'.$_POST["c12_rank"].'</td></tr>';

	$table = $table.'</tbody></table><br/><br/><br/>';

	$footer = 'หากคุณมีคำถามใดๆ สามารถติดต่อเราได้ผ่านช่องทางดังนี้<br/>'.
			'<b>Email</b> : support@speexx.co.th<br/>'.
			'<b>Tel</b> : 02-581-1222-5, 081-350-8044<br/>'.
			'<b>Facebook</b> : Speexx@cmu<br/>'.
			'<b>Line ID</b>: speexxsupport<br/>'; 

	$footer = $footer.'</body></html>';

	$mail->Body = $header.$body.$table.$footer;

    $mail->send();
    echo 'Message has been sent';
} catch (Exception $e) {
    echo 'Message could not be sent. Mailer Error: ', $mail->ErrorInfo;
}
?>