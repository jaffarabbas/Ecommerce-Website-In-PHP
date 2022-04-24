<?php include("header.php") ?>

<!-- banner start -->
<section class="login_banner">
    <div class="container">
        <div class="row mini_banner_row">
            <div class="col-md-6 col-md-offset-3">
                <div class="mini_banner_center text-center">
                    <h1>Login</h1>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- banner end -->

<!-- product start -->
<section class="authPage">
    <div class="container">
        <div class="row">
            <div class="col-md-6 col-md-offset-3 col-sm-6 col-sm-offset-3 col-xs-12">
                <div class="auth">
                    <form action="./backend/login_backend.php" method="POST">
                        <h1>Login</h1>
                        <?php
                        if (isset($_SESSION['error']) && $_SESSION['error'] != "") {
                            echo $_SESSION['error'];
                            unset($_SESSION['error']);
                        }
                        ?>
                        <input class="contactInput" name="email" type="email" placeholder="Email Address"><br>
                        <input class="contactInput" name="password" type="text" placeholder="Password"><br>
                        <input type="submit" name="login" class="btnStyle" value="Login">
                        <br>
                        <br>
                        <a href="signup.php">Create new Account</a>&nbsp;&nbsp;&nbsp;<a href="">Forget passowrd ?</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- product end -->

<?php include("footer.php") ?>