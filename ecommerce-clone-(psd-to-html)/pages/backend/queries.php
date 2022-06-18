<?php 
class Queries{
    public static string $getAllProductsByCategories = "SELECT `pid`, `name`, `description`, `price`, JSON_EXTRACT(image,'$[0]') as fimage, `quantity`, `cid` FROM `products` WHERE status = 1 HAVING `cid` =";
    public static string $getProductByPId = "SELECT `pid`, `name`, `description`, `price`, `image` , `quantity`, `cid` FROM `products` WHERE status = 1 HAVING `pid` = ";
    public static string $getTextFromSetting = "SELECT `TAX` FROM `setting`";
    public static string $getAllAccountType = "SELECT * FROM `account_type`";
    public static string $getAllType = "SELECT * FROM `type`";
    public static string $checkSameEmail = "SELECT * FROM users WHERE email = ";
    public static string $insertUser = "INSERT INTO users (firstname, lastname, email, password, actype, type) VALUES (?,?,?,?,?,?)";
    public static string $getUser = "SELECT id, firstname, lastname, email, password FROM users WHERE email = ?";
    public static string $insertContact = "INSERT INTO contact (name, email ,phone ,address ,message) VALUES (?,?,?,?,?)";
    public static string $insertUsersOrders = "INSERT INTO `user_orders`(`uid`, `iid`, `quantity`, `total_price`) VALUES (?,?,?,?)";
    public static string $insertTempUsersOrders = "INSERT INTO `temp_user_orders`(`user_token`, `name` , `email`, `phone`,`address`, `iid`, `quantity`, `total_price`) VALUES (?,?,?,?,?,?,?,?)";
    //admin
    public static string $getAdmin = "SELECT * FROM admin WHERE name=? AND password=?";
    public static string $insertProduct = "INSERT INTO `products`(`name`, `description`, `price`, `image`, `quantity`, `cid`) VALUES (?,?,?,?,?,?)";
    public static string $getAllCategories = "SELECT * FROM `categories`";
    public static string $getAllProducts = "SELECT `pid`, `name`, `description`, `price`, JSON_EXTRACT(image,'$[0]') as fimage, `quantity`, `cid` , `status` FROM `products` ORDER BY cid";
    public static string $getAllContact = "SELECT * FROM `contact`";
    public static string $updateProducts = "UPDATE `products` SET `name`=?,`description`=?,`price`=?,`image`=?,`quantity`=?,`cid`=? WHERE pid = ?";
    public static string $deleteProducts = "UPDATE `products` SET `status` = 0 WHERE pid = ?";
    public static string $getAllOrdersFromOrderView = "SELECT * FROM show_user_order_all_data";
    public static string $getTotalProducts = "SELECT COUNT(*) as 'countProduct' FROM products";
    public static string $getTotalUsers = "SELECT COUNT(*) as 'countUsers' FROM users";
    public static string $getTotalOrders = "SELECT COUNT(*) as 'countOrder' FROM user_orders";
    public static string $getTotalContact = "SELECT COUNT(*) as 'countContact' FROM contact";
    public static string $getTotalAccountType = "SELECT COUNT(*) as 'countAccountType' FROM account_type";
    public static string $getTotalType = "SELECT COUNT(*) as 'countType' FROM type";
    public static string $getTotalCategories = "SELECT COUNT(*) as 'countCategories' FROM categories";
    public static string $getTotalTempUserOrders = "SELECT COUNT(*) as 'countTempUserOrders' FROM temp_user_orders";
    public static string $getTotalActiveProducts = "SELECT COUNT(*) as 'activeProducts' FROM products WHERE status = 1";
    public static string $getTotalInactiveProducts = "SELECT COUNT(*) as 'inactiveproducts' FROM products WHERE status = 0";
    public static string $getTotalActiveCategories = "SELECT COUNT(*) as 'activeCategories' FROM categories WHERE status = 1";
    public static string $getTotalInactiveCategories = "SELECT COUNT(*) as 'inactiveCategories' FROM categories WHERE status = 0";
    public static string $getTotalActiveUsers = "SELECT COUNT(*) as 'activeUsers' FROM users WHERE status = 1";
    public static string $getTotalInactiveUsers = "SELECT COUNT(*) as 'inactiveUsers' FROM users WHERE status = 0";
    public static string $getTax = "SELECT `TAX` FROM `setting`";
    //admin grpgh query
    public static string $DougnetProductByCategories = "SELECT sum(price) as 'prsum' from products group by cid";
    public static string $CountTotalProductsByCategories="SELECT count(price) as 'countProduct' from products group by cid";
    public static string $CountSumOfQuantityProductsByCategories="select sum(quantity) as 'countQuantity' from products group by cid";
}
