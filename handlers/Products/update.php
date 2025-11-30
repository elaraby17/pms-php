<?php

include ('../../core/validations.php');
include ('../../core/functions.php');
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = (int) $_POST['id'];
    $title = $_POST['title'];
    $price = $_POST['price'];
    $description = $_POST['description'];
    $image = $_FILES['image'];


    $error = validateupdateProduct($title, $price,$description,   $image);
    if(!empty($error)){
        setMessage($error, "danger");
        header("Location: ../../update.php");
        exit();
    }
    if(updateProduct($id ,$title, $price,$description,$image)){
        setMessage("product added successfully", "success");
        header("Location: ../../index.php");
        exit();
    }else{
        setMessage("update failed", "danger");
        header("Location: ../../update.php");
        exit();
    }
}