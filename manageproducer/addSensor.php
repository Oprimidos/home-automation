<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Prodcuer Admin</title>

    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>

    <!-- Custom styles for this template-->
    <link href="../assets/css/admin2.css" rel="stylesheet">

</head>

<body id="page-top">
    <!-- Page Wrapper -->
    <div id="wrapper">
        <!-- Sidebar -->
        <?php include("sidebar.php"); ?>
        <!-- End of Sidebar -->
        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">
            <!-- Main Content -->
            <div id="content">
                <br>
                <!-- Begin Page Content -->
                <div class="container-fluid">
                    <!-- Page Heading -->
                    <h1 class="h3 mb-4 text-gray-800 text-center">Add Sensor Page</h1>
                    <div class="row">

                        <div class="col-lg-12">

                            <div class="card shadow mb-4">
                                <div class="card-header py-3">
                                    <h6 class="m-0 font-weight-bold text-primary text-center">Add Sensor Form</h6>
                                </div>
                                <div class="card-body">
                                    <?php
                                    $sqlroom = $db->prepare("SELECT * FROM room WHERE homeID=:homeID");
                                    $sqlroom->bindparam(":homeID", $_SESSION["userHomeID"]);
                                    $sqlroom->execute();
                                    $rooms = $sqlroom->fetchAll(PDO::FETCH_ASSOC);

                                    ?>
                                    <form class="user" method="POST" action="config/operation.php" enctype="multipart/form-data">
                                        <div class="form-group row">
                                            <div class="col-sm-12 mb-3 mb-sm-10">
                                                <label for="">Choose Room:</label>
                                                <select class="form-select" aria-label="Default select example" name="sensorRoomID">
                                                    <?php
                                                    foreach ($rooms as $room) { ?>
                                                        <option value="<?php echo $room["roomID"] ?>"><?php echo $room["roomName"] ?></option>
                                                    <?php } ?>


                                                </select>
                                            </div>
                                            <div class="col-sm-12 mb-3 mb-sm-10">
                                            <label for="">Choose Sensor Type:</label>
                                                <select class="form-select" aria-label="Default select example" name="sensorType">
                                                    <option value="Air Condition">Air Condition</option>
                                                    <option value="Temperature">Temperature</option>
                                                    <option value="Light">Light</option>
                                                    <option value="Humidity">Humidity</option>
                                            </div>
                                            <div class="col-sm-12 mb-3 mb-sm-10">
                                                
                                                <input type="hidden" id="roomPhoto" name="roomPhoto" accept="image/*" required>
                                            </div>

                                            <button type="submit" name="addsensor" class="btn btn-primary btn-user btn-block">
                                                Add A Sensor
                                            </button>
                                        </div>
                                    </form>

                                </div>
                            </div>

                        </div>

                    </div>

                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->

            <!-- Footer -->

            <!-- End of Footer -->

        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    <!-- Logout Modal-->
    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                    <a class="btn btn-primary" href="login.html">Logout</a>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin-2.min.js"></script>

</body>

</html>