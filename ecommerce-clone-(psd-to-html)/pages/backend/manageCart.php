<!-- cart code -->
<?php
session_start();
function alertMaker($flag)
{
    if ($flag) {
        echo "<script>
                alert('Added to cart');
                window.location.href='../cart.php';
             </script>";
    } else {
        echo "
        <script>
            alert('Item is already added in the cart');
            window.location.href='../shop.php';
        </script>";
    }
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    //add yo cart
    if (isset($_POST['shopNow'])) {
        if (isset($_SESSION['cart'])) {
            //item in array
            $item_array = array_column($_SESSION['cart'], 'Item_id');
            if (in_array($_POST['pid'], $item_array)) {
                alertMaker(false);
            } else {
                //add new item to session array
                $count_cart_index = count($_SESSION['cart']);
                $_SESSION['cart'][$count_cart_index] = array('Item_id' => $_POST['pid'],'Item_Name' => $_POST['name'], 'Item_Price' => $_POST['price'], 'Item_Quantity' => $_POST['quantity'], 'Item_Image' => $_POST['image'],'Item_cid' => $_POST['cid']);
                alertMaker(true);
            }
        } else {
            //add first item to session array
            $_SESSION['cart'][0] = array('Item_id' => $_POST['pid'],'Item_Name' => $_POST['name'], 'Item_Price' => $_POST['price'], 'Item_Quantity' => $_POST['quantity'], 'Item_Image' => $_POST['image'],'Item_cid' => $_POST['cid']);
            alertMaker(true);
        }
    }
    //remove from cart
    if(isset($_POST['Remove_Item'])){
        foreach($_SESSION['cart'] as $key => $value){
            if($value['Item_id'] == $_POST['Item_id']){
                unset($_SESSION['cart'][$key]);
                $_SESSION['cart'] = array_values($_SESSION['cart']);
                echo "<script>
                        alert('Item removed from cart');
                        window.location.href='../cart.php';
                     </script>";
            }
        }
    }
    //set quantity in session
    if(isset($_POST['Mode_Quantity'])){
        foreach($_SESSION['cart'] as $key => $value){
            if($value['Item_Name'] == $_POST['Item_Name']){
                $_SESSION['cart'][$key]['Quantity'] = $_POST['Mode_Quantity'];
                echo "<script>
                        window.location.href='../cart.php';
                     </script>";
            }
        }
    }
}

?>