<?php
include_once("./backend/connecter.php");

//extact data with respect to categories
$result = $operations->getData(Queries::$getTaxtFromSetting);

foreach ($result as $value) {
    $tax = $value['TAX'];
}
?>

<?php include("header.php");?>

<?php if (isset($_SESSION['cart']) && count($_SESSION['cart']) > 0) { ?>
    <!-- banner start -->
    <section class="cart_banner">
        <div class="container">
            <div class="row mini_banner_row">
                <div class="col-md-6 col-md-offset-3">
                    <div class="mini_banner_center text-center">
                        <h1>Check Out</h1>
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
                <div class="checkoutheader col-md-12">
                    <ul>
                        <li>Item</li>
                        <div>
                            <li>Quantity</li>
                            <li>Price</li>
                            <li>Total Price</li>
                        </div>
                    </ul>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <?php
                    if (isset($_SESSION['cart'])) {
                        foreach ($_SESSION['cart'] as $key => $value) { ?>
                            <div class="checkOutRow row">
                                <div class="col-md-6">
                                    <div class="checkOutinfo">
                                        <img src="<?php echo $value['Item_Image'] ?>    " alt="product pic 1" />
                                        <div>
                                            <p class="primaryHeading"><?php echo $value['Item_Name'] ?></p>
                                            <p class="secondaryHeading"><?php echo $value['Item_Description'] ?></p>
                                        </div>
                                    </div>
                                </div>
                                <div class="checkOutprice col-md-6">
                                    <div class="cartQuantity">
                                        <form action='./backend/manageCart.php' method='POST'>
                                            <a onclick="decrementer()">-</a>
                                            <input id="quantityInc" class="iquantity" type="number" name='Mode_Quantity' onchange='this.form.submit();' value='<?php echo $value['Item_Quantity'] ?>' />
                                            <input type='hidden' name='Item_id' value='<?php echo $value['Item_id'] ?>' />
                                            <a onclick="incrementer()">+</a>
                                        </form>
                                    </div>
                                    <div class="money">
                                        <p><?php echo $value['Item_Price'] ?> Rs</p>
                                        <p><?php echo $value['Item_total_Price'] ?> Rs</p>
                                    </div>
                                    <div class="dfco">
                                        <form action='./backend/manageCart.php' method='POST'>
                                            <button class="delbtn" type="submit" name='Remove_Item'><i class="removeFromCart fa fa-trash"></i></button>
                                            <input type='hidden' name='Item_id' value="<?php echo $value['Item_id'] ?>">
                                        </form>
                                    </div>
                                </div>
                            </div>
                    <?php }
                    } else {
                        echo "
                                <tr>
                                    <td>No data found</td>
                                </tr>
                                ";
                    }
                    ?>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="checkOutbottom row">
                        <div class="cobc1 col-md-6">
                            <h3>Checkout Summery</h3>
                            <p class="primaryParagraph">Lorem ipsum dolor sit amet,Lorem ipsumdolor sit amet Lorem ipsum dolor sit amet,Lorem ipsumdolor sit amet Lorem ipsum dolor sit amet,</p>
                            <p class="copanh">Have a copan code ? </p>
                            <div class="contactfeilds">
                                <form>
                                    <input class="contactInput" type="email" placeholder="Please enter your Copan Code">
                                    <button class="btnStyle"><i class="fa fa-arrow-right"></i></button>
                                </form>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="totalPrice">
                                <div class="thp row">
                                    <div class="col-md-6 col-sm-6 col-xs-6">
                                        <div class="th">Sub total</div>
                                        <div class="th">Tax</div>
                                    </div>
                                    <div class="col-md-6 col-sm-6 col-xs-6">
                                        <div class="th2"><?php echo $value['Item_total_Quantity'] ?> Rs</div>
                                        <div class="th2"><?php echo $tax ?> Rs</div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="divider"></div>
                                    </div>
                                </div>
                                <div class="thp row">
                                    <div class="col-md-6 col-sm-6 col-xs-6">
                                        <div class="th">Total</div>
                                    </div>
                                    <div class="col-md-6 col-sm-6 col-xs-6">
                                        <div class="th2"><?php echo $value['Item_total_Quantity'] + $tax ?> Rs</div>
                                    </div>
                                </div>
                                <div class="chr row">
                                    <div class="col-md-12">
                                        <a href="" class="btnStyle">Check Out</a>
                                    </div>
                                </div>
                                <div class="chr row">
                                    <div class="chrh col-md-12 text-center">
                                        <a href="" class="chra">Continue Shopping</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- product end -->

    <?php include("footer.php") ?>
<?php } else {
    echo "
    <script>
        alert('There is no item in checkout');
        window.location.href='shop.php';
    </script>";
} ?>