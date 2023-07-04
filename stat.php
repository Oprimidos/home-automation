<!DOCTYPE html>
<html>

<head>
    <title>Consumer Dashboard</title>
    <link rel="stylesheet" href="assets/css/home.css">
    <link rel="shortcut icon" href="assets/images/favicon-home.png" type="image/x-icon">
    <header>
        <?php include("navbar.php"); 
            include("config/chart.php");
        ?>
    </header>
    <?php
    $sqlhome = $db->prepare('SELECT * from home WHERE homeID=:homeID');
    $sqlhome->bindParam(':homeID', $_SESSION["userHomeID"]);
    $sqlhome->execute();
    $home = $sqlhome->fetch(PDO::FETCH_ASSOC);
    ?>
    <style>
        body {
            background-image: url('<?php echo $home["homePhoto"] ?>');
        }
    </style>
    <?php
    if (!($_SESSION["userHomeID"] == $home["homeID"])) {
        session_destroy();
        header("Location:login.php?islem=no");
    }

    ?>
    <script src="https://cdn.canvasjs.com/canvasjs.min.js"></script>
</head>

<body>



    <!-- Area Chart -->
    <div class="col-xl col-lg">
        <div class="card shadow mb-4">
            <!-- Card Header - Dropdown -->
            <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                <h6 class="m-0 font-weight-bold text-primary">Earnings Overview</h6>
                <div class="dropdown no-arrow">
                </div>
            </div>
            <!-- Card Body -->
            <div class="card-body">
                <div class="chart-area">
                    <div id="chartContainer1" style="height: 300px; width: 100%;"></div>
                </div>
            </div>
        </div>
    </div>

    <div class="col-xl col-lg">
        <div class="card shadow mb-4">
            <!-- Card Header - Dropdown -->
            <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                <h6 class="m-0 font-weight-bold text-primary">Energy Overview</h6>
                <div class="dropdown no-arrow">
                </div>
            </div>
            <!-- Card Body -->
            <div class="card-body">
                <div class="chart-area">
                    <div id="chartContainer2" style="height: 300px; width: 100%;"></div>
                </div>
            </div>
        </div>
    </div>
    </div>

</body>

</html>