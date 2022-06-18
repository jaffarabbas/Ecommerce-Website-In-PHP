<?php
// include("../pages/backend/connecter.php");
// session_start();
// if (isset($_SESSION['admin']) && $_SESSION['admin'] != "") { 

$productByCategories = $operations->getData(Queries::$DougnetProductByCategories);
$productCountByCategories = $operations->getData(Queries::$CountTotalProductsByCategories);
$sumOfQuantity = $operations->getData(Queries::$CountSumOfQuantityProductsByCategories);
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
    </div>


<script src="../vendor/js/chart.js"></script>
<script>
    var dataForBar = <?php echo json_encode($productByCategoriesArray); ?>;
    var dataForBar2 = <?php echo json_encode($productCountByCategoriesArray); ?>;
    var dataForBar3 = <?php echo json_encode($sumOfQuantityArray); ?>;
    const ctx1 = document.getElementById('myChart1').getContext('2d');
    const ctx2 = document.getElementById('myChart2').getContext('2d');
    const ctx3 = document.getElementById('myChart3').getContext('2d');
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
</script>