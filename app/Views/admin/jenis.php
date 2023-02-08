<?= $this->extend('admin/template');
	$this->section('content_admin');
?>
<div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Jenis Barang</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Jenis</li>
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
      	<div class="card">
              <div class="card-header">
                <h3 class="card-title">Data Jenis Barang</h3>
                <button class="btn btn-primary" style="float: right;" data-toggle="modal" data-target="#modal-xl"><i class="fas fa-plus-circle"></i> Tambah data</button>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>#</th>
                    <th>Jenis</th>
                    <th>Action</th>
                  </tr>
                  </thead>
                  <tbody>
                    <?php
                    $no=1;
                    foreach ($jenis as $key) { ?>
                    <tr>
                      <td><?php echo $no++; ?></td>
                      <td><?php echo $key['nm_jenis']; ?></td>
                      <td style="text-align: center;">
                        <a data-toggle="modal" data-target="#modal-up<?php echo $key['id_jenis']; ?>" class="btn btn-warning"><i class="fas fa-edit"></i></a> 
                        <a href="jenis/hapus/<?php echo $key['id_jenis']; ?>" class="btn btn-danger"><i class="fas fa-trash"></i></a>
                      </td>
                    </tr>
                    <!-- modal update -->
				      <div class="modal fade" id="modal-up<?php echo $key['id_jenis']; ?>">
				        <div class="modal-dialog modal-lg">
				          <form method="post" action="jenis/edit">
				          <div class="modal-content">
				            <div class="modal-header bg-info">
				              <h4 class="modal-title">Update Data Jenis Barang</h4>
				              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
				                <span aria-hidden="true">&times;</span>
				              </button>
				            </div>
				            <div class="modal-body">
				                <div class="form-group">
				                  <label>Jenis</label>
				                  <input type="hidden" name="id_jenis" value="<?php echo $key['id_jenis']; ?>">
				                  <input type="text" class="form-control" name="jenis" value="<?php echo $key['nm_jenis']; ?>" placeholder="masukkan jenis" required>
				                </div>
				            </div>
				            <div class="modal-footer justify-content-between">
				              <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
				              <button type="submit" class="btn btn-info"><i class="fas fa-save"></i>  Update</button>
				            </div>
				          </div>
				          <!-- /.modal-content -->
				        </div>
				        </form>
				        <!-- /.modal-dialog -->
				      </div>
                    <?php } ?>
                  </tbody>
                </table>
              </div>
              <!-- /.card-body -->
            </div>
     </div>
    </section>

      <div class="modal fade" id="modal-xl">
        <div class="modal-dialog modal-lg">
          <form method="post" action="jenis/tambah">
          <div class="modal-content">
            <div class="modal-header bg-primary">
              <h4 class="modal-title">Tambah Data jenis</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
                <div class="form-group">
                  <label>Jenis</label>
                  <input type="text" class="form-control" name="jenis" placeholder="masukkan jenis" required>
                </div>
            </div>
            <div class="modal-footer justify-content-between">
              <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
              <button type="submit" class="btn btn-primary"><i class="fas fa-save"></i>  Simpan</button>
            </div>
          </div>
          <!-- /.modal-content -->
        </div>
        </form>
        <!-- /.modal-dialog -->
      </div>
     

<?php $this->endSection(); ?>