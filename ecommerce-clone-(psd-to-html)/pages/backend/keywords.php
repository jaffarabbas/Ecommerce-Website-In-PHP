<?php 
class Messages{
    public static string $addedToCart = "Added to cart";
    public static string $alreadyInCart = "Item is already added in the cart";
    public static string $removedFromCart = "Removed from cart";
    public static string $logout = "Do you want to logout";
    public static string $orderSuccess = "Order Successfully Placed";
    public static string $orderError = "There is an error in Order Placement";
}

class ValidationMessages{
    
}

class table{
    public static string $products = "products";
    public static string $categories = "categories";
    public static string $users = "users";
    public static string $orders = "orders";
    public static string $order_items = "order_items";
    public static string $cart = "cart";
    public static string $keywords = "keywords";
}

class Settings{
    public static int $tokenLength = 21;
}
?>