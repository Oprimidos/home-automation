<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Procuder Admin</title>

    <!-- Custom fonts for this template-->
    <link href="assets/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="assets/css/admin.css" rel="stylesheet">
    <?php include("config/connectdb.php"); include("config/chart.php");?>

</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="homeP.php">
                <div class="sidebar-brand-icon rotate-n-15">
                    <img src="assets/icons/go-back.png" alt="">
                </div>
                <div class="sidebar-brand-text mx-3"><img src="assets/images/M^2-1.png" alt=""></div>
            </a>

            <!-- Divider -->
            <hr class="sidebar-divider my-0">

            <!-- Nav Item - Dashboard -->
            <li class="nav-item active">
                <a class="nav-link" href="admin.php">
                    <span>Dashboard</span></a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider">

            <!-- Heading -->
            <div class="sidebar-heading">
                Interface
            </div>

            <!-- Nav Item - Pages Collapse Menu -->
            <li class="nav-item">
                <a class="nav-link collapsed" href="addRoom.php" data-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">
                    <img src="assets/icons/add.png" alt="Add">
                    <span>Add Room</span>
                </a>

            </li>

            <!-- Nav Item - Utilities Collapse Menu -->
            <li class="nav-item">
                <a class="nav-link collapsed" href="editRoom.php" data-target="#collapseUtilities" aria-expanded="true" aria-controls="collapseUtilities">
                    <img src="assets/icons/edit.png" alt="Edit">
                    <span>Edit Room</span>
                </a>

            </li>

            <!-- Divider -->
            <hr class="sidebar-divider">

            <!-- Heading -->
            <div class="sidebar-heading">
                Addons
            </div>




            <!-- Nav Item - Charts -->

            <!-- Nav Item - Tables -->
            <li class="nav-item">
                <a class="nav-link" href="tables.php">
                    <img src="assets/icons/consumer.png" alt="Consumer">
                    <span>Last Activities</span></a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider d-md-block">

            <!-- Sidebar Toggler (Sidebar) -->
            <li class="nav-item">
                <a class="nav-link" href="index.php">
                    <img src="assets/icons/logout.png" alt="Logout">
                    <span>Logout</span></a>
            </li>



        </ul>
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <br>




                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
                    </div>

                    <!-- Content Row -->
                    <div class="row">

                        <!-- Earnings (Monthly) Card Example -->
                        <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card border-left-primary shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                                Spends (Kwh)</div>
                                            <?php
                                            $sqlkwh = $db->prepare('SELECT SUM(sensorKwh) AS total
                                                FROM sensor');
                                            $sqlkwh->execute();
                                            $kwh = $sqlkwh->fetch(PDO::FETCH_ASSOC);
                                            $totalkwh = (int)$kwh["total"];
                                            ?>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo $totalkwh ?> Kwh</div>
                                        </div>
                                        <div class="col-auto">
                                            <img src="assets/icons/conflict.png" alt="Light">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Earnings (Monthly) Card Example -->
                        <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card border-left-success shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                                                Spends (Money)</div>
                                            <?php
                                            $sqlmoney = $db->prepare('SELECT SUM(sensorMoney) AS total
                                                FROM sensor');
                                            $sqlmoney->execute();
                                            $money = $sqlmoney->fetch(PDO::FETCH_ASSOC);
                                            $totalmoney = (int)$money["total"];
                                            ?>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800">$ <?php echo $totalmoney ?></div>
                                        </div>
                                        <div class="col-auto">
                                            <img src="assets/icons/dolar.png" alt="Money">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>



                        <!-- Pending Requests Card Example -->
                        <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card border-left-warning shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">
                                                Total Rooms</div>
                                            <?php
                                            $sqlroom = $db->prepare('SELECT Count(*) AS total
                                                FROM room WHERE homeID=:homeID');
                                            $sqlroom->bindParam(':homeID', $_SESSION["userHomeID"]);
                                            $sqlroom->execute();
                                            $room = $sqlroom->fetch(PDO::FETCH_ASSOC);

                                            ?>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo $room["total"] ?></div>
                                        </div>
                                        <div class="col-auto">
                                            <img src="assets/icons/room.png" alt="Room">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>


                        <!-- Pending Requests Card Example -->
                        <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card border-left-warning shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">
                                                Total Devices</div>
                                            <?php
                                            $sqlsensor = $db->prepare('SELECT COUNT(sensor.sensorID) AS total
                                                FROM home 
                                                JOIN room ON home.homeID = room.homeID 
                                                JOIN sensor ON room.roomID = sensor.sensorRoomID 
                                                WHERE home.homeID =:homeID;
                                                ');
                                            $sqlsensor->bindParam(':homeID', $_SESSION["userHomeID"]);
                                            $sqlsensor->execute();
                                            $sensor = $sqlsensor->fetch(PDO::FETCH_ASSOC);
                                            ?>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo $sensor["total"] ?></div>
                                        </div>
                                        <div class="col-auto">
                                            <img src="assets/icons/sensor.png" alt="Sensor">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Content Row -->

                    <div class="row">

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
                    </div>

                    <div class="row">

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
                <div id="chartContainer2" style="height: 300px; width: 100%;"></div>
            </div>
        </div>
    </div>
</div>
</div>

                </div>
                <!-- End of Content Wrapper -->

            </div>
            <!-- End of Page Wrapper -->

            <!-- Bootstrap core JavaScript-->
            <script src="vendor/jquery/jquery.min.js"></script>
            <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

            <!-- Core plugin JavaScript-->
            <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

            <!-- Custom scripts for all pages-->
            <script src="js/sb-admin-2.min.js"></script>

            <!-- Page level plugins -->
            <script src="vendor/chart.js/Chart.min.js"></script>

            <!-- Page level custom scripts -->
            <script src="https://cdn.canvasjs.com/canvasjs.min.js"></script>

</body>

</html>