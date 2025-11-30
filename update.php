<?php include ('inc/header.php'); ?>
<?php
$products = getAllProducts();
$id = $_GET['id'];

foreach ($products as $p) {
    if ($p['id'] == $id) {
        $product = $p;
        break;
    }
}
?>

<div class="container vh-100 my-5">
    <div class="row">
        <div class="col-8 mx-auto my-5">
            <h2 class="text-center p-2 my-2 border">Update Product</h2>
    
            <form action="./handlers/products/update.php" method="POST" class="border p-3" enctype="multipart/form-data">
                  <div class="form-group p-2 my-1">
                        <input type="hidden" name="id" value="<?= $product['id']; ?>">
                        <label for="title">Title</label>
                        <input type="text" class="form-control" id="title" name="title" value="<?= $product['title']; ?>">
                  </div>
                  <div class="form-group p-2 my-1">
                        <label for="description">Discription</label>
                        <input type="text" class="form-control" id="description" name="description" value="<?= $product['description']; ?>">
                  </div>
                  <div class="form-group p-2 my-1">
                        <label for="price">Price</label>
                        <input type="number" class="form-control" id="price" name="price" value="<?= $product['price']; ?>">
                  </div>
                  <div class="form-group p-2 my-1">
                        <label for="uploadimage">Upload Image</label>
                        <input type="file" class="form-control" id="uploadimage" name="image" value="assets/images/<?= $product['image']; ?>">
                  </div>
                  <div class="form-group p-2 my-1">
                        <button type="submit" class="btn btn-primary w-100">Update Product</button>
                  </div>
            </form>
        </div>
    </div>
</div>
<?php include ('inc/footer.php'); ?>