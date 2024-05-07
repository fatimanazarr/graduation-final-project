<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>المكونات</title>
    <link rel="stylesheet" href="admin.css">
</head>
<body>
    <section id="productsTable">
        <h1>المكونات</h1>
        <div>
            <table>
                <thead>
                    <tr>
                        <th>اسم المكون</th>
                        <th>الكمية</th>
                        <th>السعر</th>
                        <th>تعديل</th>
                        <th>حذف</th> <!-- Add a new column for the delete button -->
                    </tr>
                </thead>
                <tbody>
                    <!-- Table rows with data will go here -->
                </tbody>
            </table>
        </div>
    </section>

    <!-- Pop-up card -->
    <div id="popupCard" class="popupCard">
        <div class="popupContent">
            <span class="closeButton" onclick="closePopupCard()">&times;</span>
            <form id="editForm">
                <label for="editName">اسم المكون:</label>
                <input type="text" id="editName" name="editName" ><br><br>
                <label for="editQuantity">الكمية:</label>
                <input type="text" id="editQuantity" name="editQuantity" ><br><br>
                <label for="editPrice">السعر:</label>
                <input type="text" id="editPrice" name="editPrice" ><br><br>
                <input type="submit" value="تأكيد التعديل" onclick="submitForm(event)">
            </form>
        </div>
    </div>
    <div class="button-container">
        <button class="return-btn" onclick="redirect('dashboard.php')">العودة للصفحة الرئيسية</button>
    </div>
    <!-- JavaScript code -->
    <script>
        function fetchDataAndPopulateTable() {
            fetch('fetchProducts.php')
            .then(response => response.json())
            .then(data => {
                // Get the table body element
                var tbody = document.querySelector('#productsTable tbody');

                // Clear any existing rows from the table
                tbody.innerHTML = '';

                // Loop through the fetched data and populate the table
                data.products.forEach(product => {
                    // Create a new row
                    var row = document.createElement('tr');

                    // Create table data cells for each property
                    var nameCell = document.createElement('td');
                    nameCell.textContent = product.productName;

                    var quantityCell = document.createElement('td');
                    quantityCell.textContent = product.productQuantity;

                    var priceCell = document.createElement('td');
                    priceCell.textContent = product.price;

                    var editCell = document.createElement('td'); // Create cell for the edit button

                    // Create the edit button element
                    var editButton = document.createElement('button');
                    editButton.textContent = 'تعديل'; // Set button text
                    editButton.addEventListener('click', function() {
                        // Show the pop-up card
                        document.getElementById('popupCard').style.display = 'block';

                        // Populate the form inputs with data from the selected row
                        document.getElementById('editName').value = product.productName;
                        document.getElementById('editQuantity').value = product.productQuantity;
                        document.getElementById('editPrice').value = product.price;
                    });

                    // Append the edit button to the cell
                    editCell.appendChild(editButton);

                    // Create the delete button element
                    var deleteButton = document.createElement('button');
                    deleteButton.textContent = 'حذف'; // Set button text
                    deleteButton.addEventListener('click', function() {
                        // Call the function to delete the product
                        deleteProduct(product.productName);
                    });

                    // Create cell for the delete button
                    var deleteCell = document.createElement('td');
                    // Append the delete button to the cell
                    deleteCell.appendChild(deleteButton);

                    // Append cells to the row
                    row.appendChild(nameCell);
                    row.appendChild(quantityCell);
                    row.appendChild(priceCell);
                    row.appendChild(editCell); // Append the edit button cell
                    row.appendChild(deleteCell); // Append the delete button cell

                    // Append the row to the table body
                    tbody.appendChild(row);
                });
            })
            .catch(error => console.error('Error fetching data:', error));
        }

        // Call the function when the page loads
        fetchDataAndPopulateTable();

        // Function to close the pop-up card
        function closePopupCard() {
            document.getElementById('popupCard').style.display = 'none';
        }

        // Function to delete the product
        function deleteProduct(productName) {
            // Confirm deletion
            if (confirm('هل أنت متأكد من حذف المنتج؟')) {
                // Perform POST request to server
                fetch('deleteProduct.php', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json'
                    },
                    body: JSON.stringify({ productName: productName })
                })
                .then(response => {
                    if (!response.ok) {
                        throw new Error('Network response was not ok');
                    }
                    return response.json();
                })
                .then(data => {
                    // Handle response from server
                    console.log(data); // Log the response for debugging
                    // Update the table with the edited data
                    fetchDataAndPopulateTable();
                })
                .catch(error => console.error('Error deleting product:', error));
            }
        }

        // Function to submit the form
        function submitForm(event) {
            event.preventDefault(); // Prevent the default form submission

            // Get form data
            var formData = new FormData(document.getElementById('editForm'));

            // Convert form data to JSON
            var jsonData = {};
            formData.forEach((value, key) => {
                jsonData[key] = value;
            });

            // Perform POST request to server
            fetch('submitProduct.php', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json'
                },
                body: JSON.stringify(jsonData)
            })
            .then(response => {
                if (!response.ok) {
                    throw new Error('Network response was not ok');
                }
                return response.json();
            })
            .then(data => {
                // Handle response from server
                console.log(data); // Log the response for debugging
                // Close the pop-up card
                closePopupCard();
                // Update the table with the edited data
                fetchDataAndPopulateTable();
            })
            .catch(error => console.error('Error submitting form:', error));
        }
    </script>
    <script src="dashboard.js"></script>
</body>
</html>
