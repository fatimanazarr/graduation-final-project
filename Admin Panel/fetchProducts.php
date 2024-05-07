<?php
session_start();

$username = "root";
$password = "";
$database = new PDO("mysql:host=localhost;dbname=db5;charset=utf8;", $username, $password);

if ($database) {
    // Query the Products table and retrieve the data
    $products_sql = "SELECT productName, productQuantity, price FROM Products";
    $products_statement = $database->prepare($products_sql);
    $products_statement->execute();
    $products_data = $products_statement->fetchAll(PDO::FETCH_ASSOC);

    $database = null;

    $response = array(
        "products" => $products_data
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
