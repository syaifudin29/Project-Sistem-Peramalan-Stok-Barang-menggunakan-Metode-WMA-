<?= $this->extend('admin/template');
	$this->section('content_admin');
?>
<div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Profile</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Profile</li>
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
      <div class="col-12 col-sm-6 d-flex align-items-stretch flex-column text" style="margin: 0 auto;">
          <div class="card bg-light d-flex flex-fill">
            <div class="card-header text-muted border-bottom-0">
              <?php if ($user['role'] == 1) {
                echo "Admin Perusahaan";
              }else{
                echo "Karyawan Perusahaan";
              } ?>
            </div>
            <div class="card-body pt-0">
              <div class="row">
                <div class="col-7">
                  <h2 class="lead"><b><?php echo $user['nama']; ?></b></h2>
                  <p class="text-muted text-sm"></p>
                  <br>
                  <ul class="ml-4 mb-0 fa-ul text-muted">
                    <li class="small"><span class="fa-li"><i class="fas fa-lg fa-user"></i></span> Username: <?php echo $user['username']; ?></li>
                    <li class="small"><span class="fa-li"><i class="fas fa-lg fa-phone"></i></span> Phone #: <?php echo $user['no_telp']; ?></li>
                  </ul>
                </div>
                <div class="col-5 text-center">
                  <img style="width: 128px; height: 128px; object-fit: cover;" src="<?php echo base_url('dist/img/photo/'.$user['gambar']); ?>" alt="user-avatar" class="img-circle img-fluid">
                </div>
              </div>
            </div>
            <div class="card-footer">
              <div class="text-right">
                <a href="#" data-toggle="modal" data-target="#modaltambah" class="btn btn-sm btn-primary">
                  <i class="fas fa-user"></i> Edit Profile
                </a>
              </div>
            </div>
          </div>
        </div>

        <div class="col-12 col-sm-6 d-flex align-items-stretch flex-column text" style="margin: 0 auto;">
          <div class="card bg-light d-flex flex-fill">
            <form method="post" action="profile/editpass">
            <div class="card-header text-muted border-bottom-0">
              Ubah Password
            </div>
            <div class="card-body pt-0">
              <div class="form-group">
                <label>Lama</label>
                <input type="text" class="form-control" name="lama" placeholder="............." required>
              </div>
              <div class="form-group">
                <label>Baru</label>
                <input type="text" class="form-control" name="baru" placeholder="............." required>
              </div>
            </div>
            <div class="card-footer">
              <div class="text-right">
                <button type="submit" class="btn btn-sm btn-primary">
                  Ubah
                </button>
              </div>
            </div>
            </form>
          </div>
        </div>
      
     </div>
    </section>
    <div class="modal fade" id="modaltambah">
        <div class="modal-dialog modal-lg">
          <form method="post" action="profile/edit" enctype="multipart/form-data">
          <div class="modal-content">
            <div class="modal-header bg-primary">
              <h4 class="modal-title">Edit User</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
                <div class="form-group">
                  <label>Nama</label>
                  <input type="text" class="form-control" name="nama" value="<?php echo $user['nama']; ?>" placeholder="budi santoso" >
                </div>
                <div class="form-group">
                  <label>Email</label>
                  <input type="email" class="form-control" name="email" placeholder="admin@email.com" value="<?php echo $user['email']; ?>" required>
                </div>
                <div class="form-group">
                  <label>No. Telpon</label>
                  <input type="number" class="form-control" name="no_telp" placeholder="081222xxxx" value="<?php echo $user['no_telp']; ?>" required>
                </div>
                <div class="form-group">
                  <label>Username</label>
                  <input type="text" class="form-control" name="username" placeholder="user" value="<?php echo $user['username']; ?>" required>
                </div>
                <div class="form-group">
                  <label>Foto</label>
                  <br>
                   <img style="width: 128px; height: 128px; object-fit: cover; margin-bottom: 10px;" src="<?php echo base_url('dist/img/photo/'.$user['gambar']); ?>" alt="user-avatar" class="img-circle img-fluid">
                <div>
                  <input class="form-control" name="foto" type="file" id="formFile">
                </div>
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