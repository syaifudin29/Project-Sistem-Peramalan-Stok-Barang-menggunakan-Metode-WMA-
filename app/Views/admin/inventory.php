<?= $this->extend('admin/template');
  $this->section('content_admin');
?>
<div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Inventory</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Inventory</li>
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
                <h3 class="card-title">Data Inventory</h3>
                <?php if ($_SESSION['role']=='1'){ ?>
                <button class="btn btn-primary" style="float: right;" data-toggle="modal" data-target="#modal-xl"><i class="fas fa-plus-circle"></i> Tambah data</button>
              <?php } ?>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>#</th>
                    <th>ID Barang</th>
                    <th>Nama Barang</th>
                    <th>Jenis Barang</th>
                    <th>Satuan</th>
                    <th>Harga</th>
                    <th>Stok</th>
                    <th>Total Harga</th>
                    <?php if ($_SESSION['role']=='1') {
                      echo "<th>Action</th>";
                    } ?>
                    
                  </tr>
                  </thead>
                  <tbody>
                    <?php
                    $no=1;
                    foreach ($barang as $key) { ?>
                    <tr>
                      <td><?php echo $no++; ?></td>
                      <td><?php echo $key['id_barang']; ?></td>
                      <td><?php echo $key['nm_barang']; ?></td>
                      <td><?php echo $key['nm_jenis']; ?></td>
                      <td><?php echo $key['nm_satuan']; ?></td>
                      <td><?php echo $key['harga']; ?></td>
                      <td><?php echo $key['stok']; ?></td>
                      <td><?php echo "Rp. ".number_format($key['stok']*$key['harga'],2,',','.'); ?></td>
                      <?php if ($_SESSION['role']=='1') { ?>
                      <td style="text-align: center;">
                        <a href="/inventory/ubah/<?php echo $key['id_barang']; ?>" class="btn btn-warning"><i class="fas fa-edit"></i></a> 
                        <a href="inventory/hapus/<?php echo $key['id_barang']; ?>" class="btn btn-danger"><i class="fas fa-trash"></i></a>
                      </td>
                      <?php } ?>
                     
                    </tr>
                    <?php }
                    $jml_data = $barangjml; ?>
                  </tbody>
                </table>
              </div>
              <!-- /.card-body -->
            </div>
     </div>
    </section>

      <div class="modal fade" id="modal-xl">
        <div class="modal-dialog modal-lg">
          <form method="post" action="inventory/tambah" enctype="multipart/form-data">
          <input type="hidden" class="form-control" name="id_barang" value="<?php echo "KYL120".($jml_data+1); ?>" >
          <div class="modal-content">
            <div class="modal-header bg-primary">
              <h4 class="modal-title">Tambah Data Barang</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
                <div class="form-group">
                  <label>ID Barang</label>
                  <input type="text" class="form-control" placeholder="masukkan satuan" value="<?php echo "KYL120".($jml_data+1); ?>" readOnly>
                </div>
                <div class="form-group">
                  <label>Nama Barang</label>
                  <input type="text" class="form-control" name="nama" placeholder="masukkan nama barang" required>
                </div>
                <div class="form-group">
                  <label>Harga</label>
                  <input type="number" class="form-control" name="harga" placeholder="0" required>
                </div>
                <div class="form-group">
                  <label>Jenis</label>
                  <select class="select2" name="jenis" style="width: 100%; height: 100px;" required>
                    <option selected disabled>Pilih jenis...</option>
                    <?php foreach ($jenis as $jen): ?>
                       <option value="<?php echo $jen['id_jenis']; ?>"><?php echo $jen['nm_jenis']; ?></option>
                    <?php endforeach ?>
                  </select>
                </div>
                <div class="form-group">
                  <label>Satuan</label>
                  <select class="select2" name="satuan" style="width: 100%; height: 100px;" required>
                    <option selected disabled>Pilih satuan...</option>
                    <?php foreach ($satuan as $sa): ?>
                       <option value="<?php echo $sa['id_satuan']; ?>"><?php echo $sa['nm_satuan']; ?></option>
                    <?php endforeach ?>
                  </select>
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