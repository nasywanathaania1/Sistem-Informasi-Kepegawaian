<?php

include "script/connection.php";

$pass = password_hash("admin", PASSWORD_DEFAULT);

mysqli_query($conn, "INSERT INTO `akun` VALUES ('admin', '$pass', 'admin');")

?>