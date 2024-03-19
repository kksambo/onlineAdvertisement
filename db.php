<?php
// Replace with your actual database credentials
$host = "localhost";
$username = "advibesc_Sambo";
$password = "julie2284@";
$database = "advibesc_products";

$conn = new mysqli($host, $username, $password, $database);


// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>
