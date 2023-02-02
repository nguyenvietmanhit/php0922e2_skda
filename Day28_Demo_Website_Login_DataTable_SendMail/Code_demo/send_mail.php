<?php
//send_mail.php
// Cách gửi mail trong PHP
// + Hàm của PHP thuần: mặc định chưa gửi đc mà cần cấu hình ->phức tạp
// mail('nguyenvietmanhit@gmail.com', 'Tiêu đề mail', 'Body mail');

// + Nên sử dụng các thư viện gửi mail từ bên thứ 3 để dễ cấu hình hơn: PHPMailer
// Đọc document
// - Download file .zip, giải nén đặt thư mục PHPMailer-master
// sau khi giải nén cùng cấp file send_mail.php hiện tại
// - Copy đoạn code mẫu:

//Nhúng thủ công các file theo đúng thứ tự sau:
require_once 'PHPMailer-master/src/Exception.php';
require_once 'PHPMailer-master/src/PHPMailer.php';
require_once 'PHPMailer-master/src/SMTP.php';

//Import PHPMailer classes into the global namespace
//These must be at the top of your script, not inside a function
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

//Load Composer's autoloader,comment vì ko dùng composer nên ko có đường dẫn này
// require 'vendor/autoload.php';

//Create an instance; passing `true` enables exceptions
$mail = new PHPMailer(true);

try {
	//Server settings
	$mail->CharSet = 'UTF-8'; //fix font tiếng việt
	$mail->SMTPDebug = SMTP::DEBUG_OFF;                      //Enable verbose debug output
	$mail->isSMTP();                                            //Send using SMTP
	$mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
	$mail->SMTPAuth   = true;                                   //Enable SMTP authentication
	$mail->Username   = 'nguyenvietmanhit@gmail.com';                     //SMTP username
	// Cách tạo mk ứng dụng Gmail:
	// Cần bật Xác thực 2 bước cho tài khoản Gmail của bạn
	// https://myaccount.google.com/ Bảo mật -> Xác minh 2 bước
	$mail->Password   = 'xrdjsdthuzoaaqch';                               //SMTP password
	$mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
	$mail->Port       = 465;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

	//Recipients
//	$mail->setFrom('from@example.com', 'Mailer');
//	$mail->addAddress('joe@example.net', 'Joe User');     //Add a recipient
	$mail->addAddress('nguyenvietmanhit@gmail.com');               //Name is optional
//	$mail->addReplyTo('info@example.com', 'Information');
//	$mail->addCC('cc@example.com');
//	$mail->addBCC('bcc@example.com');

	//Attachments
//	$mail->addAttachment('/var/tmp/file.tar.gz');         //Add attachments
//	$mail->addAttachment('/tmp/image.jpg', 'new.jpg');    //Optional name

	//Content
	$mail->isHTML(true);                                  //Set email format to HTML
	$mail->Subject = 'Tiêu đề mail';
	$mail->Body    = 'Phần thân mail';
	$mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

	$mail->send();
	echo 'Message has been sent';
} catch (Exception $e) {
	echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
}
