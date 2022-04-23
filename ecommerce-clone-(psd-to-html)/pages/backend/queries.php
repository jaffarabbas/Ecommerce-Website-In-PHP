<?php 
class Queries{
    public static string $getAllProductsByCategories = "SELECT `pid`, `name`, `description`, `price`, JSON_EXTRACT(image,'$[0]') as fimage, `quantity`, `rating`, `cid` FROM `products` WHERE `cid` =";
    public static string $getProductByPId = "SELECT `pid`, `name`, `description`, `price`, `image` , `quantity`, `rating`, `cid` FROM `products` WHERE `pid` = ";
}
?>