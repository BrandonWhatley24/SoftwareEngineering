<?php
/*
require('/srv/www/htdocs/php/edu/uafs/Control/OrdersDAO.php'); // Include your DAO class

// Create an instance of the DAO class
$ordersDAO = new OrdersDAO();

// Define an API endpoint to get all items
if ($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET['action']) && $_GET['action'] === 'getAllOrders') {
    $data = $ordersDAO->getAllItemFromDatabase();
    header('Content-Type: application/json');
    echo json_encode($data);
}
*/

require('/srv/www/htdocs/php/edu/uafs/Control/itemsDAO.php'); // Include your DAO class
$itemDAO = new ItemDAO();
if ($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET['action']) && $_GET['action'] === 'getAllItems') {
    $data = $itemDAO->getAllItems();
    header('Content-Type: application/json');
    echo json_encode($data);
}
?>
