<!-- <div class="d-flex flex-column justify-content-center align-items-center gap-5"> -->
    <!-- <h1>Login</h1>
    <form class="w-50" method="POST" action="/authenticate"> -->
        <?php // if (!empty($_SESSION) && isset($_SESSION['error']) && !empty($_SESSION['error'])) : ?>
            <!-- <div class='alert alert-danger mb-3' role='alert'>
                <?//= $_SESSION['error'] ?>
            </div> -->
        <?php
            //$_SESSION['error'] = null;
            //endif; ?>

        <!-- <div class="mb-3">
            <label for="admin-username" class="form-label">Username</label>
            <input type="text" class="form-control" id="admin-username" name="username">
        </div>
        <div class="mb-3">
            <label for="admin-password" class="form-label">Password</label>
            <input type="password" class="form-control" id="admin-password" name="password">
        </div>
        <div class="mb-3 form-check">
            <input type="checkbox" class="form-check-input" id="remember-me" name="remember_me">
            <label class="form-check-label" for="remember-me">Remember Me</label>
        </div>
        <button type="submit" class="btn btn-primary">Login</button>
    </form> -->
<!-- </div>  -->




<div class="wrapper ">
<div class="image">
      <img  src="<?="http://"  . $_SERVER['HTTP_HOST'] ?>/resources/images/shop.jpg"> </div>
        <form action="/authenticate" method="POST">
        <?php if (!empty($_SESSION) && isset($_SESSION['error']) && !empty($_SESSION['error'])) : ?>
            <div class='alert alert-danger mb-3' role='alert'>
                <?= $_SESSION['error'] ?>
            </div>
            <?php
            $_SESSION['error'] = null;
            endif; ?>

            <h2>Login</h2>
            <div class="input-group">
                <input type="text" name="username" id="loginuser" required>
                <label  for="loginuser">User Name</label>
            </div>
            <div class="input-group">
                <input type="password" name="password" id="loginpassword" required>
                <label  for="loginpassword">Password</label>
            </div>
            <div class="mb-3 form-check">
            <input type="checkbox" class="form-check-input" id="remember-me" name="remember_me">
            <label class="form-check-label" for="remember-me">Remember Me</label>
        </div>
            <input type="submit" value="login" class="submit-btn">
           
        </form>
    </div>