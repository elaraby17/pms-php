<?php
include ('../../core/validations.php');
include ('../../core/functions.php');
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  foreach($_POST as $key => $value) {
        $$key = cleanInput($value);
    }
    $error = validateRegister($name, $email,$phone,$role, $password, $confirm_password);
    if (!empty($error)) {
        setMessage( $error , 'danger');
        header("Location: ../../register.php");
        exit();
    }

    if(registerUser($name, $email, $phone,$role,$password)){
        setMessage("User registered successfully", "success");
        header("Location: ../../index.php");
        exit();
    }else{
        setMessage("User registration failed", "danger");
        header("Location: ../../register.php");
        exit();
    }





}