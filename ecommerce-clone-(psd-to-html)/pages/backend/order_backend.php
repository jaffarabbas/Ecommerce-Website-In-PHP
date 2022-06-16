<?php 

include_once("../backend/connecter.php");
session_start();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_POST['Check_Out']) || isset($_SESSION['order_items']) || $_SESSION['order_items'] != null) {
        foreach ($_SESSION['order_items'] as $key => $value) {
            $uid = $value['user'];
            $pid = $value['Item_id'];
            $Item_Quantity = $value['Item_Quantity'];
            $total_price = $value['total_price'];
            $statement = $operations->queryStatement(Queries::$insertUsersOrders);
            $statement->bind_param("iiii", $uid, $pid, $Item_Quantity, $total_price);
            $result = mysqli_stmt_execute($statement);
        }
        if ($statement) {
            if ($result) {
                Component::alertMaker(Routes::$parameterDoubleDot.Routes::$indexPage,Messages::$orderSuccess);
                unset($_SESSION['order_items']);
                unset($_SESSION['cart']);    
            } else {
                Component::alertMaker(Routes::$parameterDoubleDot.Routes::$indexPage,Messages::$orderError);
            }
        }
    }
}
?>