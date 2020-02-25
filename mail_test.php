<?php
// phpinfo();
// phpinfo(INFO_MODULES);
// ini_set('display_errors', 1);
// ini_set('display_startup_errors', 1);
// error_reporting(E_ALL);

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'src/Exception.php';
require 'src/PHPMailer.php';
require 'src/SMTP.php';


// $mail = new PHPMailer(true);                              // Passing `true` enables exceptions
// try {
//     //Server settings
//     $mail->CharSet = "utf-8";
//     $mail->SMTPDebug = 2;                                 // Enable verbose debug output
//     $mail->isSMTP();    
//     $mail->SMTPOptions = array(
//         'ssl' => array(
//             'verify_peer' => false,
//             'verify_peer_name' => false,
//             'allow_self_signed' => true
//         )
//     );                                  // Set mailer to use SMTP
//     $mail->Host = 'smtp.office365.com';  				  // Specify main and backup SMTP servers
//     $mail->SMTPAuth = true;                               // Enable SMTP authentication
//     $mail->Username = 'wikran_d@cmu.ac.th';               // SMTP username
//     $mail->Password = 'Lannacom@1';                       // SMTP password
//     $mail->SMTPSecure = 'tls';                            // Enable TLS encryption, `ssl` also accepted
//     $mail->Port = 587;                                    // TCP port to connect to

//     //Recipientss
//     $mail->setFrom('wikran_d@cmu.ac.th', 'Jiramet Kaewsiri');

//     $mail->addAddress('jirametk@lanna.co.th', 'Jiramet Kaewsiri'); 

//     $mail->isHTML(true);                                 

//     $mail->Subject = 'Test'; 

//     $mail->Body = "test";

//     $mail->send();

//     echo 'Message has been sent';
// } catch (Exception $e) {
//     echo 'Message could not be sent. Mailer Error: ', $mail->ErrorInfo;
// }
