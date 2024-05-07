<?php
session_start();

$username = "root";
$password = "";
$database = new PDO("mysql:host=localhost;dbname=db5;charset=utf8;", $username, $password);

if ($database) {
    // Query the orders table and retrieve the data
    $orders_sql = "SELECT id, created_at FROM orders";
    $orders_statement = $database->prepare($orders_sql);
    $orders_statement->execute();
    $orders_data = $orders_statement->fetchAll(PDO::FETCH_ASSOC);

    $database = null;

    $response = array(
        "orders" => $orders_data
    );

    header("Content-Type: application/json");
    echo json_encode($response);
    exit; // Terminate the script to prevent any additional output
} else {
    // Handle the error case
    header("HTTP/1.1 500 Internal Server Error");
    exit; // Terminate the script to prevent any additional output
}
?>
