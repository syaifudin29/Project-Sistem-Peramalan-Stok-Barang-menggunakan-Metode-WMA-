<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>KAYULAMA</title>
  <link  href="dist/img/logo.jpeg" rel="shortcut icon">
  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href=" <?php echo base_url('plugins/fontawesome-free/css/all.min.css'); ?>">
  <!-- Ionicons -->
<!--   <link rel="stylesheet" href=" <?php echo base_url('https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css'); ?>"> -->
  <!-- Tempusdominus Bootstrap 4 -->
  <link rel="stylesheet" href=" <?php echo base_url('plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css'); ?>">
  <!-- iCheck -->
  <link rel="stylesheet" href=" <?php echo base_url('plugins/icheck-bootstrap/icheck-bootstrap.min.css'); ?>">
  <!-- JQVMap -->
  <link rel="stylesheet" href=" <?php echo base_url('plugins/jqvmap/jqvmap.min.css'); ?>">
  <!-- Theme style -->
  <link rel="stylesheet" href=" <?php echo base_url('dist/css/adminlte.min.css'); ?>">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href=" <?php echo base_url('plugins/overlayScrollbars/css/OverlayScrollbars.min.css'); ?>">
  <!-- Daterange picker -->
  <link rel="stylesheet" href=" <?php echo base_url('plugins/daterangepicker/daterangepicker.css'); ?>">
  <!-- summernote -->
  <link rel="stylesheet" href=" <?php echo base_url('plugins/summernote/summernote-bs4.min.css'); ?>">

  <link rel="stylesheet" href=" <?php echo base_url('plugins/toastr/toastr.min.css'); ?>">

  <link rel="stylesheet" href=" <?php echo base_url('plugins/datatables-bs4/css/dataTables.bootstrap4.min.css'); ?>">
  <link rel="stylesheet" href=" <?php echo base_url('plugins/datatables-responsive/css/responsive.bootstrap4.min.css'); ?>">
  <link rel="stylesheet" href=" <?php echo base_url('plugins/datatables-buttons/css/buttons.bootstrap4.min.css'); ?>">

  <?= $this->renderSection('css_admin') ?>

<style type="text/css">
  .dataTables_filter {
    position: relative;
    float: right;
  }
</style>
</head>
<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">

  <!-- Preloader -->
<!--   <div class="preloader flex-column justify-content-center align-items-center">
    <img class="animation__shake" src="dist/img/AdminLTELogo.png" alt="AdminLTELogo" height="60" width="60">
  </div> -->

  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
    </ul>

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
      <li class="nav-item">
        <a class="nav-link" href="/logout" role="button">
          <i class="fas fa-sign-out-alt"></i>
        </a>
      </li>
    </ul>
  </nav>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="index3.html" class="brand-link">
      <img src="<?php echo base_url('dist/img/logo.jpeg'); ?>" alt="AdminLTE Logo" class="brand-image" style="opacity: .8">
      <span class="brand-text font-weight-light">KAYULAMA</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img style="object-fit: cover;" src="<?php echo base_url('dist/img/photo/'.session()->get('gambar')); ?>" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="#" class="d-block"><?php echo session()->get('nama'); ?></a>
        </div>
      </div>
      <?php if (session()->get('role') == 1) { ?>
      <!-- Sidebar Menu -->
      <nav class="mt-2">

        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-header">Dashboard</li>
          <li class="nav-item">
            <a href="/dashboard" class="nav-link <?php echo $menu == 'dashboard' ? 'active' : ''; ?>">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Dashboard
              </p>
            </a>
          </li>
          <li class="nav-header">Master Data</li>
          <li class="nav-item">
            <a href="/suplier" class="nav-link <?php echo $menu == 'suplier' ? 'active' : ''; ?>">
              <i class="nav-icon fas fa-solid fa-users"></i>
              <p>
                Supplier
              </p>
            </a>
          </li>
          <li class="nav-item <?php echo $menu == 'satuan' || $menu == 'jenis' || $menu == 'gudang' || $menu == 'inventory' ? 'menu-open' : ''; ?>">
            <a href="#" class="nav-link <?php echo $menu == 'satuan' || $menu == 'jenis' || $menu == 'gudang' || $menu == 'inventory' ? 'active' : ''; ?>">
              <i class="nav-icon fas fa-solid fa-database"></i>
              <p>
                Master Data
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                 <a href="/satuan" class="nav-link <?php echo $menu == 'satuan' ? 'active' : ''; ?>">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Satuan</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="/jenis" class="nav-link <?php echo $menu == 'jenis' ? 'active' : ''; ?>">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Jenis</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="/inventory" class="nav-link <?php echo $menu == 'inventory' ? 'active' : ''; ?>">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Inventory</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-header">Transaksi</li>
          <li class="nav-item">
            <a href="/barangmasuk" class="nav-link <?php echo $menu == 'brgmsk' ? 'active' : ''; ?>">
              <i class="nav-icon fas fa-sort-amount-down-alt"></i>
              <p>
                Barang Masuk
              </p>
            </a>
          </li>
           <li class="nav-item">
            <a href="/barangkeluar" class="nav-link <?php echo $menu == 'brgklr' ? 'active' : ''; ?>">
              <i class="nav-icon fas fa-sort-amount-up-alt"></i>
              <p>
                Barang Keluar
              </p>
            </a>
          </li> 
          <li class="nav-header">Laporan</li>
          <li class="nav-item">
            <a href="/laporan" class="nav-link <?php echo $menu == 'laporan' ? 'active' : ''; ?>">
              <i class="nav-icon fas fa-file-invoice"></i>
              <p>
                laporan
              </p>
            </a>
          </li>
          <li class="nav-header">Prediksi</li>
          <li class="nav-item">
            <a href="/prediksi" class="nav-link <?php echo $menu == 'prediksi' ? 'active' : ''; ?>">
              <i class="nav-icon fas fa-file"></i>
              <p>
                Hasil Prediksi
              </p>
            </a>
          </li>
          <li class="nav-header">Setting</li>
          <li class="nav-item">
            <a href="/usermanagement" class="nav-link <?php echo $menu == 'user' ? 'active' : ''; ?>">
              <i class="nav-icon fas fa-user-cog"></i>
              <p>
                User Management
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="/profile" class="nav-link <?php echo $menu == 'profile' ? 'active' : ''; ?>">
              <i class="nav-icon fas fa-user"></i>
              <p>
                Profile
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="/logout" class="nav-link">
              <i class="nav-icon fas fa-sign-out-alt"></i>
              <p>
                Keluar
              </p>
            </a>
          </li>
        </ul>
      </nav>
    <?php }else{ ?>
      <nav class="mt-2">

        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-header">Dashboard</li>
          <li class="nav-item">
            <a href="/dashboard" class="nav-link <?php echo $menu == 'dashboard' ? 'active' : ''; ?>">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Dashboard
              </p>
            </a>
          </li>
          <li class="nav-item <?php echo $menu == 'satuan' || $menu == 'jenis' || $menu == 'gudang' || $menu == 'inventory' ? 'menu-open' : ''; ?>">
            <a href="#" class="nav-link <?php echo $menu == 'satuan' || $menu == 'jenis' || $menu == 'gudang' || $menu == 'inventory' ? 'active' : ''; ?>">
              <i class="nav-icon fas fa-solid fa-database"></i>
              <p>
                Master Data
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="/inventory" class="nav-link <?php echo $menu == 'inventory' ? 'active' : ''; ?>">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Inventory</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-header">Transaksi</li>
           <li class="nav-item">
            <a href="/barangkeluar" class="nav-link <?php echo $menu == 'brgklr' ? 'active' : ''; ?>">
              <i class="nav-icon fas fa-sort-amount-up-alt"></i>
              <p>
                Barang Keluar
              </p>
            </a>
          </li> 
          <li class="nav-header">Setting</li>
          <li class="nav-item">
            <a href="/profile" class="nav-link <?php echo $menu == 'profile' ? 'active' : ''; ?>">
              <i class="nav-icon fas fa-user"></i>
              <p>
                Profile
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="/logout" class="nav-link">
              <i class="nav-icon fas fa-sign-out-alt"></i>
              <p>
                Keluar
              </p>
            </a>
          </li>
        </ul>
      </nav>
    <?php } ?>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
     <?= $this->renderSection('content_admin') ?>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  <footer class="main-footer">
    <strong>Copyright &copy; 20121-2022 <a href="">KAYULAMA</a>.</strong>
    All rights reserved.
    <div class="float-right d-none d-sm-inline-block">
      <b>Version</b> 1.0.0
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
<script src=" <?php echo base_url('plugins/jquery/jquery.min.js') ?>"></script>
<!-- jQuery UI 1.11.4 -->
<script src=" <?php echo base_url('plugins/jquery-ui/jquery-ui.min.js') ?>"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
  $.widget.bridge('uibutton', $.ui.button)
</script>
<!-- Bootstrap 4 -->
<script src=" <?php echo base_url('plugins/bootstrap/js/bootstrap.bundle.min.js') ?>"></script>
<!-- ChartJS -->
<script src=" <?php echo base_url('plugins/chart.js/Chart.min.js') ?>"></script>
<!-- Sparkline -->
<script src=" <?php echo base_url('plugins/sparklines/sparkline.js') ?>"></script>
<!-- JQVMap -->
<!-- <script src=" <?php echo base_url('plugins/jqvmap/jquery.vmap.min.js') ?>"></script>
<script src=" <?php echo base_url('plugins/jqvmap/maps/jquery.vmap.usa.js') ?>"></script> -->
<!-- jQuery Knob Chart -->
<script src=" <?php echo base_url('plugins/jquery-knob/jquery.knob.min.js') ?>"></script>
<!-- daterangepicker -->
<script src=" <?php echo base_url('plugins/moment/moment.min.js') ?>"></script>
<script src=" <?php echo base_url('plugins/daterangepicker/daterangepicker.js') ?>"></script>
<!-- Tempusdominus Bootstrap 4 -->
<script src=" <?php echo base_url('plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js') ?>"></script>
<!-- Summernote -->
<script src=" <?php echo base_url('plugins/summernote/summernote-bs4.min.js') ?>"></script>
<!-- overlayScrollbars -->
<script src=" <?php echo base_url('plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js') ?>"></script>
<!-- AdminLTE App -->
<script src=" <?php echo base_url('dist/js/adminlte.js') ?>"></script>
<!-- AdminLTE for demo purposes -->
<!-- <script src=" dist/js/demo.js"></script> -->
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<!-- <script src=" <?php echo base_url('dist/js/pages/dashboard.js') ?>"></script> -->
<script src=" <?php echo base_url('plugins/jszip/jszip.min.js') ?>"></script>
<script src=" <?php echo base_url('plugins/pdfmake/pdfmake.min.js') ?>"></script>
<script src=" <?php echo base_url('plugins/pdfmake/vfs_fonts.js') ?>"></script>
<!-- <script src=" <?php echo base_url('plugins/datatables-buttons/js/buttons.html5.min.js') ?>"></script> -->
<script src=" <?php echo base_url('plugins/datatables/jquery.dataTables.min.js') ?>"></script>
<script src=" <?php echo base_url('plugins/datatables-bs4/js/dataTables.bootstrap4.min.js') ?>"></script>
<script src=" <?php echo base_url('plugins/datatables-responsive/js/dataTables.responsive.min.js') ?>"></script>
<script src=" <?php echo base_url('plugins/datatables-responsive/js/responsive.bootstrap4.min.js') ?>"></script>
<script src=" <?php echo base_url('plugins/datatables-buttons/js/dataTables.buttons.min.js') ?>"></script>
<script src=" <?php echo base_url('plugins/datatables-buttons/js/buttons.bootstrap4.min.js') ?>"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>
<script src=" <?php echo base_url('plugins/toastr/toastr.min.js') ?>"></script>
 <?= $this->renderSection('js_admin') ?>
<script>
  $(function () {
    $("#example1").DataTable({
      "responsive": true, "lengthChange": false, "autoWidth": false
    }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
  });

  <?php 
  if (isset($_SESSION['msg']) == 1) {
    if ($_SESSION['msg'] == 1) {
        echo "toastr.success('".$_SESSION['psn'].".')";
    }else{
      echo "toastr.error('".$_SESSION['psn']."')";
    }
  }
  ?>
</script>
</body>
</html>
