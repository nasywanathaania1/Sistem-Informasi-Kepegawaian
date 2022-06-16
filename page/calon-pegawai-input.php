<?php

ob_start();

session_start();

if(!(isset($_SESSION['role']) && isset($_SESSION['username']))){
    header("location: ../index.php");
}else{
    if($_SESSION['role'] != "calon"){
        header("location: ../index.php");
    }else{
        include "../script/connection.php";

        $user = $_SESSION['username'];
        $data = mysqli_fetch_assoc(mysqli_query($conn, "SELECT * FROM `calon_pegawai` WHERE `username`='$user';"));
    }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kepegawaian | Register</title>
    <link rel="shortcut icon" href="https://radarlampung.disway.id/assets/favicon.ico" type="image/x-icon">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
    <link rel="stylesheet" href="../style/layout.css">
    <link rel="stylesheet" href="../style/style.css">
    <link rel="stylesheet" href="../style/font.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>
    <script src="../script/script.js"></script>
</head>
<body class="d-flex flex-column align-items-center p-2">
    <div class="card login-box" style="width: 30rem;">
        <img src="https://images.pexels.com/photos/1036808/pexels-photo-1036808.jpeg?cs=srgb&dl=pexels-dominika-roseclay-1036808.jpg&fm=jpg&w=640&h=410" class="card-img-top" height="250px">
        <div class="card-body">
            <h5 class="card-title">Update Account</h5>
            <p class="card-text">
                <form method="post" action="../script/update-calon-pegawai-account.php">
                    <div class="mb-3">
                        <label for="nik" class="form-label">NIK</label>
                        <input type="number" class="form-control" id="nik" name="nik" value="<?= $data['nik'] ?>" required>
                    </div>
                    <div class="mb-3">
                        <label for="nama" class="form-label">Nama</label>
                        <input type="text" class="form-control" id="nama" name="nama" value="<?= $data['nama'] ?>" required>
                    </div>
                    <div class="mb-3">
                        <label for="alamat" class="form-label">Alamat</label>
                        <textarea class="form-control" id="alamat" name="alamat" rows="3"><?= $data['alamat'] ?></textarea>
                    </div>
                    <div class="mb-3">
                        <label for="posisi" class="form-label">Posisi yang Dilamar</label>
                        <select class="form-select" id="posisi" name="posisi" aria-label="Default select example">
                            
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="tahun-lulus" class="form-label">Tahun Lulus</label>
                        <input type="number" class="form-control" id="tahun-lulus" name="tahun-lulus" value="<?= $data['tahun_lulus'] ?>" required>
                    </div>
                    <div class="mb-3">
                        <label for="pendidikan-terakhir" class="form-label">Pendidikan Terakhir</label>
                        <select class="form-select" id="pendidikan-terakhir" name="pendidikan-terakhir" aria-label="Default select example">
                            <option value="SD" <?php if($data['pendidikan_terakhir'] == "SD"){echo "selected";} ?>>SD</option>
                            <option value="SMP" <?php if($data['pendidikan_terakhir'] == "SMP"){echo "selected";} ?>>SMP</option>
                            <option value="SMA" <?php if($data['pendidikan_terakhir'] == "SMA"){echo "selected";} ?>>SMA</option>
                            <option value="S1" <?php if($data['pendidikan_terakhir'] == "S1"){echo "selected";} ?>>S1</option>
                            <option value="S2" <?php if($data['pendidikan_terakhir'] == "S2"){echo "selected";} ?>>S2</option>
                            <option value="S3" <?php if($data['pendidikan_terakhir'] == "S3"){echo "selected";} ?>>S3</option>
                        </select>
                    </div>
                    <button type="submit" class="btn btn-primary" name="submit">Submit</button>
                </form>
            </p>
        </div>
    </div>

    <script>
        load_posisi_available("edit");
    </script>
</body>
</html>