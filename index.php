<!DOCTYPE html>
<html>
<head>
    <title>Home Automation</title>
    <link rel="stylesheet" href="css/styles.css">
   
</head>
<body>
    <header>
        <h1>Home Automation</h1>
    </header>
    <div class="container">
        <div id="index-info">
        <p>Welcome to our Home Automation software!</p><p> This system allows you to control various devices in your home, such as lights, temperature, and humidity, from a single dashboard.</p></div>
        <div id="index-login">
        <div class="buttons-container">
            <button id="producer-login">Producer Login</button>
            <button id="consumer-login">Consumer Login</button>
            </div>
        </div>

    </div>

    
    <script>
        var producerLoginBtn = document.getElementById("producer-login");
        producerLoginBtn.onclick = function() {
            window.location.href = "login.php?role=producer";
        };

        var consumerLoginBtn = document.getElementById("consumer-login");
        consumerLoginBtn.onclick = function() {
            window.location.href = "login.php?role=consumer";
        };
    </script>
</body>
</html>
