<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>SB Admin 2 - Buttons</title>

    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>

    <!-- Custom styles for this template-->
    <link href="../assets/css/admin2.css" rel="stylesheet">
    <script>
        window.onload = function() {
            var input = document.getElementById('roomPhoto');
            var previewImage = document.getElementById('preview-image');

            input.addEventListener('change', function(event) {
                var file = event.target.files[0];
                var reader = new FileReader();

                reader.onload = function(event) {
                    previewImage.src = event.target.result;
                };

                reader.readAsDataURL(file);
            });
        };
    </script>
</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <?php include("sidebar.php"); ?>
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <? php ?>
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <br>

                <div class="container-fluid">
                    <!-- Page Heading -->
                    <h1 class="h3 mb-4 text-gray-800 text-center">Edit Room Page</h1>
                    <div class="row">

                        <div class="col-lg-12">

                            <div class="card shadow mb-4">
                                <div class="card-header py-3">
                                    <h6 class="m-0 font-weight-bold text-primary text-center">Edit Room Form</h6>
                                </div>
                                <div class="card-body">
                                    <?php
                                    $sqlroom = $db->prepare("SELECT * FROM room WHERE homeID=:homeID");
                                    $sqlroom->bindParam(":homeID", $_SESSION["userHomeID"]);
                                    $sqlroom->execute();
                                    $rooms = $sqlroom->fetchAll(PDO::FETCH_ASSOC);
                                    foreach ($rooms as $room) {

                                    ?>
                                        <div class="accordion" id="accordionExample">

                                            <div class="accordion-item">
                                                <h2 class="accordion-header">
                                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                                        Edit <?php echo $room["roomName"] ?>
                                                    </button>
                                                </h2>
                                                <div id="collapseTwo" class="accordion-collapse collapse" data-bs-parent="#accordionExample">
                                                    <div class="accordion-body">
                                                        <form class="user" method="POST" action="config/operation.php" enctype="multipart/form-data">
                                                            <div class="form-group row">
                                                                <div class="col-sm-12 mb-3 mb-sm-10">
                                                                    <label for="">Room Number</label>
                                                                    <input type="number" class="form-control form-control-user" value="<?php echo $room["roomID"] ?>" disabled>
                                                                </div>
                                                                <div class="col-sm-12 mb-3 mb-sm-10">
                                                                    <label for="">Room Name</label>
                                                                    <input type="text" class="form-control form-control-user" id="roomName" name="roomName" required value=<?php echo $room["roomName"]?>>
                                                                </div>
                                                                <div class="col-sm-12 mb-3 mb-sm-10">
                                                                    <img id="preview-image" src="<?php echo "../".$room["roomPhoto"] ?>" alt="Preview"/ style="height: 250px;" >
                                                                </div>
                                                                <div class="col-sm-12 mb-3 mb-sm-10">
                                                                    <label for="">Room Photo</label>
                                                                    <input type="file" id="roomPhoto" name="roomPhoto" accept="image/*" value="<?php echo $room["roomPhoto"]?>">
                                                                </div>
                                                                <input type="hidden" name="roomID" value="<?php echo $room["roomID"]?>">
                                                                <button type="submit" name="editRoom" class="btn btn-primary btn-user btn-block">
                                                                    Save
                                                                </button>

                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        <?php } ?>
                                        </div>

                                </div>
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

    <!-- Bootstrap core JavaScript-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin-2.min.js"></script>

</body>

</html>