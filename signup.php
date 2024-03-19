<?php
// Database connection
$host = "localhost";
$username = "advibesc_Sambo";
$password = "julie2284@";
$database = "advibesc_products";


$conn = new mysqli($host, $username, $password, $database);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
function is_username_available($conn, $username) {
    $stmt = $conn->prepare("SELECT COUNT(*) FROM users WHERE username = ?");
    $stmt->bind_param("s", $username);
    $stmt->execute();
    $stmt->bind_result($count);
    $stmt->fetch();
    $stmt->close();

    // If the count is 0, the username is available; otherwise, it's already in use
    return $count == 0;
}
// Process form submission
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $newUsername = $_POST["username"];
    $newPassword = $_POST["password"];
   $idPhoto = $_POST["id_number"];
    $fullName = $_POST["full_name"];
    $surname = $_POST["surname"];
    $location = $_POST["location"];
    $contactNumber = $_POST["contact"];
    $email = $_POST["email"];
	$points = 5;
 $hashedPassword = password_hash($newPassword, PASSWORD_DEFAULT);

 if (is_username_available($conn, $newUsername)) {
    // Upload image
    $targetDir = "profile/";
    $targetFile = $targetDir . '/' . basename($_FILES["image"]["name"]);

    if ($_FILES["image"]["error"] == 0 && filesize($_FILES["image"]["tmp_name"]) > 0) {
        if (move_uploaded_file($_FILES["image"]["tmp_name"], $targetFile)) {
            // Insert data into the database
            $imagePath = $targetFile;
    $sql = "INSERT INTO users (username, password, profile_picture, id_photo, full_name, surname, location, contact_number, email, points) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ssssssssss", $newUsername, $hashedPassword, $imagePath, $idPhoto, $fullName, $surname, $location, $contactNumber, $email, $points);

            if ($stmt->execute()) {
                echo "<h1>signup successfull.</h1><br/>";
                echo"<a href='login.html'>login</a>";


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
  }else {
    echo "<h1>username taken</h1><br/>";
    echo"<a href='signup.html'>change username</a>";

  }
}

$conn->close();
?>
