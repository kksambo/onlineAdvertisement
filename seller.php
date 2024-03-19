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


  @import url('https://fonts.googleapis.com/css?family=Poppins:400,500,600,700&display=swap');
  *{
    margin: 0;
    padding: 0;
    outline: none;
    box-sizing: border-box;
    font-family: 'Poppins', sans-serif;
  }
  body{

    align-items: center;
    justify-content: center;
    min-height: 100vh;
    padding: 10px;
    font-family: 'Poppins', sans-serif;
  background-color: #C21460;
  }



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


}

.profile-container {
  background-color: #C21460;
  border-radius: 10px;
  box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
  overflow: hidden;
  max-width: 400px;
  width: 30%;
  text-align: center;
}

.profile-picture {
  width: 100%;
  height: 360px;
  background: #C21460; /* Placeholder color */
  color: #fff;
  display: flex;
  align-items: center;
  justify-content: center;
}

.profile-picture img {
  margin-top: auto;
  border-radius: 5%;
  width: 100%;
  height: 350px;
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
  color: white;
}

p {
  color: white;
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
.container{
  max-width: 800px;
  background: #fff;
  width: 100%;
  padding: 25px 40px 10px 40px;
  box-shadow: 0px 0px 10px rgba(0,0,0,0.1);
}
.container .text{
  text-align: center;
  font-size: 41px;
  font-weight: 600;
  font-family: 'Poppins', sans-serif;
 background-color:#C21460;
  -webkit-background-clip: text;
  -webkit-text-fill-color: transparent;
}
.container form{
  padding: 30px 0 0 0;
}
.container form .form-row{
  display: flex;
  margin: 32px 0;
}
form .form-row .input-data{
  width: 100%;
  height: 40px;
  margin: 0 20px;
  position: relative;
}
form .form-row .textarea{
  height: 70px;
}
.input-data input,
.textarea textarea{
  display: block;
  width: 100%;
  height: 100%;
  border: none;
  font-size: 17px;
  border-bottom: 2px solid rgba(0,0,0, 0.12);
}
.input-data input:focus ~ label, .textarea textarea:focus ~ label,
.input-data input:valid ~ label, .textarea textarea:valid ~ label{
  transform: translateY(-20px);
  font-size: 14px;
  color: #3498db;
}
.textarea textarea{
  resize: none;
  padding-top: 10px;
}
.input-data label{
  position: absolute;
  pointer-events: none;
  bottom: 10px;
  font-size: 16px;
  transition: all 0.3s ease;
}
.textarea label{
  width: 100%;
  bottom: 40px;
  background: #fff;
}
.input-data .underline{
  position: absolute;
  bottom: 0;
  height: 2px;
  width: 100%;
}
.input-data .underline:before{
  position: absolute;
  content: "";
  height: 2px;
  width: 100%;
  background: #3498db;
  transform: scaleX(0);
  transform-origin: center;
  transition: transform 0.3s ease;
}
.input-data input:focus ~ .underline:before,
.input-data input:valid ~ .underline:before,
.textarea textarea:focus ~ .underline:before,
.textarea textarea:valid ~ .underline:before{
  transform: scale(1);
}
.submit-btn .input-data{
  overflow: hidden;
  height: 45px!important;
  width: 25%!important;
}
.submit-btn .input-data .inner{
  height: 100%;
  width: 300%;
  position: absolute;
  left: -100%;
  background: -webkit-linear-gradient(right, #56d8e4, #9f01ea, #56d8e4, #9f01ea);
  transition: all 0.4s;
}
.submit-btn .input-data:hover .inner{
  left: 0;
}
.submit-btn .input-data input{
  background: none;
  border: none;
  color: #fff;
  font-size: 17px;
  font-weight: 500;
  text-transform: uppercase;
  letter-spacing: 1px;
  cursor: pointer;
  position: relative;
  z-index: 2;
}
@media (max-width: 700px) {
  .container .text{
    font-size: 30px;
  }
  .container form{
    padding: 10px 0 0 0;
  }
  .container form .form-row{
    display: block;
  }
  form .form-row .input-data{
    margin: 35px 0!important;
  }
  .submit-btn .input-data{
    width: 40%!important;
  }
}

#sellers{

  display: none;
}
#times{

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
if ($_SERVER["REQUEST_METHOD"] === "POST") {
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






echo "document.write(\"<div class='contaainer'>\");";
echo "function displayImages() {";
echo "const gallery = document.getElementById('forimg');";

echo "var index = 0;";

echo "document.write(\"<br/><div class='profile-picture'><img src='\"+imageArray[index]+\"' alt='Profile Picture'></div>\"+";

echo "\"<div class='user-details'><h1>\"+nameArray[index]+\"</h1><p>Name :\"+fullNameArray[index]+\" \"+surnameArray[index]+\"</p></h1><p>Location :\"+locationArray[index]+\"</p><p>Cell No :\"+cellArray[index]+\"</p><p>email :\"+emailArray[index]+\"</p></div>\");";





echo "document.write(\"</div></div>\");";
echo "}";



echo "displayImages();";







    echo "</script>";
}

$timess = date('Y-m-d H:i:s');
echo"<div class='container'>
      <div id='one'class='text'>
leave a message to  $search
      </div>
      <form action='send.php' method='post' enctype='multipart/form-data'>
         <div class='form-row'>
            <div class='input-data'>
               <input name='name' type='text' required>
               <div class='underline'></div>
               <label for=''>Name</label>
            </div>
            <div class='input-data'>
               <input name='contact' type='text' required>
               <div class='underline'></div>
               <label for=''>contact</label>
            </div>
         </div>
         <div class='form-row'>
            <div class='input-data'>
               <input name='location' type='text' required>
               <div class='underline'></div>
               <label for=''>location</label>
            </div>
            <div id='sellers' class='input-data'>
               <input id='seller' name='seller' type='text' value= $search required>
               <div class='underline'></div>
               <label for=''>seller</label>
            </div>
            <div id='times' class='input-data'>
               <input id='time' value=$timess name='time' type='text'>
               <div class='underline'></div>
               <label for=''>Time</label>
            </div>
         </div>
         <div class='form-row'>
         <div class='input-data textarea'>
            <textarea name='message' rows='8' cols='80' required></textarea>
            <br />
            <div class='underline'></div>
            <label for=''>Write your message</label>
            <br />
            <div class='form-row submit-btn'>
               <div class='input-data'>
                  <div class='inner'></div>
                  <input type='submit' value='submit'>
               </div>
            </div>
      </form>
      </div>";
$conn->close();
?>
</html>
