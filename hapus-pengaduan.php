<?php
session_start();

include "../koneksi.php";

if (!isset($_SESSION['admin'])) {
    header("location: ../admin/login.php");
    exit;
}

if (!isset($_GET['id'])) {
    header("location: ../admin/data-pengaduan.php");
    exit;
}

$id_pelaporan = mysqli_real_escape_string($conn, $_GET['id']);

/* hapus dulu dari tabel aspirasi */
mysqli_query($conn, "
    DELETE FROM aspirasi
    WHERE id_pelaporan = '$id_pelaporan'
");

/* lalu hapus dari input_aspirasi */
mysqli_query($conn, "
    DELETE FROM input_aspirasi
    WHERE id_pelaporan = '$id_pelaporan'
");

header("location: ../admin/data-pengaduan.php");
exit;
?>
