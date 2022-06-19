<?php

session_start();
include './connection.php';

$role = $_SESSION['role'];

if($role == "calon"){
    $query = "SELECT * FROM `agenda` WHERE `tanggal` > CAST(CURRENT_TIMESTAMP AS DATE) ORDER BY `tanggal` ASC;";
}else if($role == "hrd"){
    $query = "SELECT * FROM `agenda` ORDER BY `tanggal` ASC;";
}

$result = "";

$queryResult = mysqli_query($conn, $query);

if (mysqli_num_rows($queryResult) > 0){
    while($row = mysqli_fetch_assoc($queryResult)){
        $result = $result."
            <tr>
                <td class=\"bg-transparent\">".date_format(date_create($row['tanggal']), "d F Y")."</td>
                <td class=\"bg-transparent\">".date_format(date_create($row['waktu']), "H:i")."</td>
                <td class=\"bg-transparent\">".$row['agenda']."</td>
                <td class=\"bg-transparent\">".$row['keterangan']."</td>
                <td class=\"bg-transparent modifier-button\">
                    <button type=\"button\" class=\"btn btn-primary w-100\" onClick=\"edit_agenda(".$row['id_agenda'].")\">Edit</button>
                    <button type=\"button\" class=\"btn btn-danger w-100 mt-1\" onClick=\"hapus_agenda(".$row['id_agenda'].")\">Hapus</button>
                </td>
            </tr>
        ";
    }
}

echo $result;
?>