// Search functionality script
function searchItems() {
    const input = document.getElementById('searchBar').value.toLowerCase();
    const tableRows = document.querySelectorAll('tbody tr');

    tableRows.forEach(row => {
        const name = row.cells[1].textContent.toLowerCase();
        const category = row.cells[4].textContent.toLowerCase();
        row.style.display = name.includes(input) || category.includes(input) ? '' : 'none'; // Show/Hide row
    });
}

// Add search functionality on keyup event
document.getElementById('searchBar').addEventListener('keyup', searchItems);
document.getElementById('searchButton').addEventListener('click', searchItems);

document.addEventListener("DOMContentLoaded", function() {
    fetchItems();
});

async function fetchItems() {
    try {
        const response = await fetch('http://localhost/item_management/items.php');

        if (!response.ok) throw new Error('Network response was not ok');

        const items = await response.json();
        console.log('Fetched items:', items); // Log fetched items

        const tableBody = document.querySelector("#itemTable tbody");
        tableBody.innerHTML = ""; // Clear the existing table body

        items.forEach(item => {
            const row = `
                <tr> 
                    <td>${item.itemNumber}</td>
                    <td>${item.name}</td>
                    <td>P ${parseFloat(item.price).toFixed(2)}</td>
                    <td>${item.quantity}</td>
                    <td>${item.category}</td>
                    <td class="action-buttons">
                        <button class="edit" onclick="editItem(this)">Edit</button>
                        <button class="delete" onclick="deleteItem(this)">Delete</button>
                    </td>
                </tr>
            `;
            tableBody.insertAdjacentHTML('beforeend', row); // Add new row to the table
        });
    } catch (error) {
        console.error('Error fetching items:', error);
    }
}
  

// Show Add Item Form
document.querySelector(".add-item-button").addEventListener("click", function() {
    document.querySelector(".add-item-form").style.display = "block";
});

// Cancel Add Item
document.querySelector("#cancelAddItem").addEventListener("click", function() {
    document.querySelector(".add-item-form").style.display = "none";
});


    async function addItem() {
        const itemNumber = document.getElementById('newItemNumber').value;
        const itemName = document.getElementById('newItemName').value;
        const itemPrice = document.getElementById('newItemPrice').value;
        const itemQuantity = document.getElementById('newItemQuantity').value;
        const itemCategory = document.getElementById('newItemCategory').value;
    
        const newItem = { 
            itemNumber, 
            name: itemName, 
            price: parseFloat(itemPrice), // Make sure this is a number
            quantity: parseInt(itemQuantity), // Make sure this is a number
            category: itemCategory 
        };
        
    try {
        const response = await fetch('http://localhost/item_management/add_item.php', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
            },
            body: JSON.stringify(newItem)
        });

        if (!response.ok) throw new Error('Failed to add item');

        // After successfully adding, refresh the item list
        fetchItems();
        hideAddItemForm(); // Hide the form after adding
    } catch (error) {
        console.error('Error adding item:', error);
    }
}


// Edit item function
async function updateItem(itemNumber) {
    const updatedItem = {
        itemNumber: document.getElementById('newItemNumber').value,
        name: document.getElementById('newItemName').value,
        price: document.getElementById('newItemPrice').value,
        quantity: document.getElementById('newItemQuantity').value,
        category: document.getElementById('newItemCategory').value
    };

    try {
        const response = await fetch(`http://localhost/item_management/items.php?id=${itemNumber}`, {
            method: 'PUT',
            headers: {
                'Content-Type': 'application/json',
            },
            body: JSON.stringify(updatedItem)
        });

        const result = await response.json();
        console.log(result);
        if (response.ok) {
            fetchItems(); // Refresh the item list
            hideAddItemForm();
        } else {
            console.error('Error:', result.message);
        }
    } catch (error) {
        console.error('Error updating item:', error);
    }
}

async function deleteItem(itemNumber) {
    try {
        const response = await fetch(`http://localhost/item_management/items.php?id=${itemNumber}`, {
            method: 'DELETE',
            headers: {
                'Content-Type': 'application/json',
            }
        });

        const result = await response.json();
        console.log(result);
        if (response.ok) {
            fetchItems(); // Refresh the item list
        } else {
            console.error('Error:', result.message);
        }
    } catch (error) {
        console.error('Error deleting item:', error);
    }
}

