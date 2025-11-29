<?php

include ('../../core/validations.php');
include ('../../core/functions.php');
if ($_SERVER["REQUEST_METHOD"] =="POST") {
    $email = $_POST['email'];
    $role = $_POST['role'];
    $password = $_POST['password'];   
    $error = validateLogin( $email, $role, $password);
    if(!empty($error)){
        setMessage($error, "danger");
        header("Location: ../../login.php");
        exit();
    }
    if(loginUser( $email,$role ,$password)){

        setMessage("User login successfully", "success");
        header("Location: ../../index.php");
        exit();
    }else{
        setMessage("User login failed", "danger");
        header("Location: ../../login.php");
        exit();
    }
}