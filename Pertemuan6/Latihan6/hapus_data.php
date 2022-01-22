<?php
    include "koneksi.php";
    include "create_message.php";

    // query sql hapus data
    $sql = "DELETE from data where id=".$_GET['mahasiswa_id'];
    if ($conn->query($sql) === TRUE) {
        $conn->close();
        // menghapus data pesan yang berhasil
        create_message('Hapus data berhasil','success','check');
        header("location:index.php");
        exit();
    } else {
        $conn->close();
        // menghapus data pesan yang error
        create_message("Error: " . $sql . "<br>" . $conn->error,"danger","warning");
        header("location:index.php");
        exit();
    }
?>