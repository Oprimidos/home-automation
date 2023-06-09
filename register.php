<?php
session_start();
if (isset($_SESSION)) {
    session_destroy();
}
?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="shortcut icon" href="assets/images/favicon-home.png" type="image/x-icon">

    <title>Consumer Register</title>

    <!-- Custom fonts for this template-->
    <link href="assets/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="assets/css/admin2.css" rel="stylesheet">
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

<body class="bg-gradient-primary">

    <div class="container">

        <div class="card o-hidden border-0 shadow-lg my-5">
            <div class="card-body p-0">
                <!-- Nested Row within Card Body -->
                <div class="row">
                    <div class="col-lg-5 d-none d-lg-block bg-register-image"></div>
                    <div class="col-lg-7">
                        <div class="p-5">
                            <div class="text-center">
                                <h1 class="h4 text-gray-900 mb-4">Create an Account!</h1>
                            </div>
                            <form class="user" method="POST" action="config/userregister.php" enctype="multipart/form-data">
                                <div class="form-group row">
                                    <div class="col-sm-6 mb-3 mb-sm-0">
                                        <input type="text" class="form-control form-control-user" id="userFirstName" name="userFirstName" required
                                            placeholder="First Name">
                                    </div>
                                    <div class="col-sm-6">
                                        <input type="text" class="form-control form-control-user" id="userLastName" name="userLastName" required
                                            placeholder="Last Name">
                                    </div>
                                    
                                    <div class="col-sm-6">
                                        <input type="number" class="form-control form-control-user" name="homeID" id="homeID" required
                                            placeholder="Home ID->Take From Producer">
                                    </div>
                                    
                                <div class="form-group col-md-12">
                                    <input type="email" class="form-control form-control-user" id="userMail" name="userMail" required
                                        placeholder="Email Address">
                                        
                                        <input type="password" class="form-control form-control-user"
                                        id="password" name="userPassword" required
                                        placeholder="Password">
                                    </div>
                                </div>
                                
                                <button type="submit" name="registerC" class="btn btn-primary btn-user btn-block">
                                    Register Account
                                </button>
                             
                            </form>
                            <hr>

                            <div class="text-center">
                                <a class="small" href="login.php">Already have an account? Login!</a>
                            </div>
                        </div>
                    </div>
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
