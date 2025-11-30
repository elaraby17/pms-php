<?php include ('inc/header.php'); ?>
<?php
session_start();
if (isset($_SESSION['user'])) {
    header("location:profile.php");
    die;
};
?>
 <div class="container vh-100 my-5 py-5">
    <div class="row">
        <div class="col-8 mx-auto">
            <h2 class="text-center p-2 my-2 border">Login</h2>
            <form action="./handlers/auth/login.php" method="POST" class="border p-3">
                <div class="form-group p-2 my-1">
                    <label for="email">Email</label>
                    <input type="email" class="form-control" id="email" name="email">
                </div>
                <div class="form-group p-2 my-1">
                    <label for="password">Password</label>
                    <input type="password" class="form-control" id="password" name="password">
                </div>
                <div class="form-group p-2 my-1">
                    <input type="submit" class="btn btn-primary" value="Login">
                </div>
            </form>
        </div>
    </div>
   </div>
<?php include ('inc/footer.php'); ?>