<?php
// Database connection (reuse the connection code from upload.php)
// Database connection
$host = "localhost";
$username = "advibesc_Sambo";
$password = "julie2284@";
$database = "advibesc_products";

$conn = new mysqli($host, $username, $password, $database);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
// Retrieve products from the database
$sql = "SELECT * FROM products";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Product Display</title>
    <!-- Include Google Maps API with your API key -->
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDAG1rsGjLvH38oXzbMfftoRNJAmhpFGp8&libraries=places"></script>

    <style>
        #map {
            height: 300px;
            width: 100%;
        }
    </style>
</head>
<body>
    <h1>Product Display</h1>

    <?php
    while ($row = $result->fetch_assoc()) {
        echo "<div>";
        echo "<h2>" . $row["name"] . "</h2>";
        echo "<p>Description: " . $row["description"] . "</p>";
        echo "<p>Price: $" . $row["price"] . "</p>";
        echo "<p>Location: " . $row["location"] . "</p>";
        echo "<img src='" . $row["image_path"] . "' alt='Product Image' style='max-width: 300px;'><br>";

        // Display Google Maps with the product location
        echo "<div id='map'></div>";
        echo "<script>
            function initMap() {
                var map = new google.maps.Map(document.getElementById('map'), {
                    zoom: 12,
                    center: { lat: 0, lng: 0 } // You need to set the center based on your actual product location
                });

                var geocoder = new google.maps.Geocoder();
                geocodeAddress('" . $row["location"] . "', geocoder, map);
            }

            function geocodeAddress(address, geocoder, map) {
                geocoder.geocode({ 'address': address }, function (results, status) {
                    if (status === 'OK') {
                        map.setCenter(results[0].geometry.location);
                        var marker = new google.maps.Marker({
                            map: map,
                            position: results[0].geometry.location
                        });
                    } else {
                        console.error('Geocode was not successful for the following reason: ' + status);
                    }
                });
            }

            // Call the initMap function when the Google Maps API is loaded
            google.maps.event.addDomListener(window, 'load', initMap);
        </script>";

        echo "</div>";
    }

    $conn->close();
    ?>
</body>
</html>
