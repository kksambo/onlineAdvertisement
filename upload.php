





<?php

session_start();
$user = $_SESSION["username"];
// Check if the user is logged in
if (!isset($_SESSION["username"])) {
    // If not logged in, redirect to the login page
    header("Location: login.html");
    exit();
}




// Database connection
$host = "localhost";
$username = "advibesc_Sambo";
$password = "julie2284@";
$database = "advibesc_products";

$conn = new mysqli($host, $username, $password, $database);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}



$query = "SELECT points FROM users WHERE username = '$user'";

// Execute the query
$result = mysqli_query($conn, $query);

// Check if the query was successful
if ($result) {
    // Fetch the result as an associative array
    $row = mysqli_fetch_assoc($result);

    // Check if the row exists and the column is set
    if ($row && isset($row['points'])) {
        // Store the value in a variable and convert it to an integer
        $yourValue = intval($row['points']);

if($yourValue > 0){


if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $name = $_POST["name"];
    $description = $_POST["description"];
    $price = $_POST["price"];
    $location = $_POST["location"];
    $category = $_POST["category"];
	$usernam = $_SESSION["username"];

    // Upload image
    $targetDir = "uploads/";
    $targetFile = $targetDir . '/' . basename($_FILES["image"]["name"]);

    if ($_FILES["image"]["error"] == 0 && filesize($_FILES["image"]["tmp_name"]) > 0) {
        if (move_uploaded_file($_FILES["image"]["tmp_name"], $targetFile)) {
            // Insert data into the database
            $imagePath = $targetFile;
            $sql = "INSERT INTO products (name, description, price, location, image_path, username, category) VALUES (?, ?, ?, ?, ?, ?, ?)";
            $stmt = $conn->prepare($sql);
            $stmt->bind_param("ssdssss", $name, $description, $price, $location, $imagePath, $usernam, $category);

            if ($stmt->execute()) {
                echo "Product uploaded successfully.";
            } else {
                echo "Error uploading product: " . $stmt->error;
            }

            $stmt->close();
        } else {
            echo "Error moving uploaded file to the target directory.";
        }
    } else {
        echo "Error uploading file or file size is 0kb.";
    }


$query = "UPDATE users SET points = points - 1 WHERE username = '$user'";

// Execute the query
$result = mysqli_query($conn, $query);

// Check if the query was successful
if ($result) {
  header("Location: home.php");
  exit();
} else {
    echo "Error updating value: " . mysqli_error($conn);
}


}



}else{
	echo "<script>";
	//echo "alert('<a href="home.php"></a>');";
	echo "document.write(\"<p>your points has finished</p><a href='home.php'>home<a>\");";
	echo "</script>";

}

    } else {
        echo "No data found or column not set.";
    }
} else {
    echo "Error executing query: " . mysqli_error($conn);
}





// Process form submission


$conn->close();

?>
