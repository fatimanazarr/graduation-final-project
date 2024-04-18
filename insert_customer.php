<?php
$username = "root";
$password = "";
$database = new PDO("mysql:host=localhost;dbname=db5;", $username, $password);

if ($database) {
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $customerFirstName = $_POST['CustomerFirstName'];
        $customerLastName = $_POST['CustomerLastName'];
        $customerPhone = $_POST['CustomerPhone'];

        $select_sql = "SELECT * FROM customers WHERE CustomerFirstName = ? AND CustomerLastName = ? AND CustomerPhone = ?";
        $select_statement = $database->prepare($select_sql);
        if ($select_statement->execute([$customerFirstName, $customerLastName, $customerPhone])) {
            $result = $select_statement->fetch(PDO::FETCH_ASSOC);
            if ($result) {
                // Data already exists in the database, redirect to index.php with a message
                header("Location: index.php?message=Welcome back!");
                exit;
            } else {
                // Data does not exist in the database, redirect to index.php with a message
                header("Location: index.php?message=Welcome!");
                exit;
            }
        } else {
            // Handle query execution error
            $errorInfo = $select_statement->errorInfo();
            echo "Error executing query: " . $errorInfo[2];
            exit;
        }
    } else {
        // Handle invalid request method
        header("HTTP/1.1 405 Method Not Allowed");
        exit;
    }
} else {
    // Handle the error case
    header("HTTP/1.1 500 Internal Server Error");
    exit;
}
?>