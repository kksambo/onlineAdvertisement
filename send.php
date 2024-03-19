
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
    $name = $_POST["name"];
    $contact = $_POST["contact"];
    $location = $_POST["location"];
	$message = $_POST["message"];
	$seller = $_POST["seller"];
  $time = $_POST["time"];

    // Upload image




            // Insert data into the database

            $sql = "INSERT INTO messages (name, contact, location, message, seller, time) VALUES (?, ?, ?, ?, ?, ?)";
            $stmt = $conn->prepare($sql);
            $stmt->bind_param("ssssss", $name, $contact, $location, $message, $seller, $time);

            if ($stmt->execute()) {
                echo "message sent succesfully.";
                echo "  <style>



                	body{



                	background-color: #C21460;

                	}


                  ul {
                  list-style-type: none;
                  margin: 0;
                  padding: 0;
                  overflow: hidden;
                  background-color: #333;

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
                border: 3px solid #C21460;
                border-radius: 20%;
                }

                li a:hover:not(.active) {
                  background-color: #111;
                }

                .active {
                  background-color: #C21460;
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


                .button1 {
                  display: inline-block;
                  border-radius: 4px;
                  background-color:#FFFFFF ;
                  border: none;
                  color:  #f4511e;
                  text-align: center;
                  font-size: 20px;
                  padding: 20px;
                  width: 200px;
                  transition: all 0.5s;
                  cursor: pointer;
                  margin: 5px;

                }

                .button1 span {
                  cursor: pointer;
                  display: inline-block;
                  position: relative;
                  transition: 0.5s;
                }

                .button1 span:after {
                  content: '\00bb';
                  position: absolute;
                  opacity: 0;
                  top: 0;
                  right: -20px;
                  transition: 0.5s;
                }

                .button1:hover span {
                  padding-right: 15px;
                }

                .button1:hover span:after {
                  opacity: 1;
                  right: 0;
                }

                h1 {
                	color: white;
                	font-family:  'Great Vibes', cursive;

                	font-size: 36px;
                	font-weight: 400;
                	font-style: italic;
                	line-height: 44px;
                	margin: 0 0 12px;
                	text-align: center;
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

                  </style>



<div class='container'><h1 class='text-center my-4'>message sent succesfully</h1><div class='row' id='sambo'>
<button onclick='checkout()' class='button1' style='vertical-align:middle'><span>BACK</span></button>
<script>
function checkout(){

window.location.href = 'cart.html';

}

</script>


                  ";
            } else {
                echo "Error: " . $stmt->error;
            }

            $stmt->close();








}










// Process form submission


$conn->close();

?>
