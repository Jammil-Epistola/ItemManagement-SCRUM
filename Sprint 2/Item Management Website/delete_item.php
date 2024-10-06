<?php
include 'db.php'; // Database connection

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $id = $_POST['id'];

    // Delete the item from the database
    $sql = "DELETE FROM items WHERE id=$id";

    if ($conn->query($sql) === TRUE) {
        echo "Item deleted successfully!";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}
?>