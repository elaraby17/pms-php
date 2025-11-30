<?php

include ('../../core/validations.php');
include ('../../core/functions.php');
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // foreach($_POST as $key => $value) {
    //     $$key = cleanInput($value);
    // }
    $title = cleanInput($_POST['title']);
    $price = cleanInput($_POST['price']);
    $description = cleanInput($_POST['description']);
    $image = $_FILES['image'];

    $error = validateProduct($title, $price,$description,$image);
    if(!empty($error)){
        setMessage($error, "danger");
        header("Location: ../../addproducts.php");
        exit();
    }
    if(addProduct($title, $price,$description,$image)){
        setMessage("product added successfully", "success");
        header("Location: ../../index.php");
        exit();
    }else{
        setMessage("User registration failed", "danger");
        header("Location: ../../addproducts.php");
        exit();
    }
}