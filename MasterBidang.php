<?php
    session_start();
    require "koneksi.php";
    if($_GET["act"]=="InsertData"){
        $bidang = $_POST["Bidang"];

        $qryBidang = mysqli_query($konek,"insert into kategori_bidang set bidang='$bidang' ");
        if($qryBidang){
            echo "  <script>
            alert('Data Berhasil Disimpan');
            window.location = 'masterNilai.php';
            </script>";
        } else{
            echo "  <script>
            alert('Data Gagal Disimpan');
            window.location = 'masterNilai.php';
            </script>";
        }
    }

    if($_GET["act"]=="UpdateData"){
        $bidang = $_POST["Bidang"];
        $id = $_POST["id"];

        $qryBidang = mysqli_query($konek,"update kategori_bidang set bidang='$bidang' where id_bd='$id' ");
        if($qryBidang){
            echo "  <script>
            alert('Data Berhasil Disimpan');
            window.location = 'masterNilai.php';
            </script>";
        } else{
            echo "  <script>
            alert('Data Gagal Disimpan');
            window.location = 'masterNilai.php';
            </script>";
        }
    }

    if($_GET["act"]=="DeleteData"){
        $id = $_POST["id"];

        $qryBidang = mysqli_query($konek,"delete from kategori_bidang where id_bd='$id' ");
        if($qryBidang){
            echo "  <script>
            alert('Data Berhasil Disimpan');
            window.location = 'masterNilai.php';
            </script>";
        } else{
            echo "  <script>
            alert('Data Gagal Disimpan');
            window.location = 'masterNilai.php';
            </script>";
        }
    }