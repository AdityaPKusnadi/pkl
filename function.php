<?php
    require 'koneksi.php';
    function register($post){
    	global $konek;
    	$username = $post["username"];
    	$password = $post["password"];
    	$password2 = $post["password2"];

    	$cekuser = mysqli_query($konek,"select * from users where username = '$username'");
        if(mysqli_fetch_assoc($cekuser)){
            echo "<script> alert('Email Sudah Terdaftar'); </script>";
            return false;
        }

        if($password != $password2){
    		echo "<script> alert('Konfirmasi Password Tidak sama'); </script>";
    	}

    		$query= "Insert Into users set username= '$username', password= '$password',lastmodified= now() ";
    		mysqli_query($konek,$query);
    		return mysqli_affected_rows($konek);
    		// echo "<script> alert('Berhasil Daftar'); </script>";
    	
    }

    function query($query){
        global $konek;
        $result = mysqli_query($konek,$query);
        $rows = [];
        while ($row = mysqli_fetch_assoc($result)) {
            $rows[]= $row;
        }
        return $rows;

    }

    // function inputMakan($post){
    //     global $konek;

    //     $nama = $post["nama"];
    //     $tgl_masuk = $post["tgl_msk"];
    //     $tgl_exp = $post["tgl_exp"];

    //     mysqli_query($konek,"insert into tblmakanan set nama='$nama' ,tgl_masuk='$tgl_masuk' ,tgl_exp='$tgl_exp', lastmodified=now() ");
    //     return mysqli_affected_rows($konek);

    //     // echo "<script> alert('Berhasil input'); </script>";
        
    // }