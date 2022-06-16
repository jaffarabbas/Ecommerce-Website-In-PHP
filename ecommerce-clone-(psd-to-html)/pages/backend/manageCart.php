<!-- cart code -->
<?php
session_start();
include("./methods.php");
include("./routes.php");
include("./keywords.php");

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    //add yo cart
    if (isset($_POST['shopNow'])) {
        if (isset($_SESSION['cart'])) {
            //item in array
            $item_array = array_column($_SESSION['cart'], 'Item_id');
            if (in_array($_POST['pid'], $item_array)) {
                Component::alertMaker(Routes::LinkMaker(Routes::$parameterDoubleDot, Routes::$cartPage), Messages::$alreadyInCart);
            } else {
                //add new item to session array
                $count_cart_index = count($_SESSION['cart']);
                $_SESSION['cart'][$count_cart_index] = array('Item_id' => $_POST['pid'], 'Item_Name' => $_POST['name'], 'Item_Description' => $_POST['description'], 'Item_Price' => $_POST['price'], 'Item_Quantity' => $_POST['quantity'], 'Item_Image' => $_POST['image'], 'Item_cid' => $_POST['cid'], 'Item_total_Price' => 0, 'Item_total_Quantity' => 0);
                Component::alertMaker(Routes::LinkMaker(Routes::$parameterDoubleDot, Routes::$cartPage), Messages::$addedToCart);
            }
        } else {
            //add first item to session array
            $_SESSION['cart'][0] = array('Item_id' => $_POST['pid'], 'Item_Name' => $_POST['name'], 'Item_Description' => $_POST['description'], 'Item_Price' => $_POST['price'], 'Item_Quantity' => $_POST['quantity'], 'Item_Image' => $_POST['image'], 'Item_cid' => $_POST['cid'], 'Item_total_Price' => 0, 'Item_total_Quantity' => 0);
            Component::alertMaker(Routes::LinkMaker(Routes::$parameterDoubleDot, Routes::$cartPage), Messages::$addedToCart);
        }
    }
    //remove from cart
    if (isset($_POST['Remove_Item'])) {
        foreach ($_SESSION['cart'] as $key => $value) {
            if ($value['Item_id'] == $_POST['Item_id']) {

                unset($_SESSION['cart'][$key]);
                $_SESSION['cart'] = array_values($_SESSION['cart']);
                Component::alertMaker(Routes::LinkMaker(Routes::$parameterDoubleDot, Routes::$cartPage), Messages::$removedFromCart);
            }
        }
    }
    //remove item from cart
    if (isset($_POST['Remove_Item_From_Cart'])) {
        foreach ($_SESSION['cart'] as $key => $value) {
            if ($value['Item_id'] == $_POST['Item_id']) {

                unset($_SESSION['cart'][$key]);
                $_SESSION['cart'] = array_values($_SESSION['cart']);
                Component::alertMaker(Routes::LinkMaker(Routes::$parameterDoubleDot, Routes::$checkoutPage), Messages::$removedFromCart);
            }
        }
    }
    //set quantity in session
    if (isset($_POST['Mode_Quantity'])) {
        foreach ($_SESSION['cart'] as $key => $value) {
            if ($value['Item_id'] == $_POST['Item_id']) {
                $_SESSION['cart'][$key]['Item_Quantity'] = $_POST['Mode_Quantity'];
                Component::navigator(Routes::LinkMaker(Routes::$parameterDoubleDot, Routes::$cartPage));
            }
        }
    }

    if (isset($_POST['Mode_Quantity_Check_Out'])) {
        foreach ($_SESSION['cart'] as $key => $value) {
            if ($value['Item_id'] == $_POST['Item_id']) {
                $_SESSION['cart'][$key]['Item_Quantity'] = $_POST['Mode_Quantity_Check_Out'];
                foreach ($_SESSION['cart'] as $key => $value) {
                    $_SESSION['cart'][$key]['Item_total_Price'] = $_SESSION['cart'][$key]['Item_Price'] * $_SESSION['cart'][$key]['Item_Quantity'];
                }
                Component::navigator(Routes::LinkMaker(Routes::$parameterDoubleDot, Routes::$checkoutPage));
            }
        }
    }

    // set session for checkout
    if (isset($_POST['Add_to_CheckOut'])) {
        foreach ($_SESSION['cart'] as $key => $value) {
            $_SESSION['cart'][$key]['Item_total_Price'] = $_SESSION['cart'][$key]['Item_Price'] * $_SESSION['cart'][$key]['Item_Quantity'];
            $_SESSION['cart'][$key]['Item_total_Quantity'] = $_POST['grandTotalPrice'];
        }
        Component::navigator(Routes::LinkMaker(Routes::$parameterDoubleDot, Routes::$checkoutPage));
    }

    //order checkout 
    if (isset($_POST['Check_Out'])) {
        $totalPrice = $_POST['finalTotalPrice'];
        foreach ($_SESSION['cart'] as $key => $value) {
            $_SESSION['order_items'][$key] =  array('user' => $_SESSION['user']['id'], 'Item_id' => $_SESSION['cart'][$key]['Item_id'], 'Item_Quantity' => $_SESSION['cart'][$key]['Item_Quantity'], 'total_price' => $totalPrice);
        }
        Component::navigator(Routes::LinkMaker(Routes::$parameterDoubleDot, Routes::$paymentPage));
    }
}

?>