<?php

session_start();
include './connection.php';

$query = "SELECT * FROM `posisi`;";
$result = "";
$status = $_GET["status"];

$queryResult = mysqli_query($conn, $query);

if (mysqli_num_rows($queryResult) > 0){
    while($row = mysqli_fetch_assoc($queryResult)){
        if($status == "input"){
            $result = $result."
                <option value=\"".$row['id_posisi']."\">".$row['posisi']."</option>
            ";
        }else if($status == "edit"){
            $user = $_SESSION['username'];
            $data = mysqli_fetch_assoc(mysqli_query($conn, "SELECT * FROM `calon_pegawai` WHERE `username`='$user';"));

            if($data['posisi_yang_dilamar'] == $row['id_posisi']){
                $result = $result."
                    <option value=\"".$row['id_posisi']."\" selected>".$row['posisi']."</option>
                ";
            }else{
                $result = $result."
                    <option value=\"".$row['id_posisi']."\">".$row['posisi']."</option>
                ";
            }
        }
    }
}

echo $result;
?>