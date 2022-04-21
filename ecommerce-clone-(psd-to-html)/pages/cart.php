<?php include("header.php") ?>

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
                        <tr class="cart-table-row">
                            <div class="cartRow">
                                <td>
                                    <div class="price">
                                        <img class="priceImage" src="${imageSrc}" alt="product pic 1" />
                                        <p class="titleCart"></p>
                                    </div>
                                </td>
                                <td data-label="Price" class="tdp">
                                    <p class="priceCart"></p>
                                </td>
                                <td>
                                    <div class="cartQuantity">
                                        <a onclick="decrementer()">-</a>
                                        <p id="quantityInc"></p>
                                        <a onclick="incrementer()">+</a>
                                    </div>
                                </td>
                                <td>
                                    <p class="totalPriceCart"> Rs</p>
                                </td>
                                <td class="tdp">
                                    <i class="removeFromCart fa fa-trash"></i>
                                </td>
                            </div>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
        <div class="cartfooter row">
            <div class="col-md-12">
                <a href="checkout.html" class="checkOutFromCart btnStyle">Check Out</a>
                <div>
                    <p>Total : 930 Rs</p>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- product end -->

<?php include("footer.php") ?>