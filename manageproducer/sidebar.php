<?php include("../config/connectdb.php")?>
<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="../homeP.php">
                <div class="sidebar-brand-icon rotate-n-15">
                    <img src="../assets/icons/go-back.png" alt="">
                </div>
                <div class="sidebar-brand-text mx-3"><img src="../assets/images/M^2-1.png" alt="Logo"></div>
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

            <!-- Nav Item - Pages Collapse Menu --><li class="nav-item">
                <a class="nav-link collapsed" href="listSensor.php" data-target="#collapseUtilities" aria-expanded="true" aria-controls="collapseUtilities">
                    <img src="../assets/icons/sensor.png" alt="Sensor">
                    <span>Sensors</span>
                </a>

            </li>
            <li class="nav-item">
                <a class="nav-link collapsed" href="addRoom.php" data-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">
                    <img src="../assets/icons/add.png" alt="Add">
                    <span>Add Room</span>
                </a>

            </li>

            <!-- Nav Item - Utilities Collapse Menu -->
            <li class="nav-item">
                <a class="nav-link collapsed" href="editRoom.php" data-target="#collapseUtilities" aria-expanded="true" aria-controls="collapseUtilities">
                    <img src="../assets/icons/edit.png" alt="Edit">
                    <span>Edit Room</span>
                </a>

            </li>
            <li class="nav-item">
                <a class="nav-link collapsed" href="addSensor.php" data-target="#collapseUtilities" aria-expanded="true" aria-controls="collapseUtilities">
                    <img src="../assets/icons/sensor.png" alt="Sensor">
                    <span>Add Sensor</span>
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
                <a class="nav-link" href="registeraccept.php">
                    <img src="../assets/icons/consumer.png" alt="Consumer">
                    <span>Last Activities</span></a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider d-md-block">

            <!-- Sidebar Toggler (Sidebar) -->
            <li class="nav-item">
                <a class="nav-link" href="../index.php">
                    <img src="../assets/icons/logout.png" alt="Logout">
                    <span>Logout</span></a>
            </li>



        </ul>