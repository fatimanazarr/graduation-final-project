<?php
session_start();

$username = "root";
$password = "";
$database = new PDO("mysql:host=localhost;dbname=db5;charset=utf8;", $username, $password);

if ($database) {
    // Decode JSON data from the request body
    $json_data = file_get_contents('php://input');
    $data = json_decode($json_data, true);

    if ($data !== null) {
        // Extract data from JSON
        $editName = $data['editName'];
        $editQuantity = intval($data['editQuantity']); // Convert to integer
        $editPrice = $data['editPrice'];

        // Prepare and execute the update query with error handling
        $update_sql = "UPDATE Products SET productQuantity = :quantity, price = :price WHERE productName = :name";
        $update_statement = $database->prepare($update_sql);
        if ($update_statement->execute(array(
            ':quantity' => $editQuantity,
            ':price' => $editPrice,
            ':name' => $editName
        ))) {
            // Product updated successfully
            $response = array(
                "success" => true,
                "message" => "Product updated successfully."
            );
        } else {
            // Error occurred while updating the product
            $response = array(
                "success" => false,
                "message" => "Failed to update product."
            );
        }

        header("Content-Type: application/json");
        echo json_encode($response);
        exit; // Terminate the script to prevent any additional output
    } else {
        // Handle invalid JSON data
        header("HTTP/1.1 400 Bad Request");
        echo json_encode(array("error" => "Invalid JSON data"));
        exit; // Terminate the script to prevent any additional output
    }
} else {
    // Handle the error case
    header("HTTP/1.1 500 Internal Server Error");
    echo json_encode(array("error" => "Database connection error"));
    exit; // Terminate the script to prevent any additional output
}
?>
