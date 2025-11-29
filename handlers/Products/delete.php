<?php

include ('../../core/validations.php');
include ('../../core/functions.php');
if ($_SERVER["REQUEST_METHOD"] =="POST" && isset($_POST['id'] )&& !empty($_POST['id']) ) {
    $id =(int) $_POST['id'];
     
   if(deleteProduct($id)){
    setMessage("product deleted successfully", "success");
    header("Location: ../../index.php");
    exit();
   }else{
    setMessage("product deletion failed", "danger");
    header("Location: ../../index.php");
    exit();
   }
   
}else{
    setMessage("User registration failed", "danger");
    header("Location: ../../index.php");
    exit();
}