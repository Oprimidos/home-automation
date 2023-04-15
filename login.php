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
    <div class="container">
        <h1>Login</h1>
        <?php if(isset($error)) { ?>
            <p class="error"><?php echo $error; ?></p>
        <?php } ?>
        <form method="POST" action="">
            <label for="username">Username:</label>
            <input type="text" id="username" name="username" required>

            <label for="password">Password:</label>
            <input type="password" id="password" name="password" required>

            <label for="role">Login as:</label>
            <select id="role" name="role">
                <option value="producer">Producer</option>
                <option value="consumer">Consumer</option>
            </select>

            <input type="submit" name="login" value="Login">
        </form>
    </div>
</body>
</html>
