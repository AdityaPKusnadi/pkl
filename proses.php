<?php
session_start();
include "koneksi.php";
    $users = $_POST["username"];
    $pass = $_POST["password"];

    //$pass = md5($pass);

    $data = mysqli_query($konek,"Select * from users where username ='$users' and password ='$pass' ");
    $cek = mysqli_num_rows($data);
    $sesi=mysqli_fetch_array($data);
    if($cek > 0){
        $_SESSION["login"] = TRUE;
        $_SESSION["id"] = $sesi["id_users"];
        $_SESSION["username"] = $sesi["username"];
       if($sesi["type"]==1){
        header('Location:indexAdmin.php');
       }elseif($sesi["type"]==0){
        header('Location:index.php');
       }elseif($sesi["type"]==2){
        header('Location:daftarnilaipembimbing.php');
       }
    }else {
        header('Location:login.php?pesan=gagal');
    }