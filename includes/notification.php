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

        $current_date = date("Y-m-d");
        //$id_imp = $_GET['imp_id'];
        $query = "SELECT * FROM users JOIN imprumutate ON users.user_id = imprumutate.id_user WHERE notificare = 0";
        $select_query = mysqli_query($connection, $query);


        if(!$select_query){
            die("QUERY FAILED". mysqli_error($connection));
        }

        while($row = mysqli_fetch_array($select_query)){
            $id_imprumut = $row['id_imprumut'];
            $username = $row['username'];
            $email = $row['email'];
            $data_restituire = $row['data_restituire'];
            $autor = $row['autor'];
            $titlu = $row['titlu'];
            $notificare = $row['notificare'];

            if($current_date > $data_restituire && $notificare == 0){




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
                $mail->Subject = "Notificare intarziere restituire carte";
                $mail->Body = "Termenul de predare pentru cartea ".$titlu." de ".$autor." a fost ".$data_restituire.".";

                $mail->send();



                $query = "UPDATE `imprumutate` SET `notificare`=1 WHERE id_imprumut = '{$id_imprumut}'";
                $update_query = mysqli_query($connection, $query);
            }}

            header('Location: ../index.php');?>
