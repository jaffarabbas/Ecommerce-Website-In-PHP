<?php


include("../../pages/backend/connecter.php");
session_start();
$validation = new Validation();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_POST['upload'])) {
        $id = $validation->validate(($operations->escape_string($_POST['pid'])));
        $name = $validation->validate(($operations->escape_string($_POST['name'])));
        $description = $validation->validate(($operations->escape_string($_POST['description'])));
        $price = $validation->validate(($operations->escape_string($_POST['price'])));
        $quantity = $validation->validate(($operations->escape_string($_POST['quantity'])));
        $categories = $validation->validate(($operations->escape_string($_POST['categories'])));
        $images = $_FILES['images'];
        $imageArray = [];
        $checkFeilds = $validation->checkEmpty($_POST, array('name', 'description', 'price', 'quantity', 'categories'));
        if ($checkFeilds) {
            $_SESSION['error'] = Component::dangerAlert("validation Message", "Please fill all the fields");
            Component::navigator("../view_products.php");
        } else {
            foreach ($_FILES['images']['tmp_name'] as $key => $value) {
                $filename = $_FILES['images']['name'][$key];
                $filename_tmp = $_FILES['images']['tmp_name'][$key];
                $fileExtension = pathinfo($filename, PATHINFO_EXTENSION);
                $finalimg = '';
                if (in_array($fileExtension, Validation::$extension)) {
                    if (!file_exists(Routes::LinkMaker(Routes::$parameterDoubleDot, Routes::$imagesFolder) . $filename)) {
                        move_uploaded_file($filename_tmp, Routes::LinkMaker(Routes::$parameterDoubleDot, Routes::$imagesFolder) . $filename);
                        $finalimg = $filename;
                        array_push($imageArray, Routes::LinkMaker(Routes::$parameterDoubleDot, Routes::$backendImageToShop . $finalimg));
                    } else {
                        $filename = str_replace('.', '-', basename($filename, $fileExtension));
                        $newfilename = $filename . time() . "." . $fileExtension;
                        move_uploaded_file($filename_tmp, Routes::LinkMaker(Routes::$parameterDoubleDot, Routes::$imagesFolder) . $newfilename);
                        $finalimg = $newfilename;
                        array_push($imageArray, Routes::LinkMaker(Routes::$parameterDoubleDot, Routes::$backendImageToShop . $finalimg));
                    }
                } else {
                    $_SESSION['error'] = Component::dangerAlert("validation Message", "Something went wrong");
                    Component::navigator("../view_products.php");
                }
            }
            $statement = $operations->queryStatement(Queries::$updateProducts);
            if ($statement) {
                $imgString = '["' . implode('","', $imageArray) . '"]';
                mysqli_stmt_bind_param($statement, "ssdsiii", $name, $description, $price, $imgString, $quantity, $categories, $id);
                $result = mysqli_stmt_execute($statement);
                if ($result) {
                    $_SESSION['success'] = Component::successAlert("Success Message", "Product Updated Successfully");
                    Component::navigator("../view_products.php");
                } else {
                    $_SESSION['error'] = Component::dangerAlert("validation Message", "Something went wrong");
                    Component::navigator("../view_products.php");
                }
            } else {
                $_SESSION['error'] = Component::dangerAlert("validation Message", "Something went wrong");
                Component::navigator("../view_products.php");
            }
        }
    }
}
