<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="assets/css/navbar.css">
    <script src="js/navbar.js"></script>
    <script>
        setTimeout(() => {
            document.location.reload();
        }, 10000);
    </script>
    <?php include("config/connectdb.php") ?>
    <?php include("config/update.php"); ?>
    <?php
    if (strlen($_SESSION["userName"]) == 0) {
        session_destroy();
        header("Location:login.php?islem=no");
    } ?>
</head>

<body>

    <header id="nav-wrapper">
        <nav id="nav">
            <div class="nav left">
                <span class="gradient skew"><a href="assets/images/M^2-1.png"></a><img src="assets/images/M^2-1.png" alt="#" /></span>
                <button id="menu" class="btn-nav"><span class="fas fa-bars"></span></button>
            </div>
            
            <div class="nav right">
                <a href="home.php" class="nav-link"><span class="nav-link-span"><span class="u-nav">Home</span></span></a>
                <a href="config/logout.php" class="nav-link"><span class="nav-link-span"><span class="u-nav">Logout</span></span></a>
            </div>
        </nav>
    </header>

</body>

</html>