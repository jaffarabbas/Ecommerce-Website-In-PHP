<?php
// include("../pages/backend/connecter.php");
// session_start();
// if (isset($_SESSION['admin']) && $_SESSION['admin'] != "") { 

$productByCategories = $operations->getData(Queries::$DougnetProductByCategories);
$productCountByCategories = $operations->getData(Queries::$CountTotalProductsByCategories);
$sumOfQuantity = $operations->getData(Queries::$CountSumOfQuantityProductsByCategories);
$orderGraph = $operations->getData(Queries::$LineGrapghOfOrder);
$orderTempGraph = $operations->getData(Queries::$LineGrapghOfTempOrder);

foreach ($productByCategories as $value) {
    $productByCategoriesArray[] = $value['prsum'];
}
//product count by category
foreach ($productCountByCategories as $value) {
    $productCountByCategoriesArray[] = $value['countProduct'];
}
//sum of quantity by category
foreach ($sumOfQuantity as $value) {
    $sumOfQuantityArray[] = $value['countQuantity'];
}
//line graph
foreach ($orderGraph as $value) {
    $orderGraphArray[] = $value['order'];
    $DateGraphArray[] = $value['created_at'];
}
//line temp graph
foreach ($orderTempGraph as $value) {
    $orderTempGraphArray[] = $value['order'];
    $DateTempGraphArray[] = $value['created_at'];
}

//set total orders prices
foreach ($orderGraphArray as $value) {
    $totalOrdersPrices += $value;
}
//prfit
$profitOfUserOrder = $totalOrdersPrices / 10;

//set total temp orders prices
foreach ($orderTempGraphArray as $value) {
    $totalTempOrdersPrices += $value;
}
//prfit
$profitOfTempUserOrder = $totalTempOrdersPrices / 10;
?>

<div class="chartCard row">
    <div class="col-md-4">
        <div class="chart">
            <canvas id="myChart1"></canvas>
            <h4><b>Product Cost By Category</b></h4>
        </div>
    </div>
    <div class="col-md-4">
        <div class="chart">
            <canvas id="myChart2"></canvas>
            <h4><b>Product By Category</b></h4>
        </div>
    </div>
    <div class="col-md-4">
        <div class="chart">
            <canvas id="myChart3"></canvas>
            <h4><b>Quantity By Category</b></h4>
        </div>
    </div>
    <div class="col-md-8">
        <div class="chart">
            <canvas id="myChart4"></canvas>
            <h4><b>User Orders</b></h4>
        </div>
    </div>
    <div class="col-md-4">
        <div class="chart">
            <h1><b>ORDER INFO</b></h1>
            <h4><b>TOTAL PRODUCT PRICE</b></h4>
            <h1><b><?php echo $totalOrdersPrices ?> Rs</b></h1>
            <h4><b>TOTAL PRODUCT PROFIT</b></h4>
            <h1><b><?php echo $profitOfUserOrder ?> Rs</b></h1>
        </div>
    </div>
    <div class="col-md-8">
        <div class="chart">
            <canvas id="myChart5"></canvas>
            <h4><b>Temp User Orders</b></h4>
        </div>
    </div>
    <div class="col-md-4">
        <div class="chart">
            <h1><b>ORDER INFO</b></h1>
            <h4><b>TOTAL PRODUCT PRICE</b></h4>
            <h1><b><?php echo $totalTempOrdersPrices ?> Rs</b></h1>
            <h4><b>TOTAL PRODUCT PROFIT</b></h4>
            <h1><b><?php echo $profitOfTempUserOrder ?> Rs</b></h1>
        </div>
    </div>
</div>


<script src="../vendor/js/chart.js"></script>
<script>
    var dataForBar = <?php echo json_encode($productByCategoriesArray); ?>;
    var dataForBar2 = <?php echo json_encode($productCountByCategoriesArray); ?>;
    var dataForBar3 = <?php echo json_encode($sumOfQuantityArray); ?>;
    var dataForLine = <?php echo json_encode($orderGraphArray); ?>;
    var dataForLine2 = <?php echo json_encode($DateGraphArray); ?>;
    var dataForLine3 = <?php echo json_encode($orderTempGraphArray); ?>;
    var dataForLine4 = <?php echo json_encode($DateTempGraphArray); ?>;

    const ctx1 = document.getElementById('myChart1').getContext('2d');
    const ctx2 = document.getElementById('myChart2').getContext('2d');
    const ctx3 = document.getElementById('myChart3').getContext('2d');
    const ctx4 = document.getElementById('myChart4').getContext('2d');
    const ctx5 = document.getElementById('myChart5').getContext('2d');

    const myChart1 = new Chart(ctx1, {
        type: 'doughnut',
        data: {
            labels: [
                'Category 1',
                'Category 2',
                'Category 3'
            ],
            datasets: [{
                label: 'Total price of products by categories',
                data: dataForBar,
                backgroundColor: [
                    'rgb(255, 99, 132)',
                    'rgb(54, 162, 235)',
                    'rgb(255, 205, 86)'
                ],
                hoverOffset: 4
            }]
        },
    });
    const myChart2 = new Chart(ctx2, {
        type: 'doughnut',
        data: {
            labels: [
                'Category 1',
                'Category 2',
                'Category 3'
            ],
            datasets: [{
                label: 'Total products by categories',
                data: dataForBar2,
                backgroundColor: [
                    'rgb(255, 99, 132)',
                    'rgb(54, 162, 235)',
                    'rgb(255, 205, 86)'
                ],
                hoverOffset: 4
            }]
        },
    });
    const myChart3 = new Chart(ctx3, {
        type: 'doughnut',
        data: {
            labels: [
                'Category 1',
                'Category 2',
                'Category 3'
            ],
            datasets: [{
                label: 'Total quantity of products by categories',
                data: dataForBar3,
                backgroundColor: [
                    'rgb(255, 99, 132)',
                    'rgb(54, 162, 235)',
                    'rgb(255, 205, 86)'
                ],
                hoverOffset: 4
            }]
        },
    });
    const myChart4 = new Chart(ctx4, {
        type: 'line',
        data: {
            labels: dataForLine2,
            datasets: [{
                label: 'User Order Graph Per Day',
                data: dataForLine,
                fill: true,
                borderColor: 'rgb(255, 99, 132)',
                tension: 0.1,
                segment: {
                    backgroundColor: 'rgb(255, 205, 86)',
                },
            }]
        },
    });
    //line temp
    const myChart5 = new Chart(ctx5, {
        type: 'line',
        data: {
            labels: dataForLine4,
            datasets: [{
                label: 'User Order Graph Per Day',
                data: dataForLine3,
                fill: true,
                borderColor: 'rgb(255, 205, 86)',
                tension: 0.1,
                segment: {
                    backgroundColor: 'rgb(255, 99, 132)',
                },
            }]
        },
    });
</script>