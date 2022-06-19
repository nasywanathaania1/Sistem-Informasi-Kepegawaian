<?php

session_start();

ob_start();

include "./connection.php";

if(isset($_POST['submit'])){
    $user = $_SESSION['username'];
    $nik = trim($_POST['nik']);
    $nama = trim($_POST['nama']);
    $alamat = trim($_POST['alamat']);
    $posisi = $_POST['posisi'];
    $tahun = trim($_POST['tahun-lulus']);
    $pendidikan = $_POST['pendidikan-terakhir'];

    // Check If Empty
    if($nik == "" || $nama == "" || $alamat == "" || $tahun == ""){
        echo "<script>window.alert(\"Field Tidak Boleh Kosong\");</script>";
    }else{
        if(!mysqli_query($conn, "UPDATE `calon_pegawai` SET `nik`='$nik',`nama`='$nama',`alamat`='$alamat',`posisi_yang_dilamar`='$posisi',`tahun_lulus`='$tahun',`pendidikan_terakhir`='$pendidikan' WHERE `username`='$user';")){
            echo "<script>window.alert(\"Update Gagal\");</script>";
        }else{
            echo "<script>window.alert(\"Update Sukses\");</script>";
        }
    }

    header("refresh:0;url=./home.php");
    // var_dump(mysqli_num_rows(mysqli_query($conn, "SELECT * FROM `akun` WHERE `username`='$user';")));
}