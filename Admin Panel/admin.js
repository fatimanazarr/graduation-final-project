function fetchData() {
    fetch('fetch_admin.php')
        .then(response => response.json())
        .then(data => {
            console.log(data.admins); // Display the admins data in the console

            // Add event listener to the form submit button
            document.getElementById('login-form').addEventListener('submit', function(event) {
                event.preventDefault(); // Prevent the form from submitting

                // Get the entered values
                const enteredUsername = document.getElementById('username').value;
                const enteredPassword = document.getElementById('password').value;

                // Check if entered data matches any row in the fetched data
                const match = data.admins.find(admin =>
                    admin.adminName === enteredUsername && admin.adminPassword === enteredPassword
                );

                if (match) {
                    // Store the entered data in the session storage
                    sessionStorage.setItem('username', enteredUsername);
                    sessionStorage.setItem('password', enteredPassword);

                    window.location.href = 'dashboard.php'; // Redirect to dashboard.php
                }
            });
        })
        .catch(error => {
            console.error("Error:", error);
        });
}

// Call the fetchData function when the connection is successful or when needed
fetchData();

