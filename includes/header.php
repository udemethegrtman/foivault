<?php
session_name('foivault');
session_start();
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
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Freedom of Information">

    <title>FOI Vault</title>
    <!--[if IE]>
    <script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>  
    <style type="text/css">
        .clear {
          zoom: 1;
          display: block;
        }
        </style>
    <![endif]-->

    <!-- Bootstrap core CSS -->
    <link href="./assets/css/bootstrap.min.css" rel="stylesheet">

    <!-- Favicon -->
    <link rel="shorcut icon" href="./assets/img/logo.png">

    <!-- Custom Google Web Font -->
    <link href="//netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css" rel="stylesheet">
    <link href='http://fonts.googleapis.com/css?family=Wire+One|Open+Sans+Condensed:300|Lato:100,300,400,700,900,100italic,300italic,400italic,700italic,900italic' rel='stylesheet' type='text/css'>

    <!-- Add custom CSS here -->
    <link href="./assets/css/thub.css" rel="stylesheet">

</head>

<body>