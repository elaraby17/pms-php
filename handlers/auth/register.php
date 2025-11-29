<?php

include ('../../core/validations.php');
include ('../../core/functions.php');
if ($_SERVER["REQUEST_METHOD"] =="POST") {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $role = $_POST['role'];
    $password = $_POST['password'];
    $confirm_password = $_POST['confirm_password'];
   
    $error = validateRegister($name, $email,  $role, $password, $confirm_password);
    if(!empty($error)){
        setMessage($error, "danger");
        header("Location: ../../register.php");
        exit();
    }
    if(registerUser($name, $email,$role, $password)){
        
        setMessage("User registered successfully", "success");
        header("Location: ../../index.php");
        exit();
    }else{
        setMessage("User registration failed", "danger");
        header("Location: ../../register.php");
        exit();
    }
}