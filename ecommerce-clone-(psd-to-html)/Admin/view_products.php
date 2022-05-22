<?php
include("../pages/backend/connecter.php");
session_start();
if (isset($_SESSION['admin']) && $_SESSION['admin'] != "") { 
    $result = $operations->getData(Queries::$getAllProducts);
    ?>
<?php include("header.php") ?>

<h1>All Products</h1>

<table id="productTable">
    <thead>
        <tr>
            <th>Name</th>
            <th>Description</th>
            <th>Price</th>
            <th>Quantity</th>
            <th>Category</th>
            <th>Image</th>
            <th>Edit</th>
            <th>Delete</th>
        </tr>
    </thead>
    <tbody>
        <?php
        foreach ($result as $value) {
            echo "<tr>";
            echo "<td>" . $value['name'] . "</td>";
            echo "<td>" . $value['description'] . "</td>";
            echo "<td>" . $value['price'] . "</td>";
            echo "<td>" . $value['quantity'] . "</td>";
            echo "<td>" . $value['cid'] . "</td>";
            echo "<td><img src='" . json_decode($value['fimage'], true) . "' alt='" . $value['name'] . "' height='50px' width='50px'></td>";
            echo "<td><a class='btnStyle' href='edit_product.php?id=" . $value['pid'] . "'>Edit</a></td>";
            echo "<td><a class='btnStyleDelete' href='delete_product.php?id=" . $value['pid'] . "'>Delete</a></td>";
            echo "</tr>";
        }?>
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