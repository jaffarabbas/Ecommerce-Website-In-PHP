<?php

include_once("../../pages/backend/connecter.php");
session_start();
$validation = new Validation();
$checkFeilds = $validation->checkEmpty($_POST, array('name', 'password'));
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_POST['login'])) {
        if (isset($_POST['name']) && isset($_POST['password'])) {
            $name = $validation->validate(($operations->escape_string($_POST['name'])));
            $pass = $validation->validate(($operations->escape_string($_POST['password'])));
            if ($checkFeilds) {
                $_SESSION['error'] = Component::dangerAlert("validation Message", "Please fill all Feilds");
                Component::navigator("../login.php");
            } else {
                $statement = $operations->prepareStatement(Queries::$getAdmin);
                $statement->bind_param("ss", $name, $pass);
                $statement->execute();
                $result = $statement->get_result();
                while ($row = $result->fetch_object()) {
                    $results[] = $row;
                }
                if (count($results) > 0) {
                    $_SESSION['admin'][0] = array(
                        'id' => $results[0]->id,
                        'name' => $results[0]->name,
                        'password' => $results[0]->password,
                        'image' => $results[0]->image,
                    );
                    $_SESSION['success'] = Component::successAlert("Success Message", "Hii " . $name . " You have successfully login");
                    Component::navigator("../index.php");
                } else {
                    $_SESSION['error'] = Component::dangerAlert("validation Message", "Something went wrong");
                    Component::navigator("../login.php");
                }
            }
        } else {
            $_SESSION['error'] = Component::dangerAlert("validation Message", "Something went wrong");
            Component::navigator("../login.php");
        }
    }
}
