<?php

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
    <!-- Navbar -->
    <nav class="main-header navbar navbar-expand navbar-white navbar-light">
        <!-- Left navbar links -->
        <ul class="navbar-nav">
        </ul>
        
        <!-- SEARCH FORM -->
        <form class="form-inline ml-3">
            <div class="input-group input-group-sm">
                <div class="input-group-append">
                </div>
            </div>
        </form>
        
        <!-- Right navbar links -->
        <ul class="navbar-nav ml-auto">
            <!-- Messages Dropdown Menu -->
            <li class="nav-item dropdown">
            </li>
            <!-- Notifications Dropdown Menu -->
            <li class="nav-item dropdown">
            </li>
            <li class="nav-item">
            </li>
        </ul>
    </nav>
    <!-- /.navbar -->
    
        <!-- Main Sidebar Container -->
    <aside class="main-sidebar sidebar-dark-primary elevation-4">
        <!-- Brand Logo -->
        <a href="" class="brand-link">
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
                    <a href="#" class="d-block">Role: Admin</a>
                </div>
            </div>
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
