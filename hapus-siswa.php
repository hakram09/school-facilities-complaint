<?php
include "../koneksi.php";

if (isset($_GET['nis'])) {

    $nis = mysqli_real_escape_string($conn, $_GET['nis']);

    $hapus = mysqli_query($conn, "DELETE FROM siswa WHERE nis='$nis'");

    if ($hapus) {
        header("location: ../admin/tambah-siswa.php?msg=hapus_sukses");
        exit;
    } else {
        echo "Gagal hapus data";
    }

} else {
    echo "NIS tidak ditemukan";
}
?>