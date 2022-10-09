<?php
include("../pages/backend/connecter.php");
session_start();
if (isset($_SESSION['admin']) && $_SESSION['admin'] != "") {
    $productResult = $operations->getData(Queries::$getTotalProducts);
    $userResult = $operations->getData(Queries::$getTotalUsers);
    $orderResult = $operations->getData(Queries::$getTotalOrders);
    $contactResult = $operations->getData(Queries::$getTotalContact);
    $tempUserOrders = $operations->getData(Queries::$getTotalTempUserOrders);
    $activeProducts = $operations->getData(Queries::$getTotalActiveProducts);
    $InActiveProducts = $operations->getData(Queries::$getTotalInactiveProducts);
    $activeUsers = $operations->getData(Queries::$getTotalActiveUsers);
    $inactiveUsers = $operations->getData(Queries::$getTotalInactiveUsers);
    $activeCategory = $operations->getData(Queries::$getTotalActiveCategories);
    $InActiveCategory = $operations->getData(Queries::$getTotalInactiveCategories);
    $tax = $operations->getData(Queries::$getTax);
?>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css" />
    <?php include("header.php") ?>
    <div class="container">
        <?php
        if (isset($_SESSION['error']) && $_SESSION['error'] != "") {
            echo $_SESSION['error'];
            unset($_SESSION['error']);
        } elseif (isset($_SESSION['success']) && $_SESSION['success'] != "") {
            echo $_SESSION['success'];
            unset($_SESSION['success']);
        }
        ?>
        <h1 class="dbheading text-center"><b>DASHBOARD</b></h1>
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-3">
                    <div class="card-counter primary">
                        <i class="fa fa-shopping-basket" aria-hidden="true"></i>
                        <span class="count-numbers"><?php echo ($productResult[0]['countProduct']); ?></span>
                        <span class="count-name">Products</span>
                    </div>
                </div>

                <div class="col-md-3">
                    <div class="card-counter info">
                        <i class="fa fa-shopping-bag"></i>
                        <span class="count-numbers"><?php echo ($activeProducts[0]['activeProducts']) ?></span>
                        <span class="count-name">Active Products</span>
                    </div>
                </div>

                <div class="col-md-3">
                    <div class="card-counter danger">
                        <i class="fa fa-shopping-bag"></i>
                        <span class="count-numbers"><?php echo ($InActiveProducts[0]['inactiveproducts']) ?></span>
                        <span class="count-name">In Active Products</span>
                    </div>
                </div>

                <div class="col-md-3">
                    <div class="card-counter info">
                        <i class="fa fa-users"></i>
                        <span class="count-numbers"><?php echo ($userResult[0]['countUsers']); ?></span>
                        <span class="count-name">Users</span>
                    </div>
                </div>

                <div class="col-md-3">
                    <div class="card-counter success">
                        <i class="fa fa-user"></i>
                        <span class="count-numbers"><?php echo ($activeUsers[0]['activeUsers']) ?></span>
                        <span class="count-name">Active Users</span>
                    </div>
                </div>

                <div class="col-md-3">
                    <div class="card-counter danger">
                        <i class="fa fa-user-times"></i>
                        <span class="count-numbers"><?php echo ($inactiveUsers[0]['inactiveUsers']) ?></span>
                        <span class="count-name">In Active Users</span>
                    </div>
                </div>

                <div class="col-md-3">
                    <div class="card-counter info">
                        <i class="fa fa-envelope"></i>
                        <span class="count-numbers"><?php echo ($contactResult[0]['countContact']) ?></span>
                        <span class="count-name">Inbox</span>
                    </div>
                </div>

                <div class="col-md-3">
                    <div class="card-counter success">
                        <i class="fa fa-shopping-cart"></i>
                        <span class="count-numbers"><?php echo ($orderResult[0]['countOrder']) ?></span>
                        <span class="count-name">User Orders</span>
                    </div>
                </div>

                <div class="col-md-3">
                    <div class="card-counter danger">
                        <i class="fa fa-shopping-bag" aria-hidden="true"></i>
                        <span class="count-numbers"><?php echo ($tempUserOrders[0]['countTempUserOrders']) ?></span>
                        <span class="count-name">Temp Orders</span>
                    </div>
                </div>

                <div class="col-md-3">
                    <div class="card-counter primary">
                        <i class="fa fa-bars" aria-hidden="true"></i>
                        <span class="count-numbers"><?php echo ($activeCategory[0]['activeCategories']); ?></span>
                        <span class="count-name">Active Categories</span>
                    </div>
                </div>

                <div class="col-md-3">
                    <div class="card-counter danger">
                        <i class="fa fa-bars" aria-hidden="true"></i>
                        <span class="count-numbers"><?php echo ($InActiveCategory[0]['inactiveCategories']); ?></span>
                        <span class="count-name">InActive Categories</span>
                    </div>
                </div>

                <div class="col-md-3">
                    <div class="card-counter success">
                        <i class="fa fa-money" aria-hidden="true"></i>
                        <span class="count-numbers"><?php echo ($tax[0]['TAX']); ?></span>
                        <span class="count-name">Current TAX</span>
                    </div>
                </div>
            </div>

            <?php include("data_visualization.php") ?>
        </div>

        <?php include("footer.php") ?>
    <?php
} else {
    echo "
<script>
    window.location.href='login.php';
</script>";
}
    ?>