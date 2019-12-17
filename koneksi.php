<?php
    $username = "root";
    $password = "root";
    $server   = "localhost";
    $database = "pkl";

   $konek = mysqli_connect($server,$username,$password,$database);

   //check koneksi
   if(mysqli_connect_errno()){
       echo "Koneksi database gagal :" . mysqli_connect_error();
   }