
<?php
    require("../php/edu/uafs/Control/OrdersDAO.php");

    $total = $_GET["total"]; 
    $newOrder = new OrdersDAO();
    $order = new Orders(); 
    $order->setStatus("Accepted");
    $order->setAmount($total);
    $order->setDate("2023-11-06");
    $order->setIsCustomOrder("No");
    $order->setCustID("3");
    $order->setTransID("1");

    $newOrder->insertOrder($order->getCustID(), $order->getIsCustomOrder(),$order->getAmount(),$order->getDate(),$order->getTransID(),$order->getStatus());
    header("Location: ./homepage.php");

?>