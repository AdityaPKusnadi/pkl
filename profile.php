    <?php
session_start();
if(!isset($_SESSION["login"])){
    header("Location:login.php");
}
require "function.php";
$id = $_SESSION["id"];
$data = query("select * from mahasiswa where id_users='$id' ");
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
      <li class="nav-item dropdown no-arrow mx-1">
        <a class="nav-link dropdown-toggle" href="#" id="alertsDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
        <span class="badge badge-danger">9+</span>
          <i class="fas fa-bell fa-fw"></i>
        </a>
        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="alertsDropdown">
          <a class="dropdown-item" href="#">Action</a>
          <a class="dropdown-item" href="#">Another action</a>
          <div class="dropdown-divider"></div>
          <a class="dropdown-item" href="#">Something else here</a>
        </div>
      </li>
      <li class="nav-item dropdown no-arrow">
        <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          <i class="fas fa-user-circle fa-fw"></i>
        </a>
        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="userDropdown">
          <a class="dropdown-item" href="profile.php">Profile</a>
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
        <a class="nav-link" href="index.php">
          <i class="fas fa-fw fa-folder"></i>
          <span>Daftar Nilai</span>
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

        <!-- Page Content -->
        <?php foreach ($data as $data): ?>
        <img src="image/<?= $data["foto_mhs"] ?>" alt="" style="width: 350px;height: 350px;"> <br>
        <h1><?= $data["nama"]; ?></h1>
        <hr>
        <p>Alamat: <?= $data["alamat"] ?></p>
        <p>Asal Sekolah: <?= $data["asal_sekolah"] ?></p>
        <p>No.Telp: <?= $data["telp"] ?></p>
        <p>Email: <?= $data["email"] ?></p>
        <?php endforeach; ?>
        <a href="#" name="Insert" data-toggle="modal" data-target="#insertProfile" class="btn btn-primary form-control">Masukan Data Profile</a>
				<!-- Insert Modal-->
<div class="example-modal">
  <div id="insertProfile" class="modal fade" role="dialog" style="display:none;">
    <div class="modal-dialog"> 
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
          <h3 class="modal-title"></h3>
        </div>
        <div class="modal-body">
        <form action="updateProfile.php?act=updatedata" method="POST" enctype="multipart/form-data">
        <div class="form-group">
              <div class="row">
              <label class="col-sm-3 control-label text-right">Nama: <span class="text-red">*</span></label>         
              <div class="col-sm-8"><input type="text" class="form-control" name="nama" placeholder="Nama" value=""></div>
              </div>
              <div class="form-group">
              <div class="row">
              <label class="col-sm-3 control-label text-right">Alamat: <span class="text-red">*</span></label>         
              <div class="col-sm-8"><input type="text" class="form-control" name="alamat" placeholder="Alamat" value=""></div>
              </div>
            </div>
            <div class="form-group">
              <div class="row">
              <label class="col-sm-3 control-label text-right">Asal Sekolah: <span class="text-red">*</span></label>         
              <div class="col-sm-8"><input type="text" class="form-control" name="a_sekolah" placeholder="Asal Sekolah" value=""></div>
              </div>
            </div>
            <div class="form-group">
              <div class="row">
              <label class="col-sm-3 control-label text-right">Tgl Lahir: <span class="text-red">*</span></label>         
              <div class="col-sm-8"><input type="date" class="form-control" name="tglLahir" placeholder="Tgl Lahir" value=""></div>
              </div>
            <div class="form-group">
              <div class="row">
              <label class="col-sm-3 control-label text-right">No.Telp: <span class="text-red">*</span></label>         
              <div class="col-sm-8"><input type="number" class="form-control" name="telp" placeholder="Nomer Telepon" value=""></div>
              </div>
              <div class="form-group">
              <div class="row">
              <label class="col-sm-3 control-label text-right">Email: <span class="text-red">*</span></label>         
              <div class="col-sm-8"><input type="email" class="form-control" name="email" placeholder="Email" value=""></div>
              </div>
            </div>
            <div class="form-group">
              <div class="row">
              <label class="col-sm-3 control-label text-right">Foto: <span class="text-red">*</span></label>         
              <div class="col-sm-8"><input type="file" class="form-control" name="foto" placeholder="foto" value=""></div>
              </div>
              <div class="form-group">
              <div class="row">
              <label class="col-sm-3 control-label text-right">CV: <span class="text-red">*</span></label>         
              <div class="col-sm-8"><input type="file" class="form-control" name="cv" placeholder="CV" value=""></div>
              </div>
              <div class="form-group">
              <div class="row">
              <label class="col-sm-3 control-label text-right">Surat Pengantar: <span class="text-red">*</span></label>         
              <div class="col-sm-8"><input type="file" class="form-control" name="SUKET" placeholder="Surat Pengantar" value=""></div>
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
</div>
				</div><!-- modal insert close -->	
				
        <a href="#" name="Edit" data-toggle="modal" data-target="#editProfile" class="btn btn-success form-control">Edit Data Profile</a>
</div>		
			
			
<!-- edit Modal-->
<div class="">
  <div id="editProfile" class="modal fade" role="dialog" style="display:none;">
    <div class="modal-dialog"> 
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
          <h3 class="modal-title"></h3>
        </div>
        <div class="modal-body">
         <form action="proses_admin.php?act=updatedatauser" method="POST" enctype="multipart/form-data">
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
</div><!-- modal edit close -->
			
      <!-- /.container-fluid -->

      <!-- Sticky Footer -->
      <footer class="sticky-footer">
        <div class="container my-auto">
          <div class="copyright text-center my-auto">
            <span>Copyright ©  2019</span>
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
