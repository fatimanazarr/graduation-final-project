<?php
session_start();

$username = "root";
$password = "";
$database = new PDO("mysql:host=localhost;dbname=db5;charset=utf8;", $username, $password);

if ($database) {
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $customerName = $_POST['CustomerName'];
        $customerPhone = $_POST['CustomerPhone'];
        $customerReview = $_POST['CustomerReview'];

        // Insert the new review into the database
        $insert_sql = "INSERT INTO reviews (CustomerName, CustomerPhone, CustomerReview) VALUES (?, ?, ?)";
        $insert_statement = $database->prepare($insert_sql);
        if ($insert_statement->execute([$customerName, $customerPhone, $customerReview])) {
            // Data inserted successfully, you can handle redirection or any other action here
            echo "Review posted successfully!";
            exit;
        } else {
            // Handle query execution error
            $errorInfo = $insert_statement->errorInfo();
            echo "Error executing insert query: " . $errorInfo[2];
            exit;
        }
    } else {
        // Query the reviews table and retrieve the existing reviews
        $reviews_sql = "SELECT CustomerName, CustomerReview FROM reviews";
        $reviews_statement = $database->query($reviews_sql);
        $reviews_data = $reviews_statement->fetchAll(PDO::FETCH_ASSOC);

        $database = null;

        $response = array(
            "reviews" => $reviews_data
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
