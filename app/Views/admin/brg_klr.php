<?= $this->extend('admin/template');
  $this->section('content_admin');
?>
<div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Barang Keluar</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Barang Keluar</li>
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
          <h3 class="card-title">Data barang keluar</h3>
          <button class="btn btn-primary" style="float: right;" data-toggle="modal" data-target="#modaltambah"><i class="fas fa-plus-circle"></i> Tambah data</button>
        </div>
        <div class="card-body">
            <table id="example1" class="table table-bordered table-striped" >
              <thead>
              <tr class="text-center">
                <th>No. Transaksi</th>
                <th>Tanggal Keluar</th>
                <th>Nama Barang</th>
                <th>Jumlah Keluar</th>
                <th>Bagian</th>
                <th>User</th>
                <th>Action</th>
              </tr>
              </thead>
              <tbody style="font-size: 18px;">
                <?php
                $nom=count($barangkeluar);
                foreach ($barangkeluar as $key) { ?>
                <tr>
                  <td><?php echo $key['id_brgklr']; ?></td>
                  <td class="text-center"><?php echo $key['tgl_klr']; ?></td>
                  <td><?php echo $key['nm_barang']; ?></td>
                  <td class="text-center"><?php echo $key['jml_klr']; ?></td>
                  <td class="text-center"><?php echo $key['lokasi']; ?></td>
                  <td class="text-center"><?php echo $key['nama']; ?></td>
                  <td style="text-align: center;">
                    <a href="barangkeluar/hapus/<?php echo $key['id_brgklr']; ?>" class="btn btn-danger"><i class="fas fa-trash"></i></a>
                  </td>
                </tr>
                <?php }
                $total = $barangjml; ?>
              </tbody>
            </table>
          </div>
      </div>
     </div>
    </section>
    <div class="modal fade" id="modaltambah">
        <div class="modal-dialog modal-lg">
          <form method="post" action="barangkeluar/tambah">
          <input type="hidden" class="form-control" name="notransaksi" value="<?php echo "KLR-".($total+1); ?>">
          <div class="modal-content">
            <div class="modal-header bg-primary">
              <h4 class="modal-title">Tambah Data Barang Keluar</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
                <div class="form-group">
                  <label>No Transkasi</label>
                  <input type="text" class="form-control" value="<?php echo "KLR-".($total+1); ?>" readonly>
                </div>
                <div class="form-group">
                  <label>Tanggal Keluar</label>
                  <input type="date" class="form-control" value="<?php echo date('Y-m-d'); ?>" name="tgl" required>
                </div>
                <div class="form-group">
                  <label>Barang</label>
                  <select class="select2 nama_barang" name="barang" style="width: 100%; height: 100px;" required>
                    <option selected disabled>Pilih jenis...</option>
                    <?php foreach ($barang as $bar): ?>
                       <option value="<?php echo $bar['id_barang']; ?>"><?php echo $bar['id_barang']." | ".$bar['nm_barang']; ?></option>
                    <?php endforeach ?>
                  </select>
                </div>
                <div class="form-group">
                  <label>Stok</label>
                  <div class="input-group mb-3">
                    <input type="text" class="form-control stok_isi" disabled>
                    <div class="input-group-append">
                      <span class="input-group-text satuan">pcs</i></span>
                    </div>
                  </div>
                </div>
                <div class="form-group">
                  <label>Jumlah keluar</label>
                  <input type="number" class="form-control jml_klr" placeholder="0" name="jml_klr"  required>
                </div>
                <div class="form-group">
                  <label>Bagian</label>
                  <textarea class="form-control" name="lokasi" required></textarea>
                </div>
            </div>
            <div class="modal-footer justify-content-between">
              <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
              <button type="submit" class="btn btn-primary simpan"><i class="fas fa-save"></i>  Simpan</button>
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
     var barang = [];
     var satuan = [];
     <?php foreach ($barang as $keys) {
       echo "barang['".$keys['id_barang']."']=".$keys['stok'].";";
       echo "satuan['".$keys['id_barang']."']='".$keys['nm_satuan']."';";
     } ?>

     $('.nama_barang').change(function() {
      var nam = $('.nama_barang').find(":selected").val();
      $('.stok_isi').val(barang[nam]);
      $('.satuan').text(satuan[nam]);
    });

     $('.jml_klr').keyup(function() {
        var jml = $('.jml_klr').val();
        var nam = $('.nama_barang').find(":selected").val();
        if (barang[nam] < jml) {
          $('.jml_klr').addClass('is-invalid');
          $('.simpan').attr('disabled','');
        }else{
          $('.jml_klr').removeClass('is-invalid');
          $('.simpan').removeAttr('disabled');
        }
        
        console.log(jml);
     });
   </script>
 
<?php $this->endSection(); ?>