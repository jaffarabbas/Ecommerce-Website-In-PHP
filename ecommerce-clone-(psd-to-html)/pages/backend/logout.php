<?php 
include_once("../backend/connecter.php");
session_start();
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_POST['logout'])) {
    session_unset();
    session_destroy();
    Component::alertMaker("../index.php",Messages::$logout);
    }
}
