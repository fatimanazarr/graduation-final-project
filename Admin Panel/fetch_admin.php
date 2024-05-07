<?php
session_start();

$username = "root";
$password = "";
$database = new PDO("mysql:host=localhost;dbname=db5;charset=utf8;", $username, $password);

if ($database) {
    // Query the admins table and retrieve the data
    $admins_sql = "SELECT * FROM admins";
    $admins_statement = $database->prepare($admins_sql);
    $admins_statement->execute();
    $admins_data = $admins_statement->fetchAll(PDO::FETCH_ASSOC);

    $database = null;

    $response = array(
        "admins" => $admins_data
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