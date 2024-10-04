<?php
$host = 'localhost';
$dbname = 'item_management_db';
$username = 'root'; // Default MySQL username for XAMPP
$password = 'enriquezzZ@558'; // Leave blank for XAMPP's default MySQL setup

try {
    $pdo = new PDO('mysql:host=localhost;dbname=item_management_db', 'root', 'enriquezzZ@558'); // Use your DB credentials
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    echo "Connected successfully"; // For debugging
} catch (PDOException $e) {
    echo "Connection failed: " . $e->getMessage(); // For debugging
}
?>