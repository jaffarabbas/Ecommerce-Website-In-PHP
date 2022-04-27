<?php
session_start();
if (isset($_SESSION['admin']) && $_SESSION['admin'] != "") { ?>
    <?php include("header.php") ?>

    <h1 class="text-center">Insert Products</h1>
    <form action="./backend/insert_product_backend.php" method="POST" enctype="multipart/form-data">
        <input type="file" name="images[]" multiple>
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