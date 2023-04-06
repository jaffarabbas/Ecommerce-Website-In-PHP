<?php
class Queries
{
    public static $getAllProductsByCategories = "SELECT `pid`, `name`, `description`, `price`, JSON_EXTRACT(image,'$[0]') as fimage, `quantity`, `cid` FROM `products` WHERE status = 1 HAVING `cid` =";
    public static $getProductByPId = "SELECT `pid`, `name`, `description`, `price`, `image` , `quantity`, `cid` FROM `products` WHERE status = 1 HAVING `pid` = ";
    public static $getTextFromSetting = "SELECT `TAX` FROM `setting`";
    public static $getAllAccountType = "SELECT * FROM `account_type`";
    public static $getAllType = "SELECT * FROM `type`";
    public static $checkSameEmail = "SELECT * FROM users WHERE email = ";
    public static $insertUser = "INSERT INTO users (firstname, lastname, email, password, actype, type) VALUES (?,?,?,?,?,?)";
    public static $getUser = "SELECT id, firstname, lastname, email, password FROM users WHERE email = ?";
    public static $insertContact = "INSERT INTO contact (name, email ,phone ,address ,message) VALUES (?,?,?,?,?)";
    public static $insertUsersOrders = "INSERT INTO `user_orders`(`uid`, `iid`, `quantity`, `total_price`) VALUES (?,?,?,?)";
    public static $insertTempUsersOrders = "INSERT INTO `temp_user_orders`(`user_token`, `name` , `email`, `phone`,`address`, `iid`, `quantity`, `total_price`) VALUES (?,?,?,?,?,?,?,?)";
    //admin
    public static $getAdmin = "SELECT * FROM admin WHERE name=? AND password=?";
    public static $insertProduct = "INSERT INTO `products`(`name`, `description`, `price`, `image`, `quantity`, `cid`) VALUES (?,?,?,?,?,?)";
    public static $getAllCategories = "SELECT * FROM `categories`";
    public static $getAllProducts = "SELECT `pid`, `name`, `description`, `price`, JSON_EXTRACT(image,'$[0]') as fimage, `quantity`, `cid` , `status` FROM `products` ORDER BY cid";
    public static $getAllContact = "SELECT * FROM `contact`";
    public static $updateProducts = "UPDATE `products` SET `name`=?,`description`=?,`price`=?,`image`=?,`quantity`=?,`cid`=? WHERE pid = ?";
    public static $deleteProducts = "UPDATE `products` SET `status` = 0 WHERE pid = ?";
    public static $getAllOrdersFromOrderView = "SELECT * FROM show_user_order_all_data";
    public static $getAllTempOrdersFromTempOrderView = "SELECT * FROM show_temp_user_order_all_data";
    public static $getTotalProducts = "SELECT COUNT(*) as 'countProduct' FROM products";
    public static $getTotalUsers = "SELECT COUNT(*) as 'countUsers' FROM users";
    public static $getTotalOrders = "SELECT COUNT(*) as 'countOrder' FROM user_orders";
    public static $getTotalContact = "SELECT COUNT(*) as 'countContact' FROM contact";
    public static $getTotalAccountType = "SELECT COUNT(*) as 'countAccountType' FROM account_type";
    public static $getTotalType = "SELECT COUNT(*) as 'countType' FROM type";
    public static $getTotalCategories = "SELECT COUNT(*) as 'countCategories' FROM categories";
    public static $getTotalTempUserOrders = "SELECT COUNT(*) as 'countTempUserOrders' FROM temp_user_orders";
    public static $getTotalActiveProducts = "SELECT COUNT(*) as 'activeProducts' FROM products WHERE status = 1";
    public static $getTotalInactiveProducts = "SELECT COUNT(*) as 'inactiveproducts' FROM products WHERE status = 0";
    public static $getTotalActiveCategories = "SELECT COUNT(*) as 'activeCategories' FROM categories WHERE status = 1";
    public static $getTotalInactiveCategories = "SELECT COUNT(*) as 'inactiveCategories' FROM categories WHERE status = 0";
    public static $getTotalActiveUsers = "SELECT COUNT(*) as 'activeUsers' FROM users WHERE status = 1";
    public static $getTotalInactiveUsers = "SELECT COUNT(*) as 'inactiveUsers' FROM users WHERE status = 0";
    public static $getTax = "SELECT `TAX` FROM `setting`";
    //admin grapgh query
    public static $DougnetProductByCategories = "SELECT sum(price) as 'prsum' from products group by cid";
    public static $CountTotalProductsByCategories = "SELECT count(price) as 'countProduct' from products group by cid";
    public static $CountSumOfQuantityProductsByCategories = "select sum(quantity) as 'countQuantity' from products group by cid";
    public static $LineGrapghOfOrder = "SELECT total_price as 'order' ,substring_index(created_at,' ',1) as created_at from user_orders group by created_at;";
    public static $LineGrapghOfTempOrder = "SELECT total_price as 'order' ,substring_index(orderat,' ',1) as created_at from temp_user_orders group by orderat";
}
