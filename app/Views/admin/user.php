<?= $this->extend('admin/template');
	$this->section('content_admin');
?>
<div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">User Management</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">User Management</li>
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
          <h3 class="card-title">Data user</h3>
          <button class="btn btn-primary" style="float: right;" data-toggle="modal" data-target="#modaltambah"><i class="fas fa-plus-circle"></i> Tambah data</button>
        </div>
        <div class="card-body">
            <table id="example1" class="table table-bordered table-striped" >
              <thead>
              <tr class="text-center">
                <th>#</th>
                <th>Foto</th>
                <th>Nama</th>
                <th>Username</th>
                <th>Email</th>
                <th>No. telp</th>
                <th>Role</th>
                <th>Action</th>
              </tr>
              </thead>
              <tbody style="font-size: 18px;">
                <?php
                $no=1;
                foreach ($user as $key) { ?>
                <tr>
                  <td><?php echo $no++; ?></td>
                  <td><img style="height: 100px; width: 100px; object-fit: cover;" src="/dist/img/photo/<?php echo $key['gambar']; ?>"></td>
                  <td><?php echo $key['nama']; ?></td>
                  <td><?php echo $key['username']; ?></td>
                  <td><?php echo $key['email']; ?></td>
                  <td class="text-center"><?php echo $key['no_telp']; ?></td>
                  <td class="text-center">
                  	<?php if($key['role']==1){
                  		echo "Admin";
                  	}else{
                  		echo "Karyawan";
                  	} ?>
                  </td>
                  <td style="text-align: center;">
                    <a href="usermanagement/hapus/<?php echo $key['id_user']; ?>" class="btn btn-danger"><i class="fas fa-trash"></i></a>
                  </td>
                </tr>
                <?php }  ?>
              </tbody>
            </table>
          </div>
      </div>
     </div>
    </section>
 	<div class="modal fade" id="modaltambah">
        <div class="modal-dialog modal-lg">
          <form method="post" action="usermanagement/tambah" enctype="multipart/form-data">
          <div class="modal-content">
            <div class="modal-header bg-primary">
              <h4 class="modal-title">Tambah User Baru</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
                <div class="form-group">
                  <label>Nama</label>
                  <input type="text" class="form-control" name="nama" placeholder="budi santoso" >
                </div>
                <div class="form-group">
                  <label>Email</label>
                  <input type="email" class="form-control" name="email" placeholder="admin@email.com"  required>
                </div>
                <div class="form-group">
                  <label>No. Telpon</label>
                  <input type="number" class="form-control" name="no_telp" placeholder="081222xxxx" required>
                </div>
                <div class="form-group">
                  <label>Username</label>
                  <input type="text" class="form-control" name="username" placeholder="user"  required>
                </div>
                <div class="form-group">
                  <label>Password</label>
                  <input type="password" class="form-control" name="password" placeholder="..........."  required>
                </div>
                <div class="form-group">
                  <label>Role</label>
                  <select class="form-control" name="role">
                  	<option value="1">Admin</option>
                  	<option value="2" selected>Karyawan</option>
                  </select>
                </div>
                <div class="form-group">
                  <label>Foto</label>
	              <div>
	                <input class="form-control" name="foto" type="file" id="formFile" required>
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