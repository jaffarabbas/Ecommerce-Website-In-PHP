<?php

class Component
{
    public static function alertMaker($url, $message)
    {
        echo "<script>
                alert('$message');
                window.location.href='$url';
             </script>";
    }

    public static function navigator($url)
    {
        echo "<script>
                window.location.href='$url';
             </script>";
    }

    public static function dangerAlert($type, $message)
    {
        return "
        <div class='alert alert-danger alert-dismissible'>
        <a href='' style='font-size:27px;' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
            <strong>" . $type . "</strong> " . "&nbsp;&nbsp;&nbsp;" . $message . " 
        </div>
        ";
    }

    public static function successAlert($type, $message)
    {
        return "
        <div class='alert alert-success alert-dismissible'>
        <a href='' style='font-size:27px;' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
            <strong>" . $type . "</strong> " . "&nbsp;&nbsp;&nbsp;" . $message . " 
        </div>
        ";
    }
}
