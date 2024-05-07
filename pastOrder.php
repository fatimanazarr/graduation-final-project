<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css" />

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
           
            <ul class="dropdown-menu">
              <li><a href="index.php" style="text-decoration: none;">الرئيسية</a></li>
              <li><a href="appetizers.php" style="text-decoration: none;">قائمة الطعام</a></li>
              <li><a href="about.php" style="text-decoration: none;">من نحن</a></li>
              <?php
                if (isset($_SESSION['username'])) {
                  echo '<li class="dropdown">
                          <a href="#" class="dropbtn">البروفايل <i class="fa fa-caret-down"></i></a>
                          <div class="dropdown-content">
                            <a href="#">تعديل البروفايل</a>
                            <a href="pastOrder.php">الطلبات السابقة</a>
                            <a href="logout.php">تسجيل الخروج</a>
                          </div>
                        </li>';
                } else {
                  echo '<li><a href="signUp.php" style="text-decoration: none;">تسجيل الدخول</a></li>';
                }
              ?>
            </ul>
          </div>
              <div class="shoppingBag"> 
                <i class="fa-solid fa-bag-shopping fa-2xl" style="color: #964325;"  onclick="goToSecondPage()"></i> 
              </div> 
             </div> 
        
      </section>
    <section class="section">
        <?php
        if (isset($_SESSION['username'])) {
            // Assuming you have stored the first name in $_SESSION['username']
            $firstName = $_SESSION['username'];
            echo '<div class="content-wrapper">
                    <h1>مرحبًا بك يا ' . $firstName . '</h1>
                    <p>في الأسفل سترى جميع الطلبات السابقة التي قمت بها بمطعمنا</p>
                </div>';
        }
        ?>

    
    </section>

    <section class="pastOrdersSection">
        <!-- Add your content for the past orders section here -->
       
    </section>

    <script src="https://kit.fontawesome.com/4c6be1067d.js" crossorigin="anonymous"></script>
        <script src="script.js"></script>
        <script>
            
                function fetchOrders() {
                    fetch('order.php')
                        .then(response => response.json())
                        .then(data => {
                            // Initialize an object to store aggregated orders
                            const aggregatedOrders = {};

                            // Loop through the orders and aggregate them by dish name
                            data.orders.forEach(order => {
                                const { dishName, customerFirstName } = order;
                                const dishNameList = dishName.split(',');
                                dishNameList.forEach(dish => {
                                    const trimmedDish = dish.trim();
                                    if (!aggregatedOrders[trimmedDish]) {
                                        aggregatedOrders[trimmedDish] = {
                                            customerFirstNames: [customerFirstName],
                                            dishDescription: '',
                                            totalPrice: 0
                                        };
                                    } else {
                                        // If the dish already exists, just add the customer name
                                        aggregatedOrders[trimmedDish].customerFirstNames.push(customerFirstName);
                                    }
                                });
                            });

                            // Update dish description and total price for aggregated orders
                            Object.keys(aggregatedOrders).forEach(dishName => {
                                const menuItem = data.menu.find(item => item.DishName === dishName);
                                if (menuItem) {
                                    aggregatedOrders[dishName].dishDescription = menuItem.DishDescription;
                                    aggregatedOrders[dishName].totalPrice = menuItem.TotalPrice * aggregatedOrders[dishName].customerFirstNames.length;
                                }
                            });

                            // Create order cards dynamically
                            const ordersContainer = document.querySelector('.pastOrdersSection');

                            Object.keys(aggregatedOrders).forEach(dishName => {
                                const { customerFirstNames, dishDescription, totalPrice } = aggregatedOrders[dishName];

                                const orderCard = document.createElement('div');
                                orderCard.classList.add('orderCard');

                                const title = document.createElement('h1');
                                title.textContent = dishName;

                                const description = document.createElement('h2');
                                description.textContent = dishDescription;

                                const price = document.createElement('h2');
                                price.textContent = totalPrice;

                                const addButton = document.createElement('button');
                                addButton.textContent = 'إضافة للسلة';
                                
                                addButton.addEventListener('click', () => {
                                    
                                    addToShoppingBag(dishName, totalPrice, dishDescription);
                                });

                                orderCard.appendChild(title);
                                orderCard.appendChild(description);
                                orderCard.appendChild(price);
                                orderCard.appendChild(addButton);

                                ordersContainer.appendChild(orderCard);
                            });
                        })
                        .catch(error => console.error(error));
                        
                }

                fetchOrders();
                
                
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