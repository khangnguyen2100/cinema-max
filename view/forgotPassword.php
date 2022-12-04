<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;

require '../vendor/autoload.php';
include_once('../module/function.php');
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>BK Store</title>
  <link href="https://fonts.googleapis.com/css2?family=Merriweather:ital,wght@0,400;0,700;1,900&family=Roboto:wght@300;400;500;700;900&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  <link rel="stylesheet" href="../assets/styles/style.css">
  <style>
    * {
      margin: 0;
      padding: 0;
      box-sizing: border-box;
    }

    body {
      font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
    }

    .container {
      height: 100vh;
      width: 100%;
      display: flex;
      justify-content: center;
      align-items: center;
    }

    .container-form {
      width: 400px;
      display: flex;
      align-items: center;
      row-gap: 25px;
      flex-direction: column;
      box-shadow: rgba(50, 50, 93, 0.25) 0px 13px 27px -5px, rgba(0, 0, 0, 0.3) 0px 8px 16px -8px;
      padding: 25px;
      border-radius: 15px;
    }

    .heading-form {
      font-weight: 700;
      font-size: 25px;
      color: orangered;
      text-transform: capitalize;
    }

    .form-group {
      width: 100%;
      display: flex;
      justify-content: center;
      flex-direction: column;
    }

    .form-group input {
      font-size: 24px;
      margin-top: 15px;
      border: 0;
      border-bottom: 1px solid orangered;
      outline: none;
    }
    .btn-form a {
      color : #fff ;
      text-decoration: none ;
    }
    .actions input {
      background-color : rgba(50, 138, 241, 1) !important;
      font-weight: 700;
    }
    .btn-form {
      font-size: 16px !important;
      margin-top: 0 !important;
      width: 48%;
      height: 45px;
      display: flex;
      justify-content: center;
      align-items: center;
      border-radius: 5px;
      border: 0;
      background-color: #444;
      color: #fff;
    }
    .actions {
      margin-top: 30px;
      display: flex;
      flex-direction: row;
      justify-content: space-between;
      align-items: center;
    }
  
  </style>
</head>

<body>
  <div class="container">
    <form class="container-form" action="forgotPassword.php" method="POST" class="form">
      <h2 class="heading-form">
        Đặt lại mật khẩu
      </h2>
      <div class="form-group">
        <label for="email">
          Nhập địa chỉ email tài khoản của bạn
        </label>
        <input type="email" id="email" required name="email">
      </div>
      <div class="form-group actions">
        <div class="btn-bg-form btn-form" style="cursor: pointer;">
          <a href="./login.php">Quay lại</a>
        </div>
        <input type="submit" name="login" value='Reset mật khẩu' class="btn-bg-form btn-form" style="cursor: pointer;" />
      </div>
      <div>
        <?php
        if (isset($_POST['login']) && $_POST['login'] && $_POST['email'] !== '') {
          $email = trim($_POST['email']);
          $user = action("SELECT * FROM user WHERE email = '$email'");
          if (count($user) > 0) {
            ob_start();
            $email_from = getenv('email');
            $email_password = getenv('email_password');
            $mail = new PHPMailer();
            $mail->CharSet = 'UTF-8';
            $mail->Encoding = 'base64';

            $mail->isSMTP();
            $mail->SMTPDebug = SMTP::DEBUG_SERVER;
            $mail->SMTPSecure = 'tls';
            $mail->Host = 'smtp.gmail.com';
            $mail->Mailer = "smtp";
            $mail->Port = 587;
            // $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;

            $mail->SMTPAuth = true;
            $mail->Username = $email_from;

            //Password to use for SMTP authentication
            $mail->Password = $email_password;

            $mail->setFrom($email_from, 'Cinema-max');


            $mail->addAddress($email, $email);
            $mail->Subject = 'Đặt lại mật khẩu';
          

            $new_password = randomString();
            $message = file_get_contents('contents.html', __DIR__);
            $message = str_replace('%email%', $email, $message);
            $message = str_replace('%new_password%', $new_password, $message);
            $mail->msgHTML($message);

            $mail->AltBody = 'This is a plain-text message body';
            if (!$mail->send()) {
              // echo 'Mailer Error: ' . $mail->ErrorInfo;
            } else {
              ob_get_clean();
              action("UPDATE user SET password = '" . $new_password . "' WHERE email = '$email'");
              echo 'Email đã được gửi. Hãy kiểm tra email của bạn';
            }

            function save_mail($mail)
            {
              $path = '{imap.gmail.com:993/imap/ssl}[Gmail]/Sent Mail';
              $imapStream = imap_open($path, $mail->Username, $mail->Password);

              $result = imap_append($imapStream, $path, $mail->getSentMIMEMessage());
              imap_close($imapStream);

              return $result;
            }
          } else {
            echo "
              <script type='text/javascript'>
                setTimeout(alertFunc, 200);
                function alertFunc() {
                  alert('email chưa được đăng kí')
                }
              </script>
              ";
          }
        }
        ?>
      </div>
    </form>
  </div>
</body>

</html>