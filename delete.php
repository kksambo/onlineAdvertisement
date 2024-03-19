<?php
// Assuming you have a database connection established

if (isset($_GET['name'])) {
    $name = $_GET['name'];

    $host = "localhost";
    $username = "advibesc_Sambo";
    $password = "julie2284@";
    $database = "advibesc_products";

$conn = new mysqli($host, $username, $password, $database);


// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

    $query = "DELETE FROM products WHERE image_path = '$name'";
    $result = $conn->query($query);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        echo json_encode($row);
    } else {
        echo json_encode(['error' => 'No matching records']);
    }

    $conn->close();
} else {
    echo json_encode(['error' => 'Name parameter not provided']);
}
?>
