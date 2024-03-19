<?php
// Replace these values with your actual database credentials//
$host = "localhost";
$username = "advibesc_Sambo";
$password = "julie2284@";
$database = "advibesc_products";

$conn = new mysqli($host, $username, $password, $database);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}


$filePath = $_GET['filePath'];
echo $filePath;
// Fetch data from the database based on the file path
$sql = "SELECT * FROM products WHERE image_path = '$filePath'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    echo "<div>";
    while ($row = $result->fetch_assoc()) {
        echo "<p>Name: " . $row['name'] . "</p>";
        echo "<p>Description: " . $row['description'] . "</p>";

    }
    echo "</div>";
} else {
    echo "<p>No data found for file path: $filePath</p>";
}

$conn->close();
?>
