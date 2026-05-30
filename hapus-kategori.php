<?php
session_start();

include "../koneksi.php";

$id = $_GET['id'];

$cek = mysqli_query($conn, "SELECT * FROM input_aspirasi WHERE id_kategori = '$id'");

if (mysqli_num_rows($cek) > 0) {

    echo "<script>
        alert('Kategori tidak bisa di hapus karena masih di gunakan di data pengaduan! '*
        'Hapus terlebih dahulu data yang terkait dengan kategori ini di data pengaduan');
        window.location='../admin/kategori.php';
        </script>";
        exit;
}

mysqli_query($conn, "DELETE FROM kategori WHERE id_kategori ='$id'");

header("location: ../admin/kategori.php");
exit;
?>