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
        <a href="index3.html" class="nav-link">Home</a>
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
    <a href="index3.html" class="brand-link">
      <img src="dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
           style="opacity: .8">
      <span class="brand-text font-weight-light">MedicationTracker</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="dist/img/user8-128x128.jpg" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="#" class="d-block">Alex Hoffman</a>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-item has-treeview menu-open">
            <a href="#" class="nav-link active">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Dashboard
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="./index.html" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Admin Dashboard</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="./index2.html" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Caregiver Dashboard</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="./index3.html" class="nav-link active">
                  <i class="far fa-check-circle nav-icon"></i>
                  <p>Doctor Dashboard</p>
                </a>
              </li>
            </ul>
          </li>
          


          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-book"></i>
              <p>
                Pages
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="DoctorDisplaysOrders.html" class="nav-link">
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
            <h1 class="m-0 text-dark">Doctor Dashboard</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Doctor Dashboard</li>
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
        <!-- Info boxes -->
        <div class="row">
          <div class="col-12 col-sm-6 col-md-3">
            <div class="info-box">
              <span class="info-box-icon bg-warning elevation-1"><i class="fas fa-cog"></i></span>

              <div class="info-box-content">
                <span class="info-box-text">Number of Pending Orders</span>
                <span class="info-box-number">
                  5
                  <small>%</small>
                </span>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
          </div>
          <!-- /.col -->



          <!-- fix for small devices only -->
          <div class="clearfix hidden-md-up"></div>

          <!-- /.col -->
          <div class="col-12 col-sm-6 col-md-3">
            <div class="info-box mb-3">
              <span class="info-box-icon bg-success elevation-1"><i class="fas fa-cog"></i></span>
              <div class="info-box-content">
                <span class="info-box-text">Number of Complete Orders</span>
                <span class="info-box-number">6
                <small>%</small>
              </span>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
          </div>
          <!-- /.col -->
        </div>

        <!-- /.row -->
        <!-- TABLE: LATEST ORDERS -->
        <div class="card card-secondary">
          <div class="card-header border-transparent">
            <h3 class="card-title"><b>Display All Orders</b></h3>
            <div class="card-tools">
              <button type="button" class="btn btn-tool" data-card-widget="collapse">
                <i class="fas fa-plus"></i>
              </button>
              <button type="button" class="btn btn-tool" data-card-widget="remove">
                <i class="fas fa-times"></i>
              </button>
            </div>
          </div>
          <!-- /.card-header -->
          <div class="card-body .col-12">
            <div class="table-responsive">
              <div class="form-group">
                <div class="card-body">
                  <div class="row">
                    <div class="col-12">
                      <table class="table table-bordered table-hover" id="tab_logic">
         <!--              
        <thead>
          <tr >
            <th class="text-center">
              Doctor ID
            </th>
            <th class="text-center">
              Patient ID
            </th>
            <th class="text-center">
              Medication
            </th>
            <th class="text-center">
              Dosage
            </th>
            <th class="text-center">
              Unit
            </th>
            <th class="text-center">
              Type
            </th>
            <th>
                    <button onclick="javascript:void(0)" id="add_row" class="btn btn-flat btn-secondary"><b>+</b>
                      <span class="fas fa-capsules"></span>
                    </button></th>
            <th>
                    <button onclick="javascript:void(0)" id="delete_row" class="btn btn-flat btn-secondary"><b>-</b>
                      <span class="fas fa-capsules"></span>
                    </button></th>
          </tr>
        </thead>
        <tbody>
          <tr id='addr0'>
            <td>
            <input type="text" name='order0'  placeholder='OrderID' id='orderID' class="form-control"/>
            <input type="text" name='ordertest0'  placeholder='value of OrderID' id='ordertest' class="form-control" disabled/>
            <script>
              var orderNum = document.getElementById("orderID").value;
              document.getElementById(ordertest).innerHTML = orderNum;
            </script>
            </td>
            <td>
            <input type="text" name='doctor0'  placeholder='Doctor ID' class="form-control"/>
            </td>
            <td>
            <input type="text" name='patient0'  placeholder='Patient ID' class="form-control"/>
            </td>
            <td>
            <input type="text" name='medication0' placeholder='MedicationID' class="form-control"/>
            </td>
            <td>
            <input type="text" name='dosage0' placeholder='Dosage' class="form-control"/>
            </td>
            <td>
            <input type="text" name='unit0' placeholder='Unit' class="form-control"/>
            </td>
            <td>
            <input type="text" name='type0' placeholder='Type' class="form-control"/>
            </td>
            <!--<td>
              <a id="add_row" class="btn btn-default float-left">Add</a>
            </td>
            <td>
              <a id='delete_row' class="pull-right btn btn-default">Remove</a>
            </td>
          -->
          </tr>
                    <tr id='addr1'></tr>
        </tbody>
      
      </table>

      <!-- /.card-header -->
      <div class="card-body p-0">
        <div class="table-responsive">
          <table class="table m-0">
            <thead>
            <tr>
              <th>Order ID</th>
              <th>Medication Instructions</th>
              <th>Status</th>
              <th>Patient Name</th>
            </tr>
            </thead>
            <tbody>
            <tr>
              <td><a href="pages/examples/invoice.html">OR9842</a></td>
              <td>Tyelnol Capsule 500mg </td>
              <td><span class="badge badge-success">Fufilled</span></td>
              <td>
                <div class="sparkbar" data-color="#00a65a" data-height="20">Saynab Abdiwahab</div>
              </td>
            </tr>
            <tr>
              <td><a href="pages/examples/invoice.html">OR1848</a></td>
              <td>OxyCodone Liquid 100ml</td>
              <td><span class="badge badge-warning">Pending</span></td>
              <td>
                <div class="sparkbar" data-color="#f39c12" data-height="20">Thomas Doolittle</div>
              </td>
            </tr>
            <tr>
              <td><a href="pages/examples/invoice.html">OR7429</a></td>
              <td>Miralax Powder 100mg</td>
              <td><span class="badge badge-success">Fufilled</span></td>
              <td>
                <div class="sparkbar" data-color="#00a65a" data-height="20">Jermaine Jones</div>
              </td>
            </tr>
            <tr>
              <td><a href="pages/examples/invoice.html">OR7429</a></td>
              <td>Zyntec Capsule 300mg</td>
              <td><span class="badge badge-warning">Pending</span></td>
              <td>
                <div class="sparkbar" data-color="#f39c12" data-height="20">Zamzam Abdi</div>
              </td>
            </tr>
            <tr>
              <td><a href="pages/examples/invoice.html">OR1848</a></td>
              <td>Mucinex Liquid 10ml</td>
              <td><span class="badge badge-warning">Pending</span></td>
              <td>
                <div class="sparkbar" data-color="#f39c12" data-height="20">Luke Weindahl</div>
              </td>
            </tr>
            <tr>
              <td><a href="pages/examples/invoice.html">OR7429</a></td>
              <td> Morphine Liquid 100ml</td>
              <td><span class="badge badge-success">Fufilled</span></td>
              <td>
                <div class="sparkbar" data-color="#00a65a" data-height="20">Habiba Ali</div>
              </td>
            </tr>
            <tr>
              <td><a href="pages/examples/invoice.html">OR9842</a></td>
              <td>Lunesta Capsule 300mg</td>
              <td><span class="badge badge-warning">Pending</span></td>
              <td>
                <div class="sparkbar" data-color="#f39c12" data-height="20">Rita Garcia</div>
              </td>
            </tr>
            </tbody>
          </table>
        </div>
        <!-- /.table-responsive -->
      </div>
      <!-- /.card-body -->
      <div class="card-footer clearfix">
        <a href="javascript:void(0)" class="btn btn-sm btn-info float-left">Place New Order</a>
        <a href="javascript:void(0)" class="btn btn-sm btn-secondary float-right">View All Orders</a>
      </div>
      <!-- /.card-footer -->
    </div>
    <!-- /.card -->
    </div>
    
    <!-- /.card -->

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



</body>
</html>