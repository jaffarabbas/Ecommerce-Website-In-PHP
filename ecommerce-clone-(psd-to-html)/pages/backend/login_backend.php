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
                $statement = $statement = $operations->queryStatement(Queries::$getUser);
                mysqli_stmt_bind_param($statement, "s", $param_email);
                $param_email = $email;
                // Try to execute this statement
                if (mysqli_stmt_execute($statement)) {
                    mysqli_stmt_store_result($statement);
                    if (mysqli_stmt_num_rows($statement) == 1) {
                        mysqli_stmt_bind_result($statement, $id, $firstname, $lastname, $email, $password);
                        if (mysqli_stmt_fetch($statement)) {
                            if ($validation->decryptPassowrd($pass, $password)) {
                                // this means the password is corrct. Allow user to login
                                $_SESSION['user'][0] = array(
                                    'id' => $results[0]->id,
                                    'firstname' => $results[0]->firstname,
                                    'lastname' => $results[0]->lastname,
                                    'email' => $results[0]->email,
                                );
                                $_SESSION['success'] = Component::successAlert("Success Message", "Hii " . $email . " You have successfully login");
                                Component::navigator("../index.php");
                            } else {
                                $_SESSION['error'] = Component::dangerAlert("validation Message", "Something went wrong");
                                Component::navigator("../login.php");
                            }
                        } else {
                            $_SESSION['error'] = Component::dangerAlert("validation Message", "Something went wrong");
                            Component::navigator("../login.php");
                        }
                    } else {
                        $_SESSION['error'] = Component::dangerAlert("validation Message", "Something went wrong");
                        Component::navigator("../login.php");
                    }
                } else {
                    $_SESSION['error'] = Component::dangerAlert("validation Message", "Something went wrong");
                    Component::navigator("../login.php");
                }
            }
        } else {
            $_SESSION['error'] = Component::dangerAlert("validation Message", "Please fill all Feilds");
            Component::navigator("../login.php");
        }
    }
}
