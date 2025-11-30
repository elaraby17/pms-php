<?php require_once('inc/header.php'); ?>

<?php
session_start();
$cart = $_SESSION['cart'] ?? [];
$user = $_SESSION['user'] ?? [];
?>
<?php
if (!isset($_SESSION['user'])){
    header("location:login.php");
    die;
};
?>

<!-- Header-->
<header class="bg-dark py-5">
    <div class="container px-4 px-lg-5 my-5">
        <div class="text-center text-white">
            <h1 class="display-4 fw-bolder">Shop in style</h1>
            <p class="lead fw-normal text-white-50 mb-0">With this shop hompeage template</p>
        </div>
    </div>
</header>
<!-- Section-->
<section class="py-5">
    <div class="container px-4 px-lg-5 mt-5">
        <div class="row">
            <div class="col-4">
                <div class="border p-2">
                    <div class="products">
                        <h3 class="text-center">Your order</h3>
                         <form action="./handlers/orders/addorder.php" method="POST">
                        <ul class="list-unstyled">
                            <?php foreach ($cart as $product) : ?>
                                    <input type="hidden" name="id" value="<?= $product['id']; ?>">
                                    <input type="hidden" name="title" value="<?= $product['title']; ?>">
                                    <input type="hidden" name="price" value="<?= $product['price']; ?>">
                                    <input type="hidden" name="qty" value="<?= $product['qty']; ?>">
                                    <input type="hidden" name="total" value=" <?php $total = 0; foreach ($cart as $product) {$total += $product['price'] * $product['qty'];} echo $total; ?>">
                            <li class="border p-2 my-1"> 
                                <span class="text-success mx-2 mr-auto bold"><?= $product['title']; ?></span>
                                <span class="text-success mx-2 mr-auto bold">$<?= $product['price']; ?>x <?= $product['qty']; ?></span>
                            </li>
                            <?php endforeach; ?>
                        </ul>
                    </div>
                    <h3>Total : <?php $total = 0; foreach ($cart as $product) {$total += $product['price'] * $product['qty'];} echo $total; ?>$</h3>
                </div>
            </div>


            <div class="col-8">
                    <div class="mb-3">
                        <div class="mb-3">
                            <label for="name">Name</label>
                            <input type="text" name="name" id="name" class="form-control" value="<?= $user['name']; ?>">
                        </div>
                        <div class="mb-3">
                            <label for="email">Email</label>
                            <input type="email" name="email" id="email" class="form-control" value="<?= $user['email']; ?>">
                        </div>
                        <div class="mb-3">
                            <label for="address">Address</label>
                            <input type="text" name="address" id="address" class="form-control">
                        </div>
                        <div class="mb-3">
                            <label for="phone">Phone</label>
                            <input type="text" name="phone" id="phone" class="form-control">
                        </div>
                        <div class="mb-3">
                            <label for="notes">Notes</label>
                            <input type="text" name="notes" id="notes" class="form-control">
                        </div>
                        <div class="mb-3">
                            <input type="submit" value="Send" class="btn btn-success">
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>
<?php require_once('inc/footer.php'); ?>