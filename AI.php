<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Baghtalia Restaurant Chatbot</title>
    <style>
        /* Add your CSS styling here */
        /* This is just a basic example */
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f4f4f4;
        }
        .container {
            max-width: 600px;
            margin: 20px auto;
            padding: 20px;
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        h1 {
            text-align: center;
            margin-bottom: 20px;
        }
        #chatbox {
            min-height: 200px;
            padding: 10px;
            overflow-y: scroll;
            border: 1px solid #ccc;
            border-radius: 8px;
        }
        #userInput {
            width: calc(100% - 20px);
            padding: 10px;
            margin-top: 10px;
            border: 1px solid #ccc;
            border-radius: 8px;
        }
        #submitBtn {
            width: 100%;
            padding: 10px;
            margin-top: 10px;
            background-color: #007bff;
            color: #fff;
            border: none;
            border-radius: 8px;
            cursor: pointer;
        }
    </style>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css" />
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="resp.css">
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
         
          </div> 
        </section>

        <div class="container">
            <h1>Welcome to Baghtalia Restaurant</h1>
            <div id="chatbox"></div>
            <input type="text" id="userInput" placeholder="Type your message here...">
            <button id="submitBtn">Send</button>
        </div>

<script>
// Define the chatbot responses in Arabic
const responses = {
    "hi|hello|hey": "مرحبًا! مرحبًا بك في مطعم بغتاليا. كيف يمكنني مساعدتك اليوم؟",
    "قائمة الطعام": "يمكنك عرض قائمة الطعام على موقعنا الإلكتروني أو طلب توصيات مني بناءً على تفضيلاتك.",
    "recommendation|recommend": "بالتأكيد! ما نوع المأكولات التي ترغب فيها؟ إيطالية، بيتزا، باستا، أو شيء آخر؟",
    "reservation|book a table|table": "يمكنني مساعدتك في ذلك. يرجى تقديم الموعد والوقت، وعدد الضيوف لحجزك.",
    "thanks|thank you|appreciate": "على الرحب والسعة! إذا كنت بحاجة إلى أي مساعدة إضافية، فلا تتردد في السؤال.",
    "bye|goodbye|see you": "وداعًا! أتمنى لك يومًا رائعًا واستمتع بوجبتك في مطعم بغتاليا.",
    "pasta": "أطباق الباستا لدينا هي المفضلة لدى العملاء! لدينا خيارات شهية:\n1. كاربونارا سباغيتي: طبق باستا إيطالي كلاسيكي مع اللحم المقدد والبيض والجبن.\n2. بيني أرابياتا: باستا بيني مقدمة مع صلصة طماطم حارة.",
    "pizza": "لدينا مجموعة متنوعة من البيتزا اللذيذة للاختيار من بينها. هل ترغب في أن أقترح بعض الخيارات الشهيرة؟",
    "italian": "المأكولات الإيطالية هي تخصصنا! من الباستا إلى البيتزا، لدينا مجموعة واسعة من الأطباق الإيطالية الأصيلة.",
};

// Function to generate bot response
function generateResponse(input) {
    for (let pattern in responses) {
        let regex = new RegExp(pattern, "i");
        if (regex.test(input)) {
            return responses[pattern];
        }
    }
    return "آسف، لم أفهم ذلك. هل يمكنك إعادة صياغته؟";
}

let randomDishes; // Declare randomDishes variable outside the event listener

document.getElementById("submitBtn").addEventListener("click", function() {
    let userInput = document.getElementById("userInput").value.trim().toLowerCase();
    let chatbox = document.getElementById("chatbox");
    let userMessage = document.createElement("div");
    userMessage.innerHTML = "<strong>أنت:</strong> " + userInput;
    chatbox.appendChild(userMessage);
    document.getElementById("userInput").value = "";

    // Check if the user input is 'pasta', 'pizza', 'drinks', or 'dessert' and fetch the data accordingly
    if (userInput === 'pasta' || userInput === 'pizza' || userInput === 'drinks' || userInput === 'dessert') {
        fetch('fetch_data.php')
            .then(response => {
                if (!response.ok) {
                    throw new Error('Network response was not ok');
                }
                return response.json();
            })
            .then(data => {
                const menu = data.menu;
                let category;
                if (userInput === 'pasta') {
                    category = 'باستا';
                } else if (userInput === 'pizza') {
                    category = 'بيتزا';
                } else if (userInput === 'drinks') {
                    category = 'مشروبات';
                } else if (userInput === 'dessert') {
                    category = 'تحلية';
                }
                const categoryDishes = menu.filter(dish => dish.DishCategory === category);
                let categoryResponse = "هنا ثلاث أطباق عشوائية من فئة " + category + ":\n";
                randomDishes = getRandomDishes(categoryDishes, 3); // Assign value to randomDishes
                randomDishes.forEach((dish, index) => {
                    categoryResponse += (index + 1) + ". " + dish.DishName + "\n";
                });
                let botMessage = document.createElement("div");
                botMessage.innerHTML = "<strong>البوت:</strong> " + categoryResponse;
                chatbox.appendChild(botMessage);
                chatbox.scrollTop = chatbox.scrollHeight; // Scroll to bottom after appending messages
            })
            .catch(error => {
                console.error('There was a problem with the fetch operation:', error);
            });
    } else {
        let botMessage;
        // Check if the user input is a number (indicating a dish selection)
        if (!isNaN(userInput)) {
            let selectedDishIndex = parseInt(userInput) - 1;
            if (selectedDishIndex >= 0 && selectedDishIndex < randomDishes.length) {
    let selectedDish = randomDishes[selectedDishIndex];
    addToShoppingBag(selectedDish.DishName, selectedDish.TotalPrice, selectedDish.DishDescription);
    botMessage = document.createElement("div");
    botMessage.innerHTML = "<strong>البوت:</strong> تمت إضافة " + selectedDish.DishName + " إلى سلة التسوق.";
} else {
    botMessage = document.createElement("div");
    botMessage.innerHTML = "<strong>البوت:</strong> آسف، لم أتمكن من العثور على الطبق الذي طلبته. يرجى اختيار رقم طبق آخر.";
}

        } else {
            botMessage = document.createElement("div");
            botMessage.innerHTML = "<strong>البوت:</strong> " + generateResponse(userInput);
        }
        chatbox.appendChild(botMessage);
        chatbox.scrollTop = chatbox.scrollHeight; // Scroll to bottom after appending messages
    }
});

// Function to generate random dishes from the given dishes array
function getRandomDishes(dishes, count) {
    let randomDishes = [];
    while (randomDishes.length < count) {
        let randomIndex = Math.floor(Math.random() * dishes.length);
        let randomDish = dishes[randomIndex];
        if (!randomDishes.includes(randomDish)) {
            randomDishes.push(randomDish);
        }
    }
    return randomDishes;
}
</script>
<script src="script.js"></script>
<script src="https://kit.fontawesome.com/4c6be1067d.js" crossorigin="anonymous"></script>
</body>
</html>
