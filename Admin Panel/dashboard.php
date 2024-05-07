<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="admin.css">
    <link rel="stylesheet" href="dashboard.css"> <!-- Link to the separated CSS file -->
    <title>Dashboard</title>
</head>
<body>
    <section id="welcome-section">
        <h1 id="dashboard-title">مرحبًا مجددًا يا <span id="username-placeholder"></span></h1>
        <div id="buttons-container">
            <button id="products-button" onclick="redirect('products.php')">المكونات</button>
            <button id="menu-button" onclick="redirect('menu.php')">قائمة الطعام</button>
            <button id="reviews-button" onclick="redirect('customerReviews.php')">المراجعات</button>
        </div>
    </section>

    <div id="total-orders-sections" style="direction: rtl; display: flex;">
        <section id="total-orders-section-total">
            <h1>عدد الطلبات الكلية هو <span id="total-orders"></span> طلبات</h1>
        </section>
        <section id="total-orders-section-7days">
            <h1>عدد الطلبات في اخر سبع ايام هو <span id="7Days-orders"> </span>طلبات</h1>
        </section>
    </div>

    <!-- Logout Button -->
    <button id="logout-button" onclick="logout()">تسجيل الخروج</button>

    <script src="admin.js"></script>
    <script src="dashboard.js"></script>
</body>
</html>
