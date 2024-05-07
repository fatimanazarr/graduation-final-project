<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>المراجعات</title>
    <link rel="stylesheet" href="admin.css">
</head>
<body>
    
    <section id="reviewsTable">
        <h1>التقييمات</h1>
        <div class="container" style="direction: rtl; font-family: Mirza; font-size: 20px;">
            <h1>تحليل مشاعر تقييمات العملاء</h1>
            <div class="result">الاراء الايجابية:<span id="positiveCount"></span></div>
            <div class="result">الاراء السلبية: <span id="negativeCount"></span></div>
        </div>
        <div>
            <table>
                <thead>
                    <tr>
                        <th>اسم الزبون</th>
                        <th>رقم الزبون</th>
                        <th>التعليق</th>
                        <th>حذف التعليق</th> <!-- New column for delete button -->
                    </tr>
                </thead>
                <tbody>
                    <!-- Table rows with data will go here -->
                </tbody>
            </table>
        </div>
    </section>

    <div class="button-container">
        <button class="return-btn" onclick="redirect('dashboard.php')">العودة للصفحة الرئيسية</button>
    </div>
    <script>
        // Function to fetch reviews from the PHP script and populate the table
        async function fetchAndPopulateReviews() {
            try {
                const response = await fetch('fetchReviews.php');
                if (!response.ok) {
                    throw new Error('Network response was not ok');
                }
                const data = await response.json();
                const reviews = data.reviews;
                const tableBody = document.querySelector('#reviewsTable tbody');

                // Clear existing table rows
                tableBody.innerHTML = '';

                // Populate the table with fetched data
                reviews.forEach(review => {
                    const row = document.createElement('tr');
                    row.innerHTML = `
                        <td>${review.CustomerName}</td>
                        <td>${review.CustomerPhone}</td>
                        <td>${review.CustomerReview}</td>
                        <td><button onclick="deleteReview(${review.CustomerID})">حذف التعليق</button></td>
                    `;
                    tableBody.appendChild(row);
                });

                // Perform sentiment analysis after fetching reviews
                analyzeSentiment(reviews);
            } catch (error) {
                console.error('There was a problem with the fetch operation:', error);
            }
        }

        function deleteReview(customerID) {
            // Send a request to delete the review with the given customerID
            fetch('deleteReview.php?customerID=' + customerID, {
                method: 'DELETE'
            })
            .then(response => {
                if (!response.ok) {
                    throw new Error('Network response was not ok');
                }
                // Refresh the table after successful deletion
                fetchAndPopulateReviews();
            })
            .catch(error => {
                console.error('There was a problem with the delete operation:', error);
            });
        }

        // Call the function to fetch and populate reviews data
        fetchAndPopulateReviews();

        // Function to perform sentiment analysis on reviews
        function analyzeSentiment(reviews) {
            let positiveCount = 0;
            let negativeCount = 0;

            reviews.forEach(review => {
                if (review.CustomerReview.includes("tasty") || review.CustomerReview.includes("delicious") || review.CustomerReview.includes("friendly") || review.CustomerReview.includes("cozy") || review.CustomerReview.includes("نظيف")) {
                    positiveCount++;
                } else if (review.CustomerReview.includes("سيء") || review.CustomerReview.includes("خدمة سيئة") || review.CustomerReview.includes("undercooked") || review.CustomerReview.includes("tasteless")) {
                    negativeCount++;
                }
            });

            displaySentimentAnalysisResults(positiveCount, negativeCount);
        }

        // Function to display sentiment analysis results
        function displaySentimentAnalysisResults(positiveCount, negativeCount) {
            document.getElementById("positiveCount").textContent = positiveCount;
            document.getElementById("negativeCount").textContent = negativeCount;
        }
    </script>
    <script src="dashboard.js"></script>
</body>
</html>
