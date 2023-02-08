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
  <link rel="stylesheet" href="<?php echo base_url('/plugins/fontawesome-free/css/all.min.css'); ?>">
  <!-- icheck bootstrap -->
  <link rel="stylesheet" href="<?php echo base_url('/plugins/icheck-bootstrap/icheck-bootstrap.min.css'); ?>">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?php echo base_url('/dist/css/adminlte.min.css'); ?>">

    <link rel="stylesheet" href=" <?php echo base_url('plugins/toastr/toastr.min.css'); ?>">
</head>
<body class="hold-transition login-page">
<div class="login-box">
  <!-- /.login-logo -->
  <div class="card card-outline card-dark">
    <div class="card-header text-center">
      <img src="<?php echo base_url('dist/img/logo.jpeg'); ?>" alt="AdminLTE Logo" class="brand-image" style="opacity: .8">
    </div>
    <div class="card-body">
      <p class="login-box-msg">Peramalan Stok</p>

      <form action="/proses" method="post">
        <div class="input-group mb-3">
          <input type="text" class="form-control" placeholder="Username" name="username" required>
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-user"></span>
            </div>
          </div>
        </div>
        <div class="input-group mb-3">
          <input type="password" class="form-control" name="password" placeholder="Password" required>
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>
        </div>
        <div class="row">
          
          <!-- /.col -->
          <div class="col-4">
            <button type="submit" class="btn btn-primary btn-block">Sign In</button>
          </div>
          <!-- /.col -->
        </div>
      </form>
      <!-- /.social-auth-links -->
    </div>
    <!-- /.card-body -->
  </div>
  <!-- /.card -->
</div>
<!-- /.login-box -->
<!-- jQuery -->
<script src=" <?php echo base_url('plugins/jquery/jquery.min.js') ?>"></script>
<!-- jQuery UI 1.11.4 -->
<script src=" <?php echo base_url('plugins/jquery-ui/jquery-ui.min.js') ?>"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>
<script src=" <?php echo base_url('plugins/toastr/toastr.min.js') ?>"></script>
<script>
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
