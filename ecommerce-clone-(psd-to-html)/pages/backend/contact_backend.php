<?php 

include_once("../backend/connecter.php");
session_start();
$validation = new Validation();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_POST['submit'])) {
        $name = $validation->validate(($operations->escape_string($_POST['name'])));
        $email = $validation->validate(($operations->escape_string($_POST['email'])));
        $phone = $validation->validate(($operations->escape_string($_POST['phone'])));
        $address = $validation->validate(($operations->escape_string($_POST['address'])));
        $message = $validation->validate(($operations->escape_string($_POST['message'])));
        $checkFeilds = $validation->checkEmpty($_POST, array('name', 'email', 'phone', 'address', 'message'));
        $checkEmail = $validation->isEmailValid($email);
        $checkNumber = $validation->isNumber($phone);
        if($checkFeilds){
            $_SESSION['error'] = Component::dangerAlert("validation Message", "Please fill all Feilds");
            Component::navigator("../contactus.php");
        }else if (!$checkEmail) {
            $_SESSION['error'] = Component::dangerAlert("validation Message", "Please enter a valid email address");
            Component::navigator("../contactus.php");
        }else if (!$checkNumber) {
            $_SESSION['error'] = Component::dangerAlert("validation Message", "Please enter a valid phone number");
            Component::navigator("../contactus.php");
        }else{
            $statement = $operations->queryStatement(Queries::$insertContact);
            if ($statement) {
                $result = mysqli_stmt_bind_param($statement, "sssss", $name, $email, $phone, $address, $message);
                mysqli_stmt_execute($statement);
                if ($result) {
                    $_SESSION['success'] = Component::successAlert("Success Message", "Your message has been sent successfully");
                    Component::navigator("../contactus.php");
                } else {
                    $_SESSION['error'] = Component::dangerAlert("validation Message", "Something went wrong");
                    Component::navigator("../contactus.php");
                }
            }
        }
    }
}

?>