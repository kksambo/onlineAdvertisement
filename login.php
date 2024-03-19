<?php
// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve user input
    $username = $_POST['username'];
    $password = $_POST['password'];

    $host = "localhost";
    $username = "advibesc_Sambo";
    $password = "julie2284@";
    $database = "advibesc_products";


$conn = new mysqli($host, $sername, $assword, $database);
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Prepare and execute a query to fetch the hashed password for the given username
    $stmt = $conn->prepare("SELECT password FROM users WHERE username = ?");
    $stmt->bind_param("s", $username);
    $stmt->execute();
    $stmt->bind_result($hashedPassword);

    // Check if the username exists
    if ($stmt->fetch()) {
        // Verify the password
        if (password_verify($password, $hashedPassword)) {
            // Start a session
            session_start();

            // Store username in the session (you can store more information if needed)
            $_SESSION['username'] = $username;

            echo "Login successful!";
			        header("Location: home.php"); // Redirect to home page
        exit();
        } else {

            echo "Invalid password.";
        }
    } else {
        echo "Invalid username.";
    }

    // Close the database connection
    $stmt->close();
    $conn->close();
}
?>
