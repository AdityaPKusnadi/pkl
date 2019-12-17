<?php
session_start();
if(!isset($_SESSION["login"])){
    header("Location:login.php");
}
require "function.php";
$id = $_SESSION["id"];
$data = query("SELECT * FROM mahasiswa mh LEFT JOIN users us ON (mh.id_users=us.id_users)WHERE us.type='0'");
?>
<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Admin</title>

  <!-- Custom fonts for this template-->
  <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">

  <!-- Page level plugin CSS-->
  <link href="vendor/datatables/dataTables.bootstrap4.css" rel="stylesheet">

  <!-- Custom styles for this template-->
  <link href="css/sb-admin.css" rel="stylesheet">

</head>

<body id="page-top">

  <nav class="navbar navbar-expand navbar-dark bg-dark static-top">

    <a class="navbar-brand mr-1" href="#">STMIK AMIK BANDUNG</a>

    <button class="btn btn-link btn-sm text-white order-1 order-sm-0" id="sidebarToggle" href="#">
      <i class="fas fa-bars"></i>
    </button>

    <!-- Navbar -->
    <ul class="navbar-nav ml-auto ml-md-0">
      <li class="nav-item dropdown no-arrow">
        <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          <i class="fas fa-user-circle fa-fw"></i>
        </a>
        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="userDropdown">
          <div class="dropdown-divider"></div>
          <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">Logout</a>
        </div>
      </li>
    </ul>

  </nav>

  <div id="wrapper">

    <!-- Sidebar -->
    <ul class="sidebar navbar-nav">
      <li class="nav-item">
        <a class="nav-link" href="indexAdmin.php">
          <i class="fas fa-fw fa-folder"></i>
          <span>Daftar Pendaftaran</span>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="masterNilai.php">
          <i class="fas fa-fw fa-folder"></i>
          <span>Master Nilai</span>
        </a>
      </li>
			<li class="nav-item">
        <a class="nav-link" href="daftarnilai.php">
          <i class="fas fa-fw fa-folder"></i>
          <span>Pemilaian</span>
        </a>
      </li>
    </ul>

    <div id="content-wrapper">

      <div class="container-fluid">

        <!-- Breadcrumbs-->
        <ol class="breadcrumb">
          <li class="breadcrumb-item">
            <a href="index.html">Dashboard</a>
          </li>
          <li class="breadcrumb-item active">Profile <?= $_SESSION["username"]; ?></li>
        </ol>

        <div class="card mb-3">
          <div class="card-header">
            <i class="fas fa-table"></i>
            Data Table Example</div>
          <div class="card-body">
            <div class="table-responsive">
              <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                  <tr>
                    <th>No</th>
                    <th>Foto</th>
                    <th>Nama</th>
                    <th>Tgl Lahir</th>
                    <th>Asal Sekolah</th>
                    <th>Telp</th>
                    <th>Email</th>
                    <th>Attachment</th>
                    <th>Aksi</th>
                  </tr>
                </thead>
                <tfoot>
                  <tr>
                  <th>No</th>
                    <th>Foto</th>
                    <th>Nama</th>
                    <th>Tgl Lahir</th>
                    <th>Asal Sekolah</th>
                    <th>Telp</th>
                    <th>Email</th>
                    <th>Attachment</th>
                    <th>Aksi</th>
                  </tr>
                </tfoot>
                <tbody>
                    <?php $i=1; ?>
                    <?php foreach($data as $data): ?>
									<tr>
                    <td><?= $i; ?></td>
                    <td><img src="image/<?= $data['foto_mhs']; ?>" alt="" style="height:100px;weight:100px;"></td>
                    <td><?= $data["nama"]; ?></td>
                    <td><?= $data["usia"]; ?></td>
                    <td><?= $data["asal_sekolah"] ?></td>
                    <td><?= $data["telp"]?></td>
                    <td><?= $data["email"]?></td>
                    <td><a href="#" class="btn btn-dark" data-toggle="modal" data-target='#downloadData<?= $i; ?>'>Download</a>
										<a href="printNilai.php?idmhs=<?= $data['id_mhs']?>" class="btn btn-warning">print Nilai</a>
										</td>
                    <td><a href="proses_admin.php?act=delete&id=<?= $data['id_mhs']; ?>" class="btn btn-danger" onclick="return confirm('Yakin Hapus!');">Delete</a> <a href="#" class="btn btn-success" data-toggle="modal" data-target="#editPendaftaran<?= $i ?>">Edit</a></td>
										</tr>
									
									
									<!-- downloadData Modal-->
  <div class="modal fade" id="downloadData<?= $i; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Download Data <?= $data["nama"]; ?></h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <div class="modal-body">
				<div class="form-group">
<!--               <input type="hidden" name="id" value=""> -->
              <div class="row">
<!-- 								<form action="proses_admin.php" method="post"> -->
              <label class="col-sm-3 control-label text-right">Surat Keterangan: <span class="text-red">*</span></label>         
              <div class="col-sm-8"><a href="proses_admin.php?suket=<?= urlencode($data['suket']); ?>" class="btn btn-success">Download</a></div>
              </div>
							<div class="row">
              <label class="col-sm-3 control-label text-right">CV: <span class="text-red">*</span></label>         
              <div class="col-sm-8"><a href="proses_admin.php?cv=<?= urlencode($data['cv']); ?>" class="btn btn-success">Download</a></div>
              </div>
<!-- 							</form> -->
            </div>
				</div>
        <div class="modal-footer">
          <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
<!--           <a class="btn btn-primary" href="#"></a> -->
        </div>
      </div>
    </div>
  </div>
									
	<!-- Insert Modal edit pendaftaran-->
<div class="example-modal">
  <div id="editPendaftaran<?= $i ?>" class="modal fade" role="dialog" style="display:none;">
    <div class="modal-dialog"> 
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
          <h3 class="modal-title"></h3>
        </div>
        <div class="modal-body">
        <form action="proses_admin.php?act=updatedata" method="POST" enctype="multipart/form-data">
        <div class="form-group">
							<input type="hidden" name="id_pendaftaran" value="<?= $data["id_mhs"]; ?>">
							<input type="hidden" name="fotolama" value="<?= $data["foto_mhs"]; ?>">
							<input type="hidden" name="cvlama" value="<?= $data["cv"]; ?>">
							<input type="hidden" name="suketlama" value="<?= $data["suket"]; ?>">
              <div class="row">
              <label class="col-sm-3 control-label text-right">Nama: <span class="text-red">*</span></label>         
              <div class="col-sm-8"><input type="text" class="form-control" name="nama" placeholder="Nama" value="<?= $data["nama"]?>"></div>
              </div>
              <div class="form-group">
              <div class="row">
              <label class="col-sm-3 control-label text-right">Alamat: <span class="text-red">*</span></label>         
              <div class="col-sm-8"><input type="text" class="form-control" name="alamat" placeholder="Alamat" value="<?= $data["alamat"]?>"></div>
              </div>
            </div>
            <div class="form-group">
              <div class="row">
              <label class="col-sm-3 control-label text-right">Asal Sekolah: <span class="text-red">*</span></label>         
              <div class="col-sm-8"><input type="text" class="form-control" name="a_sekolah" placeholder="Asal Sekolah" value="<?= $data["asal_sekolah"]?>">							</div>
              </div>
            </div>
            <div class="form-group">
              <div class="row">
              <label class="col-sm-3 control-label text-right">Tgl Lahir: <span class="text-red">*</span></label>         
              <div class="col-sm-8"><input type="date" class="form-control" name="tglLahir" placeholder="Tgl Lahir" value="<?= $data["usia"]?>"></div>
              </div>
            <div class="form-group">
              <div class="row">
              <label class="col-sm-3 control-label text-right">No.Telp: <span class="text-red">*</span></label>         
              <div class="col-sm-8"><input type="number" class="form-control" name="telp" placeholder="Nomer Telepon" value="<?= $data["telp"]?>"></div>
              </div>
              <div class="form-group">
              <div class="row">
              <label class="col-sm-3 control-label text-right">Email: <span class="text-red">*</span></label>         
              <div class="col-sm-8"><input type="email" class="form-control" name="email" placeholder="Email" value="<?= $data["email"]?>"></div>
              </div>
            </div>
            <div class="form-group">
              <div class="row">
              <label class="col-sm-3 control-label text-right">Foto: <span class="text-red">*</span></label>         
              <div class="col-sm-8"><input type="file" class="form-control" name="foto" placeholder="foto" value="<?= $data["foto_mhs"]?>"></div>
              </div>
              <div class="form-group">
              <div class="row">
              <label class="col-sm-3 control-label text-right">CV: <span class="text-red">*</span></label>         
              <div class="col-sm-8"><input type="file" class="form-control" name="cv" placeholder="CV" value="<?= $data["cv"];?>"></div>
              </div>
              <div class="form-group">
              <div class="row">
              <label class="col-sm-3 control-label text-right">Surat Pengantar: <span class="text-red">*</span></label>         
              <div class="col-sm-8"><input type="file" class="form-control" name="SUKET" placeholder="Surat Pengantar" value="<?= $data["suket"]?>"></div>
              </div>
              <div class="modal-footer">
              <button id="nosave" type="button" class="btn btn-danger pull-left" data-dismiss="modal">Batal</button>
              <input type="submit" name="submit" class="btn btn-primary" value="Simpan">
            </div>
            </div>
            </div>
            </div>
            </div>
        </form>
        </div>
      </div>
    </div>
  </div>
</div><!-- modal edit pendaftaran close -->
                    <?php $i++ ?>
                    <?php endforeach; ?>
                </tbody>
              </table>
            </div>
          </div>
          <div class="card-footer small text-muted">Updated yesterday at 11:59 PM</div>
        </div>

      <!-- /.container-fluid -->

      <!-- Sticky Footer -->
      <footer class="sticky-footer">
        <div class="container my-auto">
          <div class="copyright text-center my-auto">
            <span>Copyright © Your Website 2019</span>
          </div>
        </div>
      </footer>

    </div>
    <!-- /.content-wrapper -->

  </div>
  <!-- /#wrapper -->

  <!-- Scroll to Top Button-->
  <a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
  </a>

  <!-- Logout Modal-->
  <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
        <div class="modal-footer">
          <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
          <a class="btn btn-primary" href="login.php">Logout</a>
        </div>
      </div>
    </div>
  </div>

  <!-- Bootstrap core JavaScript-->
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Core plugin JavaScript-->
  <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

  <!-- Custom scripts for all pages-->
  <script src="js/sb-admin.min.js"></script>

</body>

</html>
