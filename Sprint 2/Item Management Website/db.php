<?php
// Database connection details
$dsn = 'mysql:host=localhost;dbname=item_management'; // Adjust if necessary
$username = 'root';  // MySQL username (default for XAMPP)
$password = 'enriquezzZ@558';      // MySQL password (default is empty for XAMPP)

// Create a new PDO connection
try {
    $pdo = new PDO($dsn, $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    // Display detailed error message
    die('Connection failed: ' . $e->getMessage());
}
?>