<?php
// Файлы phpmailer
require 'phpmailer/PHPMailer.php';
require 'phpmailer/SMTP.php';
require 'phpmailer/Exception.php';

// Переменные, которые отправляет пользователь
$name = $_POST['name'];
$email = $_POST['email'];
$tel = $_POST['tel'];

// Проверяем валидность EMail
if (filter_var($email, FILTER_VALIDATE_EMAIL)) {

$mail = new PHPMailer\PHPMailer\PHPMailer();
try {
    $msg = "ok";
    $mail->isSMTP();
    $mail->CharSet = "UTF-8";
    $mail->SMTPAuth   = true;

    // Настройки вашей почты
    $mail->Host       = '‘smtp.yandex.ru'; // SMTP сервера
    $mail->Username   = 'mail.sitevesta@yandex.ru'; // Логин на почте
    $mail->Password   = '892229As'; // Пароль на почте
    $mail->SMTPSecure = 'ssl';
    $mail->Port       = 465;
    $mail->setFrom('mail.sitevesta@yandex.ru', 'Сайт: Чай из Трёки'); // Адрес самой почты

    // Получатель письма
    $mail->addAddress('mail.sitevesta@yandex.ru');

        // -----------------------
        // Само письмо
        // -----------------------
        $mail->isHTML(true);

        $mail->Subject = 'Новая заявка на прайс-лист';
        $mail->Body    = "<b>Имя:</b> $name <br>
        <b>Почта:</b> $email<br><br>
        <b>Телфон:</b><br>$tel";


// Проверяем отравленность сообщения
if ($mail->send()) {
    echo "$msg";
} else {
echo "Сообщение не было отправлено. Неверно указаны настройки вашей почты";
}

} catch (Exception $e) {
    echo "Сообщение не было отправлено. Причина ошибки: {$mail->ErrorInfo}";
}

} else {
    echo 'mailerror';
}
