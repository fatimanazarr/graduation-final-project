<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>إنشاء حساب</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css" />
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="resp.css">
</head>
<body>
<section class="main-section">
  <div class="image-container2">
    <img src="Images/sign-up.png" alt="Image">
  </div>
  <div class="content-container">
    <div class="top-section">
      <h1 class="title2">بغتاليا</h1>
      
    </div>
    <div class="bottom-section">
      <h1 class="form-title">إنشاء حساب</h1>
      <p class="form-description">يرجى إدخال المعلومات المطلوبة بالأسفل</p>
      <form class="form" style="direction: rtl;" method="POST" action="fetch_data.php">
          <div class="form-group">
            <input type="text" class="input-box" placeholder="الاسم الأول" name="CustomerFirstName" required>
            <input type="text" class="input-box" placeholder="الاسم الأخير" name="CustomerLastName" required>
          </div>
          <div class="form-group">
            <input type="text" class="input-box2" placeholder="رقم الهاتف" name="CustomerPhone" required>
          </div>
          <button type="submit" class="submit-button" onclick="redirectToIndex()">إرسال</button>
      </form>
    </div>
  </div>
</section>
<script>
  function redirectToIndex() {
  // Get the customer first name input value
  var customerFirstName = document.querySelector('input[name="CustomerFirstName"]').value;

  // Encode the customer first name to handle special characters
  var encodedFirstName = encodeURIComponent(customerFirstName);

  // Redirect to index.php with the customer first name as a query parameter
  window.location.href = "index.php?customerFirstName=" + encodedFirstName;
}
</script>
</body>
</html>