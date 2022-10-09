<?php

include("../../pages/backend/connecter.php");

$id = $_GET['id'];

$statement = $operations->queryStatement(Queries::$deleteProducts);
if ($statement) {
    mysqli_stmt_bind_param($statement, "i", $id);
    $result = mysqli_stmt_execute($statement);
    if ($result) {
        $_SESSION['success'] = Component::successAlert("Success Message", "Product Deleted Successfully");
        Component::navigator("../view_products.php");
    } else {
        $_SESSION['error'] = Component::dangerAlert("validation Message", "Something went wrong");
        Component::navigator("../view_products.php");
    }
} else {
    $_SESSION['error'] = Component::dangerAlert("validation Message", "Something went wrong");
    Component::navigator("../view_products.php");
}
