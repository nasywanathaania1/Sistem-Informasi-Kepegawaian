<?php

ob_start();

include "./connection.php";

if(isset($_POST['submit'])){
    $date = $_POST['agenda-date'];
    $time = $_POST['agenda-time'];
    $title = trim($_POST['agenda-title']);
    $detail = trim($_POST['agenda-detail']);

    // Check If Empty
    if($date == "" || $time == "" || $title == "" || $detail == ""){
        echo "<script>window.alert(\"Field Tidak Boleh Kosong\");</script>";
    }else{
        if(!mysqli_query($conn, "INSERT INTO `agenda`(`id_agenda`, `tanggal`, `waktu`, `agenda`, `keterangan`) VALUES (NULL,'$date','$time','$title','$detail');")){
            echo "<script>window.alert(\"Input Gagal\");</script>";
        }else{
            echo "<script>window.alert(\"Input Sukses\");</script>";
        }
    }

    header("refresh:0;url=../page/input-agenda.php");
}