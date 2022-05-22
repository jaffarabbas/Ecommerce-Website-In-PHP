<?php
include("../pages/backend/connecter.php");
session_start();

if (isset($_SESSION['admin']) && $_SESSION['admin'] != "") {
    $result = $operations->getData(Queries::$getAllCategories);
?>
    <?php include("header.php") ?>

    <h1 class="text-center">Insert Products</h1>
    <?php
    if (isset($_SESSION['error']) && $_SESSION['error'] != "") {
        echo $_SESSION['error'];
        unset($_SESSION['error']);
    } elseif (isset($_SESSION['success']) && $_SESSION['success'] != "") {
        echo $_SESSION['success'];
        unset($_SESSION['success']);
    }
    ?>
    <form action="./backend/insert_product_backend.php" method="POST" enctype="multipart/form-data">
        <input type="text" name="name" placeholder="Product Name" class="form-control"><br>
        <input type="text" name="description" placeholder="Product Description" class="form-control"><br>
        <input type="text" name="price" placeholder="Product Price" class="form-control"><br>
        <input type="text" name="quantity" placeholder="Product Quantity" class="form-control"><br>
        <select name="categories" class="form-control">
            <option hidden="true">Select Categories</option>
            <?php
            foreach ($result as $value) {
                echo "<option value='" . $value['cid'] . "'>" . $value['cname'] . "</option>";
            }
            ?>
        </select><br>
        <input type="file" name="images[]" multiple><br>
        <button type="submit" class="btnStyle" name="upload"> Upload</button>
    </form>

    <?php include("footer.php") ?>
<?php
} else {
    echo "
<script>
    window.location.href='login.php';
</script>";
}
?>