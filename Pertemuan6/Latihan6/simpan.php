<?php
    include "koneksi.php"; //include digunakan untuk menyertakan file php ke dalam program
    include "create_message.php";

    $nama = $_POST['nama'];  //$_POST berfungsi untuk memanggil data yang telah diinputkan agar bisa ditampilkan di file
    $kelas = $_POST['kelas'];
    $alamat = $_POST['alamat'];
    $foto = $_POST['foto'];


    if(isset($_POST['mahasiswa_id'])) {
        $sql = "UPDATE data
                SET nama='$nama', kelas='$kelas', alamat='$alamat', foto='$foto'
                WHERE id=".$_POST['mahasiswa_id'];
        $edit = $conn->query($sql);

        if($edit) {
            $conn->close();
            // pesan ubah data berhasil
            create_message('Ubah data berhasil','success','check');
            header("location:".$_SERVER['HTTP_REFERER']);
            exit();
        } else {
            $conn->close();
            // pesan error
            create_message("Error: " . $sql . "<br>" . $conn->error,"danger","warning");
            header("location:".$_SERVER['HTTP_REFERER']);
            exit();
        }
    } else {
        $sql = "INSERT into data(nama, kelas, alamat, foto)
                VALUES('$nama','$kelas','$alamat', $foto)";
        $add = $conn->query($sql);
        if($add) {
            $conn->close();
            // pesan simpan data berhasil
            create_message('Simpan data berhasil','success','check');
            header("location:".$_SERVER['HTTP_REFERER']);
            exit();
        } else {
            $conn->close();
            // pesan simpan data error
            create_message("Error: " . $sql . "<br>" . $conn->error,"danger","warning");
            header("location:".$_SERVER['HTTP_REFERER']);
            exit();
        }
    }
    ?>