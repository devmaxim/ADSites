<?php 

$work = $_POST['user_work'];
$city = $_POST['user_city'];
$phone = $_POST['user_phone'];
$social = $_POST['user_social'];

require_once('phpmailer/PHPMailerAutoload.php');
$mail = new PHPMailer;
$mail->CharSet = 'utf-8';

//$mail->SMTPDebug = 3;                               // Enable verbose debug output

$mail->isSMTP();                                      // Set mailer to use SMTP
$mail->Host = 'smtp.mail.ru';  // Specify main and backup SMTP servers
$mail->SMTPAuth = true;                               // Enable SMTP authentication
$mail->Username = 'accent.digital@mail.ru';                 // Наш логин от ящика
$mail->Password = 'RuuRePT32py-';                           // Наш пароль от ящика от которого будут приходить письма
$mail->SMTPSecure = 'ssl';                            // Enable TLS encryption, `ssl` also accepted
$mail->Port = 465;                                    // TCP port to connect to
 
$mail->setFrom('accent.digital@mail.ru', 'Accent Digital');   // От кого будут приходить письма
$mail->addAddress('ad-market@bk.ru');     // Куда будут приходить письма
//$mail->addAddress('ellen@example.com');               // Name is optional
//$mail->addReplyTo('info@example.com', 'Information');
//$mail->addCC('cc@example.com');
//$mail->addBCC('bcc@example.com');
//$mail->addAttachment('/var/tmp/file.tar.gz');         // Add attachments
//$mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name
$mail->isHTML(true);                                  // Set email format to HTML

$mail->Subject = 'Хочу работать с вами';
$mail->Body    = '
	Пользователь оставил свои данные <br>
	Я занимаюсь: ' . $work . ' <br>
	Мой город: ' . $city . ' <br>
	Мессенджер: ' . $social . ' <br>
	Телефон: ' . $phone . '';
$mail->AltBody = 'Это альтернативный текст';

if(!$mail->send()) {
    return false;
} else {
    return true;
}

?>