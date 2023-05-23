<?php
session_start();

if(isset($_POST['login'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Check if the entered credentials are correct
    if($username == 'admin' && $password == '12345') {
        $_SESSION['username'] = $username;
        header("Location: home.php");
        exit();
    } else {
        $error = "Invalid username or password!";
    }
}
?>
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
        
        <?php if(isset($error)) { ?>
            <p class="error"><?php echo $error; ?></p>
        <?php } ?>
        <div class="login-form">
            <form class="login" method="POST" action="">
                <div class="form-group">
                <h1>Consumer Login</h1>
                    <label for="username">Username:</label>
                    <input type="text" id="username" name="username" value="admin" required>
                </div>
<br>
                <div class="form-group">
                    <label for="password">Password:&nbsp;</label>
                    <input type="password" id="password" name="password" value="12345"required>
                </div>
                <button type="submit" name="login" value="Login">Login</button>
            </form>
        </div>
    </div>
</body>
</html>
