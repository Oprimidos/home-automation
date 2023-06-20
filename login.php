<?php
session_start(); ?>
<!DOCTYPE html>
<html>

<head>
    
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Consumer Login</title>
    <link rel="stylesheet" href="assets/css/login.css">
    <style>
        body {
            margin: 20px;
        }
    </style>

</head>

<body>
    <div class="container">

        <?php if (isset($error)) { ?>
            <p class="error"><?php echo $error; ?></p>
        <?php } ?>
        <div class="login-form">
            <form class="login" method="POST" action="config/loginuser.php">
                <div class="form-group">
                    <h1>Consumer Login</h1>
                    <label for="userMail">Email Address:</label>
                    <input type="text" id="userMail" name="userMail" value="admin" required>
                </div>
                <br>
                <div class="form-group">
                    <label for="password">Password:&nbsp;</label>
                    <input type="password" id="password" name="userPassword" value="12345" required>
                </div>
                <br>
                
                <button type="submit" name="login" value="login">Login</button>
                <button type="submit" name="register" value="register">Register</button>
        </div>
        </form>
    </div>
    </div>
</body>

</html>