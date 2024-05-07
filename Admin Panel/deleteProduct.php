<?php
session_start();

$username = "root";
$password = "";
$database = new PDO("mysql:host=localhost;dbname=db5;charset=utf8;", $username, $password);

if ($database) {
    // Decode JSON data from the request body
    $json_data = file_get_contents('php://input');
    $data = json_decode($json_data, true);

    if ($data !== null && isset($data['productName'])) {
        // Extract product name from JSON
        $productName = $data['productName'];

        // Prepare and execute the delete query with error handling
        $delete_sql = "DELETE FROM Products WHERE productName = :name";
        $delete_statement = $database->prepare($delete_sql);
        if ($delete_statement->execute(array(':name' => $productName))) {
            // Product deleted successfully
            $response = array(
                "success" => true,
                "message" => "Product deleted successfully."
            );
        } else {
            // Error occurred while deleting the product
            $response = array(
                "success" => false,
                "message" => "Failed to delete product."
            );
        }

        header("Content-Type: application/json");
        echo json_encode($response);
        exit; // Terminate the script to prevent any additional output
    } else {
        // Handle invalid JSON data or missing product name
        header("HTTP/1.1 400 Bad Request");
        echo json_encode(array("error" => "Invalid or missing product name"));
        exit; // Terminate the script to prevent any additional output
    }
} else {
    // Handle the error case
    header("HTTP/1.1 500 Internal Server Error");
    echo json_encode(array("error" => "Database connection error"));
    exit; // Terminate the script to prevent any additional output
}
?>
