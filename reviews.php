<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="resp.css">
    <title>Document</title>
</head>
<body>
    <section class="hero-section" style="direction: rtl;"> 
        <div class="navbar"> 
            <div class="logo"> 
            <h1>بغتاليا</h1> 
            </div> 
        <div class="menu"> 
        <ul> 
      <div class="close-icon" onclick="toggleMenu()">
      <i class="fa-solid fa-times"></i></div> <li><a href="index.php" style="text-decoration: none; ">الرئيسية</a></li> 
      <li><a href="appetizers.php" style="text-decoration: none; ">قائمة الطعام</a></li> 
      <li><a href="about.php" style="text-decoration: none; ">من نحن</a></li> 
      <?php
        if (isset($_SESSION['username'])) {
            echo '<li class="dropdown">
                    <a href="#" class="dropbtn">البروفايل <i class="fa fa-caret-down"></i></a>
                    <div class="dropdown-content">
                      <a href="#">تعديل البروفايل</a>
                      <a href="#">الطلبات السابقة</a>
                      <a href="logout.php">تسجيل الخروج</a>
                    </div>
                  </li>';
        } else {
            echo '<li><a href="signUp.php" style="text-decoration: none;">تسجيل الدخول</a></li>';
        }
        ?>
    </ul> 
        </div> 
        <div class="menu-icon" onclick="toggleMenu()"><i class="fa-solid fa-bars"></i></div> 
        <div class="shoppingBag"> 
            <i class="fa-solid fa-bag-shopping fa-2xl" style="color: #964325;"></i> 
        </div> 
        </div>
    </section>

    <section class="custom-section">
        
    </section>
    <div class="button-container">
        <button id="show-previous-btn">Show Previous Reviews</button>
        <button id="load-more-btn">Load More Reviews</button>
    </div>

    <section class="feedback-section">
        <h1>اترك تعليقًا</h1>
        <div class="feedback-form">
            <form id="feedback-form">
                <input type="text" id="customer-name" placeholder="اسم العميل">
                <input type="text" id="customer-phone" placeholder="رقم الهاتف">
                <input type="text" id="customer-review" placeholder="تعليق العميل">
                <div class="submit-btn-container">
                    <button type="submit">Submit</button>
                </div>
            </form>
        </div>
    </section>


 <script>
    let reviewsData; // Variable to store all reviews data
    let startIndex = 0; // Index to track the starting point for displaying reviews
    const reviewsPerPage = 8; // Number of reviews to display per page

    // Fetch data from fetch_data.php using AJAX
    function fetchData() {
        fetch('tests.php')
        .then(response => response.json())
        .then(data => {
            reviewsData = data.reviews; // Store all reviews data
            displayReviews(); // Display initial set of reviews
        })
        .catch(error => console.error('Error fetching data:', error));
    }

    // Function to display reviews based on startIndex
    function displayReviews() {
        // Clear existing reviews
        document.querySelector('.custom-section').innerHTML = '';
        
        // Loop through the reviews data starting from startIndex
        for (let i = startIndex; i < Math.min(startIndex + reviewsPerPage, reviewsData.length); i++) {
            const review = reviewsData[i];
            // Create a new custom-item div
            const customItem = document.createElement('div');
            customItem.classList.add('custom-item');

            // Create h1 element for CustomerName
            const h1 = document.createElement('h1');
            h1.textContent = review.CustomerName;

            // Create p element for CustomerReview
            const p = document.createElement('p');
            p.textContent = review.CustomerReview;

            // Append h1 and p to the custom-item div
            customItem.appendChild(h1);
            customItem.appendChild(p);

            // Append the custom-item div to the custom-section
            document.querySelector('.custom-section').appendChild(customItem);
        }
    }

    // Function to handle click event on load more button
    document.getElementById('load-more-btn').addEventListener('click', () => {
        startIndex += reviewsPerPage; // Increment startIndex to load next set of reviews
        displayReviews(); // Display the next set of reviews
    });

    // Function to handle click event on show previous button
    document.getElementById('show-previous-btn').addEventListener('click', () => {
        startIndex = Math.max(startIndex - reviewsPerPage, 0); // Decrement startIndex to show previous set of reviews
        displayReviews(); // Display the previous set of reviews
    });

    // Call the fetchData function to populate the custom-items
    fetchData();

    document.getElementById('feedback-form').addEventListener('submit', function(event) {
    event.preventDefault(); // Prevent the default form submission

    // Get the values from the input fields
    const customerName = document.getElementById('customer-name').value;
    const customerPhone = document.getElementById('customer-phone').value;
    const customerReview = document.getElementById('customer-review').value;

    // Send a POST request to the server to submit the review
    fetch('tests.php', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/x-www-form-urlencoded',
        },
        body: `CustomerName=${encodeURIComponent(customerName)}&CustomerPhone=${encodeURIComponent(customerPhone)}&CustomerReview=${encodeURIComponent(customerReview)}`,
    })
    .then(response => response.text())
    .then(data => {
        console.log(data); // Log the response from the server
        // You can perform further actions here if needed, such as displaying a success message or updating the UI
    })
    .catch(error => console.error('Error posting review:', error));
});

</script>


</body>
</html>

<style>

        .dropbtn {
            background-color: #fff;
            color: #333;
            padding: 16px;
            font-size: 25px;
            font-family: 'Avenir';
            border: none;
            cursor: pointer;
            text-decoration: none;
        }

        .dropdown-content {
            display: none;
            position: absolute;
            background-color: #f9f9f9;
            min-width: 160px;
            box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
            z-index: 1;
        }

        .dropdown-content a {
            color: #333;
            padding: 12px 16px;
            text-decoration: none;
            display: block;
        }

        .dropdown-content a:hover {
            background-color: #f1f1f1;
        }

        .dropdown:hover .dropdown-content {
            display: block;
        }
    </style>
</style>