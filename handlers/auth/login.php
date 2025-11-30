<?php
include ('../../core/validations.php');
include ('../../core/functions.php');
if ($_SERVER["REQUEST_METHOD"] == "POST") {
      foreach($_POST as $key => $value) {
        $$key = cleanInput($value);
     }
    
    $error = validateLogin( $email, $password);
    if(!empty($error)){
        setMessage($error, "danger");
        header("Location: ../../login.php");
        exit();
    }
    
    if(loginUser( $email,$password)){
        setMessage("User login successfully", "success");
        header("Location: ../../index.php");
        exit();
    }else{
        setMessage("User login failed", "danger");
        header("Location: ../../login.php");
        exit();
    }
}