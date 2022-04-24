<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ecommerce Site</title>

    <?php include("styleCdn.php") ?>
</head>

<body>
    <!-- header start -->
    <nav class="navbar">
        <div class="container-fluid">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="#">
                    <img src="../vendor/images/CompanyNameLogo.png" alt="logo" />
                </a>
            </div>

            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <div class="navigation">
                    <ul class="nav navbar-nav">
                        <li><a href="index.php">Home</a></li>
                        <li><a href="aboutus.php">About Us</a></li>
                        <li><a href="shop.php">Shop</a></li>
                        <li><a href="contactus.php">ContactUs</a></li>
                    </ul>
                </div>
                <ul class="nav navbar-nav navbar-right">
                    <li>
                        <?php
                        if (isset($_SESSION['user']) && $_SESSION['user'] != "") { ?>
                            <form action="./backend/logout.php" method="POST">
                                <button class="logout" name="logout">
                                    <i class="fas fa-sign-out-alt"></i>
                                </button>
                            </form>
                        <?php } else { ?>
                            <a href="login.php">
                                <img src="../vendor/images/userlogo.png" alt="" />
                            </a>
                        <?php } ?>
                    </li>
                    <li>
                        <?php
                        if (isset($_SESSION['user']) && $_SESSION['user'] != "") { ?>
                            <a href="cart.php">
                                <img src="../vendor/images/cartLogo.png" alt="" />
                            </a>
                        <?php } ?>
                    </li>
                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container-fluid -->
    </nav>
    <!-- header end -->
</body>
<?php include("jsCdn.php") ?>

</html>