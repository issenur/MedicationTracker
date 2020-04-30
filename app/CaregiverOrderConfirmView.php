<?php

include_once("Globals.php");
include_once("Model.php");
session_start();
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
        <!-- Brand Logo -->
        <a href="DoctorDashboard.php" class="brand-link">
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

                        <a class="btn btn-app"  href ="CaregiverCODetailView.php?button_claim=$care_giver_id"style="background-color:chartreuse" style="background-color:orange" >
                            <i class="fas fa-edit" type ="submit" name="button_claim2"  style="background-color:chartreuse">Order Claimed</i>
                        </a>
                        <?php
                               header("refresh:0.7; url=CaregiverDashboardView.php");


                        ?>
                    </div>
                </div>
                <div class="row pl-5" style="min-height:69vh" style="min-width:100vw" >
                    <div class= "col" style="min-height:69vh" style="min-width:100vw" >
                        <table id="example4" class="table table-borderless table-hover">
                          <h1>Order Claim Successfull!</h1>
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
