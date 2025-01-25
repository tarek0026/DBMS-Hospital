<?php
$servername = "localhost";
$username = "root";
$password = "";
$database = "hospital_system_db";
$conn = new mysqli($servername, $username, $password, $database);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} else {
    echo "Database connected successfully!";
}
?>