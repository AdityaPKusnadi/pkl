<?php
require "updategambar.php";
require "koneksi.php";
	if(isset($_REQUEST["suket"])){
    // Get parameters
    $file = $_GET["suket"]; // Decode URL-encoded string
// 		var_dump($file);
// 		die;
    $filepath = "SUKET/" . $file;
    
    // Process download
    if(file_exists($filepath)) {
        header('Content-Description: File Transfer');
        header('Content-Type: application/octet-stream');
        header('Content-Disposition: attachment; filename="'.basename($filepath).'"');
        header('Expires: 0');
        header('Cache-Control: must-revalidate');
        header('Pragma: public');
        header('Content-Length: ' . filesize($filepath));
        flush(); // Flush system output buffer
        readfile($filepath);
        exit;
    }
}

if(isset($_REQUEST["cv"])){
    // Get parameters
    $file = $_GET["cv"]; // Decode URL-encoded string
    $filepath = "cv/" . $file;
// 		var_dump($files);
// 		die;
    
    // Process download
    if(file_exists($filepath)) {
        header('Content-Description: File Transfer');
        header('Content-Type: application/octet-stream');
        header('Content-Disposition: attachment; filename="'.basename($filepath).'"');
        header('Expires: 0');
        header('Cache-Control: must-revalidate');
        header('Pragma: public');
        header('Content-Length: ' . filesize($filepath));
        flush(); // Flush system output buffer
        readfile($filepath);
        exit;
    }
}

if($_GET["act"]=="updatedata"){
	$nama = $_POST["nama"];
    $alamat = $_POST["alamat"];
    $asekolah = $_POST["a_sekolah"];
    $tglLahir = $_POST["tglLahir"];
    $telp = $_POST["telp"];
    $email = $_POST["email"];
    $id = $_POST["id_pendaftaran"];
		$fotolama = $_POST["fotolama"];
		$cvlama = $_POST["cvlama"];
		$suketlama = $_POST["suketlama"];
	
		if($_FILES['foto']['error']){
			$foto = $fotolama;
		} else {
			uploadfoto();
		}
	
		if($_FILES['cv']['error']){
			$cv = $cvlama;
		} else {
			uploadcv();
		}
	
		if($_FILES['SUKET']['error']){
			$suket = $suketlama;
		} else {
			uploadsuket();
		}
// 	var_dump($id);
// 	die;
            $query = "update mahasiswa set nama='$nama',alamat='$alamat',telp='$telp',usia='$tglLahir',email='$email',
            asal_sekolah='$asekolah',foto_mhs='$foto',cv='$cv',suket='$suket' 
						where id_mhs='$id' ";
	
						$qryupdate= mysqli_query($konek,$query);
	
					 if($qryupdate){
						echo "
						<script> 
						alert('Data Berhasil Disimpan');
						window.location= 'indexAdmin.php';
						</script>
						
						";
						 
					 }else {
						echo "
						<script> 
						alert('Data Gagal Disimpan');
						window.location= indexAdmin.php;
						</script>
						";
					 }
	
	
}

if($_GET["act"]=="updatedatause"){
	$nama = $_POST["nama"];
    $alamat = $_POST["alamat"];
    $asekolah = $_POST["a_sekolah"];
    $tglLahir = $_POST["tglLahir"];
    $telp = $_POST["telp"];
    $email = $_POST["email"];
    $id = $_POST["id_pendaftaran"];
		$fotolama = $_POST["fotolama"];
		$cvlama = $_POST["cvlama"];
		$suketlama = $_POST["suketlama"];
	
		if($_FILES['foto']['error']){
			$foto = $fotolama;
		} else {
			uploadfoto();
		}
	
		if($_FILES['cv']['error']){
			$cv = $cvlama;
		} else {
			uploadcv();
		}
	
		if($_FILES['SUKET']['error']){
			$suket = $suketlama;
		} else {
			uploadsuket();
		}
// 	var_dump($id);
// 	die;
            $query = "update mahasiswa set nama='$nama',alamat='$alamat',telp='$telp',usia='$tglLahir',email='$email',
            asal_sekolah='$asekolah',foto_mhs='$foto',cv='$cv',suket='$suket' 
						where id_mhs='$id' ";
	
						$qryupdate= mysqli_query($konek,$query);
	
					 if($qryupdate){
						echo "
						<script> 
						alert('Data Berhasil Disimpan');
						window.location= 'index.php';
						</script>
						
						";
						 
					 }else {
						echo "
						<script> 
						alert('Data Gagal Disimpan');
						window.location= index.php;
						</script>
						";
					 }
	
	
}

if($_GET["act"]=="delete"){
	$id = $_GET["id"];
	
	$qryDel = mysqli_query($konek,"Delete from mahasiswa where id_mhs='$id'");
	
	if($qryDel){
		echo "<script>alert('Data Terhapus');window.location='indexAdmin.php';</script>";
	}else{
		echo "<script>alert('Data Gagal Terhapus');window.location='indexAdmin.php';</script>";
	}
}