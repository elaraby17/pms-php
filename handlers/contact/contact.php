<?php

include ('../../core/validations.php');
include ('../../core/functions.php');
if ($_SERVER["REQUEST_METHOD"] =="POST") {
    foreach($_POST as $key => $value) {
        $$key = cleanInput($value);
    }

    $error = validateContact( $name,$email, $message);
    if(!empty($error)){
        setMessage($error, "danger");
        header("Location: ../../contact.php");
        exit();
    }
    if(contactMessage($name, $email, $message)){
        setMessage("Message sent successfully", "success");
        header("Location: ../../index.php");
        exit();
    }else{
        setMessage("Message sending failed", "danger");
        header("Location: ../../contact.php");
        exit();
    }
}