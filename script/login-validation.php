<?php

ob_start();

include "./connection.php";

if(isset($_POST['submit'])){
    $user = mysqli_real_escape_string($conn, str_replace(' ','',$_POST['username']));
    $pass = mysqli_real_escape_string($conn, str_replace(' ','',$_POST['password']));

    $result = mysqli_query($conn, "SELECT * FROM `akun` WHERE `username`='$user';");

    if(mysqli_num_rows($result) > 0){
        $data = mysqli_fetch_assoc($result);
        if(password_verify($pass, $data['password'])){
            session_start();
            $_SESSION['role'] = $data['role'];
            $_SESSION['username'] = $data['username'];

            echo "<script>window.alert(\"Login Sukses\")</script>";
            header("refresh:0;url=../page/home.php");
        }else{
            echo "<script>window.alert(\"Password Salah\")</script>";
            header("refresh:0;url=../index.php");
        }
    }else{
        echo "<script>window.alert(\"Username Salah\")</script>";
        header("refresh:0;url=../index.php");
    }
}

?>