<?php include("header.php") ?>

<!-- banner start -->
<section class="shop_detials_banner">
    <div class="container">
        <div class="row mini_banner_row">
            <div class="col-md-6 col-md-offset-3">
                <div class="mini_banner_center text-center">
                    <h1>Product Details</h1>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- banner end -->

<!-- product start -->
<section class="productDetialsPage">
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <div class="imgDiv">
                    <div class="mainDetialImg slider slider-for">
                        <img id="productImage" src="../vendor/images/productPic1.png" alt="product pic 1">
                        <img src="../vendor/images/productPic2.png" alt="product pic 1">
                        <img src="../vendor/images/productPic3.png" alt="product pic 1">
                        <img src="../vendor/images/productPic4.png" alt="product pic 1" />
                    </div>
                    <div class="productMoreImages slider slider-nav">
                        <img src="../vendor/images/productPic1.png" alt="product pic 1" />
                        <img src="../vendor/images/productPic2.png" alt="product pic 1" />
                        <img src="../vendor/images/productPic3.png" alt="product pic 1" />
                        <img src="../vendor/images/productPic4.png" alt="product pic 1" />
                    </div>
                </div>

            </div>
            <div class="col-md-6">
                <div class="productdeitalsInfo">
                    <h3 id="prdName" class="primaryHeading">Round Neckless</h3>
                    <div class="rating">
                        <ul>
                            <li><i class="fa fa-star"></i></li>
                            <li><i class="fa fa-star"></i></li>
                            <li><i class="fa fa-star"></i></li>
                            <li><i class="fa fa-star"></i></li>
                            <li><i class="fa fa-star"></i></li>
                            <li><i class="fa fa-star"></i></li>
                        </ul>
                    </div>
                    <h1 id="prdPrice" class="secondaryHeading">300 Rs</h1>
                    <p class="primaryParagraph">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,</p>
                    <div class="quantity">
                        <div class="row">
                            <p>Quantity</p>
                            <a onclick="decrementer()">-</a>
                            <p id="quantityInc" class="incrementer">0</p>
                            <a onclick="incrementer()">+</a>
                        </div>
                    </div>
                    <div class="deliveryOptions">
                        <p class="primaryParagraph"><i class="fa fa-truck-moving"></i>&nbsp;&nbsp;Lorem ipsum dolor, sit amet consectetur</p>
                        <p class="primaryParagraph"><i class="fa fa-tags"></i>&nbsp;&nbsp;Lorem ipsum dolor, sit amet consectetur</p>
                    </div>
                    <button class="addIntoCart btnStyle">Shop Now</button>
                </div>
            </div>
        </div>
        <div class="detialsFooter">
            <div class="row">
                <div class="detialbtngrp col-md-12">
                    <a href="#dtab1" data-toggle="tab" class="btnStyle">Shop Now</a>
                    <a href="#dtab2" data-toggle="tab" class="btnStyle">Review</a>
                    <a href="#dtab3" data-toggle="tab" class="btnStyle">Additional Info</a>
                </div>
            </div>
            <div class="row">
                <div class="divdrow col-md-12">
                    <div class="divider"></div>
                </div>
            </div>
            <div class="row">
                <div class="btfcol12 col-md-12 tab-content">
                    <div id="dtab1" class="bottomparagraph tab-pane fade in active">
                        <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Tempore harum quaerat dolorem cum et, quis delectus quia, necessitatibus asperiores reiciendis, aliquid aperiam rem vero hic labore explicabo iusto illum doloribus amet?
                            Eius, harum itaque. Molestiae repellat non error exercitationem cum optio suscipit, saepe laboriosam recusandae reprehenderit labore aspernatur dignissimos repudiandae amet quia doloribus ratione eos eligendi iure itaque
                            facere, quasi nulla! Voluptate assumenda officiis quae ut! Atque similique debitis modi! Illo repellendus mollitia eligendi, assumenda iure reprehenderit qui ad aliquam molestias voluptate esse accusantium quos corporis
                            ratione exercitationem. Eaque cupiditate, molestias debitis fuga tempora assumenda dolores? Quia perferendis adipisci odit.</p>
                    </div>
                    <div id="dtab2" class="bottomparagraph tab-pane fade">
                        <p>2Lorem ipsum dolor sit amet consectetur, adipisicing elit. Tempore harum quaerat dolorem cum et, quis delectus quia, necessitatibus asperiores reiciendis, aliquid aperiam rem vero hic labore explicabo iusto illum doloribus amet?
                            Eius, harum itaque. Molestiae repellat non error exercitationem cum optio suscipit, saepe laboriosam recusandae reprehenderit labore aspernatur dignissimos repudiandae amet quia doloribus ratione eos eligendi iure itaque
                            facere, quasi nulla! Voluptate assumenda officiis quae ut! Atque similique debitis modi! Illo repellendus mollitia eligendi, assumenda iure reprehenderit qui ad aliquam molestias voluptate esse accusantium quos corporis
                            ratione exercitationem. Eaque cupiditate, molestias debitis fuga tempora assumenda dolores? Quia perferendis adipisci odit.</p>
                    </div>
                    <div id="dtab3" class="bottomparagraph tab-pane fade">
                        <p>3Lorem ipsum dolor sit amet consectetur, adipisicing elit. Tempore harum quaerat dolorem cum et, quis delectus quia, necessitatibus asperiores reiciendis, aliquid aperiam rem vero hic labore explicabo iusto illum doloribus amet?
                            Eius, harum itaque. Molestiae repellat non error exercitationem cum optio suscipit, saepe laboriosam recusandae reprehenderit labore aspernatur dignissimos repudiandae amet quia doloribus ratione eos eligendi iure itaque
                            facere, quasi nulla! Voluptate assumenda officiis quae ut! Atque similique debitis modi! Illo repellendus mollitia eligendi, assumenda iure reprehenderit qui ad aliquam molestias voluptate esse accusantium quos corporis
                            ratione exercitationem. Eaque cupiditate, molestias debitis fuga tempora assumenda dolores? Quia perferendis adipisci odit.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- product end -->

<?php include("footer.php") ?>