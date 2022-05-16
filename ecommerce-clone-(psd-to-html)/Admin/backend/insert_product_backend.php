<?php 

include("../../pages/backend/connecter.php");

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_POST['upload'])) {
        foreach ($_FILES['images']['tmp_name'] as $key => $value) {
            $filename=$_FILES['images']['name'][$key];
            $filename_tmp=$_FILES['images']['tmp_name'][$key];
            echo '<br>';
            $fileExtension=pathinfo($filename,PATHINFO_EXTENSION);
            $finalimg='';
            if(in_array($fileExtension,Validation::$extension))
            {
                if(!file_exists('images/'.$filename))
                {
                    move_uploaded_file($filename_tmp, 'images/'.$filename);
                    $finalimg=$filename;
                }else{
                     $filename=str_replace('.','-',basename($filename,$fileExtension));
                     $newfilename=$filename.time().".".$fileExtension;
                     move_uploaded_file($filename_tmp, 'images/'.$newfilename);
                     $finalimg=$newfilename;
                }
                echo $finalimg;
                // $_SESSION['success'] = Component::successAlert("Success Message", "You have successfully registered");
                // Component::navigator("../signup.php");
            }else
            {
                $_SESSION['error'] = Component::dangerAlert("validation Message", "Something went wrong");
                Component::navigator("../insert_products.php");
            }
        }
    }
}
