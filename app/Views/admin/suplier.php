<?= $this->extend('admin/template');
  $this->section('content_admin');
?>
<div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Supplier</h1>
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
        <div class="card">
              <div class="card-header">
                <h3 class="card-title">Data supplier</h3>
                <button class="btn btn-primary" style="float: right;" data-toggle="modal" data-target="#modal-xl"><i class="fas fa-plus-circle"></i> Tambah data</button>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>#</th>
                    <th>Supplier</th>
                    <th>Nama Bagian</th>
                    <th>No. Telepon</th>
                    <th>Alamat</th>
                    <th>Action</th>
                  </tr>
                  </thead>
                  <tbody>
                    <?php
                    $no=1;
                    foreach ($suplier as $key) { ?>
                    <tr>
                      <td><?php echo $no++; ?></td>
                      <td><?php echo $key['suplier']; ?></td>
                      <td><?php echo $key['nama']; ?></td>
                      <td><?php echo $key['no_telp']; ?></td>
                      <td><?php echo $key['alamat']; ?></td>
                      <td style="text-align: center;">
                        <a href="suplier/edit/<?php echo $key['id_suplier']; ?>" class="btn btn-warning"><i class="fas fa-edit"></i></a> 
                        <a href="suplier/hapus/<?php echo $key['id_suplier']; ?>" class="btn btn-danger"><i class="fas fa-trash"></i></a>
                      </td>
                    </tr>
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
          <form method="post" action="suplier/tambah">
          <div class="modal-content">
            <div class="modal-header bg-primary">
              <h4 class="modal-title">Tambah Data Supplier</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
                <div class="form-group">
                  <label>SUPPLIER</label>
                  <input type="text" class="form-control" name="suplier" placeholder="masukkan suplier" required>
                </div>
                <div class="form-group">
                  <label>Nama Bagian</label>
                  <input type="text" class="form-control" name="nama" placeholder="masukkan nama bagian" required>
                </div>
                <div class="form-group">
                  <label>No Telepon</label>
                  <input type="text" class="form-control" name="notelp" placeholder="masukkan nomor Telepon" required>
                </div>
                <div class="form-group">
                  <label>Alamat</label>
                  <textarea class="form-control" name="alamat" placeholder="masukkan alamat" required></textarea>
                </div>
            </div>
            <div class="modal-footer justify-content-between">
              <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
              <button type="submit" class="btn btn-primary"><i class="fas fa-save"></i>  Simpan Supplier</button>
            </div>
          </div>
          <!-- /.modal-content -->
        </div>
        </form>
        <!-- /.modal-dialog -->
      </div>
     

<?php $this->endSection(); ?>