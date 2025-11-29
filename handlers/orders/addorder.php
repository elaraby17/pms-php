<?php

include ('../../core/validations.php');
include ('../../core/functions.php');
if ($_SERVER["REQUEST_METHOD"] =="POST") {

    $name = $_POST['name'];
    $email = $_POST['email'];
    $address = $_POST['address'];
    $phone = $_POST['phone'];
    $notes = $_POST['notes'];
    $title = $_POST['title'];
    $price = $_POST['price'];
    $qty = $_POST['qty'];
    $total = $_POST['total'];


    $error = validateOrder($name, $email, $address, $phone, $notes ,$title, $price, $qty ,$total);
    if(!empty($error)){
        setMessage($error, "danger");
        header("Location: ../../checkout.php");
        exit();
    }
    if(checkOrder($name, $email, $address, $phone, $notes, $title, $price, $qty ,$total)){
        setMessage("Order sent successfully", "success");
        header("Location: ../../index.php");
        exit();
    }else{
        setMessage("Order sending failed", "danger");
        header("Location: ../../checkout.php");
        exit();
    }
}