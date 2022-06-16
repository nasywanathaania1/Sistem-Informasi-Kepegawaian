<?php

ob_start();

session_start();

if(!isset($_SESSION['role'])){
    header("location: ../index.php");
}else{
    if($_SESSION['role'] != "hrd"){
        header("location: ../index.php");
    }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kepegawaian | Profile</title>
    <link rel="shortcut icon" href="https://radarlampung.disway.id/assets/favicon.ico" type="image/x-icon">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
    <link rel="stylesheet" href="../style/layout.css">
    <link rel="stylesheet" href="../style/style.css">
    <link rel="stylesheet" href="../style/font.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>
    <script src="../script/script.js"></script>
</head>
<body>
    <nav class="navbar bg-transparent sticky-top">
        <div class="container-fluid">
            <a data-bs-toggle="offcanvas" href="#offcanvasExample" role="button" aria-controls="offcanvasExample">
                <span class="navbar-toggler-icon"></span>
            </a>
        </div>
    </nav>

    <div class="container" style="margin-left: 100px; margin-top: 50px">
        <p style="font-size: 24px;font-weight: bold;margin-bottom: 20px">List Calon Pegawai</p>
        <table class="table">
            <thead>
                <tr>
                    <th scope="col" class="bg-transparent">NIK</th>
                    <th scope="col" class="bg-transparent">Nama</th>
                    <th scope="col" class="bg-transparent">Alamat</th>
                    <th scope="col" class="bg-transparent">Posisi yang Dilamar</th>
                    <th scope="col" class="bg-transparent">Tahun Lulus</th>
                    <th scope="col" class="bg-transparent">Pendidikan Terakhir</th>
                </tr>
            </thead>
            <tbody class="table-group-divider" id="list-calon-pegawai">
                
            </tbody>
        </table>
    </div>

    <!-- Sidebar Offcanvas -->
    <div class="offcanvas offcanvas-start" tabindex="-1" id="offcanvasExample" aria-labelledby="offcanvasExampleLabel">
        <div class="offcanvas-header">
            <a href="./home.php" class="offcanvas-title" id="offcanvasExampleLabel" style="font-weight: bold;">
                <img src="https://radarlampung.disway.id/assets/logo.png" height="20px" alt="Logo">
            </a>
            <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
        </div>
        <div class="offcanvas-body">
            <div class="mt-3" id="profile">
                <a class="nav-link" href="./profile.php">Profile</a>
                <hr>
            </div>
            <div class="mt-3" id="add-hrd">
                <a class="nav-link" href="./register-hrd.php">Buat Akun HRD</a>
                <hr>
            </div>
            <div class="mt-3" id="list-calon">
                <a class="nav-link" href="./list-pegawai.php">List Calon Pegawai</a>
                <hr>
            </div>
            <div class="mt-3" id="data-calon-input">
                <a class="nav-link" href="./calon-pegawai-input.php">Edit Data</a>
                <hr>
            </div>
            <div class="mt-3">
                <a class="btn btn-danger" href="../script/logout.php" role="button">Logout</a>
            </div>
        </div>
    </div>

    <script>
        home_load("<?= $_SESSION['role'] ?>");
        load_list_pegawai();
    </script>
</body>
</html>