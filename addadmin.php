<?php include ('inc/header.php'); ?>
<div class="container vh-100 my-5">
    <div class="row">
        <div class="col-8 mx-auto my-5">
            <h2 class="text-center p-2 my-2 border">Register Admin</h2>
    
            <form action="./handlers/auth/register.php" method="POST" class="border p-3">
                  <div class="form-group p-2 my-1">
                        <label for="name">Name</label>
                        <input type="text" class="form-control" id="name" name="name">
                  </div>
                  <div class="form-group p-2 my-1">
                        <label for="email">Email</label>
                        <input type="email" class="form-control" id="email" name="email">
                  </div>
                  <div class="form-group p-2 my-1">
                        <label for="role">Role</label>
                        <select name="role" id="role" class="form-control">
                              <option value="admin" >Admin</option>
                              <option value="editor">Editor</option>
                              <option value="user">user</option>
                        </select>
                  </div>
                  <div class="form-group p-2 my-1">
                        <label for="password">Password</label>
                        <input type="password" class="form-control" id="password" name="password">
                  </div>
                  <div class="form-group p-2 my-1">
                        <label for="confirm password">confirm Password</label>
                        <input type="password" class="form-control" id="confirm password" name="confirm_password">
                  </div>
                  <div class="form-group p-2 my-1">
                        <input type="submit" class="btn btn-primary" value="Register">
                  </div>
            </form>
        </div>
    </div>
</div>
<?php include ('inc/footer.php'); ?>