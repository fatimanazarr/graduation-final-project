<?php
session_start();

$username = "root";
$password = "";
$database = new PDO("mysql:host=localhost;dbname=db5;charset=utf8;", $username, $password);

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['addComponentName']) && isset($_POST['addComponentQuantity']) && isset($_POST['addComponentPrice'])) {
    $addComponentName = $_POST['addComponentName'];
    $addComponentQuantity = $_POST['addComponentQuantity'];
    $addComponentPrice = $_POST['addComponentPrice'];

    // Insert the new component into the Products table
    $insert_sql = "INSERT INTO Products (productName, productQuantity, price) VALUES (?, ?, ?)";
    $insert_statement = $database->prepare($insert_sql);
    $insert_statement->execute([$addComponentName, $addComponentQuantity, $addComponentPrice]);

    // Check if insertion was successful
    $inserted_rows = $insert_statement->rowCount();
    if ($inserted_rows > 0) {
        // Respond with success message
        $response = array(
            "success" => true,
            "message" => "Component added successfully."
        );
    } else {
        // Respond with error message
        $response = array(
            "success" => false,
            "message" => "Failed to add component."
        );
    }

    $database = null;

    header("Content-Type: application/json");
    echo json_encode($response);
    exit;
} else {
    // Respond with error message
    $response = array(
        "success" => false,
        "message" => "Invalid request."
    );

    header("HTTP/1.1 400 Bad Request");
    header("Content-Type: application/json");
    echo json_encode($response);
    exit;
}
?>
