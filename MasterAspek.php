<?php
    session_start();
    require "function.php";
    if($_GET["act"]=="InsertData"){
        $aspek = $_POST["Aspek"];

        $qyrAspek=mysqli_query($konek,"insert into masternilai set aspek='$aspek'");

        if($qyrAspek){
            echo "  <script>
            alert('Data Berhasil Disimpan');
            window.location = 'masterNilai.php';
            </script>";
        }else{
            echo "  <script>
            alert('Data Gagal Disimpan');
            window.location = 'masterNilai.php';
            </script>";
        }
    }

    if($_GET["act"]=="UpdateData"){
        $bidang = $_POST["aspek"];
        $id = $_POST["id"];

        $qryBidang = mysqli_query($konek,"update masternilai set aspek='$bidang' where id_nilai='$id' ");
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

        $qryBidang = mysqli_query($konek,"delete from masternilai where id_nilai='$id' ");
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