// Retrieve the username from session storage
const username = sessionStorage.getItem('username');

// Display the username in the welcome section
document.getElementById('username-placeholder').textContent = username;

//Buttons handling code

// Function to redirect to the specified page
function redirect(page) {
    window.location.href = page;
}
function fetchAndCountOrders() {
    fetch('ordersCount.php')
        .then(response => {
            if (!response.ok) {
                throw new Error('Network response was not ok');
            }
            return response.json();
        })
        .then(data => {
            const orders = data.orders;
            const totalOrders = orders.length;
            let last7DaysOrders = [];

            // Get the current date
            const currentDate = new Date();
            // Get the date seven days ago
            const sevenDaysAgo = new Date(currentDate);
            sevenDaysAgo.setDate(sevenDaysAgo.getDate() - 7);

            // Loop through orders and count those created in the last seven days
            orders.forEach(order => {
                const orderDate = new Date(order.created_at);
                if (orderDate >= sevenDaysAgo && orderDate <= currentDate) {
                    last7DaysOrders.push(order);
                }
            });

            // Display the total number of orders
            document.getElementById('total-orders').textContent = totalOrders;
            // Display the number of orders created in the last seven days
            document.getElementById('7Days-orders').textContent = last7DaysOrders.length;
        })
        .catch(error => {
            console.error('There was a problem with the fetch operation:', error);
        });
}

// Call the function to fetch and count orders
fetchAndCountOrders();

function logout() {
    // Clear the session storage
    sessionStorage.removeItem('username');
    sessionStorage.removeItem('password');

    // Redirect to the sign-in page
    window.location.href = 'signin.php';
}

