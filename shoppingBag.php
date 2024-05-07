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
              </div> <div class="image"> 
                <img src="Images/Vector 1.png" alt="Circle Image"> 
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

  <section id="menu-items" style="direction: rtl;">
    <div class="menu-items-container" id="menuItemsContainer">
      <!-- Items will be dynamically populated here -->
    </div>
    
    <div class="total-price-button-container">
      <h1 id="totalPriceH1"></h1>
      <button id="finishShoppingButton">إتمام الطلب</button>
    </div>
  </section>

  <script>
          // Retrieve the selectedItems array from the URL query parameters
            const queryString = window.location.search;
            const urlParams = new URLSearchParams(queryString);
            const selectedItemsString = urlParams.get("selectedItems");
            let selectedItems = JSON.parse(selectedItemsString);

          // Display the selectedItems array content in the console
            console.log(selectedItems);

            function createDishDiv(dishName, dishDescription, quantity, price, index) {
        const menuItemsContainer = document.getElementById("menuItemsContainer");

        const dishDiv = document.createElement("div");
        dishDiv.classList.add("dish");

        const h1 = document.createElement("h1");
        h1.textContent = dishName;

        const p1 = document.createElement("p");
        p1.textContent = dishDescription;

        const quantityContainer = document.createElement("div");
        quantityContainer.classList.add("quantity-container");

        const decreaseIcon = document.createElement("img");
        decreaseIcon.src = "Images/decreaseSign.svg";
        decreaseIcon.alt = "Decrease";
        decreaseIcon.classList.add("quantity-icon");
        decreaseIcon.addEventListener("click", () =>
          decreaseQuantity(p2, index)
        );

        const p2 = document.createElement("p");
        p2.textContent = quantity;
        p2.classList.add("quantity");

        const increaseIcon = document.createElement("img");
        increaseIcon.src = "Images/increaseSign.svg";
        increaseIcon.alt = "Increase";
        increaseIcon.classList.add("quantity-icon");
        increaseIcon.addEventListener("click", () => increaseQuantity(p2, index));

        const p3 = document.createElement("p");
        p3.textContent = "$" + price;

        dishDiv.appendChild(h1);
        dishDiv.appendChild(p1);
        quantityContainer.appendChild(decreaseIcon);
        quantityContainer.appendChild(p2);
        quantityContainer.appendChild(increaseIcon);
        dishDiv.appendChild(quantityContainer);
        dishDiv.appendChild(p3);

        menuItemsContainer.appendChild(dishDiv);

        // Send AJAX request to update the session
        const xhr = new XMLHttpRequest();
        xhr.open("POST", "update_session.php", true);
        xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
        xhr.send(
          `dishName=${encodeURIComponent(dishName)}&dishDescription=${encodeURIComponent(
            dishDescription
          )}&quantity=${quantity}&price=${price}&index=${index}`
        );
      }

        // Function to decrease the quantity
        function decreaseQuantity(quantityElement, index) {
          let quantity = parseInt(quantityElement.textContent);
          if (quantity > 0) {
            quantity--;
            quantityElement.textContent = quantity;
            selectedItems[index].quantity = quantity; // Update the quantity in the selectedItems array
            calculateTotalPrice();
          }
        }

        // Function to increase the quantity
        function increaseQuantity(quantityElement, index) {
          let quantity = parseInt(quantityElement.textContent);
          quantity++;
          quantityElement.textContent = quantity;
          selectedItems[index].quantity = quantity; // Update the quantity in the selectedItems array
          calculateTotalPrice();
        }

        // Loop through the selectedItems array and create dish divs
        for (let i = 0; i < selectedItems.length; i++) {
          const item = selectedItems[i];
          createDishDiv(item.DishName, item.DishDescription, item.quantity, item.TotalPrice, i);
        }

        // Function to calculate the total price
        function calculateTotalPrice() {
          let totalPrice = 0;
          const quantityElements = document.getElementsByClassName("quantity");

          for (let i = 0; i < quantityElements.length; i++) {
            const quantity = parseInt(quantityElements[i].textContent);
            const price = parseFloat(selectedItems[i].TotalPrice);
            totalPrice += quantity * price;
          }

          // Get the total price h1 and finish shopping button elements
          const totalPriceH1 = document.getElementById("totalPriceH1");

          // Set the text content for the total price h1
          totalPriceH1.textContent = "السعر الكلي: " + totalPrice.toFixed(2);
        }

        // Call the calculateTotalPrice function to display the total price
        calculateTotalPrice();

        // Add an event listener to the finishShoppingButton
        const finishShoppingButton = document.getElementById("finishShoppingButton");
        finishShoppingButton.addEventListener("click", goToOrderForm);

        // Function to open customerForm.php and pass the selectedItems array as a query parameter
        function goToOrderForm() {
          // Recalculate total price
          calculateTotalPrice();
          const totalPrice = document.getElementById("totalPriceH1").textContent;
          
          // Get the modified selectedItems array as JSON string
          const modifiedSelectedItemsString = JSON.stringify(selectedItems);
          
          // Redirect to customerForm.php with selectedItems and totalPrice as query parameters
          const customerFormUrl = "customerForm.php?selectedItems=" + encodeURIComponent(modifiedSelectedItemsString) + "&totalPrice=" + encodeURIComponent(totalPrice);
          window.location.href = customerFormUrl;
      }

</script>
</body>
</html>
