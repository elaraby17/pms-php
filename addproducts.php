<?php include ('inc/header.php'); ?>
<?php
if (!isset($_SESSION['user'])){
    header("location:login.php");
    die;
};
?>
<div class="container vh-100 my-5">
    <div class="row">
        <div class="col-8 mx-auto my-5">
            <h2 class="text-center p-2 my-2 border">Add Product</h2>
    
            <form action="./handlers/products/addproduct.php" method="POST" class="border p-3" enctype="multipart/form-data">
                  <div class="form-group p-2 my-1">
                        <label for="title">Title</label>
                        <input type="text" class="form-control" id="title" name="title">
                  </div>
                  <div class="form-group p-2 my-1">
                        <label for="description">Discription</label>
                        <input type="text" class="form-control" id="description" name="description">
                  </div>
                  <div class="form-group p-2 my-1">
                        <label for="price">Price</label>
                        <input type="number" class="form-control" id="price" name="price">
                  </div>
                  <div class="form-group p-2 my-1">
                        <label for="uploadimage">Upload Image</label>
                        <input type="file" class="form-control" id="uploadimage" name="image">
                  </div>
                  <div class="form-group p-2 my-1">
                        <input type="submit" class="btn btn-dark" value="Add Product">
                  </div>
            </form>
        </div>
    </div>
</div>
<?php include ('inc/footer.php'); ?>