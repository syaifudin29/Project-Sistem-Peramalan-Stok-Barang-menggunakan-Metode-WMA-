
<?= $this->extend('admin/template');
	$this->section('content_admin');
?>
<?php 
  $bulan = array (1 =>   'Januari',
      'Februari',
      'Maret',
      'April',
      'Mei',
      'Juni',
      'Juli',
      'Agustus',
      'September',
      'Oktober',
      'November',
      'Desember'
    );
    foreach ($hasil as $key){ 
      if($key['bulan'] == date('Y-m-d', strtotime($tanggal))){
        $bln = intval(date('m', strtotime($tanggal)));
      }
    }

 ?>
<div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Hasil Analisis</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Hasil Analisis</li>
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
        <div class="col-md-12" style="margin-top: 20px; margin-bottom: 20px;">
        <div class="card card-info" style="margin: 0 auto;">
            <div class="card-header">
              <h3 class="card-title">Hasil Prediksi <?php echo $nama['nm_barang']." | ".$nama['id_barang'] ?></h3>
            </div>
            <!-- /.card-header -->
            <!-- form start -->
              <div class="card-body">
                  <h5>Nilai Error terendah : <b><?php echo $wma['error']; ?></b></h5>
                  <h5>Nilai Prediksi Bulan <?php echo $bulan[$bln]; ?> adalah : <b><?php echo $wma['nilai']; ?></b></h5>
              </div>
        </div>
      </div>
        <div class="col-md-12" style="margin-top: 20px;">
        <div class="card card-info" style="margin: 0 auto;">
            <div class="card-header">
              <h3 class="card-title">Analisis Prediksi</h3>
            </div>
            <!-- /.card-header -->
            <!-- form start -->
              <div class="card-body">
              <table  class="table table-bordered table-striped">
                  <thead>
                    <tr>
                      <th>#</th>
                      <th>Bulan</th>
                      <th>Aktual</th>
                      <th>WMA 3</th>
                      <th>WMA 4</th>
                      <th>WMA 5</th>
                      <th>WMA 6</th>
                      <th>ERROR 3</th>
                      <th>ERROR 4</th>
                      <th>ERROR 5</th>
                      <th>ERROR 6</th>
                    </tr>
                  </thead>
                  <tbody>
                  <?php
                  $no=1;
                  foreach ($hasil as $key):  ?>
                    <tr>
                      <td><?php echo $no++; ?></td>
                      <td><?php echo date('M-Y', strtotime($key['bulan'])); ?></td>
                      <td>
                        <?php
                          foreach ($aktual as $akt) {
                            if ($key['bulan']==$akt['bulan']) {
                              echo $akt['nilai'];
                            }
                          }
                         ?>
                      </td>
                      <td><?php echo $key['wma3']; ?></td>
                      <td><?php echo $key['wma4']; ?></td>
                      <td><?php echo $key['wma5']; ?></td>
                      <td><?php echo $key['wma6']; ?></td>
                      <td><?php echo $key['error3']; ?></td>
                      <td><?php echo $key['error4']; ?></td>
                      <td><?php echo $key['error5']; ?></td>
                      <td><?php echo $key['error6']; ?></td>
                    </tr> 
                  <?php  endforeach ?>
                  <tr>
                    <td colspan="7">MAPE</td>
                    <?php foreach ($mape as $keyMape): ?> 
                    <td><?php echo $keyMape; ?></td>
                    <?php endforeach ?>
                  </tr> 
                  </tbody>
              </table>
              </div>
          </div>
      </div>

    </div>
  </section>
  <?php $this->endSection(); ?>