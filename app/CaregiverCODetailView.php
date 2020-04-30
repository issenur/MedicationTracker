<?php
    session_start();
    include_once("Globals.php");
    include_once("Model.php");

    if(!isset($_SESSION['username']) || $_SESSION['role'] != "caregiver"){
      header("location:index.php");
    }

    if(isset($_GET['claim_order'])){
        $order_id = $_GET['claim_order'];
        $_SESSION['order_id'] = $_GET['claim_order'];
    }
?>


<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Caregiver Confirms Claim</title>
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
                            <li class="nav-item active">
                                <a href="./CaregiverDashboardView.php" class="nav-link active">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Caregiver Dashboard</p>
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
        <section class="content-header" style="padding: 0px 0px 0px 0px" >
            <div class="container-fluid " style="padding: 0px 0px 0px 0px" >
                <div class ="row" style="padding: 20px 20px 0px 20px">
                    <div class="col">
                        <h1>Order#
                        <?php
                            $order_id = $_SESSION['order_id'];
                            echo (int)$order_id;
                        ?>
                        </h1>
                    </div>
                    <div class ="col-auto">

                        <a class="btn btn-app"  href ="CaregiverCODetailView.php?button_claim=$care_giver_id" style="background-color:lightblue" >
                            <i class="fas fa-edit" type ="submit" name="button_claim"  style="background-color:lightblue">Click To Confirm Claim</i>
                        </a>
                        <?php
                            if(isset($_GET["button_claim"])){

                                $model = Model::getInstance();
                                $care_giver_id = $model->getCurrentUserId();


                                $order_id = $_SESSION['order_id'];

                                $sql = "UPDATE `order` SET `care_giver_id` = '$care_giver_id'  WHERE `order_id` = '$order_id'";

                                if(!mysqli_query($conn, $sql)){
                                    header("Location: fail.php");
                                }else{
                                    header("Location: CaregiverOrderConfirmView.php");
                                }
                            }
                        ?>
                    </div>
                </div>
                <div class="row pl-5" style="min-height:72vh" style="min-width:100vw" >
                    <div class= "col" style="min-height:72vh" style="min-width:100vw" >
                        <table id="example4" class="table table-borderless table-hover">
                            <thead>
                                <tr>
                                    <th>Med Name</th>
                                    <th>Dosage Amount</th>
                                    <th>Class/Category</th>
                                    <th>Due Time</th>
                                </tr>
                            </thead>
                            <?php

                                global $conn;
                                global $order_id;

                                if ($conn->connect_error) {
                                    die("Connection failed: " . $conn->connect_error);
                                }

                                $break_down_completed = 0;

                                $sql  = "SELECT";
                                $sql .= " `medication`.`name` as `name`,";
                                $sql .= " `medication`.`physical_form` as `form`,";
                                $sql .= " `medication`.`units` as `units`,";
                                $sql .= " TIME_FORMAT(`break_down`.`administer_time`, '%h:%i %p') as `time`,";
                                $sql .= " `break_down`.`quantity` as `quantity`";
                                $sql .= " FROM `break_down`";
                                $sql .= " JOIN `medication` on (`medication`.`medication_id` = `break_down`.`medication_id`)";
                                $sql .= " WHERE `break_down`.`order_id` = '$order_id'";
                                $sql .= " ORDER BY `break_down`.`administer_time`";

                                $result = $conn->query($sql);
                                echo "<id='example2'>";
                                echo "<tbody>";
                                if ($result->num_rows > 0) {
                                    while($row = $result->fetch_assoc()) {
                                        echo "<tr>";
                                            echo "<td>" . $row['name'] . "</td>";
                                            echo "<td>" . $row['quantity'] . "  " .$row['units']. "</td>";
                                            echo "<td>" . $row['form'] . "</td>";
                                            echo "<td>" . $row['time'] . "</td>";
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
              </div>
            </section>
                <div class="row" style="min-height:15vh" style="min-width:100vw">
                    <div class= "col" style="background-color:lightblue" style="min-height:15vh" >
                        <?php
                            global $conn;

                            if ($conn->connect_error) {
                                die("Connection failed: " . $conn->connect_error);
                            }

                            $sql = " select " ;
                            $sql .=     " `patient`.`first` as `first`,";
                            $sql .=     " `patient`.`last` as `last`,";
                            $sql .=     " `order`.`order_id` as `order_id`,";
                            $sql .=     " DATE_FORMAT(`order`.`date`, '%d-%b-%Y') as `datefield`";
                            $sql .= " from `patient`";
                            $sql .= " join `order` on (`order`.`patient_id` = `patient`.`patient_id`)";
                            $sql .= " where `order`.`order_id` =  '$order_id'";

                            $result = $conn->query($sql);

                            if ($result->num_rows > 0) {
                                while($row = $result->fetch_assoc()) {
                                    echo "<div class='row '>";
                                        echo "<div class ='col '>";
                                            echo "<h3>Patient</h3>";
                                            echo "<h5>" . $row['first'] . " " . $row['last'] . "</h5>";
                                        echo "</div>";
                                        echo "<div class = 'col-auto '>";
                                            echo "<h3>Order Created</h3>";
                                            echo "<h5>" . $row['datefield'] . "</h5>";
                                        echo "</div>";
                                    echo "</div>";
                                }
                            }
                        ?>
                    </div>
                </div>
            </div>
            <!-- /.container-fluid -->
        </section>
    </div>
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
