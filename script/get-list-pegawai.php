<?php

include './connection.php';

$query = "SELECT * FROM `calon_pegawai`;";
$result = "";

$queryResult = mysqli_query($conn, $query);

if (mysqli_num_rows($queryResult) > 0){
    while($row = mysqli_fetch_assoc($queryResult)){
        $id_posisi = $row['posisi_yang_dilamar'];
        $data_posisi = mysqli_fetch_assoc(mysqli_query($conn, "SELECT * FROM `kepegawaian`.`posisi` WHERE `id_posisi` = '$id_posisi'"));

        $result = $result."
            <tr>
                <td class=\"bg-transparent\">".$row['nik']."</td>
                <td class=\"bg-transparent\">".$row['nama']."</td>
                <td class=\"bg-transparent\">".$row['alamat']."</td>
                <td class=\"bg-transparent\">".$data_posisi['posisi']."</td>
                <td class=\"bg-transparent\">".$row['tahun_lulus']."</td>
                <td class=\"bg-transparent\">".$row['pendidikan_terakhir']."</td>
            </tr>
        ";
    }
}

echo $result;
?>