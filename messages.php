<?php
session_start();

// Check if the user is logged in
if (!isset($_SESSION["username"])) {
    // If not logged in, redirect to the login page
    header("Location: login.html");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
 <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>STYLEHUB</title>
    <!-- Include Bootstrap CSS -->
   <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>


  <style>


  /* Container for chat boxes */
  #chatContainer {
      display: flex;
      flex-direction: column;
  }

  /* Styling for chat boxes */
  .chat-box {
      background-color: #3498db;
      border-radius: 15px;
      padding: 15px;
      margin: 15px;
      max-width: 100%;
      position: relative;
  }



  /* Styling for the sender's message */
  .chat-box.sent::before {
      right: 50%;
      left: auto;
      background-color: #4CAF50; /* Green color for sender */
      color: white;
  }

  input[type="checkbox"]{


  width:15px;
  height:15px;
background-color:#FFA333;

  }


	body{



	background-color: white;

	}


  ul {
  list-style-type: none;
  margin: 0;
  padding: 0;
  overflow: hidden;
  background-color: #3498db;

}

li {
  float: left;
  border-right:1px solid #bbb;
}

li:last-child {
  border-right: none;
}

li a {
  display: block;
  color: white;
  text-align: center;
  padding: 14px 8px;
  text-decoration: none;
border: 1px solid white;
border-radius: 5%;
}

li a:hover:not(.active) {
  background-color: #111;
}

.active {
  background-color: #FFA333;
}

.button {
  display: inline-block;
  border-radius: 4px;
  background-color: #f4511e;
  border: none;
  color: #FFFFFF;
  text-align: center;
  font-size: 14px;
  padding: 10px;
  width: 100px;
  transition: all 0.5s;
  cursor: pointer;
  margin: 5px;
}

.button span {
  cursor: pointer;
  display: inline-block;
  position: relative;
  transition: 0.5s;
}

.button span:after {
  content: '\00bb';
  position: absolute;
  opacity: 0;
  top: 0;
  right: -20px;
  transition: 0.5s;
}

.button:hover span {
  padding-right: 15px;
}

.button:hover span:after {
  opacity: 1;
  right: 0;
}
h1 {
	color: #3498db;
	font-family:  "Great Vibes", cursive;

	font-size: 36px;
	font-weight: 400;
	font-style: italic;
	line-height: 44px;
	margin: 0 0 12px;
	text-align: center;
}

select {
  background-color: #0563af;
  color: white;
  padding: 12px;
  width: 150px;
  border: none;
  font-size: 20px;
  box-shadow: 0 5px 25px rgba(0, 0, 0, 0.2);
  -webkit-appearance: button;
  appearance: button;
  outline: none;
}

.search-container {
    margin: 20px auto;
    max-width: 65%;
    display: flex;
}

.search-input {
    width: 70%;
    padding: 10px;
    border: 2px solid #3498db;
    border-radius: 5px 0 0 5px;
    outline: none;
    font-size: 16px;
    transition: border 0.3s;
}

.search-button {
    width: 30%;
    padding: 10px;
    border: 2px solid #3498db;
    border-radius: 0 5px 5px 0;
    background-color: #3498db;
    color: #fff;
    font-size: 16px;
    cursor: pointer;
    transition: background-color 0.3s, color 0.3s;
}

.search-input:focus {
    border-color: #2980b9;
}

.search-button:hover {
    background-color: #2980b9;
    color: #fff;
}
p{

color: white;


}
  </style>
</head>
<body>

  <ul>
    <li><a  href="home.php">Home</a></li>
    <li><a href="uploadd.html">addItems</a></li>
    <li><a class="active" href="messages.php">messages</a></li>
    <li style="float:right"><a href="sa.php">Logout</a></li>
  </ul>

  <form class="" action="" method="post">
    <div class="search-container">
    <input class="search-input" type="text" name="search" value="" placeholder="type key word">
    <button class="search-button" type="submit" name="submit">search</button>
  </div>

  </form>

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
<?php
// Database connection




$host = "localhost";
$username = "advibesc_Sambo";
$password = "julie2284@";
$database = "advibesc_products";

$conn = new mysqli($host, $sername, $password, $database);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
$user = $_SESSION["username"];
// SQL query to select specific columns from your table
if (isset($_POST['submit'])) {
    // Form is submitted, process the data here

    // Example: Retrieving data from form fields
    $search = $_POST['search'];
    $sql = "SELECT name, contact, location, message, time FROM messages WHERE seller = '$user' AND(name = '$search' OR contact = '$search' OR location = '$search') ORDER BY id DESC";
    $result = $conn->query($sql);

} else {
$sql = "SELECT name, contact, location, message, time FROM messages WHERE seller = '$user' ORDER BY id DESC";
$result = $conn->query($sql);
}
if ($result->num_rows > 0) {
    // Fetch associative array
    $data = $result->fetch_all(MYSQLI_ASSOC);

    // Convert PHP arrays to JavaScript arrays
    $nameArray = json_encode(array_column($data, 'name'));
    $contactArray = json_encode(array_column($data, 'contact'));
    $locationArray = json_encode(array_column($data, 'location'));
    $messageArray = json_encode(array_column($data, 'message'));
    $timeArray = json_encode(array_column($data, 'time'));


    // Output JavaScript arrays
    echo "<script>";
    echo "var nameArray = $nameArray;";
    echo "var contactArray = $contactArray;";
    echo "var locationArray = $locationArray;";
    echo "var messageArray = $messageArray;";
    echo "var timeArray = $timeArray;";





            //<tr><th>Question Paper</th><th>Memo</th><th>Attempt</th></tr></thead><tbody id="pdfList">






echo "function displayImages() {";


echo "var index = 0;";
echo "nameArray.forEach((image) => {";
echo "document.write(\"<div class='chat-box'>\");";

echo "document.write(\"<p>\"+timeArray[index]+\"</p>\");";
echo "document.write(\"<p><strong>\"+image+\"</strong></p>\");";
echo "document.write(\"<p>\"+messageArray[index]+\"</p>\");";
echo "document.write(\"<p><small>Contact : \"+contactArray[index]+\"</small></p>\");";
echo "document.write(\"<p><small>Location : \"+locationArray[index]+\"</small></p>\");";


echo "document.write(\"</div>\");";




echo "index ++;";


echo "});";

echo "}";

echo "displayImages();";

    echo "</script>";
} else {
    echo "no messages yet";
}

$conn->close();
?>
</html>
