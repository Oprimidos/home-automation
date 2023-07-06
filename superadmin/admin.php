<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Super Admin</title>

    <!-- Custom fonts for this template-->
    <link href="../assets/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="../assets/css/admin.css" rel="stylesheet">
    <?php include("../config/connectdb.php"); 
    include("config/chart.php");?>

</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <?php include("sidebar.php");?>
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
                                                Number of Producer</div>
                                            <?php
                                            $type="Producer";
                                            $sqlproducer = $db->prepare('SELECT COUNT(*) AS total
                                                FROM users WHERE userType=:userType');
                                            $sqlproducer->bindParam(":userType",$type);
                                            $sqlproducer->execute();
                                            $producer = $sqlproducer->fetch(PDO::FETCH_ASSOC);
                                            $numberofproducer = (int)$producer["total"];
                                            ?>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo $numberofproducer ?></div>
                                        </div>
                                        <div class="col-auto">
                                            <img src="../assets/icons/conflict.png" alt="Light">
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
                                                Number of Consumer</div>
                                                <?php
                                            $type="Consumer";
                                            $sqlconsumer = $db->prepare('SELECT COUNT(*) AS total
                                                FROM users WHERE userType=:userType');
                                            $sqlconsumer->bindParam(":userType",$type);
                                            $sqlconsumer->execute();
                                            $consumer = $sqlconsumer->fetch(PDO::FETCH_ASSOC);
                                            $numberofconsumer = (int)$consumer["total"];
                                            ?>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo $numberofconsumer
                                             ?></div>
                                        </div>
                                        <div class="col-auto">
                                            <img src="../assets/icons/dolar.png" alt="Money">
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
                                                FROM room');
                                            $sqlroom->execute();
                                            $room = $sqlroom->fetch(PDO::FETCH_ASSOC);

                                            ?>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo $room["total"] ?></div>
                                        </div>
                                        <div class="col-auto">
                                            <img src="../assets/icons/room.png" alt="Room">
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
                                            $sqlsensor = $db->prepare('SELECT COUNT(*) AS total FROM sensor');
                                            $sqlsensor->execute();
                                            $sensor = $sqlsensor->fetch(PDO::FETCH_ASSOC);
                                            ?>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo $sensor["total"] ?></div>
                                        </div>
                                        <div class="col-auto">
                                            <img src="../assets/icons/sensor.png" alt="Sensor">
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
                                    <h6 class="m-0 font-weight-bold text-primary">User Type</h6>
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
            <h6 class="m-0 font-weight-bold text-primary">Room Type</h6>
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