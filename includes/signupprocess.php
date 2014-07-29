<?php

/* this code lives on the header.php on the top of the html */

require_once('includes/config.php');
require_once('includes/functions.php');
require_once('includes/password.php');
// Registration Page
if (isset($_POST['register'])) {
   $credentials = [
   'firstname'=>$_POST['firstname'],
   'lastname'=>$_POST['lastname'],
   'email'=>$_POST['email'],
   'password'=>$_POST['password'],
   'vpassword'=>$_POST['vpassword']
   ];
   if($credentials['vpassword'] !== $credentials['password']){
    $validation_response = "<div class='alert alert-danger'>Passwords are not the same</div>";

    echo json_decode(['message' => $validation_response]);
   }else{
       $hashed_pass = password_hash($credentials['password'], PASSWORD_BCRYPT);

       try {
            $check = $conn->prepare('SELECT * FROM `users` WHERE `email` = :email');
            $check->execute([':email'=>$credentials['email']]);
            if($check->rowCount() === 1){
                $validation_response = "<div class='alert alert-danger'>User Already Exists</div>";
            }else{
                $bind = [':firstname'=>$credentials['firstname'],':lastname'=>$credentials['lastname'],
                ':email'=>$credentials['email'],':password'=>$hashed_pass];
                $query = "INSERT INTO `users` (firstname, lastname, email, password) 
                VALUES (:firstname, :lastname, :email, :password)";
                
                $stmt = $conn->prepare($query);
                $stmt->execute($bind);
                $recipient = $credentials['email'];
                $sender = 'no-reply@foivault.com';
                $subject = 'Foivault Registration';
                $mail_body = "Click the link to activate your Foivault account\n <a href='".
                base64_encode($credentials['email'].$credentials['firstname'])."'>Click Me</a>";
                $headers  = 'MIME-Version: 1.0' . "\r\n";
                $headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
                $headers .= 'From: '.$sender."\r\n";
                $headers .= 'Reply-To: '.$sender."\r\n";
                $headers .= 'X-Mailer: PHP/'.phpversion();
                mail($recipient,$subject,$mail_body,$headers);

                $validation_response = "<div class='alert alert-success'>Check your email to confirm your account</div>";
            }
       }catch(PDOException $e){
            echo 'Connection Error: ' . $e->getMessage();
        }

    }
}
?>