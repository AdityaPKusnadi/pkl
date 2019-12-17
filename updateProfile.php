<?php
session_start();
    require "koneksi.php";
    //retrive data dari form
    if($_GET["act"]=="updatedata"){
    $nama = $_POST["nama"];
    $alamat = $_POST["alamat"];
    $asekolah = $_POST["a_sekolah"];
    $tglLahir = $_POST["tglLahir"];
    $telp = $_POST["telp"];
    $email = $_POST["email"];
    $id_users = $_SESSION["id"];
    // $test = $_FILES["foto"];
    // var_dump($test);
    // die;
        //UNTUK UPLOAD FOTO
            $namafoto = $_FILES['foto']['name'];
            $ukuranfoto = $_FILES['foto']['size'];
            $errorfoto = $_FILES['foto']['error'];
            $tmpfoto = $_FILES['foto']['tmp_name'];

            if ($errorfoto === 4) {
                echo "          <script>
								alert('File Harus Di Pilih');
								</script>";

                return false;
            }

            $ekstensiValid  = ['jpg', 'png', 'jpeg'];
            $ekstensiGambar = explode('.', $namafoto);
            $ekstensiGambar = strtolower(end($ekstensiGambar));

            if (!in_array($ekstensiGambar, $ekstensiValid)) {
                echo "  <script>
						alert('hanya gambar yang bisa di upload');
						</script>";

                return false;
            }

            if ($ukuranfoto > 7000000) {
                echo "  <script>
						alert('Ukuran size gambar terlalu besar');
                        </script>";

                return false;
            }

            $namaBaru = uniqid();
            $namaBaru .= '.';
            $namaBaru .= $ekstensiGambar;

            move_uploaded_file($tmpfoto, 'image/'.$namaBaru);

            //UNTUK UPLOAD CV
            $namacv = $_FILES['cv']['name'];
            $ukurancv = $_FILES['cv']['size'];
            $errorcv = $_FILES['cv']['error'];
            $tmpcv = $_FILES['cv']['tmp_name'];

            if ($errorcv === 4) {
                echo "          <script>
								alert('File Harus Di Pilih');
								</script>";

                return false;
            }

            $ekstensiValidcv  = ['pdf', 'doc', 'docx'];
            $ekstensicv = explode('.', $namacv);
            $ekstensicv = strtolower(end($ekstensicv));

            if (!in_array($ekstensicv, $ekstensiValidcv)) {
                echo "  <script>
						alert('hanya cv yang bisa di upload');
						</script>";

                return false;
            }

            if ($ukurancv > 7000000) {
                echo "  <script>
						alert('Ukuran size cv terlalu besar');
                        </script>";

                return false;
            }

            $namaCVBaru = uniqid();
            $namaCVBaru .= '.';
            $namaCVBaru .= $ekstensicv;

            move_uploaded_file($tmpcv, 'cv/'.$namaCVBaru);

            //UNTUK UPLOAD SUKET
            $namaSUKET = $_FILES['SUKET']['name'];
            $ukuranSUKET = $_FILES['SUKET']['size'];
            $errorSUKET = $_FILES['SUKET']['error'];
            $tmpSUKET = $_FILES['SUKET']['tmp_name'];

            if ($errorSUKET === 4) {
                echo "          <script>
								alert('File Harus Di Pilih');
								</script>";

                return false;
            }

            $ekstensiValidSUKET  = ['pdf', 'doc', 'docx'];
            $ekstensiSUKET = explode('.', $namaSUKET);
            $ekstensiSUKET = strtolower(end($ekstensiSUKET));

            if (!in_array($ekstensiSUKET, $ekstensiValidSUKET)) {
                echo "  <script>
						alert('hanya SUKET yang bisa di upload');
						</script>";

                return false;
            }

            if ($ukuranSUKET > 7000000) {
                echo "  <script>
						alert('Ukuran size SUKET terlalu besar');
                        </script>";

                return false;
            }

            $namaSUKETBaru = uniqid();
            $namaSUKETBaru .= '.';
            $namaSUKETBaru .= $ekstensiSUKET;

            move_uploaded_file($tmpSUKET, 'SUKET/'.$namaSUKETBaru);

            //return $namaBaru;

            $query = "insert into mahasiswa set nama='$nama',alamat='$alamat',telp='$telp',usia='$tglLahir',email='$email',
            asal_sekolah='$asekolah',foto_mhs='$namaBaru',id_users='$id_users',cv='$namaCVBaru',suket='$namaSUKETBaru' ";

    $qryUpdate = mysqli_query($konek,$query);
    if($qryUpdate){
        echo "<script> alert('Data Terupdate');
        window.location = 'profile.php '
        </script>";
    }else{
        echo "<script> alert('Data Tidak Terupdate');
            window.location = 'profile.php '
            </script>";
    }
        }
    