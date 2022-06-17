<?php
include("../pages/backend/connecter.php");
session_start();
if (isset($_SESSION['admin']) && $_SESSION['admin'] != "") {
    $result = $operations->getData(Queries::$getAllOrdersFromOrderView);
?>
    <?php include("header.php") ?>

    <h1>All Products</h1>
    <?php
    if (isset($_SESSION['error']) && $_SESSION['error'] != "") {
        echo $_SESSION['error'];
        unset($_SESSION['error']);
    } elseif (isset($_SESSION['success']) && $_SESSION['success'] != "") {
        echo $_SESSION['success'];
        unset($_SESSION['success']);   
    }
    ?>
    <table id="orderTable" style="overflow-x: scroll;">
        <thead>
            <tr>
                <th>Order ID</th>
                <th>User Id</th>
                <th>Username</th>
                <th>email</th>
                <th>uid</th>
                <th>iid</th>
                <th>Order Quantity</th>
                <th>Total Price</th>
                <th>Order Status</th>
                <th>Order Date</th>
                <th>Product Id</th>
                <th>Product Name</th>
                <th>Product Image</th>
                <th>Product Price</th>
                <th>Product Inventory</th>
                <th>Product Category</th>
            </tr>
        </thead>
        <tbody>
            <?php
            foreach ($result as $value) {
                echo "<tr>";
                echo "<td>" . $value['oid'] . "</td>";
                echo "<td>" . $value['user_id'] . "</td>";
                echo "<td>" . $value['user_name'] . "</td>";
                echo "<td>" . $value['email'] . "</td>";
                echo "<td>" . $value['uid'] . "</td>";
                echo "<td>" . $value['iid'] . "</td>";
                echo "<td>" . $value['order_quantity'] . "</td>";
                echo "<td>" . $value['total_price'] . "</td>";
                echo "<td>". Component::tick($value['uo_status']) ."</td>";
                echo "<td>" . $value['order_created_at'] . "</td>";
                echo "<td>" . $value['product_id'] . "</td>";
                echo "<td>" . $value['name'] . "</td>";
                echo "<td><img src='" . json_decode($value['image'], true) . "' alt='" . $value['name'] . "' height='50px' width='50px'></td>";
                echo "<td>" . $value['price'] . "</td>";
                echo "<td>" . $value['inventory'] . "</td>";
                echo "<td>" . $value['category'] . "</td>";
                echo "</tr>";
            } ?>
        </tbody>
    </table>
    <?php include("footer.php") ?>
<?php
} else {
    Component::navigator("login.php");
}
?>