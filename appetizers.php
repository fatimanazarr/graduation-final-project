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
<body style="background-color: #EBF1EF;">
<section class="hero-section2" style="direction: rtl; " >
    
  <div class="navbar2">
    <div class="logo2">
      <h1>بغتاليا</h1>
    </div>
    <div class="menu2">
      <ul>
      <div class="close-icon" onclick="toggleMenu()"><i class="fa-solid fa-times"></i></div>
        <li><a href="index.php" style="text-decoration: none; color: white;">الرئيسية</a></li>
        <li><a href="appetizers.php" style="text-decoration: none; color: white;">قائمة الطعام</a></li>
        <li><a href="about.php" style="text-decoration: none; color: white;">من نحن</a></li>
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
    <div class="menu-icon" onclick="toggleMenu()" style="color:  white;"><i class="fa-solid fa-bars"></i></div>

    <div class="shoppingBag2">
    <i class="fa-solid fa-bag-shopping fa-2xl" style="color: white;" onclick="goToSecondPage()"></i>
      <span class="item-count"></span>
      <div class="cart-menu">
      <div id="cart-dropdown" class="cart-dropdown"></div>
      </div>
    </div>
  </div>
  
</section>

<section class="categories-section">
<ul class="categories-list" style="direction: rtl;">
  <li><a href="#" onclick="fetchAndPopulateMenuItems('مقبلات')">المقبلات</a></li>
  <li><a href="#" onclick="fetchAndPopulateMenuItems('بيتزا')">البيتزا</a></li>
  <li><a href="#" onclick="fetchAndPopulateMenuItems('باستا')">الباستا</a></li>
  <li><a href="#" onclick="fetchAndPopulateMenuItems('تحلية')">التحلية</a></li>
  <li><a href="#" onclick="fetchAndPopulateMenuItems('مشروبات')">المشروبات</a></li>
</ul>
<div class="menu-items"></div>
</section>
<script src="https://kit.fontawesome.com/4c6be1067d.js" crossorigin="anonymous"></script>

<script src="script.js"></script>
</body>
</html>






<style>

        .dropbtn {
            color: #fff;
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