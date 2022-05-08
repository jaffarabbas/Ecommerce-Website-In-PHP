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
                $statement = $operations->queryStatement(Queries::$getUser);
                if ($statement) {
                    $result = mysqli_stmt_bind_param($statement, "ss", $email, $pass);
                    mysqli_stmt_execute($statement);
                    if ($result) {
                        $_SESSION['user'][0] = array(
                            'email' => $email,
                            'password' => $pass
                        ); 
                        $_SESSION['success'] = Component::successAlert("Success Message", "Hii ".$email." You have successfully login");
                        Component::navigator("../index.php");
                    } else {
                        $_SESSION['error'] = Component::dangerAlert("validation Message", "Something went wrong");
                        Component::navigator("../login.php");
                    }
                }
                // print_r($email." ".$pass);
                // $statement = $operations->prepareStatement(Queries::$getUser);
                // $statement->bind_param("ss", $email, $pass);
                // $statement->execute();
                // $result = $statement->get_result();
                // print_r($result);
                // while ($row = $result->fetch_object()) {
                //     $results[] = $row;
                // }
                // if (count($results) > 0) {
                //     $_SESSION['user'][0] = array(
                //         'id' => $results[0]->id,
                //         'firstname' => $results[0]->firstname,
                //         'lastname' => $results[0]->lastname,
                //         'email' => $results[0]->email,
                //     );
                //     $_SESSION['success'] = Component::successAlert("Success Message", "Hii " . $email . " You have successfully login");
                //     Component::navigator("../index.php");
                // } else {
                //     print_r($results);
                //     $_SESSION['error'] = Component::dangerAlert("validation Message", "Something went wrong");
                //     Component::navigator("../login.php");
                // }
            }
        } else {
            $_SESSION['error'] = Component::dangerAlert("validation Message", "Please fill all Feilds");
            Component::navigator("../login.php");
        }
    }
}
