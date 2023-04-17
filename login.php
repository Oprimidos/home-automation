<?php
session_start();

if(isset($_POST['login'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Check if the entered credentials are correct
    if($username == 'admin' && $password == '12345') {
        $_SESSION['username'] = $username;

        // Redirect the user based on their role
        if($_POST['role'] == 'producer') {
            header("Location: producer.php");
            exit();
        } else if($_POST['role'] == 'consumer') {
            header("Location: consumer.php");
            exit();
        }
    } else {
        $error = "Invalid username or password!";
    }
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Login</title>
    <link rel="stylesheet" href="css/styles.css">
</head>
<body>
<h1>Login</h1>
    <div class="container">   
        <?php if(isset($error)) { ?>
            <p class="error"><?php echo $error; ?></p>
        <?php } ?>
        <div class="login-form" id="login-form">
            <form method="POST" action="">
                <div class="form-group">
                    <label for="username">Username:</label>
                    <input type="text" id="username" name="username" required>
                </div>

                <div class="form-group">
                    <label for="password">Password:</label>
                    <input type="password" id="password" name="password" required>
                </div>

                <div class="form-group" >
                    <label for="role" id="form-group">Login as:</label>
                    <div id="label-radio">
                    <div class="radio-group">
                    <label for="producer">
                        <input type="radio" id="producer" name="role" value="producer" required>
                        Producer</label>
                    </div>
                    <div class="radio-group">
                    <label for="consumer">
                        <input type="radio" id="consumer" name="role" value="consumer" required>
                        Consumer</label>
                    </div>
                </div>
                </div>

                <input type="submit" name="login" value="Login">
            </form>
        </div>
    </div>
</body>
</html>
