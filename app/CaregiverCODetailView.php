<?php

include_once("Globals.php");

global $model;

if(isset($_GET['claim_order'])){
    global $model;
    $order_id = $_GET['claim_order'];
    $care_giver_id = $model->getCurrentUserId();
    }
?>

<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Caregiver Claims Order</title>
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
        <!-- Sidebar -->
        <div class="sidebar">
            <!-- Sidebar user (optional) -->
            <div class="user-panel mt-3 pb-3 mb-3 d-flex">        
                <div class="info">
                    <a href="#" class="d-block">SESSION: Caregiver</a>
                </div>
            </div>
        
            <!-- Sidebar Menu -->
            <nav class="mt-2">
                <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
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
                <div class ="row">
                    <div class="col">
                        <h1>Order#<?php echo $_GET['claim_order']; ?></h1>
                    </div>
                    <div class ="col-auto">
                         <a class="btn btn-app" style="background-color:orange" style="padding: 0px 0px 0px 0px">
                        <i  href ='CaregiverViewControllerHelper?claim='<?php $care_giver_id ?> class="fas fa-users "></i> Claim
                        </a>
                    </div>
                </div>
                <div class="row" style="min-height:71vh" style="min-width:100vw">
                    <div class= "col" style="min-height:71vh" style="min-width:100vw">
                        <table id="example4" class="table table-borderless table-hover">
                            <?php
                              
                                global $conn;
                                
                                if ($conn->connect_error) {
                                    die("Connection failed: " . $conn->connect_error);
                                }
                                
                                $sql  = "select";
                                $sql .=     "`medication`.`name` as `name`,";
                                $sql .=     "`medication`.`physical_form` as `form`,";
                                $sql .=     "`medication`.`units` as `units`,";
                                $sql .=     "`break_down`.`administer_time` as `time`,";
                                $sql .=     "`break_down`.`quantity` as `quantity`";
                                $sql .= " from `break_down`";
                                $sql .= " join `medication` on (`medication`.`medication_id` = `break_down`.`medication_id`)";
                                $sql .= " where `break_down`.`order_id` = " . $_GET['claim_order'];
                                 
            
                                $result = $conn->query($sql);
                                echo "<id='example2'>";
                                echo "<tbody>";
                                if ($result->num_rows > 0) {
                                    while($row = $result->fetch_assoc()) {
                                        echo "<tr>";
                                            echo "<td>" . $row['name'] . "</td>";
                                            echo "<td>" . $row['quantity'] . $row['units']. "</td>";
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
                <div class="row" style="min-height:15vh" style="min-width:100vw">
                    <div class= "col" style="background-color:orange" style="min-height:15vh" style="min-width:100vw" >
                        <?php
                            global $conn;
                            
                            if ($conn->connect_error) {
                                die("Connection failed: " . $conn->connect_error);
                            }
                            
                            $sql = " select " ;
                            $sql .=     " `patient`.`first` as `first`,";
                            $sql .=     " `patient`.`last` as `last`,";
                            $sql .=     " `order`.`order_id` as `order_id`,";
                            $sql .=     " `order`.`date` as `datefield`";
                            $sql .= " from `patient`";
                            $sql .= " join `order` on (`order`.`patient_id` = `patient`.`patient_id`)";
                            $sql .= " where `order`.`order_id` = " . $_GET['claim_order'];
                            
                            $result = $conn->query($sql);
                            
                            if ($result->num_rows > 0) {
                                while($row = $result->fetch_assoc()) {
                                    echo "<div class='row '>";
                                        echo "<div class ='col '>";
                                            echo "<h3>Patient</h3>";
                                            echo "<h5>" . $row['first'] . " " . $row['last'] . "</h5>";
                                        echo "</div>";
                                        echo "<div class = 'col-auto '>";
                                            echo "<h3>Date Created</h3>";
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
