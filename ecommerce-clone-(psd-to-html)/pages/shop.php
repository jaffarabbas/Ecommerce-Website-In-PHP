<?php

include_once("./backend/connecter.php");

//extact data with respect to categories
$result1 = $operations->getData(Queries::$getAllProductsByCategories . "1");
$result2 = $operations->getData(Queries::$getAllProductsByCategories . "2");
$result3 = $operations->getData(Queries::$getAllProductsByCategories . "3");

?>

<?php include("header.php") ?>

<!-- banner start -->
<section class="shop_banner">
    <div class="container">
        <div class="row mini_banner_row">
            <div class="col-md-6 col-md-offset-3">
                <div class="mini_banner_center text-center">
                    <h1>Shop</h1>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- banner end -->

<!-- product start -->
<section class="productPage">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="productHeader">
                    <h3 class="primaryHeading">Product</h3>
                    <h1 class="secondaryHeading">Our Product</h1>
                    <p class="primaryParagraph">
                        Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
                    </p>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="shopmenu">
                    <a data-toggle="tab" href="#shpprcr1" class="active btnStyle">Latest Products</a>
                    <a data-toggle="tab" href="#shpprcr2" class="btnStyle">Our Premium</a>
                    <a data-toggle="tab" href="#shpprcr3" class="btnStyle">Artifical Products</a>
                </div>
            </div>
        </div>
        <div class="tab-content">
            <div id="shpprcr1" class="tab-pane fade in active">
                <div class="row prrow">
                    <?php foreach ($result1 as $keys => $value) { ?>
                        <div class="col-md-3 col-sm-6 col-xs-6">
                            <a href="productDetail.php?pid=<?php echo $value['pid']; ?>">
                                <img src="<?php echo json_decode($value['fimage'], true) ?>" alt="product pic 1" />
                                <p><?php echo $value['name'] . " Rs " . $value['price'] ?></p>
                            </a>
                        </div>
                    <?php } ?>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="pagination">
                            <a href="#">&laquo;</a>
                            <a href="#">1</a>
                            <a href="#">2</a>
                            <a href="#">3</a>
                            <a href="#" class="active">4</a>
                            <a href="#">5</a>
                            <a href="#">6</a>
                            <a href="#">&raquo;</a>
                        </div>
                    </div>
                </div>
            </div>
            <div id="shpprcr2" class="tab-pane fade">
                <div class="row prrow">
                    <?php foreach ($result2 as $keys => $value) { ?>
                        <div class="col-md-3 col-sm-6 col-xs-6">
                            <a href="productDetail.php?pid=<?php echo $value['pid']; ?>">
                                <img src="<?php echo json_decode($value['fimage'], true) ?>" alt="product pic 1" />
                                <p><?php echo $value['name'] . " Rs " . $value['price'] ?></p>
                            </a>
                        </div>
                    <?php } ?>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="pagination">
                            <a href="#">&laquo;</a>
                            <a href="#">1</a>
                            <a href="#">2</a>
                            <a href="#">3</a>
                            <a href="#" class="active">4</a>
                            <a href="#">5</a>
                            <a href="#">6</a>
                            <a href="#">&raquo;</a>
                        </div>
                    </div>
                </div>
            </div>
            <div id="shpprcr3" class="tab-pane fade">
                <div class="row prrow">
                    <?php foreach ($result3 as $keys => $value) { ?>
                        <div class="col-md-3 col-sm-6 col-xs-6">
                            <a href="productDetail.php?pid=<?php echo $value['pid']; ?>">
                                <img src="<?php echo json_decode($value['fimage'], true) ?>" alt="product pic 1" />
                                <p><?php echo $value['name'] . " Rs " . $value['price'] ?></p>
                            </a>
                        </div>
                    <?php } ?>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="pagination">
                            <a href="#">&laquo;</a>
                            <a href="#">1</a>
                            <a href="#">2</a>
                            <a href="#">3</a>
                            <a href="#" class="active">4</a>
                            <a href="#">5</a>
                            <a href="#">6</a>
                            <a href="#">&raquo;</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- product end -->

<?php include("footer.php") ?>