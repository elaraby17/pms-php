<?php

include ('../../core/validations.php');
include ('../../core/functions.php');
if ($_SERVER["REQUEST_METHOD"] =="POST") {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $message = $_POST['message'];

    $error = validateContact( $name,$email, $message);
    if(!empty($error)){
        setMessage($error, "danger");
        header("Location: ../../contact.php");
        exit();
    }
    if(sendMessage($name, $email, $message)){
        setMessage("Message sent successfully", "success");
        header("Location: ../../index.php");
        exit();
    }else{
        setMessage("Message sending failed", "danger");
        header("Location: ../../contact.php");
        exit();
    }
}