<?php 

include("../../pages/backend/connecter.php");

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_POST['upload'])) {
        $images = $_FILES['images'];
        print_r($images);
    }
}

?>