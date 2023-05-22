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
</head>

<body>
    <?php include("config/connectdb.php") ?>
    <header id="nav-wrapper">
        <nav id="nav">
            <div class="nav left">
                <span class="gradient skew"><a href="assets/images/M^2-1.png"></a><img src="assets/images/M^2-1.png" alt="#"/></span>
                <button id="menu" class="btn-nav"><span class="fas fa-bars"></span></button>
            </div>
            <div class="nav right">
                <a href="index.php" class="nav-link"><span class="nav-link-span"><span class="u-nav">Home</span></span></a>
                <a href="index.php" class="nav-link"><span class="nav-link-span"><span class="u-nav">Logout</span></span></a>
            </div>
        </nav>
    </header>

</body>

</html>
