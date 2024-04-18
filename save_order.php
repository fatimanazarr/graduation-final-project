<?php
// Function to calculate total price
function calculateTotalPrice($selectedItems) {
    $totalPrice = 0;

    foreach ($selectedItems as $item) {
        $totalPrice += $item['TotalPrice'] * $item['Quantity'];
    }

    return $totalPrice;
}

// Connect to MySQL database
$servername = "localhost";
$username = "root";
$password = "";
$database = "db5";

// Create connection
$conn = new mysqli($servername, $username, $password, $database);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Set character set to UTF-8
$conn->set_charset("utf8");

// Retrieve form data
$orderData = json_decode(file_get_contents("php://input"), true);

$customerFirstName = $orderData['first-name'];
$orderType = $orderData['order-type'];
$tableNumber = $orderData['table-number'];
$pickupTime = $orderData['pickup-time-input'];
$selectedItems = $orderData['selectedItems'];

// Calculate total price using the function
$totalPrice = calculateTotalPrice($selectedItems);

// Get the current date and time
$created_at = date('Y-m-d H:i:s');

// Initialize variables to store concatenated order details
$dishNames = "";
$dishDescriptions = "";
$dishPrices = "";
$quantities = "";

$orderUUID = uniqid(); // This generates a unique identifier

// Loop through selected items and concatenate order details
foreach ($selectedItems as $item) {
    $dishNames .= $item['DishName'] . ",";
    $dishDescriptions .= $item['DishDescription'] . ",";
    $dishPrices .= $item['TotalPrice'] . ",";
    $quantities .= $item['Quantity'] . ",";
}

// Remove trailing comma from concatenated strings
$dishNames = rtrim($dishNames, ",");
$dishDescriptions = rtrim($dishDescriptions, ",");
$dishPrices = rtrim($dishPrices, ",");
$quantities = rtrim($quantities, ",");

// Insert order data into the database
$sql = "INSERT INTO orders (orderUUID, dishName, dishDesc, dishPrice, quantity, orderType, tableNumber, pickupTime, customerFirstName, totalPrice, created_at)
        VALUES ('$orderUUID','$dishNames', '$dishDescriptions', '$dishPrices', '$quantities', '$orderType', '$tableNumber', '$pickupTime', '$customerFirstName', '$totalPrice', '$created_at')";

if ($conn->query($sql) !== TRUE) {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

// Close connection
$conn->close();

// Send response
$response = array("message" => "Order saved successfully");
echo json_encode($response);
?>
