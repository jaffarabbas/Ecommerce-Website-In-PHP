<?php

include_once("../backend/connecter.php");
session_start();
$validation = new Validation();
$checkFeilds = $validation->checkEmpty($_POST, array('email', 'password'));
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_POST['login'])) {
        if (isset($_POST['email']) && isset($_POST['password'])) {
            $email = $validation->validate(($operations->escape_string($_POST['email'])));
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
                    $_SESSION['user'][0] = array(
                        'id' => $results[0]->id,
                        'firstname' => $results[0]->firstname,
                        'lastname' => $results[0]->lastname,
                        'email' => $results[0]->email,
                    );
                    $_SESSION['success'] = Component::successAlert("Success Message", "Hii " . $name . " You have successfully login");
                    Component::navigator("../index.php");
                } else {
                    $_SESSION['error'] = Component::dangerAlert("validation Message", "Something went wrong");
                    Component::navigator("../login.php");
                }
            }
        } else {
            print_r("s5");
        }
    }
}
