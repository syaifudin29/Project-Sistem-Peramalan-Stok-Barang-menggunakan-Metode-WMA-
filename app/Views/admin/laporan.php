<?= $this->extend('admin/template');
	$this->section('content_admin');
?>
<div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Laporan Transaksi</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Laporan transkasi</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
     <div class="container-fluid">
     	<!-- isi konten -->
	     <form method="post" action="/report">
		  <div class="col-md-12"	>
		  	<div class="card card-info" style="margin: 0 auto; width: 50rem;">
		          <div class="card-header">
		            <h3 class="card-title">Laporan data barang masuk dan keluar</h3>
		          </div>
		          <!-- /.card-header -->
		          <!-- form start -->
		            <div class="card-body">
		              <div class="form-group">
		                <label>Laporan Transaksi :</label>
                      	<div class="custom-control custom-radio">
                          <input class="custom-control-input custom-control-input-danger" type="radio" id="customRadio1" name="barang" value="1" >
                          <label for="customRadio1" class="custom-control-label">Barang Masuk</label>
                        </div>
                         	<div class="custom-control custom-radio">
                          <input class="custom-control-input custom-control-input-danger" type="radio" id="customRadio2" name="barang" value="2" >
                          <label for="customRadio2" class="custom-control-label">Barang keluar</label>
                        </div>
		              </div>
		              <div class="form-group">
	                 	<label>Periode :</label>
	                 	<div class="row">
	                 	<div class="col-6">
	                 		<p class="text-center">Dari</p>
	                 		<input type="date" class="form-control" name="awal"> 
	                 	</div>
	                 	
	                 	<div class="col-6">
	                 		<p class="text-center">Sampai</p>
	                 		<input type="date" class="form-control" name="akhir"> 
	                 	</div>
	                  </div>
		            </div>
		            <!-- /.card-body -->

		            <div class="card-footer text-center">
		              <button type="submit" class="btn btn-info">Cetak Laporan</button>
		            </div>

		        </div>
		    </div>
		 </form>
     </div>
 </section>
      
<?php $this->endSection(); ?>