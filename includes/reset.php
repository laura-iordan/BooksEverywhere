<?php include "db.php"; ?>
<?php include "../functions.php"; ?>
<?php ob_start(); ?>
<?php session_start(); ?>

<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require '../PHPMailer/src/Exception.php';
require '../PHPMailer/src/PHPMailer.php';
require '../PHPMailer/src/SMTP.php';

if(isset($_POST['reset'])){
  $password = randomPassword();
  $email = $_POST['email_reset'];
  $mail = new PHPMailer(true);

  $mail->isSMTP();
  $mail->CharSet = "utf-8";// set charset to utf8
$mail->SMTPAuth = true;// Enable SMTP authentication
$mail->SMTPSecure = 'tls';// Enable TLS encryption, `ssl` also accepted

  $mail->Host = 'smtp.gmail.com';
  $mail->Username = 'laura.ilk@gmail.com';
  $mail->Password = '';
  $mail->Port = 587;
  $mail->SMTPOptions = array(
    'ssl' => array(
        'verify_peer' => false,
        'verify_peer_name' => false,
        'allow_self_signed' => true
    )
);
$mail->SMTPSecure = 'tls';

  $mail->addAddress($email);

  $mail->isHTML(true);
  $mail->Subject = "Resetare parola";
  $mail->Body = "Parola resetata este: ".$password;

  $mail->send();

  $query = "UPDATE `users` SET `password`='{$password}' WHERE email = '{$email}'";
  $update_query = mysqli_query($connection, $query);
  echo "
  <script>
    alert('Mesaj trimis cu succes.');
    document.location.href = '../index.php';
  </script>
  ";
}
?>
