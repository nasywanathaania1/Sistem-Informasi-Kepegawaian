<?php

ob_start();

include "./connection.php";

if(isset($_POST['submit'])){
    $user = mysqli_real_escape_string($conn, str_replace(' ','',$_POST['username']));
    $pass = mysqli_real_escape_string($conn, str_replace(' ','',$_POST['password']));
    $pass_re = mysqli_real_escape_string($conn, str_replace(' ','',$_POST['password-re']));
    $nik = trim($_POST['nik']);
    $nama = trim($_POST['nama']);
    $alamat = trim($_POST['alamat']);
    $posisi = $_POST['posisi'];
    $tahun = trim($_POST['tahun-lulus']);
    $pendidikan = $_POST['pendidikan-terakhir'];

    // Check If Empty
    if($user == "" || $pass == "" || $pass_re == "" || $nik == "" || $nama == "" || $alamat == "" || $tahun == ""){
        echo "<script>window.alert(\"Field Tidak Boleh Kosong\");</script>";
    }else{
        // Check If Password and Password-Re are different
        if($pass != $pass_re){
            echo "<script>window.alert(\"Password Harus Sama\");</script>";
        }else{
            // Check If Username Exist
            if(mysqli_num_rows(mysqli_query($conn, "SELECT * FROM `akun` WHERE `username`='$user';")) != 0){
                echo "<script>window.alert(\"Username Sudah Ada\");</script>";
            }else{
                $pass = password_hash($pass, PASSWORD_DEFAULT);
                if(!mysqli_query($conn, "INSERT INTO `akun` VALUES ('$user', '$pass', 'calon');")){
                    echo "<script>window.alert(\"Register Gagal\");</script>";
                }else{
                    if(!mysqli_query($conn, "INSERT INTO `calon_pegawai`(`nik`, `nama`, `alamat`, `posisi_yang_dilamar`, `tahun_lulus`, `pendidikan_terakhir`, `username`) VALUES ('$nik', '$nama', '$alamat', '$posisi', '$tahun', '$pendidikan', '$user');")){
                        mysqli_query($conn, "DELETE FROM `akun` WHERE username='$user';");
                        echo "<script>window.alert(\"Register Gagal\");</script>";
                    }else{
                        echo "<script>window.alert(\"Register Sukses\");</script>";
                    }
                    // var_dump("INSERT INTO `calon_pegawai`(`nik`, `nama`, `alamat`, `posisi_yang_dilamar`, `tahun_lulus`, `pendidikan_terakhir`, `username`) VALUES ('$nik', '$nama', '$alamat', '$posisi', '$tahun', '$pendidikan', '$user');");
                }
            }
        }
    }

    header("refresh:0;url=../index.php");
    // var_dump(mysqli_num_rows(mysqli_query($conn, "SELECT * FROM `akun` WHERE `username`='$user';")));
}