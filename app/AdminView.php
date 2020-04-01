<?php
include_once("Controller.php");
include_once("Model.php");


global $model;
$model = new Model("AdminView" , -1);
$currentV = $model->getCurrentView();


if($currentV == 'AdminView'){
  //do nothing
}else{
  header("Location: index.php");
}

$controller = new Controller();
$conn = new mysqli($servername, $username, $password, $dbname);
?>

<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>AdminView</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- Font Awesome -->
  <link rel="stylesheet" href="../../plugins/fontawesome-free/css/all.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- DataTables -->
  <link rel="stylesheet" href="../../plugins/datatables-bs4/css/dataTables.bootstrap4.css">
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
  
    </ul>
  </nav>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="../../DoctorDashboard.php" class="brand-link">
      <img src="../../dist/img/AdminLTELogo.png"
           alt="AdminLTE Logo"
           class="brand-image img-circle elevation-3"
           style="opacity: .8">
      <span class="brand-text font-weight-light">Admin Dashboard</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">

       
        <div class="info">
          <a href="#" class="d-block">CURRENT SESSION: Admin</a>

        </div>
      </div>

<!-- Sidebar Menu -->
    <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">     
            <li class="nav-item has-treeview menu-open">
                <a href="#" class="nav-link active">
                    <i class="nav-icon fas fa-tachometer-alt"></i>
                    <p>
                        Logout
                        <i class="right fas fa-angle-left"></i>
                    </p>
                </a>
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
          <div class="col-sm-6">
            <h1>Active Users</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a   href="?link=1" name="link1">Logout</a></li>
              <?php
                if(isset($_GET['link'])){
                    $link=$_GET['link'];
                    if ($link == '1'){
                        $controller = new Controller();
                        $controller->changeView("HomeView");
                        
                    }
                }
              ?>  
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-12">
          <div class="card">
           
            <!-- /.card-header -->
            <div class="card-body">
              <table id="example2" class="table table-bordered table-hover">
                <thead>
                <tr>
                  <th>UserName</th>
                  <th>Role</th>
                  <th>ID#</th>
                  <th>Action</th>
                </tr>
                </thead>
               <?php
					   
						global $conn;
					
						if ($conn->connect_error) {
							die("Connection failed: " . $conn->connect_error);
						}
						
						$sql = "SELECT * FROM user Where active = 1";
						$result = $conn->query($sql);
						echo "<id='example2'>";
						echo "<tbody>";
						if ($result->num_rows > 0) {
							while($row = $result->fetch_assoc()) {
								echo "<tr>";
									echo "<td>" . $row['username'] . "</td>";
							
                  if(!($row['doctor_id'] == NULL)){
                    echo "<td> Doctor</td>";
                    echo "<td>" . $row['doctor_id'] . "</td>";
                    echo"<td>";
                      echo "<a href ='code.php?delete_doctor=".  $row['username'] ."'><button class='btn btn-danger'>Deactivate</button>"."<a/>";
                    echo "</td>"; 
                  }else if(!($row['patient_id'] == NULL)){
                    echo "<td>Patient</td>";
                    echo "<td>" . $row['patient_id'] . "</td>";
                    echo"<td>";
                      echo "<a href ='code.php?delete_patient=". $row['username']."'><button class='btn btn-danger'>Deactivate</button>"."<a/>";
                    echo "</td>"; 
                  }else{
                    echo "<td> Caregiver</td>";
                    echo "<td>" . $row['care_giver_id'] . "</td>";
                    echo"<td>";
                      echo "<a href ='code.php?delete_care_giver=".  $row['username'] ."'><button class='btn btn-danger'>Deactivate</button>"."<a/>";
                    echo "</td>"; 
                  }
                  
								echo "</tr>";
							}
							echo "</tbody>";
							echo "</table>";
						} else {
							echo "</tbody>";
							echo "</table>";
							echo "<h4>USER DATABASE EMPTY</h4>";
						}
						
					?>
            </div>
            <!-- /.card-body -->
            <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Inactive Users</h1>
          </div>
          <div class="col-sm-6">
         
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-12">
          <div class="card">
           
            <!-- /.card-header -->
            <div class="card-body">
              <table id="example2" class="table table-bordered table-hover">
                <thead>
                <tr>
                  <th>UserName</th>
                  <th>Role</th>
                  <th>ID#</th>
                  <th>Action</th>
                </tr>
                </thead>
               <?php
					   
					global $conn;
					
						if ($conn->connect_error) {
							die("Connection failed: " . $conn->connect_error);
						}
						
						$sql = "SELECT * FROM user Where active = 0";
						$result = $conn->query($sql);
						echo "<id='example2'>";
						echo "<tbody>";
						if ($result->num_rows > 0) {
							while($row = $result->fetch_assoc()) {
								echo "<tr>";
									echo "<td>" . $row['username'] . "</td>";
								
                  if(!($row['doctor_id'] == NULL)){
                    echo "<td> Doctor</td>";
                    echo "<td>" . $row['doctor_id'] . "</td>";
                    echo"<td>";
                      echo "<a href ='code.php?activate_doctor=".  $row['username'] ."'><button class='btn btn-success'>Activate</button>"."<a/>";
                    echo "</td>"; 
                  }else if(!($row['patient_id'] == NULL)){
                    echo "<td>Patient</td>";
                    echo "<td>" . $row['patient_id'] . "</td>";
                    echo"<td>";
                      echo "<a href ='code.php?activate_patient=". $row['username']."'><button class='btn btn-success'>Activate</button>"."<a/>";
                    echo "</td>"; 
                  }else{
                    echo "<td> Caregiver</td>";
                    echo "<td>" . $row['care_giver_id'] . "</td>";
                    echo"<td>";
                      echo "<a href ='code.php?activate_care_giver=".  $row['username'] ."'><button class='btn btn-success'>Activate</button>"."<a/>";
                    echo "</td>"; 
                  }
                  
								echo "</tr>";
							}
							echo "</tbody>";
							echo "</table>";
						} else {
							echo "</tbody>";
							echo "</table>";
							echo "<h4>USER DATABASE EMPTY</h4>";
						}
						$conn->close();
					?>
            </div>
            <!-- /.card-body -->
          </div>
          <!-- /.card -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  <footer class="main-footer">
    <div class="float-right d-none d-sm-block">
      <b>Version</b> 3.0.0
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
<!-- DataTables -->
<script src="../../plugins/datatables/jquery.dataTables.js"></script>
<script src="../../plugins/datatables-bs4/js/dataTables.bootstrap4.js"></script>
<!-- AdminLTE App -->
<script src="../../dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="../../dist/js/demo.js"></script>
<!-- page script -->
<script>
  $(function () {
    $("#example1").DataTable();
    $('#example2').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": false,
      "ordering": true,
      "info": true,
      "autoWidth": false,
    });
  });
</script>
</body>
</html>
<?php
/*
                    <span class="input-group-append">
                      <input type="text" name="message" placeholder="ENTER YOUR ID#" class="form-control">
                      <button type="button" class="btn btn-primary">ENTER</button>
                    </span>
                  <div class="chart tab-pane active" id="revenue-chart"
                       style="position: relative; height: 300px;">
                      <canvas id="revenue-chart-canvas" height="300" style="height: 300px;"></canvas>                         
                   </div>
                 
*/
?>