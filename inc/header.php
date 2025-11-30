<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
$cart = isset($_SESSION['cart']) ? $_SESSION['cart'] : array();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Shop Homepage - EraaSoft PMS Template</title>
    <!-- Favicon-->
    <link rel="icon" type="image/x-icon" href="assets/favicon.ico" />
    <!-- Bootstrap icons-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css" rel="stylesheet" />
    <!-- Core theme CSS (includes Bootstrap)-->
    <link href="css/styles.css" rel="stylesheet" />
</head>

<body>
    <!-- Navigation-->
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container px-4 px-lg-5">
            <a class="navbar-brand" href="#!">EraaSoft PMS</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">

                <ul class="navbar-nav me-auto mb-2 mb-lg-0 ms-lg-4">
                  <?php if (isset($_SESSION['user'])) : ?>
                    <li class="nav-item"><a class="nav-link active" aria-current="page" href="index.php">Home</a></li>
                    <li class="nav-item"><a class="nav-link" href="about.php">About</a></li>
                    <li class="nav-item"><a class="nav-link" href="contact.php">Contact</a></li>
                    <li class="nav-item"><a class="nav-link" href="addproducts.php">Add Product</a></li>
                    <?php endif; ?>
                </ul>
                <?php if (!isset($_SESSION['user'])) : ?>
                <div class="right d-flex gap-2 align-items-center">
                    <button class="btn btn-outline-dark d-flex align-items-center gap-1" type="submit">
                        <i class="bi-box-arrow-in-right me-1"></i>
                        <a href="login.php" class="nav-link">Log In</a>
                    </button>
                    <button class="btn btn-outline-dark d-flex align-items-center gap-1" type="submit">
                        <i class="bi-person-plus-fill me-1"></i>
                        <a href="register.php" class="nav-link">Register</a>
                    </button>
                </div>
                <?php endif; ?>
                <?php if (isset($_SESSION['user'])) : ?>
                <div class="right d-flex gap-2 align-items-center">
                    <form class="d-flex" action="cart.php">
                        <button class="btn btn-outline-dark" type="submit">
                            <i class="bi-cart-fill me-1"></i>
                            Cart
                            <span class="badge bg-dark text-white ms-1 rounded-pill"><?php echo count($cart); ?></span>
                        </button>
                    </form>
                    <button class="btn btn-outline-dark d-flex align-items-center gap-1" type="submit">
                        <i class="bi-box-arrow-right me-1"></i>
                        <a href="logout.php" class="nav-link">Log Out</a>
                    </button>
                </div>
                <?php endif; ?>
            </div>
        </div>
    </nav>
    <?php include (__DIR__.'/../core/functions.php'); ?>
    <?php showMessage(); ?>