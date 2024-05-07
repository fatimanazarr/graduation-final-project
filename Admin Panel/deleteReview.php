<?php
session_start();

$username = "root";
$password = "";
$database = new PDO("mysql:host=localhost;dbname=db5;charset=utf8;", $username, $password);

if ($database) {
    // Check if the customerID parameter is set and valid
    if (isset($_GET['customerID']) && is_numeric($_GET['customerID'])) {
        $customerID = $_GET['customerID'];

        // Delete the review with the given customerID
        $delete_sql = "DELETE FROM reviews WHERE CustomerID = :customerID";
        $delete_statement = $database->prepare($delete_sql);
        $delete_statement->bindParam(':customerID', $customerID, PDO::PARAM_INT);
        $delete_statement->execute();

        // Check if any rows were affected (review deleted)
        if ($delete_statement->rowCount() > 0) {
            // Success response
            header("HTTP/1.1 200 OK");
            exit;
        } else {
            // No review found with the given customerID
            header("HTTP/1.1 404 Not Found");
            exit;
        }
    } else {
        // Invalid or missing customerID parameter
        header("HTTP/1.1 400 Bad Request");
        exit;
    }
} else {
    // Database connection error
    header("HTTP/1.1 500 Internal Server Error");
    exit;
}
?>
