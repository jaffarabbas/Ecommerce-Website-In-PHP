<?php 

class Routes{
    //core pages
    public static $indexPage = "index.php";
    public static $loginPage = "login.php";
    public static $signupPage = "signup.php";
    public static $shopPage = "shop.php";
    public static $checkoutPage = "checkout.php";
    public static $contactPage = "contact.php";
    public static $aboutPage = "about.php";
    public static $productDetailsPage = "productDetails.php";
    public static $cartPage = "cart.php";
    public static $paymentPage = "payment_page.php";
    //reusable pages
    public static $headerPage = "header.php";
    public static $footerPage = "footer.php";
    public static $styleCdnPage = "styleCdn.php";
    public static $jsCdnPage = "jsCdn.php";
    //backend pages
    public static $connecterPage = "backend/connecter.php";
    public static $dbConnectionPage = "backend/dbConnection.php";
    public static $dbOperationPage = "backend/dbOperations.php";
    public static $dbQueryPage = "backend/queries.php";
    public static $routes = "backend/routes.php";
    public static $keywords = "backend/keywords.php";
    public static $validation = "backend/validation.php";
    public static $methods = "backend/methods.php";
    public static $manageCart = "backend/manageCart.php";
    public static $loginBackend = "backend/login_backend.php";
    public static $signupBackend = "backend/signup_backend.php";
    public static $contactBackend = "backend/contact_backend.php";
    public static $orderBackend = "backend/order_backend.php";

    //folders
    public static $imagesFolder = "images/";
    public static $backendImageToShop = "Admin/images/";
    //route parameters
    public static $parameterSingleDot = "./";
    public static $parameterDoubleDot = "../";
    public static $parameterFromPage = "page";
    public static $parameterFromAdmin = "Admin";
    public static $parameterFromVendor = "vendor";

    public static function LinkMaker($parameter,$route){
        return $parameter.$route;
    }
}

?>