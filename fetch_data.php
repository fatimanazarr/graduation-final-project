<?php
session_start();

$username = "root";
$password = "";
$database = new PDO("mysql:host=localhost;dbname=db5;charset=utf8;", $username, $password);

if ($database) {
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $customerFirstName = $_POST['CustomerFirstName'];
        $customerLastName = $_POST['CustomerLastName'];
        $customerPhone = $_POST['CustomerPhone'];

        // Check if the data already exists in the database
        $select_sql = "SELECT * FROM customers WHERE  CustomerPhone = ?";
        $select_statement = $database->prepare($select_sql);
        if ($select_statement->execute([$customerPhone])) {
            $result = $select_statement->fetch(PDO::FETCH_ASSOC);
            if ($result) {
                // Data already exists in the database, redirect to index.php with a message
                $_SESSION['username'] = $customerFirstName; // Save the username in the session
                header("Location: index.php?message=Welcome back!");
                exit;
            }
        } else {
            // Handle query execution error
            $errorInfo = $select_statement->errorInfo();
            echo "Error executing select query: " . $errorInfo[2];
            exit;
        }

        // Insert the data into the database
        $insert_sql = "INSERT INTO customers (CustomerFirstName, CustomerLastName, CustomerPhone) VALUES (?, ?, ?)";
        $insert_statement = $database->prepare($insert_sql);
        if ($insert_statement->execute([$customerFirstName, $customerLastName, $customerPhone])) {
            // Data inserted successfully, redirect to index.php with a message
            $_SESSION['username'] = $customerFirstName; 
            header("Location: index.php?message=Welcome!");
            exit;
        } else {
            // Handle query execution error
            $errorInfo = $insert_statement->errorInfo();
            echo "Error executing insert query: " . $errorInfo[2];
            exit;
        }
    } else {
        // Query the menu table and retrieve the data
        $menu_sql = "SELECT DishID, DishCategory, DishName, DishDescription, TotalPrice FROM menu";
        $menu_statement = $database->query($menu_sql);
        $menu_data = $menu_statement->fetchAll(PDO::FETCH_ASSOC);

        $images_sql = "SELECT DishName, Dishimage FROM images"; // Select only the 'image' column
        $images_statement = $database->query($images_sql);
        $images_data = $images_statement->fetchAll(PDO::FETCH_ASSOC);

        $reviews_sql = "SELECT CustomerName, CustomerReview FROM reviews";
        $reviews_statement = $database->query($reviews_sql);
        $reviews_data = $reviews_statement->fetchAll(PDO::FETCH_ASSOC);

        $database = null;

        $response = array(
            "menu" => $menu_data,
            "images" => $images_data,
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
