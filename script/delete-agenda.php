<?php

include './connection.php';

$key = $_GET['key'];

$query = "DELETE FROM `agenda` WHERE `id_agenda`='$key';;";

$queryResult = mysqli_query($conn, $query);

if($queryResult){
    echo "<script>window.alert(\"Hapus Sukses\")</script>";
}else{
    echo "<script>window.alert(\"Hapus Gagal\")</script>";
}

header("location: ../page/list-agenda.php");
?>