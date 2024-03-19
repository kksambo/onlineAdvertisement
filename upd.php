<?php
// Database connection
session_start();

// Check if the user is logged in
if (!isset($_SESSION["username"])) {
    // If not logged in, redirect to the login page
    header("Location: login.html");
    exit();
}



$host = "localhost";
$username = "advibesc_Sambo";
$password = "julie2284@";
$database = "advibesc_products";




// Process form submission
if ($_SERVER["REQUEST_METHOD"] === "POST") {

$user = $_SESSION["username"];

    // Upload image
    $targetDir = "profile/";
    $targetFile = $targetDir . '/' . basename($_FILES["image"]["name"]);

    if ($_FILES["image"]["error"] == 0 && filesize($_FILES["image"]["tmp_name"]) > 0) {
        if (move_uploaded_file($_FILES["image"]["tmp_name"], $targetFile)) {
            // Insert data into the database
            try {
                $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
                $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

                $newFilePath = $targetFile;

                $sql = "UPDATE users SET profile_picture = :newFilePath WHERE username='$user'";
                $stmt = $conn->prepare($sql);
                $stmt->bindParam(':newFilePath', $newFilePath);
                $stmt->execute();
                header("Location: home.php");
                exit();
            } catch (PDOException $e) {
                echo "Error: " . $e->getMessage();
            }

            $conn = null;



        }






        else {
            echo "Error moving uploaded file to the target directory.";
        }
    } else {
        echo "Error uploading file or file size is 0kb.";
    }

}

?>
