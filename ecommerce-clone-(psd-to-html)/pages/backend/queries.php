<?php 
class Queries{
    public static string $getAllProductsByCategories = "SELECT `pid`, `name`, `description`, `price`, JSON_EXTRACT(image,'$[0]') as fimage, `quantity`, `cid` FROM `products` WHERE `cid` =";
    public static string $getProductByPId = "SELECT `pid`, `name`, `description`, `price`, `image` , `quantity`, `cid` FROM `products` WHERE `pid` = ";
    public static string $getTextFromSetting = "SELECT `TAX` FROM `setting`";
    public static string $getAllAccountType = "SELECT * FROM `account_type`";
    public static string $getAllType = "SELECT * FROM `type`";
    public static string $checkSameEmail = "SELECT * FROM users WHERE email = ";
    public static string $insertUser = "INSERT INTO users (firstname, lastname, email, password, actype, type) VALUES (?,?,?,?,?,?)";
    public static string $getUser = "SELECT id, firstname, lastname, email, password FROM users WHERE email = ?";
    public static string $insertContact = "INSERT INTO contact (name, email ,phone ,address ,message) VALUES (?,?,?,?,?)";
    //admin
    public static string $getAdmin = "SELECT * FROM admin WHERE name=? AND password=?";
    public static string $insertProduct = "INSERT INTO `products`(`name`, `description`, `price`, `image`, `quantity`, `cid`) VALUES (?,?,?,?,?,?)";
    public static string $getAllCategories = "SELECT * FROM `categories`";
    public static string $getAllProducts = "SELECT `pid`, `name`, `description`, `price`, JSON_EXTRACT(image,'$[0]') as fimage, `quantity`, `cid` FROM `products` ORDER BY cid";
    public static string $getAllContact = "SELECT * FROM `contact`";
    public static string $updateProducts = "UPDATE `products` SET `pid`=?,`name`=?,`description`=?,`price`=?,`image`=?,`quantity`=?,`cid`=? WHERE pid = ";
}
?>