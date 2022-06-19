<?php

session_start();

ob_start();

include "./connection.php";

if(isset($_POST['submit'])){
    $id = $_POST['agenda-id'];
    $date = $_POST['agenda-date'];
    $time = $_POST['agenda-time'];
    $title = trim($_POST['agenda-title']);
    $detail = trim($_POST['agenda-detail']);

    // Check If Empty
    if($date == "" || $time == "" || $title == "" || $detail == ""){
        echo "<script>window.alert(\"Field Tidak Boleh Kosong\");</script>";
    }else{
        if(!mysqli_query($conn, "UPDATE `agenda` SET `tanggal`='$date',`waktu`='$time',`agenda`='$title',`keterangan`='$detail' WHERE `id_agenda`='$id';")){
            echo "<script>window.alert(\"Update Gagal\");</script>";
        }else{
            echo "<script>window.alert(\"Update Sukses\");</script>";
        }
    }

    header("refresh:0;url=../page/list-agenda.php");
    // var_dump(mysqli_num_rows(mysqli_query($conn, "SELECT * FROM `akun` WHERE `username`='$user';")));
}