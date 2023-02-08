<?= $this->extend('admin/template');
	$this->section('content_admin');
?>
<div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Supplier Edit</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Supplier</li>
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
      <form method="post" action="/suplier/editproses">
      <div class="col-md-12" style="margin: 0 auto;">
      	<div class="card card-info">
              <div class="card-header">
                <h3 class="card-title">Edit Data</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
                <div class="card-body">
                  <div class="form-group">
                    <input type="hidden" class="form-control" value="<?php echo $suplier[0]['id_suplier']; ?>" name="id_suplier">
                    <label>SUPPLIER</label>
                    <input type="text" class="form-control" value="<?php echo $suplier[0]['suplier']; ?>" name="suplier" placeholder="masukkan suplier" required>
                  </div>
                  <div class="form-group">
                    <label>Nama Bagian</label>
                    <input type="text" class="form-control" value="<?php echo $suplier[0]['nama']; ?>" name="nama" placeholder="masukkan nama bagian" required>
                  </div>
                  <div class="form-group">
                    <label>No Telepon</label>
                    <input type="text" class="form-control" value="<?php echo $suplier[0]['no_telp']; ?>" name="notelp" placeholder="masukkan nomor Telepon" required>
                  </div>
                  <div class="form-group">
                    <label>Alamat</label>
                    <textarea class="form-control" name="alamat" placeholder="masukkan alamat" required><?php echo $suplier[0]['alamat']; ?></textarea>
                  </div>
                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                  <button type="submit" class="btn btn-info">Simpan</button>
                </div>

            </div>
          </div>
        </form>
     </div>
    </section>
<?php $this->endSection(); ?>