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
  input[type="checkbox"]{


  width:15px;
  height:15px;
background-color:#FFA333;

  }


	body{



	background-color: #C21460;

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
  padding: 14px 16px;
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
	color: white;
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
input[type="number"]{
display: none;
}


  </style>
</head>
<body>

<ul>
  <li><a class="active" href="index.php">Home</a></li>
  <li><a href="cart.html">Cart</a></li>
  <li><a href="contact.html">Contact</a></li>
  <li style="float:right"><a href="login.html">LogIn</a></li>
</ul>
<form class="" action="" method="post">
  <div class="search-container">
  <input class="search-input" type="text" name="search" value="" placeholder="type a key word">
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

$conn = new mysqli($host, $username, $password, $database);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
if (isset($_POST['submit'])) {
    // Form is submitted, process the data here

    // Example: Retrieving data from form fields
    $search = $_POST['search'];
    $sql = "SELECT name, price, description, location, image_path FROM products WHERE username = '$search' OR location = '$search' OR category = '$search' OR name = '$search' ORDER BY id DESC";
    $result = $conn->query($sql);

} else {
// SQL query to select specific columns from your table
$sql = "SELECT name, price, description, location, image_path FROM products ORDER BY id DESC";
$result = $conn->query($sql);
}
if ($result->num_rows > 0) {
    // Fetch associative array
    $data = $result->fetch_all(MYSQLI_ASSOC);

    // Convert PHP arrays to JavaScript arrays
    $nameArray = json_encode(array_column($data, 'name'));
    $priceArray = json_encode(array_column($data, 'price'));
    $descriptionArray = json_encode(array_column($data, 'description'));
    $locationArray = json_encode(array_column($data, 'location'));
    $pathArray = json_encode(array_column($data, 'image_path'));

    // Output JavaScript arrays
    echo "<script>";
    echo "var nameArray = $nameArray;";
    echo "var priceArray = $priceArray;";
    echo "var descriptionArray = $descriptionArray;";
    echo "var locationArray = $locationArray;";
    echo "var pathArray = $pathArray;";






echo "document.write(\"<div class='container'><br/><h1 class='text-center my-4'>Welcome to AdVibes</h1><br/><div class='row'>\");";
echo "function displayImages() {";
echo "const gallery = document.getElementById('forimg');";

echo "var index = 0;";
echo "pathArray.forEach((image) => {";
echo "document.write(\"<div class='col-lg-4 col-md-6 col-sm-12 mb-4'>\"+\"<div class='card' id='forimg'>\"+";
echo "\"<img src='\"+image+\"' class='card-img-top' alt='food'>\"+";
echo "\"<div class='card-body'>\"+\"<h5 class='card-title'>\"+nameArray[index]+\"</h5>\"+";
echo "\"<p class='\"+image+\"'>\"+descriptionArray[index]+\"</p>\"+";
echo "\"<p class='card-text'>R\"+priceArray[index]+\"</p>\"+";
echo "\"<input type='number'  min='1' placeholder='quantity' value=1  id='\"+image+\"'/><br/>\"+";
echo "\"<lable>SELECT</lable>\" + \"<input type='checkbox' value='\"+image+\"' id='value='\"+image+\"'/>\"+";
echo "\"<button class='button' onclick='displaySelectedImages()' style='vertical-align:middle'><span>viewCart</span></button>\"+\"</div></div></div>\");";


echo "index ++;";


echo "});";
echo "document.write(\"</div></div>\");";
echo "}";


echo "function displaySelectedImages() {";
echo "const selectedImages = document.querySelectorAll('input[type=\"checkbox\"]:checked');";
echo "const selectedImagePaths = Array.from(selectedImages).map(checkbox => checkbox.value);";
echo "const quantity = [];";
echo "const name = [];";
echo "const description = [];";
echo "const price = [];";
echo "for(var i=0; i< selectedImagePaths.length; i++){";
echo "var select = document.getElementById(selectedImagePaths[i]).value;";
echo "quantity.push(select);";




echo "}";
echo "sessionStorage.setItem('myArray', JSON.stringify(selectedImagePaths));";
echo "sessionStorage.setItem('mysizes', JSON.stringify(quantity));";
echo "window.location.href = 'cart.html';";
echo "}";
echo "displayImages();";







    echo "</script>";
} else {
    echo "Ads coming soon";
}

$conn->close();
?>
</html>
