<?php
    
    session_start();
    if(!isset($_SESSION['username']) || $_SESSION['role'] != "admin"){
        header("location:index.php");
    }
    
    include_once("Globals.php");
    global $model;
    
?>

<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Admin Dashboard View</title>
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
  <nav class="main-header navbar navbar-expand navbar-white navbar-light">
        <!-- Left navbar links -->
        <ul class="navbar-nav">
            <li class="nav-item">
                <a class="nav-link" data-widget="pushmenu" href="#"><i class="fas fa-bars"></i></a>
            </li>
            <li class="nav-item d-none d-sm-inline-block">
                <a href="#" class="nav-link">Home</a>
            </li>
            <li class="nav-item d-none d-sm-inline-block">
                <a href="#" class="nav-link">Contact</a>
            </li>
        </ul>
        
        <!-- SEARCH FORM -->
        <form class="form-inline ml-3">
            <div class="input-group input-group-sm">
                <input class="form-control form-control-navbar" type="search" placeholder="Search" aria-label="Search">
                <div class="input-group-append">
                    <button class="btn btn-navbar" type="submit">
                    <i class="fas fa-search"></i>
                    </button>
                </div>
            </div>
        </form>
    
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
        <a href="AdminDashboardView.php" class="brand-link">
            <img src="" alt="" class="brand-image img-circle elevation-3" style="opacity: .8">
            <span class="brand-text font-weight-light">MedicationTracker</span>
        </a>

        <!-- Sidebar -->
        <div class="sidebar">
            <!-- Sidebar user panel (optional) -->
            <div class="user-panel mt-3 pb-3 mb-3 d-flex">
                <div class="image">
                    <img src="dist/img/adminicon.jpg" class="img-circle elevation-2" alt="User Image">
                 </div>
                <div class="info">
                    <a href="#" class="d-block">Role: Admin</a>
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
                                <a href="./AdminRegistersUserView.php" class="nav-link">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Admin Registration</p>
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
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-12">
                        <h1>Active Users</h1>
                        <table id="example2" class="table table-bordered table-hover">
                            <thead>
                                <tr>
                                    <th>Acc Type</th>
                                    <th>ID#</th>
                                    <th>Username</th>
                                    <th>First</th>
                                    <th>Last</th>
                                    <th>Action</th>

                                </tr>
                            </thead>
                            <?php
                            
                                global $conn;
                                
                                if ($conn->connect_error) {
                                    die("Connection failed: " . $conn->connect_error);
                                }
                                
                                
                                $sql  = "select";
                                $sql .=     "`user`.`username` as `username`,";
                                $sql .=     "`user`.`doctor_id` as `doctor_id`,";                                
                                $sql .=     "`user`.`patient_id` as `patient_id`,";
                                $sql .=     "`user`.`care_giver_id` as `care_giver_id`,";
                                $sql .=     "`doctor`.`first` as `dfirst`,";
                                $sql .=     "`doctor`.`last` as `dlast`,";
                                $sql .=     "`patient`.`first` as `pfirst`,";
                                $sql .=     "`patient`.`last` as `plast`,";
                                $sql .=     "`care_giver`.`first` as `cfirst`,";
                                $sql .=     "`care_giver`.`last` as `clast`";
                                $sql .= " from `user`";
                                $sql .= " left join `doctor` on (`doctor`.`doctor_id` = `user`.`doctor_id`)";
                                $sql .= " left join `patient` on (`patient`.`patient_id` = `user`.`patient_id`)";
                                $sql .= " left join `care_giver` on (`care_giver`.`care_giver_id` = `user`.`care_giver_id`)";
                                $sql .= " where `user`.`active` = 1";
                                $result = $conn->query($sql);
                                echo "<id='example2'>";
                                echo "<tbody>";
                                if ($result->num_rows > 0) {
                                    while($row = $result->fetch_assoc()) {
                                        echo "<tr>";
                                        
                                        if(!($row['doctor_id'] == NULL)){
                                            echo "<td>Doctor</td>";
                                            echo "<td>" . $row['doctor_id'] . "</td>";
                                            echo "<td>" . $row['username'] . "</td>";
                                            echo "<td>" . $row['dfirst'] . "</td>";
                                            echo "<td>" . $row['dlast'] . "</td>";
                                            echo"<td>";
                                            echo "<a href ='AdminViewControllerHelper.php?delete_doctor=".  $row['username'] ."'><button class='btn btn-danger'>Deactivate</button>"."<a/>";
                                            echo "</td>"; 
                                        }else if(!($row['patient_id'] == NULL)){
                                            echo "<td>Patient</td>";
                                            echo "<td>" . $row['patient_id'] . "</td>";
                                            echo "<td>" . $row['username'] . "</td>";
                                            echo "<td>" . $row['pfirst'] . "</td>";
                                            echo "<td>" . $row['plast'] . "</td>";
                                            echo"<td>";
                                            echo "<a href ='AdminViewControllerHelper.php?delete_patient=". $row['username']."'><button class='btn btn-danger'>Deactivate</button>"."<a/>";
                                            echo "</td>"; 
                                        }else{
                                            echo "<td> Caregiver</td>";
                                            echo "<td>" . $row['care_giver_id'] . "</td>";
                                            echo "<td>" . $row['username'] . "</td>";
                                            echo "<td>" . $row['cfirst'] . "</td>";
                                            echo "<td>" . $row['clast'] . "</td>";
                                            echo"<td>";
                                            echo "<a href ='AdminViewControllerHelper.php?delete_care_giver=".  $row['username'] ."'><button class='btn btn-danger'>Deactivate</button>"."<a/>";
                                            echo "</td>"; 
                                        } 
                                        echo "</tr>";
                                    }
                                    echo "</tbody>";
                                    echo "</table>";
                                } else {
                                    echo "</tbody>";
                                    echo "</table>";
                                    echo "<h6>ACTIVATED USERS TABLE IS EMPTY</h6>";
                                }
                            ?>
                            
                        <h1>Inactive Users</h1>
                        <table id="example2" class="table table-bordered table-hover">
                            <thead>
                                <tr>
                                    <th>Acc Type</th>
                                    <th>ID#</th>
                                    <th>Username</th>
                                    <th>First</th>
                                    <th>Last</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <?php
                            
                                global $conn;
                                
                                if ($conn->connect_error) {
                                    die("Connection failed: " . $conn->connect_error);
                                }
                                
                                $sql  = "select";
                                $sql .=     "`user`.`username` as `username`,";
                                $sql .=     "`user`.`doctor_id` as `doctor_id`,";                                
                                $sql .=     "`user`.`patient_id` as `patient_id`,";
                                $sql .=     "`user`.`care_giver_id` as `care_giver_id`,";
                                $sql .=     "`doctor`.`first` as `dfirst`,";
                                $sql .=     "`doctor`.`last` as `dlast`,";
                                $sql .=     "`patient`.`first` as `pfirst`,";
                                $sql .=     "`patient`.`last` as `plast`,";
                                $sql .=     "`care_giver`.`first` as `cfirst`,";
                                $sql .=     "`care_giver`.`last` as `clast`";
                                $sql .= " from `user`";
                                $sql .= " left join `doctor` on (`doctor`.`doctor_id` = `user`.`doctor_id`)";
                                $sql .= " left join `patient` on (`patient`.`patient_id` = `user`.`patient_id`)";
                                $sql .= " left join `care_giver` on (`care_giver`.`care_giver_id` = `user`.`care_giver_id`)";
                                $sql .= " where `user`.`active` = 0";
                                $result = $conn->query($sql);
                                echo "<id='example2'>";
                                echo "<tbody>";
                                if ($result->num_rows > 0) {
                                    while($row = $result->fetch_assoc()) {
                                        echo "<tr>";
                                        if(!($row['doctor_id'] == NULL)){
                                            echo "<td> Doctor</td>";
                                            echo "<td>" . $row['doctor_id'] . "</td>";
                                            echo "<td>" . $row['username'] . "</td>";
                                            echo "<td>" . $row['dfirst'] . "</td>";
                                            echo "<td>" . $row['dlast'] . "</td>";
                                            echo"<td>";
                                            echo "<a href ='AdminViewControllerHelper.php?activate_doctor=".  $row['username'] ."'><button class='btn btn-success' style='width: 100px' >Activate</button>"."<a/>";
                                            echo "</td>"; 
                                        }else if(!($row['patient_id'] == NULL)){
                                            echo "<td>Patient</td>";
                                            echo "<td>" . $row['patient_id'] . "</td>";
                                            echo "<td>" . $row['username'] . "</td>";
                                            echo "<td>" . $row['pfirst'] . "</td>";
                                            echo "<td>" . $row['plast'] . "</td>";
                                            echo"<td>";
                                            echo "<a href ='AdminViewControllerHelper.php?activate_patient=". $row['username']."'><button class='btn btn-success' style='width: 100px'>Activate</button>"."<a/>";
                                            echo "</td>"; 
                                        }else{
                                            echo "<td> Caregiver</td>";
                                            echo "<td>" . $row['care_giver_id'] . "</td>";
                                            echo "<td>" . $row['username'] . "</td>";
                                            echo "<td>" . $row['cfirst'] . "</td>";
                                            echo "<td>" . $row['clast'] . "</td>";
                                            echo"<td>";
                                            echo "<a href ='AdminViewControllerHelper.php?activate_care_giver=".  $row['username'] ."'><button class='btn btn-success' style='width: 100px'>Activate</button>"."<a/>";
                                            echo "</td>"; 
                                        } 
                                        echo "</tr>";
                                    }
                                    echo "</tbody>";
                                    echo "</table>";
                                } else {
                                    echo "</tbody>";
                                    echo "</table>";
                                    echo "<h6>DEACTIVATED USERS TABLE IS EMPTY</h6>";
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