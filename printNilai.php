<?php
require "function.php";
$id=$_GET["idmhs"];
$data=query("select * from penilaiandet pd left join penilaian p on pd.id_p=p.id_p left join mahasiswa mhs on p.id_mhs=mhs.id_mhs where p.id_mhs='$id' ");
?>
<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Laporan</title>

  <!-- Custom fonts for this template-->
  <link href="../../vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">

  <!-- Page level plugin CSS-->
  <link href="../../vendor/datatables/dataTables.bootstrap4.css" rel="stylesheet">

  <!-- Custom styles for this template-->
  <link href="../../css/sb-admin.css" rel="stylesheet">

</head>

<body id="page-top">
	<!-- DataTables Example -->
        <div class="card mb-3">
          <div class="card-header">
            <i class="fas fa-table"></i>
						<?php
						$data2 = query("select * from penilaiandet pd left join penilaian p on pd.id_p=p.id_p left join mahasiswa mhs on p.id_mhs=mhs.id_mhs where p.id_mhs='$id' limit 1");
						foreach($data2 as $mhs){
								echo "Nilai Mahasiswa <br>
						Nama Mahasiswa:".$mhs['nama']." <br>
						Asal Sekolah:".$mhs['asal_sekolah']."<br>";
								} ?>
					</div>
          <div class="card-body">
            <div class="table-responsive">
              <table class="table table-bordered" id="" width="100%" cellspacing="0">
                <thead>
                  <tr>
                    <th>Aspek</th>
                    <th>Nilai</th>
                  </tr>
                </thead>
                <tbody>
									<?php foreach($data as $data): ?>
                  <tr>
										<td><?= $data['aspek'] ?></td>
										<td><?= $data['nilai'] ?></td>
									</tr>
									<?php endforeach; ?>
                </tbody>
              </table>
            </div>
          </div>

  <!-- Bootstrap core JavaScript-->
					<script>window.print();</script>
  <script src="../../vendor/jquery/jquery.min.js"></script>
  <script src="../../vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Core plugin JavaScript-->
  <script src="../../vendor/jquery-easing/jquery.easing.min.js"></script>

  <!-- Page level plugin JavaScript-->
  <script src="../../vendor/datatables/jquery.dataTables.js"></script>
  <script src="../../vendor/datatables/dataTables.bootstrap4.js"></script>

  <!-- Custom scripts for all pages-->
  <script src="../../js/sb-admin.min.js"></script>

  <!-- Demo scripts for this page-->
  <script src="../../js/demo/datatables-demo.js"></script>

</body>

</html>
