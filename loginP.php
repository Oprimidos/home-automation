<?php
session_start();?>
<!DOCTYPE html>
<html>
<head>
    <link rel="shortcut icon" href="assets/images/favicon-home.png" type="image/x-icon">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Producer Login</title>
    <link rel="stylesheet" href="assets/css/login.css">
    <style>
      body {
        margin: 20px;
      }
    </style>
   
</head>
<body>
    
    <div class="container">
        
        <?php if(isset($error)) { ?>
            <p class="error"><?php echo $error; ?></p>
        <?php } ?>
        <div class="login-form">
            <form class="login" method="POST" action="config/loginuser.php">
                <div class="form-group">
                <h1>Producer Login</h1>
                    <label for="userMail">Email Address:</label>
                    <input type="text" id="userMail" name="userMail" value="admin" required>
                </div>
<br>
                <div class="form-group">
                    <label for="password">Password:&nbsp;</label>
                    <input type="password" id="password" name="userPassword" value="12345" required>
                </div>
                <br>
                <button type="submit" name="loginP" value="Login">Login</button>
                <button type="submit" name="registerP" value="Register">Register</button>
            </form>
        </div>
    </div>
</body>
</html>
