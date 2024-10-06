<?php
include 'db.php'; // Database connection

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $item_number = $_POST['item_number'];
    $name = $_POST['name'];
    $quantity = $_POST['quantity'];
    $price = $_POST['price'];
    $category = $_POST['category'];

    // Insert the new item into the database
    $sql = "INSERT INTO items (item_number, name, quantity, price, category) VALUES ('$item_number', '$name', '$quantity', '$price', '$category')";

    if ($conn->query($sql) === TRUE) {
        echo "New item created successfully!";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}
?>
