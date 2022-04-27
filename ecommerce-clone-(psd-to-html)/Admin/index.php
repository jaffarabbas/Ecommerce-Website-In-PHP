<?php
session_start();
if (isset($_SESSION['admin']) && $_SESSION['admin'] != "") { ?>
<?php include("header.php") ?>

<?php include("footer.php") ?>
<?php
} else {
    echo "
<script>
    window.location.href='login.php';
</script>";
}
?>