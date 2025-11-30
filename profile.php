<?php include ('inc/header.php'); ?>
<?php session_start(); ?>
<?php
if (!isset($_SESSION['user'])){
    header("location:login.php");
    die;
};
?>
<div class="container mt-5 vh-100">
    <div class="card mx-auto" style="max-width: 600px;">
        <div class="card-header">
            <h3 class="mb-0 text-center">User Profile</h3>
        </div>
        <div class="card-body">
            <?php
            if (isset($_SESSION['user'])) {
                $user = $_SESSION['user'];
                echo "<h4 class='mb-3 border border-dark rounded p-2'><strong class='text-dark'>Username:</strong> " . htmlspecialchars($user['name']) . "</h4>";
                echo "<p class='mb-3 border border-dark rounded p-2'><strong class='text-dark'>Email:</strong> " . htmlspecialchars($user['email']) . "</p>";
                echo "<p class='mb-3 border border-dark rounded p-2'><strong class='text-dark'>Phone:</strong> " . htmlspecialchars($user['phone']) . "</p>";
            } else {
                echo "<p>Please <a href='login.php'>log in</a> to view your profile.</p>";
            }
            ?>
        </div>
    </div>
   
</div>
<?php include ('inc/footer.php'); ?>