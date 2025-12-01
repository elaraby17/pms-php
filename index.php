<?php require_once ('inc/header.php'); 
session_start();
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
        <div class="row gx-4 gx-lg-5 row-cols-2 row-cols-md-3 row-cols-xl-4 justify-content-center">
            <?php foreach (getAllProducts() as $product): ?>
            <div class="col mb-5">
                <?php if (isset($_SESSION['user'])) :  ?>
                <div class="update d-flex justify-content-start gap-2 ">
                    <form action="handlers/Products/delete.php" method="post">
                        <input type="hidden" name="id" value="<?=$product['id']?>">
                        <button class="btn btn-danger mb-2" type="submit">
                            <i class="bi bi-trash"></i>
                            Delete
                        </button>
                    </form>
                    <div>
                        <a href="update.php?id=<?=$product['id']?>" class="btn btn-warning mb-2">
                            <i class="bi bi-pencil-square"></i>
                            Update
                        </a>
                    </div>
                </div>
                <?php endif; ?>
                <div class="card h-100">
                    <!-- Product image-->
                    <img class="card-img-top" src="assets/images/<?=$product['image']?>" alt="..." />
                    <!-- Product details-->
                    <div class="card-body p-4">
                        <div class="text-center">
                            <!-- Product name-->
                            <h5 class="fw-bolder"><?=$product['title']?></h5>

                            <!-- Product description-->
                            <p class="card-text"><?=$product['description']?></p>
                            <!-- Product price-->
                            <p class="card-text">$<?=$product['price']?></p>

                        </div>
                    </div>
                    <!-- Product actions-->
                    <?php if (isset($_SESSION['user'])) :  ?>
                    <div class="card-footer p-4 pt-0 border-top-0 bg-transparent">
                        <form action="handlers/cart/addtocart.php" method="post">
                            <input type="hidden" name="id" value="<?=$product['id']?>">
                            <input type="hidden" name="title" value="<?=$product['title']?>">
                            <input type="hidden" name="price" value="<?=$product['price']?>">
                            <input type="hidden" name="image" value="<?=$product['image']?>">
                            <div class="text-center">
                                <button class="btn btn-outline-dark mt-auto" type="submit">Add to cart</button>
                            </div>
                        </form>
                    </div>

                    <?php endif; ?>
                </div>
            </div>
            <?php endforeach; ?>
        </div>

    </div>
    </div>
</section>
<?php require_once ('inc/footer.php'); ?>