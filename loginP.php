<?php
session_start();

if(isset($_POST['login'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Check if the entered credentials are correct
    if($username == 'admin' && $password == '12345') {
        $_SESSION['username'] = $username;
        header("Location: producer.php");
        exit();
    } else {
        $error = "Invalid username or password!";
    }
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Login Producer</title>
    <link rel="stylesheet" href="css/styles.css">
</head>
<body>
<h1>Login Producer</h1>
    <div class="container">
        
        <?php if(isset($error)) { ?>
            <p class="error"><?php echo $error; ?></p>
        <?php } ?>
        <div class="login-form">
            <form method="POST" action="">
                <div class="form-group">
                    <label for="username">Username:</label>
                    <input type="text" id="username" name="username" required>
                </div>

                <div class="form-group">
                    <label for="password">Password:</label>
                    <input type="password" id="password" name="password" required>
                </div>

                <input type="submit" name="login" value="Login">
            </form>
        </div>
    </div>
</body>
</html>
