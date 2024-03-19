<?php
// Assuming you have a database connection established
$host = "localhost";
$username = "advibesc_Sambo";
$password = "julie2284@";
$database = "advibesc_products";

$conn = new mysqli($host, $username, $password, $database);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}



// Assuming the product name is passed through the URL
$productName = $_GET['name'];

// Fetch product information from the database
$sql = "SELECT name, price, description FROM products WHERE image_path = '$productName'";
$result = mysqli_query($conn, $sql);

if ($result) {
    $row = mysqli_fetch_assoc($result);

    if ($row) {
        // Return product information as JSON
        echo json_encode($row);
    } else {
        echo json_encode(['error' => 'Product not found']);
    }
} else {
    echo json_encode(['error' => 'Error fetching product information']);
}

// Close the database connection
mysqli_close($conn);
?>
