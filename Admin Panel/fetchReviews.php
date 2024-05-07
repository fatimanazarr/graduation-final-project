<?php
session_start();

$username = "root";
$password = "";
$database = new PDO("mysql:host=localhost;dbname=db5;charset=utf8;", $username, $password);

if ($database) {
    // Query the reviews table and retrieve the data
    $reviews_sql = "SELECT * FROM reviews";
    $reviews_statement = $database->prepare($reviews_sql);
    $reviews_statement->execute();
    $reviews_data = $reviews_statement->fetchAll(PDO::FETCH_ASSOC);

    $database = null;

    $response = array(
        "reviews" => $reviews_data
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
