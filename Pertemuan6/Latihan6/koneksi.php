<?php //mengakses layanan web
    $host = "localhost";
    $user = "root";
    $pass = "";
    $dbname = "php_crud";

    $conn = new mysqli($host,$user,$pass,$dbname); //$conn adalah nama variabel penampung status hasil koneksi kepada database.

    if($conn->connect_error) {
        die('Koneksi Gagal : '. $conn->connect_error);
    }
?>