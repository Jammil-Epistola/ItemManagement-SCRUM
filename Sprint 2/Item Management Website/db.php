<?php
$servername = "localhost";
$dbname = "item_management";
$username = "root";   // Default MySQL username for XAMPP
$password = ""; // Leave blank for XAMPP's default MySQL setup
// Create the connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check the connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

echo "Connected successfully";
?>