<?php
include("../pages/backend/connecter.php");
session_start();
if (isset($_SESSION['admin']) && $_SESSION['admin'] != "") {
    $id = $operations->escape_string($_GET['pid']);
    $result = $operations->getData(Queries::$getProductByPId . $id);
    $resultCategories = $operations->getData(Queries::$getAllCategories);

    foreach ($result as $value) {
        $name = $value['name'];
        $description = $value['description'];
        $price = $value['price'];
        $quantity = $value['quantity'];
    }
?>

    <?php include("header.php") ?>
    <?php
        if (isset($_SESSION['error']) && $_SESSION['error'] != "") {
            echo $_SESSION['error'];
            unset($_SESSION['error']);
        } elseif (isset($_SESSION['success']) && $_SESSION['success'] != "") {
            echo $_SESSION['success'];
            unset($_SESSION['success']);
        }
    ?>
    <form action="./backend/update_inserted_product_backend.php" method="POST" enctype="multipart/form-data">
        <input type="hidden" name="pid" value="<?php echo $id; ?>">
        <input value="<?php echo $name ?>" type="text" name="name" placeholder="Product Name" class="form-control"><br>
        <input value="<?php echo $description ?>" type="text" name="description" placeholder="Product Description" class="form-control"><br>
        <input value="<?php echo $price ?>" type="text" name="price" placeholder="Product Price" class="form-control"><br>
        <input value="<?php echo $quantity ?>" type="text" name="quantity" placeholder="Product Quantity" class="form-control"><br>
        <select name="categories" class="form-control">
            <option hidden="true">Select Categories</option>
            <?php
            foreach ($resultCategories as $value) {
                echo "<option value='" . $value['cid'] . "'>" . $value['cname'] . "</option>";
            }
            ?>
        </select><br>
        <input type="file" name="images[]" multiple><br>
        <button type="submit" class="btnStyle" name="upload">Upload</button>
        </div>
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