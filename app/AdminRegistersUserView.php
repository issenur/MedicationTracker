<?php
    include_once("Model.php");
    session_start();
    if(!isset($_SESSION['username']) || $_SESSION['role'] != "admin"){
        header("location:index.php");
    }
    
    if(isset($_POST['register'])){
        $username = $_POST['username'];
        $password = $_POST['password'];
        $first = $_POST['first'];
        $last = $_POST['last'];
        $date_of_birth = $_POST['date_of_birth'];
        $is_nurse = $_POST['is_nurse'];
        $role = $_POST['role'];
      
        
        if($role == "doctor"){
             $model = Model::getInstance();
             $model-> addDoctorUser($username, $password, $first, $last, $role,  1);
        } else if($role == "caregiver"){
             $model = Model::getInstance();
             if($is_nurse == "yes" || $is_nurse == "Yes" ){
                $model-> addCareGiverUser($username, $password, $first, $last, $role, 1, 1);
             }else{
                $model-> addCareGiverUser($username, $password, $first, $last, $role, 0, 1);
             }  
        }else if($role == "patient"){
             $model = Model::getInstance();
             $model-> addPatientUser($username, $password, $first, $last, $date_of_birth, $role, 1);
        } else{
          
        }
    }
?>

<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Admin Registers Users View</title>
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
                <a href="http://localhost/AdminDashboardView.php" class="nav-link">Home</a>
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
        <a href="CaregiverDashboardView.php" class="brand-link">
            <img src="dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
            <span class="brand-text font-weight-light">MedicationTracker</span>
        </a>

        <!-- Sidebar -->
        <div class="sidebar">
            <!-- Sidebar user panel (optional) -->
            <div class="user-panel mt-3 pb-3 mb-3 d-flex">
                <div class="image">
                    
                </div>
                <div class="info">
                    <a href="AdminDashboardView.php" class="d-block">Role: Admin</a>
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
                                <a href="./AdminDashboardView.php" class="nav-link">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Admin Dashboard</p>
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
      
              <div class="col-md-12">
                <!-- general form elements -->
                <div class="card card-primary">
                  <div class="card-header">
                    <h3 class="card-title">User Registration</h3>
                  </div>
                  <!-- /.card-header -->
                  <!-- form start -->
                  <form role="form" method="Post">
                    <div class="card-body">
                      <div class="form-group">
                        <label for="exampleInputEmail1">Username</label>
                        <input type="text" name="username" class="form-control"  placeholder="Enter Username">
                      </div>
                      <div class="form-group">
                        <label for="exampleInputPassword1">Password</label>
                        <input type="password" name="password" class="form-control"  placeholder="Enter Password">
                      </div>
                       <div class="form-group">
                        <label for="exampleInputPassword1">First Name</label>
                        <input type="text" name="first" class="form-control"  placeholder="Enter First Name">
                      </div>
                        <div class="form-group">
                        <label for="exampleInputPassword1">Last Name</label>
                        <input type="text" name="last" class="form-control"  placeholder="Enter Last Name">
                      </div>
                      <div class="form-group">
                        <label for="exampleInputPassword1">Date of Birth (Only for Nurse)</label>
                        <input type="text" name="date_of_birth" class="form-control"  placeholder="YYYY-MM-DD">
                      </div>
                      <div class="form-group">
                        <label for="exampleInputPassword1">I Am a Nurse</label>
                        <input type="text" name="is_nurse" class="form-control"  placeholder="Enter Yes or No">
                      </div>
                       <div class="form-group">
                        <label for="exampleInputPassword1">Role</label>
                        <input type="text" name="role" class="form-control"  placeholder="Enter Your Role">
                      </div> 
                    </div>
                    <!-- /.card-body -->
    
                    <div class="card-footer">
                      <button type="submit" name="register" class="btn btn-primary">Submit</button>
                    </div>
                  </form>
                </div>
                <!-- /.card -->
              </div>
            </div>        
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