<?php
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['id']) && isset($_POST['qty'])) {
    $id = (int) $_POST['id'];
    $qty = (int) $_POST['qty'];

    foreach ($_SESSION['cart'] as &$item) {
        if ($item['id'] == $id) {
            $item['qty'] = $qty;
            break;
        }
    }
}

header("Location: ../../cart.php");
exit();
?>
