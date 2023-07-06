<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Super Admin</title>

    <!-- Custom fonts for this template -->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="../assets/css/admin2.css" rel="stylesheet">

    <!-- Custom styles for this page -->
    <link href="vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">

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
                    <h1 class="h3 mb-2 text-gray-800">Register</h1>
                    <p class="mb-4">Accept Or Decline Register </p>

                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Registers</h6>
                        </div>
                        <?php
                        $sqlregister = $db->prepare("SELECT * FROM register");
                        $sqlregister->execute();
                        $registers = $sqlregister->fetchAll(PDO::FETCH_ASSOC);
                        ?>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>First Name</th>
                                            <th>Last Name</th>
                                            <th>Mail</th>
                                            <th>Password</th>
                                            <th>Register Type</th>
                                            <th>Home ID</th>
                                            <th>Accept Or Decline</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            <th>First Name</th>
                                            <th>Last Name</th>
                                            <th>Mail</th>
                                            <th>Password</th>
                                            <th>Register Type</th>
                                            <th>Home ID</th>
                                            <th>Accept Or Decline</th>
                                        </tr>
                                    </tfoot>
                                    <tbody>
                                        <?php
                                        foreach ($registers as $register) {
                                        ?>
                                            <tr>
                                                <td><?php echo $register["regFirstName"] ?></td>
                                                <td><?php echo $register["regLastName"] ?></td>
                                                <td><?php echo $register["regMail"] ?></td>
                                                <td><?php echo
                                                    $string = str_repeat('*', strlen($register["regPassword"]));
                                                    ?></td>
                                                <td><?php echo $register["regType"] ?></td>
                                                <td><?php echo $register["regHomeID"] ?></td>
                                                <td>
                                                    <form action="config/operation.php" method="post">
                                                        <input type="hidden" name="regID" value="<?php echo $register['regID'] ?>">
                                                        <button type="submit" name="accept" class="btn btn-primary">Accept</button>
                                                        <button type="submit" name="decline" class="btn btn-danger">Decline</button>
                                                    </form>
                                                </td>
                                            </tr>
                                        <?php  } ?>


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