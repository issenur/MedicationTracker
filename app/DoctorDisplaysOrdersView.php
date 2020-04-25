<?php

include_once("Model.php");
include_once("DoctorAddsOrderView.php"); 
include_once("OrderController.php");  

?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta http-equiv="x-ua-compatible" content="ie=edge">

  <title>MedicationTracker | Doctor Dashboard</title>

  <!-- Font Awesome Icons -->
  <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/adminlte.min.css">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
</head>
<body class="hold-transition sidebar-mini layout-fixed layout-navbar-fixed layout-footer-fixed">
<div class="wrapper">
  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#"><i class="fas fa-bars"></i></a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="DoctorDashboardView.php" class="nav-link">Home</a>
      </li>
      
    </ul>

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
      <li class="nav-item">
        <a class="nav-link" data-widget="control-sidebar" data-slide="true" href="#"><i
            class="fas fa-th-large"></i></a>
      </li>
    </ul>

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
            <li class="nav-item d-none d-sm-inline-block">
                <a href="logout.php" class="nav-link">Logout</a>
            </li>
    </ul>
  </nav>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="DoctorDashboardView.php" class="brand-link">
      <img src="dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
           style="opacity: .8">
      <span class="brand-text font-weight-light">MedicationTracker</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="dist/img/doctorimage.png" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="#" class="d-block">Role: Doctor</a>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-item has-treeview menu-open">
            
            <ul class="nav nav-treeview">
            <li class="nav-item">
                <a href="./DoctorDashboard.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Doctor Dashboard</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="./DoctorAddsOrderView.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Create  An Order</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="./DoctorDisplaysOrdersView.php" class="nav-link active">
                  <i class="far fa-check-circle nav-icon"></i>
                  <p>Display All Orders</p>
                </a>
              </li>
             
            </ul>
          </li>
        
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Hello, Doctor! </h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Display All Orders</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->

        <!-- Main content -->
         <section class="content">
          <div class="container-fluid">
        
       
      <!-- TABLE: LATEST ORDERS -->
      <div class="card">
          <div class="card-header border-transparent">
            <h3 class="card-title">Latest Orders</h3>
          </div>


          <!-- /.card-header -->
          <div class="row mb-2">
                    <div class="col-sm-12">
                       <table id="example2" class="table table-bordered table-hover">
                            <thead>
                                <tr>
                                    <th>Order ID</th>
                                    <th>Doctor ID</th>
                                    <th>Patient ID</th>
                                    <th>Caregiver ID</th>
                                    <th>Order Creation Date</th>
                                </tr>
                            </thead>
                            <?php
                                
                                global $conn;
                                
                                if ($conn->connect_error) {
                                    die("Connection failed: " . $conn->connect_error);
                                }
                                
                                $sql = "SELECT ";
                                $sql .= "`order`.`order_id` AS `order_id` ,";
                                $sql .= "`order`.`doctor_id` AS `doctor_id` ,";
                                $sql .= "`order`.`care_giver_id` AS `caregiver_id` ,";
                                $sql .= " `order`.`patient_id` AS `patient_id`,";
                                $sql .= " DATE_FORMAT(`date`, '%d-%b-%Y') AS `date` ";
                                $sql .= " FROM `order` ";
                                $sql .= " JOIN `user` ON (`user`.`doctor_id` = `order`.`doctor_id`)";
                                $result = $conn->query($sql);
                                echo "<id='example2'>";
                                echo "<tbody>";
                                if ($result->num_rows > 0) {
                                    while($row = $result->fetch_assoc()) {
                                        echo "<tr>";
                                        echo "<td>" . (int)$row['order_id'] . "</td>";
                                        echo "<td>" . (int)$row['doctor_id'] . "</td>";
                                        echo "<td>" . $row['patient_id'] . "</td>"; 
                                        echo "<td>" . $row['caregiver_id'] . "</td>";
                                        echo "<td>" . $row['date'] . "</td>";
                                        echo "</tr>";
                                    }
                                    echo "</tbody>";
                                    echo "</table>";
                                } else {
                                    echo "</tbody>";
                                    echo "</table>";
                                    echo "<h4>ORDERS DATABASE EMPTY</h4>";
                                }
                            ?>
                    </div>
                </div>
          <!-- /.card-body -->
        

      </div><!--/. container-fluid -->
    </section>



    </div>
    <!-- /.content-header -->

    
   
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->

  <!-- Main Footer -->
  <footer class="main-footer">
    <strong>Copyright &copy; 2014-2019 <a href="http://adminlte.io">AdminLTE.io</a>.</strong>
    All rights reserved.
    <div class="float-right d-none d-sm-inline-block">
      <b>Version</b> 3.0.2
    </div>
  </footer>
</div>
<!-- ./wrapper -->

</body>
</html>