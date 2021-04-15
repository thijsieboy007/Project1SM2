<?php
define("SERVERNAME", "localhost");
define("USERNAME", "root");
define("PASSWORD", "");
define("DBNAME", "restaurantgh");

$conn = mysqli_connect(SERVERNAME, USERNAME, PASSWORD, DBNAME);

if (mysqli_connect_errno()) {
    echo "Failed to connect to MySQL: " . mysqli_connect_error();
}
?>