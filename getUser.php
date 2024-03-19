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
	color: #3498db;
	font-family:  "Great Vibes", cursive;

	font-size: 36px;
	font-weight: 400;
	font-style: italic;
	line-height: 44px;
	margin: 0 0 12px;
	text-align: center;
}



.search-container {
    margin: 20px auto;
    max-width: 45%;
    display: flex;
}


.search-button {
    width: 100%;
    padding: 10px;
    border: 2px solid #3498db;
    border-radius: 5px;
    background-color: #3498db;
    color: #fff;
    font-size: 16px;
    cursor: pointer;
    transition: background-color 0.3s, color 0.3s;
}

.search-button:hover {
    background-color: #2980b9;
    color: #fff;
}

input{

display: none;

}
}

.profile-container {
  background-color: WHITE;
  border-radius: 10px;
  box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
  overflow: hidden;
  max-width: 400px;
  width: 30%;
  text-align: center;
}

.profile-picture {
  width: 100%;
  height: 200px;
  background: WHITE; /* Placeholder color */
  color: #fff;
  display: flex;
  align-items: center;
  justify-content: center;
}

.profile-picture img {
  border-radius: 5%;
  width: 250px;
  height: 200px;
  object-fit: cover;
}
img:hover{

  width: 400px;
  height: 400px;
}
.user-details {
  padding: 20px;
}

h1 {
  margin-bottom: 10px;
  color: #333;
}

p {
  color: #666;
  margin-bottom: 20px;
  text-align: center;
}

.bbutton {
  background-color: #3498db;
  color: #fff;
  padding: 10px 20px;
  text-decoration: none;
  border-radius: 5px;
  display: inline-block;
  text-align: center;
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
  <input id="seller" class="search-input" type="text" name="search" value="">
  <button class="search-button" type="submit" name="submit">viewSeller</button>
</div>

</form>
<script>

  const ameArray = JSON.parse(sessionStorage.getItem('myArray'));
  const sizeArray = JSON.parse(sessionStorage.getItem('mysizes'));
let index = 0;
    async function fetchInfoFromPHP(name) {
        const apiUrl = `fetchInfo.php?name=${name}`;
        const response = await fetch(apiUrl);
        return response.json();
    }

    async function fetchData() {
        for (const name of ameArray) {
            const info = await fetchInfoFromPHP(name);

document.getElementById('seller').value = `${info.username}`;







        }

    }

    fetchData();
</script>

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
    $sql = "SELECT username, profile_picture, full_name, surname, location, email, contact_number FROM users WHERE username = '$search'";
    $result = $conn->query($sql);


    // Fetch associative array
    $data = $result->fetch_all(MYSQLI_ASSOC);

    // Convert PHP arrays to JavaScript arrays
    $nameArray = json_encode(array_column($data, 'username'));
    $emailArray = json_encode(array_column($data, 'email'));
    $imageArray = json_encode(array_column($data, 'profile_picture'));
    $locationArray = json_encode(array_column($data, 'location'));
    $fullNameArray = json_encode(array_column($data, 'full_name'));
    $surnameArray = json_encode(array_column($data, 'surname'));
    $cellArray = json_encode(array_column($data, 'contact_number'));



    // Output JavaScript arrays
    echo "<script>";
    echo "var nameArray = $nameArray;";
    echo "var emailArray = $emailArray;";
    echo "var imageArray = $imageArray;";
    echo "var locationArray = $locationArray;";
    echo "var fullNameArray = $fullNameArray;";
    echo "var surnameArray = $surnameArray;";
    echo "var cellArray = $cellArray;";






echo "document.write(\"<div class='container'>\");";
echo "function displayImages() {";
echo "const gallery = document.getElementById('forimg');";

echo "var index = 0;";

echo "document.write(\"<div class='profile-picture'><img src='\"+imageArray[index]+\"' alt='Profile Picture'></div>\"+";

echo "\"<div class='user-details'><h1>\"+nameArray[index]+\"</h1><p>Name :\"+fullNameArray[index]+\" \"+surnameArray[index]+\"</p></h1><p>Location :\"+locationArray[index]+\"</p><p>Cell No :\"+cellArray[index]+\"</p><p>email :\"+emailArray[index]+\"</p><a href='contactSeller.html' class='bbutton'>contactSeller</a></div>\");";





echo "document.write(\"</div></div>\");";
echo "}";



echo "displayImages();";







    echo "</script>";
}

$conn->close();
?>
</html>
