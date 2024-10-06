<?php
include 'db.php'; // Database connection

// Check if there's a search query
$search = isset($_GET['search']) ? $_GET['search'] : '';

// Prepare the SQL query, including search functionality
if (!empty($search)) {
    $sql = "SELECT * FROM items WHERE name LIKE '%$search%'";
} else {
    $sql = "SELECT * FROM items";
}

$result = $conn->query($sql);

// Check if items exist
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        echo "<tr>";
        echo "<td>" . htmlspecialchars($row['item_number']) . "</td>";
        echo "<td>" . htmlspecialchars($row['name']) . "</td>";
        echo "<td>" . htmlspecialchars($row['quantity']) . "</td>";
        echo "<td>" . htmlspecialchars($row['price']) . "</td>";
        echo "<td>" . htmlspecialchars($row['category']) . "</td>";
        echo "<td>
                <button class='edit-btn' 
                    data-id='" . htmlspecialchars($row['id']) . "'
                    data-item-number='" . htmlspecialchars($row['item_number']) . "'
                    data-name='" . htmlspecialchars($row['name']) . "'
                    data-quantity='" . htmlspecialchars($row['quantity']) . "'
                    data-price='" . htmlspecialchars($row['price']) . "'
                    data-category='" . htmlspecialchars($row['category']) . "'>
                    Edit
                </button>
                <button class='delete-btn' data-id='" . htmlspecialchars($row['id']) . "'>Delete</button>
              </td>";
        echo "</tr>";
    }
} else {
    echo "<tr><td colspan='6'>No items found.</td></tr>";
}
?>