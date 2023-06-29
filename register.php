<?php
session_start();
if (isset($_SESSION)) {
    session_destroy();
}
?>
<!DOCTYPE html>
<html>

<head>
    <link rel="shortcut icon" href="assets/images/favicon-home.png" type="image/x-icon">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Consumer Login</title>
    <link rel="stylesheet" href="assets/css/login.css">
    <style>
        body {
            margin: 20px;
        }
    </style>
    <?php
    if (isset($_GET["islem"])) {
        $islem = $_GET["islem"];
        if ($islem === "no") {
            echo '<script>alert("Error: Invalid operation.");</script>';
        }
    }
    ?>

</head>

<body>
    <div class="container">

        <?php if (isset($error)) { ?>
            <p class="error"><?php echo $error; ?></p>
        <?php } ?>
        <div class="login-form">
            <form class="login" method="POST" action="config/userregister.php">
                <div class="form-group">
                    <h1>Consumer Login</h1>
                    <label for="userMail">Email Address:</label>
                    <input type="text" id="userMail" name="userMail" required>
                </div>
                <br>
                <div class="form-group">
                    <label for="password">Password:&nbsp;</label>
                    <input type="password" id="password" name="userPassword" required>
                </div>
                <br>
                <button type="submit" name="register" value="register">Register</button>
        </div>
        </form>
    </div>
    </div>
</body>

</html>