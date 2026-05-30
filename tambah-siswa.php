<?php 
session_start();

if (!isset($_SESSION['admin'])) {
    header("location: ../admin/login.php");
    exit;
}

include "../koneksi.php";

// Cek tombol submit
if (!isset($_POST['simpan'])) {
    header("location: ../admin/tambah-siswa.php");
    exit;
}

// Ambil data dari form
$nama  = mysqli_real_escape_string($conn, $_POST['nama']);
$nis   = mysqli_real_escape_string($conn, $_POST['nis']);
$kelas = mysqli_real_escape_string($conn, $_POST['kelas']);

// Cek NIS sudah ada atau belum
$cek = mysqli_query($conn, "SELECT * FROM siswa WHERE nis='$nis'");
if (mysqli_num_rows($cek) > 0) {
    $_SESSION['errors'] = "NIS sudah terdaftar!";
    header("location: ../admin/tambah-siswa.php");
    exit;
}

// Simpan ke database
$simpan = mysqli_query($conn, "
    INSERT INTO siswa (nama, nis, kelas)
    VALUES ('$nama', '$nis', '$kelas')
");

// Feedback
if ($simpan){
    $_SESSION['success'] = "Data siswa berhasil disimpan!";
} else {
    $_SESSION['errors'] = "Gagal menyimpan data!";
}

header("location: ../admin/tambah-siswa.php");
exit;
?>