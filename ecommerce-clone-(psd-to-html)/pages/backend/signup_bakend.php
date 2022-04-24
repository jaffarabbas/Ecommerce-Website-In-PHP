<?php

include_once("../backend/connecter.php");
session_start();
$validation = new Validation();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_POST['submit'])) {
        $firstname = $validation->validate($operations->escape_string($_POST['firstname']));
        $lastname = $validation->validate($operations->escape_string($_POST['lastname']));
        $email = $validation->validate($operations->escape_string($_POST['email']));
        $passowrd = $validation->validate($operations->escape_string($_POST['passowrd']));
        $repassword = $validation->validate($operations->escape_string($_POST['repassword']));
        $actype = $validation->validate($operations->escape_string($_POST['actype']));
        $type = $validation->validate($operations->escape_string($_POST['type']));

        $checkFeilds = $validation->checkEmpty($_POST, array('actype', 'email', 'passowrd', 'repassword', 'firstname', 'lastname', 'type'));
        $checkEmail = $validation->isEmailValid($email);
        $checkPassowrd = $validation->isPassowrdValid($passowrd);
        $checkRePassword = $validation->isPassowordMatch($passowrd, $repassword);
        // checking empty fields
        if ($checkFeilds) {
            $_SESSION['error'] = Component::dangerAlert("validation Message", "Please fill all the fields");
            Component::navigator("../signup.php");
        } else if (!$checkEmail) {
            $_SESSION['error'] = Component::dangerAlert("validation Message", "Please enter a valid email address");
            Component::navigator("../signup.php");
            //check passowrd returns errors in -numbers
        } else if ($checkPassowrd < 0) {
            foreach ($validation->validation_errors as $key => $error) {
                if ($checkPassowrd == $key) {
                    $_SESSION['error'] = Component::dangerAlert("validation Message", $error);
                    Component::navigator("../signup.php");
                }
            }
        } else if (!$checkRePassword) {
            $_SESSION['error'] = Component::dangerAlert("validation Message", "Passowrd donot matched");
            Component::navigator("../signup.php");
        } else {
            $check_email_exist = $operations->getData(Queries::$checkSameEmail . "'$email'");
            if (!empty($check_email_exist)) {
                $_SESSION['error'] = Component::dangerAlert("validation Message", "Email already exist");
                Component::navigator("../signup.php");
            } else {
                if (filter_has_var(INPUT_POST, 'termCheck')) {
                    $password = password_hash($passowrd, PASSWORD_DEFAULT);
                    $statement = $operations->queryStatement(Queries::$insertUser);
                    if ($statement) {
                        mysqli_stmt_bind_param($statement, "ssssss", $firstname, $lastname, $email, $password, $actype, $type);
                        $result = mysqli_stmt_execute($statement);
                        if ($result) {
                            $_SESSION['success'] = Component::successAlert("Success Message", "You have successfully registered");
                            Component::navigator("../signup.php");
                        } else {
                            $_SESSION['error'] = Component::dangerAlert("validation Message", "Something went wrong");
                            Component::navigator("../signup.php");
                        }
                    }
                }else{
                    $_SESSION['error'] = Component::dangerAlert("validation Message", "Please accept the terms and conditions");
                    Component::navigator("../signup.php");
                }
            }
        }
    }
}
