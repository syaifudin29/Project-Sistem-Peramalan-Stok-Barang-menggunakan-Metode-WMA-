<?= $this->extend('admin/template');
	$this->section('content_admin');
?>
<div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Prediksi Barang</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Prediksi</li>
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
		  <div class="col-md-12"	>
		  	<div class="card card-info" style="margin: 0 auto; width: 50rem;">
		          <div class="card-header">
		            <h3 class="card-title">Prediksi Metode WMA</h3>
		          </div>
		          <!-- /.card-header -->
		          <!-- form start -->
		          <form action="/prosesprediksi" method="post">
		            <div class="card-body">
		              	<div class="form-group">
		                  <label>Nama Barang</label>
		                  <select class="select2" name="barang" style="width: 100%; height: 100px;" required>
		                    <?php foreach ($barang as $bar): ?>
		                       <option value="<?php echo $bar['id_barang']; ?>"><?php echo $bar['id_barang']." | ".$bar['nm_barang']; ?></option>
		                    <?php endforeach ?>
		                  </select>
		                </div>
		                <div class="form-group">
		                  <label>Bulan</label>
		                   <select class="select2" name="bulan" style="width: 100%; height: 100px;" required>
		                   	<option value="1">Januari</option>
		                   	<option value="2">Februari</option>
		                   	<option value="3">Maret</option>
		                   	<option value="4">April</option>
		                   	<option value="5">Mei</option>
		                   	<option value="6">Juni</option>
		                   	<option value="7">Juli</option>
		                   	<option value="8">Agustus</option>
		                   	<option value="9">September</option>
		                   	<option value="10">Oktober</option>
		                   	<option value="11">November</option>
		                   	<option value="12">Desember</option>
		                   </select>
		                </div>
		                <div class="form-group">
		                  <label>Tahun</label>
		                 	<select class="select2" name="tahun" style="width: 100%; height: 100px;" required>
		                   	<option value="2022">2022</option>
		                   	<option value="2023">2023</option>
		                   	<option value="2024">2024</option>
		                   </select>
		                </div>
		            <!-- /.card-body -->

		            <div class="card-footer text-center">
		              <button type="submit" class="btn btn-info">Proses</button>
		            </div>
		        </div>
		        </form>
		    </div>

		 <div class="col-md-12" style="margin-top: 20px;">
		  	<div class="card card-info" style="margin: 0 auto; width: 50rem;">
	          <div class="card-header">
	            <h3 class="card-title">Hasil Prediksi</h3>
	          </div>
	          <!-- /.card-header -->
	          <!-- form start -->
	            <div class="card-body">
	            <table id="example1" class="table table-bordered table-striped">
	                <thead>
	                  <tr>
	                    <th>ID</th>
	                    <th>Nama</th>
	                    <th>Bulan</th>
	                    <th>Hasil</th>
	                    <th class="text-center">Action</th>
	                  </tr>
	                  </thead>
	                  <tbody>
	                  	<?php foreach ($hasil as $key) { ?>
	                   <tr>
	                   	<td><?php echo $key['id_barang'] ?></td>
	                   	<td><?php echo $key['nm_barang'] ?></td>
	                   	<td><?php echo date('M Y', strtotime($key['bulan'])); ?></td>
	                   	<td><?php echo $key['hasil'] ?></td>
	                   	<td class="text-center"><a href="deleteprediksi/<?php echo $key['id']; ?>" class="btn btn-danger"><i class="fas fa-trash"></i></a></td>
	                   </tr>
	                   <?php } ?>
	                </tbody>
	            </table>
	            </div>
	        </div>
	    </div>
     </div>
 </section>
      
<?php $this->endSection(); 

$this->section('css_admin'); ?>

   <link rel="stylesheet" href=" <?php echo base_url('plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css'); ?>">
   <link rel="stylesheet" href=" <?php echo base_url('plugins/select2/css/select2.min.css'); ?>">
   <style type="text/css">
    .select2-container--default .select2-selection--single{
      height: 100%;
    }
   </style>

<?php $this->endSection(); 

$this->section('js_admin'); ?>

   <script src=" <?php echo base_url('plugins/select2/js/select2.full.min.js') ?>"></script>
   <script type="text/javascript">
     $('.select2').select2();
   </script>
 
<?php $this->endSection(); ?>