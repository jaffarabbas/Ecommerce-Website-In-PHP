<?php
session_start();
//if there is any item in cart then we will see cart page
if (isset($_SESSION['cart']) && count($_SESSION['cart']) > 0) {
?>
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Ecommerce Site</title>
        <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css" rel="stylesheet">
        <link rel="stylesheet" href="../vendor/css/style.css" type="text/css" />
        <link rel="stylesheet" href="../vendor/bootstrap/css/bootstrap.min.css" />
        <script src="../vendor/bootstrap/js/bootstrap.js"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

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
                            <a href="login.php">
                                <img src="../vendor/images/userlogo.png" alt="" />
                            </a>
                        </li>
                        <li>
                            <a href="cart.php">
                                <img src="../vendor/images/cartLogo.png" alt="" />
                            </a>
                        </li>
                    </ul>
                </div>
                <!-- /.navbar-collapse -->
            </div>
            <!-- /.container-fluid -->
        </nav>
        <!-- banner start -->
        <section class="cart_banner">
            <div class="container">
                <div class="row mini_banner_row">
                    <div class="col-md-6 col-md-offset-3">
                        <div class="mini_banner_center text-center">
                            <h1>Products Cart</h1>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- banner end -->

        <!-- product start -->
        <section class="cartPage">
            <div class="container">
                <div class="row">
                    <div class="cartmain col-md-12">
                        <table class="productTable">
                            <thead>
                                <tr>
                                    <th>Product</th>
                                    <th>Price</th>
                                    <th>Quantity</th>
                                    <th>Total</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                if (isset($_SESSION['cart'])) {
                                    foreach ($_SESSION['cart'] as $key => $value) { ?>

                                        <tr class="cart-table-row">
                                            <div class="cartRow">
                                                <td>
                                                    <div class="price">
                                                        <img class="priceImage" src="<?php echo $value['Item_Image'] ?>" alt="product pic 1" />
                                                        <p class="titleCart"><?php echo $value['Item_Name'] ?></p>
                                                    </div>
                                                </td>
                                                <td data-label="Price" class="tdp">
                                                    <p class="priceCart"><?php echo $value['Item_Price'] ?><input type='hidden' class='iprice' value='<?php echo $value['Item_Price'] ?>'></p>
                                                </td>
                                                <td>
                                                    <div class="cartQuantity">
                                                        <form action='./backend/manageCart.php' method='POST'>
                                                            <a onclick="decrementer()">-</a>
                                                            <input id="quantityInc" class="iquantity" type="number" name='Mode_Quantity' onchange='this.form.submit();' value='<?php echo $value['Item_Quantity'] ?>' />
                                                            <input type='hidden' name='Item_id' value='<?php echo $value['Item_id'] ?>' />
                                                            <a onclick="incrementer()">+</a>
                                                        </form>
                                                    </div>
                                                </td>
                                                <td>
                                                    <p id="ctprice" class="totalPriceCart"></p>
                                                    <input type="hidden" id="tprice" name="totalPricePerItem">
                                                    <!-- <form action='./backend/manageCart.php' method='POST'> -->
                                                    <!-- </form> -->
                                                </td>
                                                <td class="tdp">
                                                    <form action='./backend/manageCart.php' method='POST'>
                                                        <button class="delbtn" type="submit" name='Remove_Item'><i class="removeFromCart fa fa-trash"></i></button>
                                                        <input type='hidden' name='Item_id' value="<?php echo $value['Item_id'] ?>">
                                                    </form>
                                                </td>
                                            </div>
                                        </tr>

                                <?php }
                                } else {
                                    echo "
                                <tr>
                                    <td>No data found</td>
                                </tr>
                                ";
                                }
                                ?>
                            </tbody>
                        </table>
                    </div>
                </div>
                <form action="./backend/manageCart.php" method="POST">
                    <div class="cartfooter row">
                        <div class="col-md-12">
                            <button type="submit" name="Add_to_CheckOut" class="checkOutFromCart btnStyle">Check Out</button>
                            <div class="grdTotal">
                                <p>Total :</p>
                                <p id="grandTotal"></p>
                                <input type="hidden" id="gtprice" name="grandTotalPrice">
                            </div>
                        </div>
                    </div>
                </form>
            </div>      
        </section>
        <!-- product end -->
        <footer>
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="footerDivider"></div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <p class="text-center">@2019 <b>Domain</b> All Rights Reserved</p>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <ul>
                            <li><a href="">Home</a></li>
                            <li><a href="">About Us</a></li>
                            <li><a href="">Shop</a></li>
                            <li><a href="">ContactUs</a></li>
                        </ul>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <ul>
                            <li><a href=""><i class="fab fa-twitter"></i></a></li>
                            <li><a href=""><i class="fab fa-facebook-f"></i></a></li>
                            <li><a href=""><i class="fab fa-linkedin-in"></i></a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </footer>
        <!-- footer end -->
    </body>
    <script src="../vendor/js/cartSession.js"></script>
    <script src="../vendor/js/index.js"></script>
    <script src="../vendor/bootstrap/js/bootstrap.min.js"></script>
    <script src="../vendor/bootstrap/js/bootstrap.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/material-ui/5.0.0-beta.5/index.js" integrity="sha512-uKxirna7d5STmVXEMQYBVRW1nERrqHjwOubv4QcK4oYaaifLiEnN/aLIJxVsyK4R1K+awpNIG73RaQfT1DZ8ew==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

    </html>

<?php } else {
    echo "
    <script>
        alert('There is no item in cart');
        window.location.href='shop.php';
    </script>";
} ?>