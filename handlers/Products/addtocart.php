<?php

include ('../../core/validations.php');
include ('../../core/functions.php');

if ($_SERVER["REQUEST_METHOD"] =="POST") {
   if(!isset($_SESSION['cart'])){
       $_SESSION['cart'] = [];
   }
   $id =(int) $_POST['id'];
   $title = $_POST['title'];
   $price = $_POST['price'];
   $image = $_POST['image'];

   $found = false;
foreach ($_SESSION['cart'] as &$item) {
    if ($item['title'] === $title) {
        $item['qty'] += 1;
        $found = true;
        break;
    }
}
    $_SESSION['cart'][] = [
        'id'    => $id,
        'title'  => $title,
        'price' => $price,
        'image' => $image,
        'qty'   => 1
    ];

   header("Location: ../../cart.php");
   exit();

   
   
}else{
    setMessage("User registration failed", "danger");
    header("Location: ../../index.php");
    exit();
}