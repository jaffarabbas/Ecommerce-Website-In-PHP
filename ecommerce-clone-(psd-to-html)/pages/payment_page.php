<?php 
include("header.php");
?>
<!-- banner start -->
<section class="about_banner">
    <div class="container">
        <!-- col-sm-6 col-sm-offset-2 col-xs-6 col-xs-offset-1 -->
        <div class="row mini_banner_row">
            <div class="col-md-6 col-md-offset-3">
                <div class="mini_banner_center text-center">
                    <h1>Payment Page</h1>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- banner end -->

<!-- about start -->
<section class="payment">
    <div class="container">
        <div class="row">
            <div class="col-md-12 text-center">
                <h1 class="secondaryHeading">Confirm payment</h1>
                <p class="primaryParagraph">Do you want to confirm your order your total bill is <b><?php 
                if(isset($_SESSION['order_items']) && $_SESSION['order_items'] != null) { 
                    echo $_SESSION['order_items'][0]['total_price'];
                }else {
                    echo "NO ORDER";
                }?></b></p>
                <form action="./backend/order_backend.php" method="POST" class="paymentForm">
                    <input type="submit" name="confirmPayment" value="Confirm Order" class="btnStyle"/>
                </form>
            </div>
        </div>
    </div>
</section>
<!-- about end -->
<!-- contact end -->
<?php include("footer.php") ?>