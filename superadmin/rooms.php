<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Producer Admin</title>

    <!-- Custom fonts for this template -->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="../assets/css/admin2.css" rel="stylesheet">

    <!-- Custom styles for this page -->
    <link href="vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">

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
                    <h1 class="h3 mb-2 text-gray-800">Room </h1>
                    <p class="mb-4">Room Details and Delete Page</p>

                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Rooms</h6>
                        </div>
                        <?php 
                        $sqlroom=$db->prepare("SELECT * FROM room");
                        $sqlroom->execute();
                        $rooms = $sqlroom->fetchAll(PDO::FETCH_ASSOC);
                        ?>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>Room Name</th>
                                            <th>Room Photo Url</th>
                                            <th>Number of Sensor</th>
                                            <th>Home ID</th>
                                            <th>Delete</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            <th>Name</th>
                                            <th>Photo Url</th>
                                            <th>Number of Sensor</th>
                                            <th>Home ID</th>
                                            <th>Delete</th>
                                        </tr>
                                    </tfoot>
                                    <tbody>
                                        <?php 
                                        foreach ($rooms as $room) {
                                        ?>
                                        <tr>
                                            <td><?php echo $room["roomName"] ?></td>
                                            <td><?php echo $room["roomPhoto"] ?></td>
                                            <td><?php 
                                            $sqlsensor=$db->prepare("SELECT COUNT(*) AS total FROM sensor WHERE sensorRoomID=:roomID");
                                            $sqlsensor->bindParam(":roomID",$room["roomID"]);
                                            $sqlsensor->execute();
                                            $sensor=$sqlsensor->fetch(PDO::FETCH_ASSOC);
                                            $totalsensor = (int)$sensor["total"];
                                            echo $totalsensor;
                                            
                                            ?></td>
                                            <td><?php echo $room["homeID"]?></td>
                                            <td><form action="config/operation.php" method="post">
                                                <input type="hidden" name="roomID" value="<?php echo$room['roomID']?>">
                                                <button type="submit" name="deleteroom" class="btn btn-danger">Delete</button>
                                            </form></td>
                                        </tr>
                                        <?php  }?>
                                        
                                        
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>

                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->

             
            <!-- End of Footer -->

        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    


   
    <!-- Bootstrap core JavaScript-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin-2.min.js"></script>

    <!-- Page level plugins -->
    <script src="vendor/datatables/jquery.dataTables.min.js"></script>
    <script src="vendor/datatables/dataTables.bootstrap4.min.js"></script>

    <!-- Page level custom scripts -->
    <script src="js/demo/datatables-demo.js"></script>

</body>

</html>