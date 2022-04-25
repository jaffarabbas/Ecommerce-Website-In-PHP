<?php
include_once("./backend/connecter.php");

$id = $operations->escape_string($_GET['pid']);
$result = $operations->getData(Queries::$getProductByPId . $id);

foreach ($result as $value) {
    $id = $value['pid'];
    $name = $value['name'];
    $description = $value['description'];
    $price = $value['price'];
    $image = json_decode($value['image'], true);
    $quantity = $value['quantity'];
    $rating = $value['rating'];
    $cid = $value['cid'];
}
?>

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
            <form action="./backend/manageCart.php" method="POST">
                <div class="col-md-6">
                    <div class="imgDiv">
                        <div class="mainDetialImg slider slider-for">
                            <?php
                            foreach ($image as $img) { ?>
                                <img src="<?php echo $img ?>" alt="product pic 1" />
                            <?php } ?>
                        </div>
                        <div class="productMoreImages slider slider-nav">
                            <?php
                            foreach ($image as $img) { ?>
                                <img src="<?php echo $img ?>" alt="product pic 1" />
                            <?php } ?>
                        </div>
                    </div>

                </div>
                <div class="col-md-6">
                    <div class="productdeitalsInfo">
                        <h3 id="prdName" class="primaryHeading"><?php echo $name ?></h3>
                        <div class="rating">
                            <ul>
                                <?php
                                for ($i = 0; $i < $rating; $i++) {
                                    echo "<li><i class='fa fa-star'></i></li>";
                                }
                                ?>
                            </ul>
                        </div>
                        <h1 id="prdPrice" class="secondaryHeading"><?php echo $price ?> Rs</h1>
                        <p class="primaryParagraph"><?php echo $description ?></p>
                        <div class="quantity">
                            <div class="row">
                                <p>Quantity</p>
                                <a onclick="decrementer(<?php echo $id ?>)">-</a>
                                <input class="incrementer" onchange="inputValue()" type="text" id="quantityInc_<?php echo $id ?>" name="quantity" value="1" />
                                <!-- <p class="incrementer" id="quantityInc" name="quantity">0</p> -->
                                <a onclick="incrementer(<?php echo $id ?>)">+</a>
                            </div>
                        </div>
                        <div class="deliveryOptions">
                            <p class="primaryParagraph"><i class="fa fa-truck-moving"></i>&nbsp;&nbsp;Lorem ipsum dolor, sit amet consectetur</p>
                            <p class="primaryParagraph"><i class="fa fa-tags"></i>&nbsp;&nbsp;Lorem ipsum dolor, sit amet consectetur</p>
                        </div>
                        <?php if (isset($_SESSION['user']) && $_SESSION['user'] != "") { ?>
                            <button name="shopNow" type="submit" class="addIntoCart btnStyle">Shop Now</button>
                        <?php
                        } else { ?>
                            <a href="login.php" class="addIntoCart btnStyle">Shop Now</a>
                        <?php } ?>
                    </div>
                    <!-- data from feilds -->
                    <input type="hidden" name="pid" value="<?php echo $id ?>">
                    <input type="hidden" name="name" value="<?php echo $name ?>">
                    <input type="hidden" name="description" value="<?php echo $description ?>">
                    <input type="hidden" name="price" value="<?php echo $price ?>">
                    <input type="hidden" name="cid" value="<?php echo $cid ?>">
                    <input type="hidden" name="image" value="<?php echo $image[0] ?>">
                </div>
            </form>
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