<?php
session_start();
    
if(!isset($_SESSION['username']) || $_SESSION['role'] != "doctor"){
    header("location:index.php");
}
include_once("OrderController.php");
include_once("DoctorInputsCode.php");
include_once("Model.php");

include_once("Globals.php");
 
?>
<!DOCTYPE html>
<html lang="en">
<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta http-equiv="x-ua-compatible" content="ie=edge">

  <title>MedicationTracker | Doctor Dashboard</title>

  <style>

  div.med1 {border-style: groove;}
  div.med2 {border-style: groove;}
  div.med3 {border-style: groove;}
  div.med4 {border-style: groove;}
  </style>

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
        <a href="DoctorDashboard.php" class="nav-link">Home</a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="#" class="nav-link">Log Out</a>
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
      <li class="nav-item">
        <a class="nav-link" data-widget="control-sidebar" data-slide="true" href="#"><i
            class="fas fa-th-large"></i></a>
      </li>
    </ul>
  </nav>
  <!-- /.navbar -->

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
                <a href="./DoctorAddsOrderView.php" class="nav-link active">
                  <i class="far fa-check-circle nav-icon"></i>
                  <p>Create An Order</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="./DoctorDisplaysOrdersView.php" class="nav-link ">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Display All Orders</p>
                </a>
              </li>
              
            </ul>
          </li>
          <li class="nav-item">
            <a href="pages/widgets.html" class="nav-link">
              <i class="nav-icon fas fa-th"></i>
              <p>
                Widgets
                <span class="right badge badge-danger">New</span>
              </p>
            </a>
          </li>



          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-edit"></i>
              <p>
                Forms
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="pages/forms/general.html" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>General Elements</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="pages/forms/advanced.html" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Advanced Elements</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="pages/forms/editors.html" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Editors</p>
                </a>
              </li>

            </ul>
          </li>
          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-table"></i>
              <p>
                Tables
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="pages/tables/simple.html" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Simple Tables</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="pages/tables/data.html" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>DataTables</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="pages/tables/jsgrid.html" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>jsGrid</p>
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
            <h1 class="m-0 text-dark"> Hello, Doctor! </h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Create An Order</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">

        

        <!-- /.row -->
        <!-- TABLE: LATEST ORDERS -->
        <div class="card card-secondary">
          <div class="card-header border-transparent">
            <h3 class="card-title"><b>CREATE ORDER</b></h3>
            <div class="card-tools">
              <button type="button" class="btn btn-tool" data-card-widget="collapse">
                <i class="fas fa-plus"></i>
              </button>
              <button type="button" class="btn btn-tool" data-card-widget="remove">
                <i class="fas fa-times"></i>
              </button>
            </div>
          </div>

         <!--
          
          <div class="card-body .col-2">
            <div class="table-responsive">
              <div class="form-group">
                <div class="card-body">
                  <div class="row">
                    <div class="col-2">
                      <label>Order ID</label>
                      <input type="text" class="form-control" id='orderID2' name="genOrderID" placeholder="Type Here...">
                        <script>
                        //var orderNum = document.getElementById("orderID").value;
                        //document.getElementById(ordertest).innerHTML = orderNum;
                        function genOrderNumber(numDigits) {
                          var orderNumber;
                          var n = '';
                          for(var count = 0; count < numDigits; count++) {
                            orderNumber = Math.floor(Math.random() * 10);
                            n += orderNumber.toString();
                          }
                          return n;
                          }
                          document.getElementById("orderID2").value = genOrderNumber(6);
                      </script>
                    </div>
                    <div class="col-2">
                      <label>Doctor ID</label>
                      <input type="text" class="form-control" name="doctorID"placeholder="Type your ID...">
                    </div>
                    <div class="col-2">
                      <label>Patient ID</label>
                      <input type="text" class="form-control" name="patientID" placeholder="Enter patientID...">
                    </div>
                    <div class="form-group">
                      <label for="inputDate1">Order Creation Date</label>
                      <input type="text" class="form-control" id="orderDate1" name="genOrderDate"  placeholder="" disabled>
                      <script>
                           function genOrderDate() {
                            var orderDate = new Date();;
                            return orderDate;
                       }
                  document.getElementById("orderDate1").value = genOrderDate();
            </script>
            </div>
                    
                </div>
                </div>
              </div>
            </div>
          </div>
         -->


          <!-- /.card-header 
          <div class="card-body .col-12">
            <div class="table-responsive">
              <div class="form-group">
                <div class="card-body">
                  <div class="row">
                    <div class="col-12" >
                      <table class="table table-bordered table-hover" id="tab_logic">
                     
        <thead>
          <tr >
          <th class="text-center">
              Med ID
            </th>
            <th class="text-center">
              Med Quantity 
            </th>
            <th class="text-center">
              Med Units
            </th>
            <th>
                    <button onclick="javascript:void(0)" id="add_row" class="btn btn-flat btn-secondary"><b>+ Add Med</b>
                      <span class="fas fa-capsules"></span>
                    </button></th>
          </tr>
        </thead>
        <tbody>
          <tr id='addr0'>
            <td>
            <input type="text" name='medID0'  placeholder='i.e 029202' id='medID1' class="form-control"/>
            </td>
            <td>
            <input type="text" name='medQ0'  placeholder='i.e 150' id='medQ1'class="form-control"/>
            </td>
            <td> 
		          <select class="form-control" name="medU1" id=medU1>
	              	<option value=g>grams</option>
		              <option value="mg">mg</option>
	              	<option value="mL">mL</option>
	              	<option value="tablet">tablet</option>
	          	</select>
            </td>
            <td>
              <button type = "button" id="remove_Medrow" class="remove"><b> - Remove Med </b>
                <span class="fas fa-capsules"></span>
              </button>
            </td>
          </tr>
                    <tr id='addr1'></tr>
        </tbody>
      </table>
          
          <div class="card-footer clearfix">
            <button type ="button" name="submitDocOrder" id="submitOrder" class="btn btn-sm btn-info float-right">Submit Order</button>
          </div>
          
        </div>
      
      </div>
      -->

      <!-- form start -->
      <form action="" method="post">
        <div class="card-body">
          <div class="form-group">
            <label for="inputEmail1">OrderID</label>
            <input type="text" class="form-control" id="orderID2" name="inputOrderID1"  placeholder="" >
          <script>
           var orderNumber = 400000;
              function genOrderNumber(numDigits) {
                  //var orderNumber;
                  var n = '';
                    for(var count = 0; count < numDigits; count++) {
                       orderNumber = Math.floor(Math.random() * 10);
                      n += orderNumber.toString();
                     
                    }
                  return n;
                }
                document.getElementById("orderID2").value = genOrderNumber(6);
          </script>
          </div>
          <div class="card-body">
            <div class="form-group">
              <label for="inputDate1">Order Creation Date</label>
              <input type="text" class="form-control" id="orderDate1" name="inputOrderDate1"  placeholder="" disabled>
              <script>
                  function genOrderDate() {
                    var orderDate = new Date();;
                    return orderDate;
                  }
                  document.getElementById("orderDate1").value = genOrderDate();
            </script>
            </div>
          <div class="form-group">
            <label for="inputDoctorID1">DoctorID</label>
            <input type="text" class="form-control" id = "doctorID" name="inputDoctorID1" placeholder="Enter your DoctorID">
          </div>
          <div class="form-group">
            <label for="inputPatientID1">PatientID</label>
            <input type="text" class="form-control" id = "patientID" name="inputPatientID1" placeholder="Enter the PatientID">
          </div>
         <!--
          <div class="form-group">
            <label for="inputMedicationID1">MedicationID 1</label>
            <input type="text" class="form-control" id="medID1" name="inputMedicationID1" placeholder="Enter a MedicationID">
            <label for="inputMedicationID2">MedicationID 2</label>
            <input type="text" class="form-control" id="medID2" name="inputMedicationID2" placeholder="Enter a MedicationID">
            <label for="inputMedicationID3">MedicationID 3</label>
            <input type="text" class="form-control" id="medID3" name="inputMedicationID3" placeholder="Enter a MedicationID">
            <label for="inputMedicationID4">MedicationID 4</label>
            <input type="text" class="form-control" id="medID4" name="inputMedicationID4" placeholder="Enter a MedicationID">
          </div>
          <div class="form-group">
            <label for="inputMedicationQty1">Medication 1 Quantity </label>
            <input type="text" class="form-control" id="medQty1" name="inputMedicationQty1" placeholder="Enter daily dose a patient would take for Medication">
            <label for="inputMedicationQty2">Medication 2 Quantity </label>
            <input type="text" class="form-control" id="medQty2" name="inputMedicationQty2" placeholder="Enter daily dose a patient would take for Medication">
            <label for="inputMedicationQty3">Medication 3 Quantity </label>
            <input type="text" class="form-control" id="medQty3" name="inputMedicationQty3" placeholder="Enter daily dose a patient would take for Medication">
            <label for="inputMedicationQty4">Medication 4 Quantity </label>
            <input type="text" class="form-control" id="medQty4" name="inputMedicationQty4" placeholder="Enter daily dose a patient would take for Medication">
          </div>
          -->
          
        <div class="form-group">
          <div class="med1">
            <label>Medication Name</label>
            <select class="form-control" id="med1" name= "inputMedication1">
              <option>Tylenol</option>
              <option>Insulin</option>
              <option>Albuterol</option>
              <option>Aspirin</option>
              <option>Lunesta</option>
              <option>Xanax</option>
            </select>
            <label for="inputMedicationQty1">Medication 1 Quantity </label>
            <input type="text" class="form-control" id="medQty1" name="inputMedicationQty1" placeholder="Enter daily dose a patient would take for Medication">
            <div class="form-group">
            <label>Select Unit for Medication 1</label>
            <select class="form-control" id="medUnit1" name= "inputMedicationUnit1">
              <option>g</option>
              <option>mg</option>
              <option>mL</option>
              <option>puffs</option>
            </select>
          </div>
          <div class="med2">
            <label>Medication Name</label>
            <select class="form-control" id="med2" name= "inputMedication2">
              <option>Tylenol</option>
              <option>Insulin</option>
              <option>Albuterol</option>
              <option>Aspirin</option>
              <option>Lunesta</option>
              <option>Xanax</option>
            </select>
            <label for="inputMedicationQty1">Medication 2 Quantity </label>
            <input type="text" class="form-control" id="medQty2" name="inputMedicationQty2" placeholder="Enter daily dose a patient would take for Medication">
            <label>Select Unit for Medication 2</label>
            <select class="form-control" id="medUnit2" name= "inputMedicationUnit2">
              <option>g</option>
              <option>mg</option>
              <option>mL</option>
              <option>puffs</option>
            </select>
          </div>

          <div class="med3">
            <label>Medication Name</label>
            <select class="form-control" id="med3" name= "inputMedication3">
              <option>Tylenol</option>
              <option>Insulin</option>
              <option>Albuterol</option>
              <option>Aspirin</option>
              <option>Lunesta</option>
              <option>Xanax</option>
            </select>
            <label for="inputMedicationQty3">Medication 3 Quantity </label>
            <input type="text" class="form-control" id="medQty3" name="inputMedicationQty3" placeholder="Enter daily dose a patient would take for Medication">
            <label>Select Unit for Medication 3</label>
            <select class="form-control" id="medUnit3" name= "inputMedicationUnit3">
              <option>g</option>
              <option>mg</option>
              <option>mL</option>
              <option>puffs</option>
            </select>
          </div>

          <div class="med4">
            <label>Medication Name</label>
            <select class="form-control" id="med4" name= "inputMedication4">
              <option>Tylenol</option>
              <option>Insulin</option>
              <option>Albuterol</option>
              <option>Aspirin</option>
              <option>Lunesta</option>
              <option>Xanax</option>
            </select>
            <label for="inputMedicationQty1">Medication 4 Quantity </label>
            <input type="text" class="form-control" id="medQty4" name="inputMedicationQty4" placeholder="Enter daily dose a patient would take for Medication">
            <label>Select Unit for Medication 4</label>
            <select class="form-control" id="medUnit4" name= "inputMedicationUnit4">
              <option>g</option>
              <option>mg</option>
              <option>mL</option>
              <option>puffs</option>
            </select>
          </div>
        </div>
       
        <!-- /.card-body -->
        <div class="card-footer">
          <button type="submit" name="submitOrder1"  class="btn btn-primary">Submit Order</button>
        </div>
      </form>
    </div>

    
    
    
<!-- Old Code 
                      <label>Doctor ID</label>
                      <input type="text" class="form-control" placeholder="Type Here...">
                    </div>
                    <div class="col-2">
                      <label>Patient ID</label>
                      <input type="text" class="form-control" placeholder="Type Here...">
                    </div>
                    <div class="col-2">
                      <label>Medication</label>
                      <input type="text" class="form-control" placeholder="Type Here...">
                    </div>
                    <div class="col-2">
                      <label>Dosage</label>
                      <input type="text" class="form-control" placeholder="Type Here...">
                    </div>
                    <div class="col-1">
                      <div class="form-group">
                        <label>Unit</label>
                        <select class="form-control select2" style="width: 100%;">
                          <option selected="selected">g</option>
                          <option>mg</option>
                          <option>mcg</option>
                          <option>units</option>
                        </select>
                      </div>
                    </div>
                    <div class="col-2">
                      <div class="form-group">
                        <label>Status</label>
                        <select class="form-control select2" style="width: 100%;">
                          <option selected="selected">Unfulfilled</option>
                          <option>Fulfilled</option>
                        </select>
                      </div>
                    </div>
                    <div class="col-1">
                      <label>Add More?</label>
                    <button onclick="javascript:void(0)" class="btn btn-flat btn-secondary"><b>Add </b>
                      <span class="fas fa-capsules"></span>
                    </button>
                  </div>
                </div>
                </div>
              </div>
            </div>
                -->
            <!-- /.table-responsive -->
          </div>
          </div>
          </div>
          </div>
          </div>
          </div>
          <!-- /.card-body -->
          <!-- Old code
          <div class="card-footer clearfix">
            <a href="javascript:void(0)" class="btn btn-sm btn-info float-right">Submit Order</a>
          </div>
                -->
          <!-- /.card-footer -->
        </div>
        <!-- /.card -->
      </div>
      <!-- /.col -->
      <!-- /.card -->

            <!-- TABLE: LATEST ORDERS -->
              <div class="col">
                <div class="card card-secondary collapsed-card">
                  <div class="card-header">
                    <h3 class="card-title"><b>PATIENT LIST</b></h3>

                <div class="card-tools">
                  <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-plus"></i>
                  </button>
                  </button>
                  <button type="button" class="btn btn-tool" data-card-widget="remove">
                    <i class="fas fa-times"></i>
                  </button>
              </div>
            </div>
              <!-- /.card-header -->
              <div class="row">
                <div class="col-12">
                  <div class="card">
                    <div class="card-header">
                      <div class="card-tools">
                        <div class="input-group input-group-sm" style="width: 150px;">
                          <input type="text" name="table_search" class="form-control float-right" placeholder="Search">

                          <div class="input-group-append">
                            <button type="submit" class="btn btn-default"><i class="fas fa-search"></i></button>
                          </div>
                        </div>
                      </div>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body table-responsive p-0">
                      <table class="table table-hover text-nowrap">
                        <thead>
                          <tr>
                            <th>Patient ID</th>
                            <th>First Name</th>
                            <th>Last Name</th>
                            <th>Age</th>
                          </tr>
                        </thead>
                        <tbody>
                          <tr>
                            <td><a href="pages/examples/profile.html">7000</a></td>
                            <td>Nimco</td>
                            <td>Hussein</td>
                            <td>21</span></td>
                          </tr>
                          <tr>
                            <td><a href="pages/examples/profile.html">7001</a></td>
                            <td>Ryan</td>
                            <td>Bradley</td>
                            <td>25</td>
                          </tr>
                          <tr>
                            <td><a href="pages/examples/profile.html">7002</a></td>
                            <td>Fahim</td>
                            <td>Murshed</td>
                            <td>22</td>
                          </tr>
                          <tr>
                            <td><a href="pages/examples/profile.html">7003</a></td>
                            <td>Isse</td>
                            <td>Nur</td>
                            <td>23</td>
                          </tr>
                          <tr>
                            <td><a href="pages/examples/profile.html">7004</a></td>
                            <td>Robel</td>
                            <td>Abuhay</td>
                            <td>24</td>
                          </tr>
                          <tr>
                            <td><a href="pages/examples/profile.html">7005</a></td>
                            <td>Alex</td>
                            <td>Vasquez</td>
                            <td>29</td>
                          </tr>
                          <tr>
                            <td><a href="pages/examples/profile.html">7006</a></td>
                            <td>Ismail</td>
                            <td>Bile-Hassan</td>
                            <td>30</td>
                          </tr>
                        </tbody>
                      </table>
                    </div>
                    <!-- /.card-body -->
                  </div>
                  <!-- /.card -->
                </div>
              </div>
                <div class="card-footer clearfix">
                  <a href="javascript:void(0)" class="btn btn-sm btn-info float-right">View All Patients</a>
                </div>
                <!-- /.table-responsive -->
              </div>
              <!-- /.card-body -->
              <!-- /.card-footer -->
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->
      </div><!--/. container-fluid -->
    </section>
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

<!-- REQUIRED SCRIPTS -->
<!-- jQuery -->
<script src="plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap -->
<script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- overlayScrollbars -->
<script src="plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
<!-- AdminLTE App -->
<script src="dist/js/adminlte.js"></script>

<!-- OPTIONAL SCRIPTS -->
<script src="dist/js/demo.js"></script>

<!-- PAGE PLUGINS -->
<!-- jQuery Mapael -->
<script src="plugins/jquery-mousewheel/jquery.mousewheel.js"></script>
<script src="plugins/raphael/raphael.min.js"></script>
<script src="plugins/jquery-mapael/jquery.mapael.min.js"></script>
<script src="plugins/jquery-mapael/maps/usa_states.min.js"></script>
<!-- ChartJS -->
<script src="plugins/chart.js/Chart.min.js"></script>

<!-- PAGE SCRIPTS -->
<script src="dist/js/pages/dashboard2.js"></script>
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
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>
<!--
<script>
  var html = '<tr id="addr0"><td> <input type="text" name="medID0"  placeholder="i.e 029202" id="medID1" class="form-control"/></td>';
    html += '<td> <input type="text" name="medQ0"  placeholder="i.e 150" id="medQ1" class="form-control"/></td>';
    html += '<td> <select class="form-control" name="medU1"> <option value=g>grams</option> <option value="mg">mg</option><option value="mL">mL</option><option value="tablet">tablet</option></select></td>';
    html +='<td><button type = "button" id="remove_Medrow" class="remove"><b> - Remove Med </b><span class="fas fa-capsules"></span>';
    html += '</button></td></tr>';
    $(function(){
    $('tbody').sortable();
    //Adds row in Meds table when doctor clicks button
    $('#add_row').click(function(){
      $('tbody').append(html);
    });
    //Removes the selected row in the Meds table when doctor clicks button
    $(document).on('click', '.remove', function() {
    $(this).parents('tr').remove(); //remove the row
        });
//Get the values of each MedID, MedQ and the Med units selected
 $('#submitOrder').click(function(){
      var medIDrow= [];
      var medQtyrow = [];
      var medUnitrow = [];
      
      //Get each of the Med columns data
      $('input[name="medID0"]').each(function(index, value){
        medIDrow.push($(value).val());
        
        });
      $('input[name="medQ0"]').each(function(index, value){
        medQtyrow.push($(value).val());
        });
      $('select option:selected').each(function(index, value){
        medUnitrow.push($(value).val());
        });
      medIDrow.pop();
      medQtyrow.pop();
      medUnitrow.pop(); //remove the inital g unit  
      medUnitrow.pop(); //remove the last g
   
     
      //alert("MedIDs are: " + medIDrow); //print MedIDs
      //alert("MedQuantities are: " + medQtyrow);
      //alert("MedUnits  are: " + medUnitrow);
      
      $.ajax({
            url: "includes/DoctorInputsCode.php",
            type: "POST",
            data: {medIDarray : JSON.stringify(medIDrow), medQarray : JSON.stringify(medQtyrow), medUnitarray : JSON.stringify(medUnitrow)},
            success : function(data){
                  alert("Success: ");
                }
            }
        });
    });
});
</script>
-->
</body>
</html>