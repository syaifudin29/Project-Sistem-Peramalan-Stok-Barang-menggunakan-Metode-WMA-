<?= $this->extend('admin/template');
	$this->section('content_admin');
?>
<div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Inventory Edit</h1>
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
      <form method="post" action="/inventory/edit" enctype="multipart/form-data">
      <input type="hidden" name="id_barang" class="form-control" value="<?php echo $barang[0]['id_barang'] ?>">
      <div class="col-md-12" style="margin: 0 auto;">
      	<div class="card card-info">
              <div class="card-header">
                <h3 class="card-title">Edit Data</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form>
              <div class="card-body">
                <div class="row">
                  <div class="col-12 col-sm-6">
                     <div class="form-group">
                        <label>ID Barang</label>
                        <input type="text" class="form-control " value="<?php echo $barang[0]['id_barang']; ?>" readOnly>
                      </div>
                      <div class="form-group">
                        <label>Jenis</label>
                        <select class="form-control  select2" name="jenis" style="width: 100%;" required>
                          <option selected disabled>Pilih jenis...</option>
                          <?php foreach ($jenis as $jen): 
                            if ($jen['id_jenis'] == $barang[0]['id_jenis'] ) {
                              $select = "selected";
                            }else{
                              $select = "";
                            }
                          ?>
                             <option <?php echo $select; ?> value="<?php echo $jen['id_jenis']; ?>"><?php echo $jen['nm_jenis']; ?></option>
                          <?php endforeach ?>
                        </select>
                      </div>
                       <div class="form-group">
                        <label>Satuan</label>
                        <select class="form-control  select2" name="satuan" style="width: 100%;" required>
                          <option selected disabled>Pilih satuan...</option>
                          <?php foreach ($satuan as $sa):
                            if ($sa['id_satuan'] == $barang[0]['id_satuan'] ) {
                              $select = "selected";
                            }else{
                              $select = "";
                            }
                           ?>
                             <option <?php echo $select; ?> value="<?php echo $sa['id_satuan']; ?>"><?php echo $sa['nm_satuan']; ?></option>
                          <?php endforeach ?>
                        </select>
                      </div>
                </div>
                <div class="col-12 col-sm-6">
                       <div class="form-group">
                        <label>Nama Barang</label>
                        <input type="text" class="form-control " name="nama" value="<?php echo $barang[0]['nm_barang'] ?>"  placeholder="masukkan satuan" required>
                      </div>
                      <div class="form-group">
                        <label>Harga</label>
                        <input type="number" class="form-control " name="harga" value="<?php echo $barang[0]['harga'] ?>"  placeholder="masukkan satuan" required>
                      </div>
                    </div>
                   </div>
                <div class="card-footer">
                  <button type="submit" class="btn btn-info">Simpan</button>
                </div>
              </div>
                <!-- /.card-body -->
              </form>
            </div>
          </div>
        </form>
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

    label{
      font-size: 18px;
    }
   </style>

<?php $this->endSection(); 

$this->section('js_admin'); ?>

   <script src=" <?php echo base_url('plugins/select2/js/select2.full.min.js') ?>"></script>
   <script type="text/javascript">
     $('.select2').select2();
   </script>
 
<?php $this->endSection(); ?>