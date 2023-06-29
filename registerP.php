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
    <title>Register Producer</title>
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
        else{
            echo '<script>alert("Register Succesfully Complete");</script>';
        }
    }
    ?>
</head>

<body>
    <div class="container">
        <div class="login-form">
            <form class="login" method="POST" action="config/userregister.php" enctype="multipart/form-data">
                <h1>REGISTER PRODUCER</h1>
                <div class="form-group">
                    <label for="userFirstName">First Name:&nbsp;</label>
                    <input type="text" id="userFirstName" name="userFirstName" required>
                </div>
                <br>
                <div class="form-group">
                    <label for="userLastName">Last Name:&nbsp;</label>
                    <input type="text" id="userLastName" name="userLastName" required>
                </div>
                <br>
                <div class="form-group">
                    <label for="homeID">HomeID:&nbsp;</label>
                    <input type="number" id="homeID" name="homeID" required min="1">
                </div>
                <br>
                <div class="form-group">
                    <label for="userMail">Email Address:</label>
                    <input type="email" id="userMail" name="userMail" required>
                </div>
                <br>
                <div class="form-group">
                    <label for="password">New Password:&nbsp;</label>
                    <input type="password" id="password" name="userPassword" required>
                </div>
                <br>
                <button type="submit" name="registerP" value="register">Register</button>
        </div>
        </form>
    </div>
    </div>
</body>

</html>