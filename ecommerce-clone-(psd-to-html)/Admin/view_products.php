<?php
include("../pages/backend/connecter.php");
session_start();
if (isset($_SESSION['admin']) && $_SESSION['admin'] != "") {
    $result = $operations->getData(Queries::$getAllProducts);
    $resultCategories = $operations->getData(Queries::$getAllCategories);
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
    <table id="productTable">
        <thead>
            <tr>
                <th>Sno</th>
                <th>Name</th>
                <th>Description</th>
                <th>Price</th>
                <th>Quantity</th>
                <th>Category</th>
                <th>Status</th>
                <th>Image</th>
                <th>Edit</th>
                <th>Delete</th>
            </tr>
        </thead>
        <tbody>
            <?php
            foreach ($result as $value) {
                echo "<tr>";
                echo "<td>" . $value['pid'] . "</td>";
                echo "<td>" . $value['name'] . "</td>";
                echo "<td>" . $value['description'] . "</td>";
                echo "<td>" . $value['price'] . "</td>";
                echo "<td>" . $value['quantity'] . "</td>";
                echo "<td>" . $value['cid'] . "</td>";
                echo "<td>". Component::tick($value['status']) ."</td>";
                echo "<td><img src='" . json_decode($value['fimage'], true) . "' alt='" . $value['name'] . "' height='50px' width='50px'></td>";
                echo "<td><a class='btnStyle' href='update_products.php?pid=".$value['pid']."'>Edit</a></td>";
                echo "<td><a class='btnStyleDelete' href='backend/delete_product_backend.php?id=" . $value['pid'] . "' onclick='return confirm('Are you sure you want to delete this item?');'>Delete</a></td>";
                echo "</tr>";
                    } ?>
        </tbody>
    </table>
    <?php include("footer.php") ?>
<?php
} else {
    echo "
<script>
    window.location.href='login.php';
</script>";
}
?>