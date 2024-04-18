<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>الرئيسية</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css" />
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="resp.css">
        <style>
            .message-card {
        background-color: #fff;
        border: 1px solid #ccc;
        padding: 20px;
        margin: 20px;
        position: fixed;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
        animation: fade-out 1s forwards;
    }
            .close-icon {
                position: absolute;
                top: 10px;
                right: 10px;
                cursor: pointer;
            }

            @keyframes fade-out { /* Define the fade-out animation */
                0% { opacity: 1; }
                100% { opacity: 0; }
            }
        </style>

</head>
<body> 
    <?php 
    if (isset($_GET['message'])) { 
      $message = $_GET['message']; 
    echo '<div class="message-card" id="message-card">'; 
    echo '<span class="close-icon" onclick="removeMessageCard()">&times;</span>'; 
    echo "<h1>$message</h1>"; 
    echo '</div>'; } ?> 
      <section class="hero-section" style="direction: rtl;"> 
            <div class="navbar"> 
              <div class="logo"> 
                <h1>بغتاليا</h1> 
              </div> <div class="image"> 
                <img src="Images/Vector 1.png" alt="Circle Image"> 
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
            <div class="menu-icon" onclick="toggleMenu()"><i class="fa-solid fa-bars"></i></div> 
              <div class="shoppingBag"> 
                <i class="fa-solid fa-bag-shopping fa-2xl" style="color: #964325;"  onclick="goToSecondPage()"></i> 
              </div> 
             </div> 
          <div class="content-section">

          <div class="right-div">
            <h3>حيث يلتقي قلب إيطاليا بروح بغداد</h3>
            <h2>مرحبًا بكم في</h2>
            <h2>مطعم بغتاليا</h2>
            <p>
              انضموا إلينا في الاحتفال بتوازن عالمين مطبخيين، حيث يروي كل طبق قصة حب وعاطفة، وفرح مشترك في الطعام اللذيذ. مرحبًا في سالا - حيث تتحد إيطاليا والعراق لخلق تجربة تناول طعام فريدة من نوعها!
            </p>
          <button class="explore-button" onclick="window.location.href = 'appetizers.php';">إستكشاف قائمة الطعام</button>
          <img src="images/pizza slice.png" alt="Image Description">

          </div>

          <div class="left-div">
            <img src="images/dishes circle.png" alt="Image">
          </div>
          </div> 
      </section>

      <section class="three-divs-section">
        <div class="divx">
          <img src="images/offers.png" alt="Image 1">
          <h1>أفضل العروض في المدينة</h1>
          <p>استمتع بتجربة مثالية لتوازن النكهات الإيطالية والعراقية. تمتع بعروض حصرية، بما في ذلك خصومات كبيرة لروادنا المميزين. انضم إلينا لتجربة تناول طعام لا تُضاهى في قلب بغداد!</p>
        
        </div>
        <div class="divx">
          <img src="images/pizzaService.png" alt="Image 2">
          <h1>أفضل العروض في المدينة</h1>
          <p>استمتع بتجربة مثالية لتوازن النكهات الإيطالية والعراقية. تمتع بعروض حصرية، بما في ذلك خصومات كبيرة لروادنا المميزين. انضم إلينا لتجربة تناول طعام لا تُضاهى في قلب بغداد!</p>
        </div>
        <div class="divx">
          <img src="images/time.png" alt="Image 3">
          <h1>أفضل العروض في المدينة</h1>
          <p>استمتع بتجربة مثالية لتوازن النكهات الإيطالية والعراقية. تمتع بعروض حصرية، بما في ذلك خصومات كبيرة لروادنا المميزين. انضم إلينا لتجربة تناول طعام لا تُضاهى في قلب بغداد!</p>
        </div>
      </section>

      <section class="two-divs-section">
        <div class="content-div2">
          <h2>من نحن</h2>
          <h1>قائمة طعام تُسعِد الحواس وتحكي قصة</h1>
          <p>انضموا إلينا في الاحتفال بتوازن عالمين مطبخيين، حيث يروي كل طبق قصة حب وعاطفة، وفرح مشترك في الطعام اللذيذ. مرحبًا في سالا - حيث تتحد إيطاليا والعراق لخلق تجربة تناول طعام فريدة من نوعها!</p>
          <button class="button2" onclick="window.location.href = 'about.php';">استكشاف قصتنا</button>
        </div>
        <div class="image-div2">
          <img src="images/salaPizza.png" alt="Image">
        </div>
      </section>

      <section class="menu-section">
        <div class="menu-div">
          <h2>قائمة الطعام</h2>
          <h1>أطباقنا المميزة</h1>
        </div>
        <div class="items-div">
          <div class="item">
            <img id="Dish_image_0">
            <h1 id="Dish_name_0"></h1>
            <p id="Dish_desc_0"></p>
            <h3 id="Dish_price_0"></h3>
          </div>
          <div class="item">
            <img id="Dish_image_1">
            <h1 id="Dish_name_1"></h1>
            <p id="Dish_desc_1"></p>
            <h3 id="Dish_price_1"></h3>
          </div>

          <div class="item">
            <img id="Dish_image_2">
            <h1 id="Dish_name_2"></h1>
            <p id="Dish_desc_2"></p>
            <h3 id="Dish_price_2"></h3>
          </div>
          <div class="item">
            <img id="Dish_image_3">
            <h1 id="Dish_name_3"></h1>
            <p id="Dish_desc_3"></p>
            <h3 id="Dish_price_3"></h3>
          </div>

          <div class="item">
            <img id="Dish_image_4">
            <h1 id="Dish_name_4"></h1>
            <p id="Dish_desc_4"></p>
            <h3 id="Dish_price_4"></h3>
          </div>
          <div class="item">
            <img id="Dish_image_5">
            <h1 id="Dish_name_5"></h1>
            <p id="Dish_desc_5"></p>
            <h3 id="Dish_price_5"></h3>
          </div>

          <div class="item">
            <img id="Dish_image_6">
            <h1 id="Dish_name_6"></h1>
            <p id="Dish_desc_6"></p>
            <h3 id="Dish_price_6"></h3>
          </div>
          <div class="item">
            <img id="Dish_image_7">
            <h1 id="Dish_name_7"></h1>
            <p id="Dish_desc_7"></p>
            <h3 id="Dish_price_7"></h3>
          </div>
          <button class="more-button" onclick="window.location.href = 'appetizers.php';">استكشاف المزيد</button>
        </div>
      </section>

      <section class="reviews-section">
        <div class="div1">
          <div class="image-container">
            <img src="images/reviews circle.jpg" alt="Customer Reviews">
          </div>
        </div>
        <div class="div2">
          <h3>المراجعات</h3>
          <h1>زبائننا الرائعين يحبّون مطعمنا</h1>
          <p id="customer_review"></p>
          <h4 id="customer_name"></h4>
          <div class="icon-container" style="direction: ltr;">
            <div class="icon-circle"><i class="fas fa-chevron-left"></i></div>
            <div class="icon-circle"><i class="fas fa-chevron-right"></i></div>
            
            <button class="view-all-reviews-btn" onclick="window.location.href = 'reviews.php';">عرض جميع الآراء</button>

          </div>
        </div>
      </section>

      <section class="footer-section">
        <div class="left-div3">
          <div class="footer-item">
            <h3>روابط مفيدة</h3>
            <h5>من نحن</h5>
            <h5>تواصل معنا</h5>
          </div>
          <div class="footer-item">
            <h3>قائمة الطعام</h3>
            <h5>الاطباق المميزة</h5>
            <h5>القائمة</h5>
          </div>
          <div class="footer-item">
            <h3>تواصل معنا</h3>
            <h5>mail.ru@yahoo.com</h5>
            <h5>07485**293</h5>
          </div>
        </div>
        <div class="right-div3">
          <h1>بغتاليا</h1>
          <p>تبدأ قصتنا بشغف للمأكولات الإيطالية الأصيلة.</p>
          <div class="social-icons">
            <img src="images/whatssapp.png" alt="WhatsApp">
            <img src="images/facebook.png" alt="Facebook">
            <img src="images/instagram.png" alt="Instagram">
          </div>
          
        </div>
        <p class="footer-caption">2024 Fatima Nazar & Athraa Qais. All Rights Reserved.</p>
      </section>

<script> 
    function removeMessageCard() { 
      var messageCard = document.getElementById("message-card"); 
      messageCard.style.animation = "fade-out 10s forwards";

        setTimeout(function() {
            messageCard.style.display = "none";
        }, 20000);
    }
</script>
<script src="https://kit.fontawesome.com/4c6be1067d.js" crossorigin="anonymous"></script>
<script src="script.js"></script>
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