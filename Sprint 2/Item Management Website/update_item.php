<?php
include 'db.php'; // Database connection

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $id = $_POST['id'];
    $item_number = $_POST['item_number'];
    $name = $_POST['name'];
    $quantity = $_POST['quantity'];
    $price = $_POST['price'];
    $category = $_POST['category'];

    // Update the existing item in the database
    $sql = "UPDATE items SET item_number='$item_number', name='$name', quantity='$quantity', price='$price', category='$category' WHERE id=$id";

    if ($conn->query($sql) === TRUE) {
        echo "Item updated successfully!";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}
?>
