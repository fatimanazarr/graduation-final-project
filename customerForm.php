<?php
session_start();

if (!isset($_SESSION['username'])) {
    $_SESSION['username'] = "Guest";
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>إتمام الشراء كزائر</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="resp.css">
    <style>
        body {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }
        
    </style>
</head>
<body>
    <section id="section">
        <h1 id="heading">إتمام الشراء</h1>
        <h2 id="subheading">يرجى إدخال المعلومات المطلوبة بالأسفل</h2>
        
        <form id="form" style="direction: rtl;">
  <div style="display: flex; justify-content: space-between;">
    <input type="text" id="first-name" placeholder="الاسم الأول">
  </div>
  <div style="display: flex; justify-content: center;">
    <select onchange="togglePickupTime()" id="order-type">
      <option value="dine-in" selected>تناول في المطعم</option>
      <option value="take-away">توصيل</option>
      <option value="reservation">حجز طاولة</option>
    </select>
  </div>
  <div id="pickup-time" style="display: none;">
    <input type="time" id="pickup-time-input" placeholder="وقت الاستلام" min="09:00" max="21:00">
  </div>
  <input type="text" id="table-number" placeholder="رقم الطاولة">
  <h1 id="total-price-heading">السعر الكلي:</h1>
  <h3 id="total-price">0 دينار</h3>
  <input type="submit" id="submit-button" value="إرسال" onclick="submitOrder(selectedItems, event)">
</form>
    </section>

  
<script>
    // Retrieve the selectedItems array from the URL query parameters
    const queryString = window.location.search;
    const urlParams = new URLSearchParams(queryString);
    const selectedItemsString = urlParams.get("selectedItems");
    const selectedItems = JSON.parse(selectedItemsString);

    // Retrieve the totalPrice from the URL query parameters
    const totalPriceString = urlParams.get("totalPrice");
    const totalPrice = parseFloat(totalPriceString.replace(/[^\d.-]/g, ''));



    // Display the totalPrice in the appropriate element
    document.getElementById("total-price").textContent = totalPrice.toFixed(2) + " دولار";
    
        console.log(totalPrice);
    // Display the selectedItems array in the console
    console.log(selectedItems);

    // Retrieve the customer name from the session
    const customerName = "<?php echo $_SESSION['username']; ?>";

    // Assign the customer name to the first input box
    document.getElementById('first-name').value = customerName;

    function togglePickupTime() {
  var orderType = document.getElementById("order-type");
  var pickupTimeDiv = document.getElementById("pickup-time");
  var tableNumberInput = document.getElementById("table-number");
  var selectedOption = orderType.options[orderType.selectedIndex].value;

  if (selectedOption === "take-away") {
    pickupTimeDiv.style.display = "block";
    tableNumberInput.style.display = "none";
  } else if (selectedOption === "reservation") {
    pickupTimeDiv.style.display = "block";
    tableNumberInput.style.display = "none";
    document.getElementById("pickup-time-input").setAttribute("type", "time");
  } else {
    pickupTimeDiv.style.display = "none";
    tableNumberInput.style.display = "block";
  }
}

function submitOrder(selectedItems, event) {
  event.preventDefault(); // Prevent the default form submission behavior

  // Retrieve form inputs
  const customerFirstName = document.getElementById('first-name').value;
  const orderType = document.getElementById('order-type').value;
  const tableNumber = document.getElementById('table-number').value;

  // Retrieve the pickup time value
  let pickupTime = '';
  if (orderType === 'take-away') {
    pickupTime = document.getElementById('pickup-time-input').value;
  }

  // Extract all order details from selectedItems array
  const orderDetails = selectedItems.map(item => {
    return {
      DishName: item.DishName,
      DishDescription: item.DishDescription, // Include dish description
      TotalPrice: item.TotalPrice, // Include total price
      Quantity: item.quantity // Include quantity
    };
  });

  // Calculate total price
  const totalPrice = orderDetails.reduce((acc, item) => acc + item.TotalPrice, 0);

  // Create the payload object
  const payload = {
    'first-name': customerFirstName,
    'order-type': orderType,
    'table-number': tableNumber,
    'pickup-time-input': pickupTime,
    'totalPrice': totalPrice,
    'selectedItems': orderDetails
  };

  fetch('save_order.php', {
    method: 'POST',
    headers: {
      'Content-Type': 'application/json'
    },
    body: JSON.stringify(payload)
  })
    .then(response => response.json())
    .then(data => {
      console.log(data.message);

      window.location.href = 'success.php';
    })
    .catch(error => {
      console.error('Error:', error);
      alert('An error occurred while submitting the order. Please try again later.');
    });
}




</script>
</body>
</html>