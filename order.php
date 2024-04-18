<?php
session_start();

$username = "root";
$password = "";
$database = new PDO("mysql:host=localhost;dbname=db5;charset=utf8;", $username, $password);

if ($database) {
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        // Your existing code for inserting customer data goes here...
    } else {
        // Query the orders table and retrieve the data
        $orders_sql = "SELECT dishName, customerFirstName FROM orders WHERE customerFirstName = :username";
        $orders_statement = $database->prepare($orders_sql);
        $orders_statement->bindParam(':username', $_SESSION['username']);
        $orders_statement->execute();
        $orders_data = $orders_statement->fetchAll(PDO::FETCH_ASSOC);

        // Fetch additional columns (DishDescription and TotalPrice) from the menu table
        $menu_sql = "SELECT DishName, DishDescription, TotalPrice FROM menu";
        $menu_statement = $database->prepare($menu_sql);
        $menu_statement->execute();
        $menu_data = $menu_statement->fetchAll(PDO::FETCH_ASSOC);

        $database = null;

        $response = array(
            "orders" => $orders_data,
            "menu" => $menu_data
        );

        header("Content-Type: application/json");
        echo json_encode($response);
        exit; // Terminate the script to prevent any additional output
    }
} else {
    // Handle the error case
    header("HTTP/1.1 500 Internal Server Error");
    exit; // Terminate the script to prevent any additional output
}
?>