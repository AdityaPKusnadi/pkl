<?php 
require 'koneksi.php';
if($_GET["act"]=="insert"){
	$row = $_POST["hitungan"];
	$id	= $_POST["id"];
	$nama = $_POST["nama"];
	$jurusan = $_POST["jurusan"];
	$ratanilai = $_POST["mhsrata"];
	if($ratanilai >= 90){
		$keterangan = "SANGAT BAIK";
	}elseif($ratanilai >= 80){
		$keterangan = "BAIK";
	}elseif($ratanilai >= 70){
		$keterangan = "CUKUP";
	}elseif($ratanilai <= 60 ){
		$keterangan = "KURANG BAIK";
	}

	$qrymaster = mysqli_query($konek,"insert into penilaian (id_p,id_mhs,id_bd,lastmodified,ratanilai,keterangan) values ('$id','$nama','$jurusan',now(),'$ratanilai','$keterangan' )");

	for ($i=1; $i<$row; $i++){
		$nilai = $_POST['nilai'.$i];
		//$ket = $_POST['ket'.$i];
		$aspek = $_POST['nama_nilai'.$i];
// 		var_dump($aspek,$nilai,$ket,$row);
// 		die;

		$qrydetail = mysqli_query($konek,"insert into penilaiandet (id_p,aspek,nilai) VALUES ('$id','$aspek','$nilai') ");
		// var_dump($aspek,$nilai,$ket);
		// die;
	}

	if($qrymaster and $qrydetail) {
		echo "
			<script> 
				alert('berhasil simpan data');
				window.location = 'daftarnilai.php';
			</script>
			";
	}



}