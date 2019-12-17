<?php 
require 'function.php';
require 'koneksi.php';
 ?>
 <!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Tambah Penilaian</title>

  <!-- Custom fonts for this template-->
  <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">

  <!-- Page level plugin CSS-->
  <link href="vendor/datatables/dataTables.bootstrap4.css" rel="stylesheet">

  <!-- Custom styles for this template-->
  <link href="css/sb-admin.css" rel="stylesheet">
	
	<link rel="stylesheet" href="http://code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">
  <script src="http://code.jquery.com/jquery-1.10.2.js"></script>
  <script src="http://code.jquery.com/ui/1.11.4/jquery-ui.js"></script>
</head>

<body id="page-top">

  <nav class="navbar navbar-expand navbar-dark bg-dark static-top">

    <a class="navbar-brand mr-1" href="index.php">STMIK AMIK BANDUNG</a>

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
            <a href="#">Dashboard</a>
          </li>
          <li class="breadcrumb-item active">Tables</li>
        </ol>
        <!-- input data dari sini -->
        <form method="post" action='proses_nilai.php?act=insert'>
        <div class="form-group">
        	<div class="row">
        		<label class="col-sm-2 control-label text-right">ID Nilai: <span class="text-red">*</span></label>
        		<div class="col-sm-3">
        			<input type="text" name="id" class="form-control" value="<?php echo 'N'.date('Ymds') ?>">
        		</div>
        	</div>
        	<div class="row">
        		<label class="col-sm-2 control-label text-right">Nama Mhs: <span class="text-red">*</span></label>
        		<div class="col-sm-3">
        			<input type="text" name="nama" class="form-control" id="mhsid">
        		</div>
        		<label class="col-sm-2 control-label text-right">Bidang: <span class="text-red">*</span></label>
        		<div class="col-sm-3">
        			<select name="jurusan" class="form-control">
        				<?php $bidang = query("select * from kategori_bidang"); ?>
        				<?php foreach ($bidang as $bidang):?>
        				<option value="<?php echo $bidang['id_bd']; ?>"><?php echo $bidang["bidang"]; ?></option>
        				<?php endforeach;?>
        			</select>
        		</div>
        	</div>
        </div>
        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
        	<div class="card mb-3">
					<thead>
        	<tr>
        		<th>No.</th>
        		<th>Aspek Nilai</th>
        		<th>Nilai</th>
        	</tr>
						</thead>
						<tbody>
        	<?php $i=1; ?>
        	<?php $aspek = query("select * from masternilai");	?>
        	<?php foreach ($aspek as $aspek):?>
        	<tr>
        		<td><?php echo $i; ?></td>
        		<td>
        			<div class="col-sm-7">
        				<input type="text" name="nama_nilai<?php echo $i; ?>" class="form-control" value="<?= 
    					$aspek['aspek']; ?>">
        			</div>
        		</td>
        		<td>
        			<div class="col-sm-7">
        				<input type="number" class="form-control" name="nilai<?php echo $i; ?>" id="nilai<?php echo $i; ?>" >
        			</div>
        		</td>
        	</tr>
							</tbody>
        	<?php $i++; ?>
        <?php endforeach; ?>
        <?php 
						$hitung2 = mysqli_query($konek,'select * from masternilai');
						$hitung = mysqli_num_rows($hitung2); ?>
        <input type="hidden" name="hitungan" value="<?php echo $hitung; ?>">
        	</div>
        </table>
        <div class="row">
        	<div class="col-sm-1">
				<input type="submit" name="simpan" class="btn btn-success" value="Simpan">
        	</div>
        	<div class="col-sm-2">
        		<a href="#" id="Cancel" class="btn btn-danger"><span><i class="fa fa-ban" aria-hidden="true"></i>
				</span>Batal</a>
        	</div>
					<div class="col-sm-2">
        		<button type="button" id="" class="btn btn-warning" onclick="hitung123()"><i class="fas fa-calculator"></i>
				</span>Kalkulasi</button>
        	</div>
					<div class="col-sm-2">
        		<b>Rata-Rata:</b><input type="text" class="form-control" id="mhsrata" name="mhsrata">
        	</div>
        </div>
    </form>
			<script>
				function hitung123(){
					var nilai1 = document.getElementById("nilai1").value;
					var nilai2 = document.getElementById("nilai2").value;
					var nilai3 = document.getElementById("nilai3").value;
					var nilai4 = document.getElementById("nilai4").value;
					var nilai5 = document.getElementById("nilai5").value;
					var semua = parseInt(nilai1)+parseInt(nilai2)+parseInt(nilai3)+parseInt(nilai4)+parseInt(nilai5);
					var fix =  parseInt(semua) / 5;
					
					document.getElementById("mhsrata").value=fix;
					}
			</script>
    <hr>
        <!-- DataTables Example -->
        <div class="card mb-3">
          <div class="card-header">
            <i class="fas fa-table"></i>
            List Yang Sudah Dinilai</div>
            <div class="row">
            	<div class="col-sm-2"><a href="#" class="btn btn-primary"><span>
            	<i class="fa fa-retweet" aria-hidden="true"></i>
				</span>Refresh</a></div>
            </div>
          <div class="card-body">
            <div class="table-responsive">
              <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                  <tr>
                    <th>ID</th>
                    <th>Nama</th>
                    <th>Bidang</th>
										<th>Rata-Rata Nilai</th>
										<th>Ket</th>
										<th>Aksi</th>
                  </tr>
                </thead>
                <tbody>
                	<?php $i; ?>
                	<?php $penilaian = query("select p.keterangan as keterangan,p.ratanilai as ratanilai,p.id_p as id,kb.bidang as jurusan,mhs.nama as nama from penilaian p left join kategori_bidang kb on (p.id_bd=kb.id_bd) left join mahasiswa mhs on (p.id_mhs=mhs.id_mhs)");
                	foreach ($penilaian as $a):?>
                  <tr>
                    <td><?php echo $a["id"]; ?></td>
                    <td><?php echo $a["nama"]; ?></td>
                    <td><?php echo $a["jurusan"];?></td>
										<td><?php echo $a["ratanilai"];?></td>
										<td><?php echo $a["keterangan"];?></td>
										<td><a href="#" class="btn btn-danger">Hapus</a></td>
                  </tr>
  					<?php $i++;
  					endforeach; ?>
                </tbody>
              </table>
              </form>
            </div>
          </div>
          <div class="card-footer small text-muted">Updated yesterday at 11:59 PM</div>
        </div>

        <p class="small text-center text-muted my-5">
          <em>More table examples coming soon...</em>
        </p>

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

<script>
/*autocomplete muncul setelah user mengetikan minimal2 karakter */
    $(function() {  
        $( "#mhsid" ).autocomplete({
         source: "source.php",  
           minLength:1, 
        });
    });
    </script>

   <!-- Bootstrap core JavaScript-->
<!--   <script src="vendor/jquery/jquery.min.js"></script> -->
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Core plugin JavaScript-->
<!--   <script src="vendor/jquery-easing/jquery.easing.min.js"></script> -->

  <!-- Custom scripts for all pages-->
  <script src="js/sb-admin.min.js"></script>

</body>

</html>
