<?php 

$servername = "sql12.freemysqlhosting.net";
$username = "sql12569561";
$password = "vtpn6cIbZI";
$dbname = "sql12569561";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

?>
