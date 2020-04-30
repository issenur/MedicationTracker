<?php

include_once("Globals.php");
session_start();

global $model;
?>

<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Caregiver Fulfills Order</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- Font Awesome -->
  <link rel="stylesheet" href="../../plugins/fontawesome-free/css/all.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="../../dist/css/adminlte.min.css">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
</head>
<body class="hold-transition sidebar-mini">
<div class="wrapper">
  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
        <li class="nav-item">
            <a class="nav-link" data-widget="pushmenu" href="#"><i class="fas fa-bars"></i></a>
        </li>
        <li class="nav-item d-none d-sm-inline-block">
            <a href="http://localhost/CaregiverDashboardView.php" class="nav-link">Home</a>
        </li>
    </ul>
    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
        <li class="nav-item d-none d-sm-inline-block">
            <a href="logout.php" class="nav-link">Logout</a>
        </li>
    </ul>
</nav>
    <!-- Main Sidebar Container -->
    <aside class="main-sidebar sidebar-dark-primary elevation-4">
        <!-- Brand Logo -->
        <a href="CaregiverDashboardView.php" class="brand-link">
            <span class="brand-text font-weight-light">MedicationTracker</span>
        </a>

        <!-- Sidebar -->
        <div class="sidebar">
            <!-- Sidebar user panel (optional) -->
            <div class="user-panel mt-3 pb-3 mb-3 d-flex">
                <div class="image">
                    <img src="dist/img/caregiverimage.png" class="img-circle elevation-2" alt="User Image">
                </div>
                <div class="info">
                    <a href="#" class="d-block">Role: Caregiver</a>
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
                                <a href="./CaregiverDashboardView.php" class="nav-link">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Caregiver Dashboard</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="./CaregiverClaimsOrderView.php" class="nav-link">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Self-Assign Order</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="./CaregiverFulfillsOrderView.php" class="nav-link active">
                                    <i class="far fa-check-circle nav-icon"></i>
                                    <p>Fulfill Order</p>
                                </a>
                            </li>
                        </ul>
                    </li>
                </ul>
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
              <h1 class="m-0 text-dark">Fulfill Assigned Orders</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
              <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="http://localhost/CaregiverDashboardView.php">Home</a></li>
                <li class="breadcrumb-item active">Fulfill Order</li>
              </ol>
            </div><!-- /.col -->
          </div><!-- /.row -->
        </div><!-- /.container-fluid -->
      </div>

        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-12">
                       <table id="example2" class="table table-bordered table-hover">
                            <thead>
                                <tr>
                                    <th>OrderID</th>
                                    <th>Patient</th>
                                    <th>Date</th>
                                    <th>Fulfill</th>
                                </tr>
                            </thead>
                            <?php

                                global $conn;

                                if ($conn->connect_error) {
                                    die("Connection failed: " . $conn->connect_error);
                                }
                                $model = Model::getInstance();
                                $Care_Giver_ID = $model-> getCurrentUserId(); // get Caregiver ID, add to line 166.

                                $sql = "SELECT";

                                $sql .= "`order`.`order_id` AS `order_id` ,";
                                $sql .= "`patient`.`first` AS `pfirst` ,";
                                $sql .= "`patient`.`last` AS `plast` ,";
                                $sql .= " DATE_FORMAT(`date`, '%d-%b-%Y') AS `date`,";
                                $sql .= " `order`.`patient_id` AS `patient_id`";
                                $sql .= " FROM `order` ";
                                $sql .= " JOIN `patient` ON (`patient`.`patient_id` = `order`.`patient_id`)";
                                $sql .= " WHERE `care_giver_id` = '$Care_Giver_ID'";
                                $result = $conn->query($sql);
                                echo "<id='example2'>";
                                echo "<tbody>";
                                if ($result->num_rows > 0) {
                                    while($row = $result->fetch_assoc()) {
                                        echo "<tr>";
                                        echo "<td>" . (int)$row['order_id'] . "</td>";
                                        echo "<td>" . $row['pfirst'] . " " .  $row['plast'] . "</td>";
                                        echo "<td>" . $row['date'] . "</td>";
                                        echo "<td>";
                                        echo "<a href ='CaregiverFODetailView.php?claim_order=".  $row['order_id'] ."'><button class='btn btn-dark'>Fulfill Order</button>"."<a/>";
                                        echo "</td>";
                                        echo "</tr>";
                                    }
                                    echo "</tbody>";
                                    echo "</table>";
                                } else {
                                    echo "</tbody>";
                                    echo "</table>";
                                    echo "<h4>No Orders To Fulfill</h4>";
                                }
                            ?>
                    </div>
                </div>
            </div>
            <!-- /.container-fluid -->
        </section>

        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                </div>
                <!-- /.row -->
            </div>
            <!-- /.container-fluid -->
        </section>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->
    <footer class="main-footer">
        <div class="float-right d-none d-sm-block">
        </div>
    </footer>

    <!-- Control Sidebar -->
    <aside class="control-sidebar control-sidebar-dark">
        <!-- Control sidebar content goes here -->
    </aside>
    <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

<!-- jQuery -->
<script src="../../plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="../../plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- bs-custom-file-input -->
<script src="../../plugins/bs-custom-file-input/bs-custom-file-input.min.js"></script>
<!-- AdminLTE App -->
<script src="../../dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="../../dist/js/demo.js"></script>
<script type="text/javascript">
$(document).ready(function () {
  bsCustomFileInput.init();
});
</script>
</body>
</html>
