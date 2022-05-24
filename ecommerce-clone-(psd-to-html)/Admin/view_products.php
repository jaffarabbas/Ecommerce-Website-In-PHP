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
                echo "<td><img src='" . json_decode($value['fimage'], true) . "' alt='" . $value['name'] . "' height='50px' width='50px'></td>";
                echo "<td><a class='btnStyle' data-toggle='modal' data-target='#editProduct'" . $value['pid'] . "'>Edit</a></td>";
                echo "<td><a class='btnStyleDelete' href='delete_product.php?id=" . $value['pid'] . "'>Delete</a></td>";
                echo "</tr>";


                echo "<div class='modal fade' id='editProduct'" . $value['pid'] . "'' tabindex='-1' role='dialog' aria-labelledby='editProductLabel' aria-hidden='true'>
                    <div class='modal-dialog' role='document'>
                        <div class='modal-content'>
                        <div class='modal-header'>
                            <h2 class='modal-title' id='editProductLabel'>Update Product "?><?php echo $value['name'] ?><?php echo "</h2>
                            <button type='button' class='close' data-dismiss='modal' aria-label='Close'>
                            <span aria-hidden='true'>&times;</span>
                            </button>
                        </div>
                        <div class='modal-body'>
                            " ?>
                                <form action="./backend/update_inserted_product_backend.php" method="POST" enctype="multipart/form-data">
                                    <input value="<?php echo $value['name'] ?>" type="text" name="name" placeholder="Product Name" class="form-control"><br>
                                    <input value="<?php echo $value['description'] ?>" type="text" name="description" placeholder="Product Description" class="form-control"><br>
                                    <input value="<?php echo $value['price'] ?>" type="text" name="price" placeholder="Product Price" class="form-control"><br>
                                    <input value="<?php echo $value['quantity'] ?>" type="text" name="quantity" placeholder="Product Quantity" class="form-control"><br>
                                    <select name="categories" class="form-control">
                                        <option hidden="true">Select Categories</option>
                                        <?php
                                        foreach ($resultCategories as $value) {
                                            echo "<option value='" . $value['cid'] . "'>" . $value['cname'] . "</option>";
                                        }
                                        ?>
                                    </select><br>
                                    <input type="file" name="images[]" multiple><br>
                                    <button type="submit" class="btnStyle" > Upload</button>
                                    </div>
                                    <div id='modelBtn' class='modal-footer'>
                                        <button style='position:relative; margin:0;' type='button' class='btnStyle' data-dismiss='modal'>Close</button>
                                        <button type='submit' style='position:relative; margin:0;' class='btnStyle' name="upload">Save changes</button>
                                    </div>
                                 </form> <?php echo "
                        </div>
                    </div>
                </div>";
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