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

    
    public static function tick($status)
    {
        return ($status == "1") ? "<i class='fa fa-check-circle' style='color:green;font-size:20px'></i>" : "<i class='fa fa-times-circle' style='color:red;font-size:20px'></i>";
    }

    //sub string to double
    public static function subStringToDouble($string)
    {
        return floatval(explode(" ",$string)[0]);
    }

    //user token generater with alphanumeric characters
    public static function tokenGenerator()
    {
        $length = Settings::$tokenLength;
        $token = "";
        $characters = array_merge(range('a', 'z'), range('A', 'Z'), range('0', '9'));
        $max = count($characters) - 1;
        for ($i = 0; $i < $length; $i++) {
            $token .= $characters[mt_rand(0, $max)];
        }
        return $token;
    }
}
