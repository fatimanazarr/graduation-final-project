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
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css" />
    
    <title>About Us</title>
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
<section> </section>
  <section class="new-section">
      <div class="leftaboutUs-div">
        <img src="Images/AboutUs.png" alt="Image">
      </div>
      <div class="abouUs-div" style="direction: rtl;">
        <h3>من نحن</h3>
        <h1>مرحبًا بكم في بغتاليا!</h1>
        <p>
          نحن فخورون بأن نرحب بكم في مطعمنا الفريد حيث يلتقي الطعام الإيطالي الرائع بتراث بغدادي مميز.
          في قلب كل طبق نقدمه، تتألق الطهي الإيطالي الأصيل بالمكونات الطازجة والنكهات الغنية، مما يمنحك تجربة تذوق فريدة ومثيرة.
        </p>
        <hr>
        <p id="AboutBlack"> <b>رؤيتنا</b><br>
        نحن نسعى جاهدين لتقديم تجربة تناول طعام فاخرة تجمع بين مأكولات إيطاليا الشهيرة وتراث بغدادي غني. تفخر مطبخنا بالتحلي بالدقة في اختيار المكونات والإعداد الفني، مما يعكس حبنا للطهي والاهتمام بتفاصيل كل طبق.

        </p>
        <button class="explore-button3" onclick="window.location.href = 'appetizers.php';">إستكشاف قائمة الطعام</button>
      </div>
    </section>

    <script src="https://kit.fontawesome.com/4c6be1067d.js" crossorigin="anonymous"></script>
<script src="script.js"></script>
    
    </body>
</html>
