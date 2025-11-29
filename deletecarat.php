<?php
session_start();

if (isset($_GET['id'])) {
    $id = (int) $_GET['id'];

    foreach ($_SESSION['cart'] as $key => $item) {
        if ($item['id'] == $id) {
            unset($_SESSION['cart'][$key]);
            break;
        }
    }
}
header("Location: cart.php");
?>
