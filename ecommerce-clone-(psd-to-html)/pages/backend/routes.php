<?php 

class Routes{
    //core pages
    public static string $indexPage = "index.php";
    public static string $loginPage = "login.php";
    public static string $signupPage = "signup.php";
    public static string $shopPage = "shop.php";
    public static string $checkoutPage = "checkout.php";
    public static string $contactPage = "contact.php";
    public static string $aboutPage = "about.php";
    public static string $productDetailsPage = "productDetails.php";
    public static string $cartPage = "cart.php";
    //reusable pages
    public static string $headerPage = "header.php";
    public static string $footerPage = "footer.php";
    public static string $styleCdnPage = "styleCdn.php";
    public static string $jsCdnPage = "jsCdn.php";
    //backend pages
    public static string $connecterPage = "backend/connecter.php";
    public static string $dbConnectionPage = "backend/dbConnection.php";
    public static string $dbOperationPage = "backend/dbOperations.php";
    public static string $dbQueryPage = "backend/queries.php";
    public static string $routes = "backend/routes.php";
    public static string $keywords = "backend/keywords.php";
    public static string $validation = "backend/validation.php";
    public static string $methods = "backend/methods.php";
    public static string $manageCart = "backend/manageCart.php";
    public static string $loginBackend = "backend/login_backend.php";
    public static string $signupBackend = "backend/signup_backend.php";
    public static string $contactBackend = "backend/contact_backend.php";
    //folders
    public static string $imagesFolder = "images/";
    public static string $backendImageToShop = "Admin/images/";
    //route parameters
    public static string $parameterSingleDot = "./";
    public static string $parameterDoubleDot = "../";
    public static string $parameterFromPage = "page";
    public static string $parameterFromAdmin = "Admin";
    public static string $parameterFromVendor = "vendor";

    public static function LinkMaker($parameter,$route){
        return $parameter.$route;
    }
}

?>