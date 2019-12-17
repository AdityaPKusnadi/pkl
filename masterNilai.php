<?php
session_start();
if(!isset($_SESSION["login"])){
    header("Location:login.php");
}
require "function.php";
$id = $_SESSION["id"];
$data = query("SELECT * FROM kategori_bidang");
$data2 = query("select * from masternilai");
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
        <a class="nav-link" href="indexAdmin.php">
          <i class="fas fa-fw fa-folder"></i>
          <span>Daftar Pendaftaran</span>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="masternilai.php">
          <i class="fas fa-fw fa-folder"></i>
          <span>Master Nilai</span>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="daftarnilai.php">
          <i class="fas fa-fw fa-folder"></i>
          <span>Penilaian</span>
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
            Master Data Bidang
            <div class="row">
            <a href="#" class="btn btn-success" data-toggle="modal" data-target="#TDataBidang" >Tambah Data</a> &nbsp;
            <a href="#" class="btn btn-primary" id="refreshBidang">Refresh</a>
            </div>
            </div>
          <div class="card-body">
            <div class="table-responsive">
              <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0" id="tableBidang">
                <thead>
                  <tr>
                    <th>No</th>
                    <th>Bidang</th>
                  </tr>
                </thead>
                <tfoot>
                  <tr>
                  <th>No</th>
                    <th>Bidang</th>
                  </tr>
                </tfoot>
                <tbody>
                <?php $i=1; ?>
                <?php foreach($data as $data): ?>
                  <tr>
                    <td><?=$i;?></td>
                    <td><?=$data["bidang"];?></td>
                    <td><a href="#" class="btn btn-danger" data-toggle="modal" data-target="#hapusBidang<?= $i; ?>">Delete</a> &nbsp; 
                    <a href="#" class="btn btn-success" data-toggle="modal" data-target="#editBidang<?= $i;?>">Edit</a></td>
                  </tr>
                  <!-- edit Bidang Modal-->
<div class="example-modal">
  <div id="editBidang<?= $i;?>" class="modal fade" role="dialog" style="display:none;">
    <div class="modal-dialog"> 
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
          <h3 class="modal-title"></h3>
        </div>
        <div class="modal-body">
        <form action="MasterBidang.php?act=UpdateData" method="POST">
        <div class="form-group">
              <input type="hidden" name="id" value="<?= $data["id_bd"]; ?>">
              <div class="row">
              <label class="col-sm-3 control-label text-right">Bidang: <span class="text-red">*</span></label>         
              <div class="col-sm-8"><input type="text" class="form-control" name="Bidang" placeholder="Bidang" value="<?= $data["bidang"]; ?>"></div>
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
</div><!-- modal edit bidang close -->
<!-- edit Bidang Modal-->
<div class="example-modal">
  <div id="hapusBidang<?= $i;?>" class="modal fade" role="dialog" style="display:none;">
    <div class="modal-dialog"> 
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
          <h3 class="modal-title"></h3>
        </div>
        <div class="modal-body">
        <form action="MasterBidang.php?act=DeleteData" method="POST">
        <div class="form-group">
              <input type="hidden" name="id" value="<?= $data["id_bd"]; ?>">
              <div class="row">
              <h3>Anda Yakin Hapus Data?</h3>
              </div>
              <div class="modal-footer">
              <button id="nosave" type="button" class="btn btn-danger pull-left" data-dismiss="modal">Batal</button>
              <input type="submit" name="submit" class="btn btn-primary" value="YA">
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
</div><!-- modal edit bidang close -->

                  <?php $i++ ?>
                  <?php endforeach; ?>
                </tbody>
              </table>
            </div>
          </div>
          <div class="card-footer small text-muted">Updated yesterday at 11:59 PM</div>
        </div>
        <div class="card mb-3">
          <div class="card-header">
            <i class="fas fa-table"></i>
            Master Data Aspek
            <div class="row">
            <a href="#" class="btn btn-success" data-toggle="modal" data-target="#TDataAspek">Tambah Data</a> &nbsp;
            <a href="#" class="btn btn-primary" id="refreshAspek">Refresh</a>
            </div>
            </div>
          <div class="card-body">
            <div class="table-responsive">
              <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0" id="tableAspek">
                <thead>
                  <tr>
                    <th>No</th>
                    <th>Penilaian</th>
                  </tr>
                </thead>
                <tfoot>
                  <tr>
                  <th>No</th>
                    <th>Penilaian</th>
                  </tr>
                </tfoot>
                <tbody>
                <?php $i=1; ?>
                <?php foreach($data2 as $data2): ?>
                  <tr>
                    <td><?= $i; ?></td>
                    <td><?= $data2["aspek"]; ?></td>
                    <td><a href="#" class="btn btn-danger" data-toggle="modal" data-target="#hapusAspek<?= $i;?>">Delete</a> &nbsp; 
                    <a href="#" class="btn btn-success" data-toggle="modal" data-target="#editAspek<?= $i;?>">Edit</a></td>
                  </tr>
                  <!-- edit ASPEK Modal-->
<div class="example-modal">
  <div id="editAspek<?= $i;?>" class="modal fade" role="dialog" style="display:none;">
    <div class="modal-dialog"> 
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
          <h3 class="modal-title"></h3>
        </div>
        <div class="modal-body">
        <form action="MasterAspek.php?act=UpdateData" method="POST">
        <div class="form-group">
              <input type="hidden" name="id" value="<?= $data2["id_nilai"]; ?>">
              <div class="row">
              <label class="col-sm-3 control-label text-right">Aspek: <span class="text-red">*</span></label>         
              <div class="col-sm-8"><input type="text" class="form-control" name="aspek" placeholder="Aspek" value="<?= $data2["aspek"]; ?>"></div>
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
</div><!-- modal edit ASPEK close -->
<!-- edit ASPEK Modal-->
<div class="example-modal">
  <div id="hapusAspek<?= $i;?>" class="modal fade" role="dialog" style="display:none;">
    <div class="modal-dialog"> 
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
          <h3 class="modal-title"></h3>
        </div>
        <div class="modal-body">
        <form action="MasterAspek.php?act=DeleteData" method="POST">
        <div class="form-group">
              <input type="hidden" name="id" value="<?= $data2["id_nilai"]; ?>">
              <div class="row">
              <h3>Anda Yakin Hapus Data?</h3>
              </div>
              <div class="modal-footer">
              <button id="nosave" type="button" class="btn btn-danger pull-left" data-dismiss="modal">Batal</button>
              <input type="submit" name="submit" class="btn btn-primary" value="YA">
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
</div><!-- modal edit ASPEK close -->
                  <?php $i++ ?>
                  <?php endforeach; ?>
                  <!-- edit ASPEK Modal-->
<div class="example-modal">
  <div id="editBidang<?= $i;?>" class="modal fade" role="dialog" style="display:none;">
    <div class="modal-dialog"> 
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
          <h3 class="modal-title"></h3>
        </div>
        <div class="modal-body">
        <form action="MasterBidang.php?act=UpdateData" method="POST">
        <div class="form-group">
              <input type="hidden" name="id" value="<?= $data["id_bd"]; ?>">
              <div class="row">
              <label class="col-sm-3 control-label text-right">Bidang: <span class="text-red">*</span></label>         
              <div class="col-sm-8"><input type="text" class="form-control" name="Bidang" placeholder="Bidang" value="<?= $data["bidang"]; ?>"></div>
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
</div><!-- modal edit ASPEK close -->
<!-- edit ASPEK Modal-->
<div class="example-modal">
  <div id="hapusBidang<?= $i;?>" class="modal fade" role="dialog" style="display:none;">
    <div class="modal-dialog"> 
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
          <h3 class="modal-title"></h3>
        </div>
        <div class="modal-body">
        <form action="MasterBidang.php?act=DeleteData" method="POST">
        <div class="form-group">
              <input type="hidden" name="id" value="<?= $data["id_bd"]; ?>">
              <div class="row">
              <h3>Anda Yakin Hapus Data?</h3>
              </div>
              <div class="modal-footer">
              <button id="nosave" type="button" class="btn btn-danger pull-left" data-dismiss="modal">Batal</button>
              <input type="submit" name="submit" class="btn btn-primary" value="YA">
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
</div><!-- modal edit ASPEK close -->
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

<!-- Insert Bidang Modal-->
<div class="example-modal">
  <div id="TDataBidang" class="modal fade" role="dialog" style="display:none;">
    <div class="modal-dialog"> 
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
          <h3 class="modal-title"></h3>
        </div>
        <div class="modal-body">
        <form action="MasterBidang.php?act=InsertData" method="POST">
        <div class="form-group">
              <div class="row">
              <label class="col-sm-3 control-label text-right">Bidang: <span class="text-red">*</span></label>         
              <div class="col-sm-8"><input type="text" class="form-control" name="Bidang" placeholder="Bidang" value=""></div>
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
</div><!-- modal insert close -->

<!-- Insert aspek Modal-->
<div class="example-modal">
  <div id="TDataAspek" class="modal fade" role="dialog" style="display:none;">
    <div class="modal-dialog"> 
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
          <h3 class="modal-title"></h3>
        </div>
        <div class="modal-body">
        <form action="MasterAspek.php?act=InsertData" method="POST">
        <div class="form-group">
              <div class="row">
              <label class="col-sm-3 control-label text-right">Aspek: <span class="text-red">*</span></label>         
              <div class="col-sm-8"><input type="text" class="form-control" name="Aspek" placeholder="Aspek" value=""></div>
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
</div><!-- modal insert close -->

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
  <!-- script refresh -->
  <script type="text/javascript">
    $("#refreshBidang").click(function(){
      $("#tableBidang").load( " #tableBidang");
    });
  </script>
  <script type="text/javascript">
    $("#refreshAspek").click(function(){
      $("#tableAspek").load( " #tableAspek");
    });
  </script>
  <!-- Bootstrap core JavaScript-->
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Core plugin JavaScript-->
  <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

  <!-- Custom scripts for all pages-->
  <script src="js/sb-admin.min.js"></script>

</body>

</html>
