<?php 
session_start();  
include "../koneksi.php";  

if (!isset($_SESSION['admin'])) {
    header("location: login.php");
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<link rel="stylesheet" href="../assets/bootstrap/css/bootstrap.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">

<title>Dashboard Admin</title>

<style>
body {
    margin: 0;
    font-family: 'Poppins', sans-serif;

    /* BACKGROUND SEKOLAH LEBIH JELAS */
    background: url("../assets/img/bg-sekolah.jpg") no-repeat center center fixed;
    background-size: cover;
}

/* overlay dibuat lebih ringan biar bg keliatan */
body::before {
    content: "";
    position: fixed;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;

    /* lebih transparan dari sebelumnya */
    background: rgba(241,245,249,0.55);

    z-index: -1;
}

/* LAYOUT */
.wrapper {
    display: flex;
}

/* SIDEBAR */
.sidebar {
    width: 240px;
    height: 100vh;
    background: #1e293b;
    padding: 25px 20px;
    color: white;
    position: fixed;
}

/* LOGO */
.logo-box {
    display: flex;
    align-items: center;
    gap: 10px;
    margin-bottom: 30px;
}

.logo-box img {
    width: 38px;
    height: 38px;
    object-fit: contain; 
    border-radius: 8px;
}

.logo-box span {
    font-size: 18px;
    font-weight: 600;
}

/* MENU */
.sidebar a {
    display: block;
    color: #cbd5f5;
    text-decoration: none;
    margin-bottom: 15px;
    padding: 10px 12px;
    border-radius: 10px;
    transition: 0.3s;
}

.sidebar a:hover {
    background: #334155;
    color: white;
}

/* CONTENT */
.content {
    margin-left: 240px;
    padding: 30px;
    width: 100%;
}

/* GREETING */
.greeting-box {
    background: white;
    padding: 20px;
    border-radius: 15px;
    box-shadow: 0 6px 15px rgba(0,0,0,0.05);
    margin-bottom: 25px;
}

/* GRID */
.grid {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(220px,1fr));
    gap: 20px;
}

/* CARD */
.card-box {
    border-radius: 15px;
    padding: 20px;
    transition: 0.3s;
    box-shadow: 0 8px 20px rgba(0,0,0,0.05);
}

.card-box:hover {
    transform: translateY(-5px);
}

/* COLORS */
.card-1 { background:#eef2ff; color:#4338ca; }
.card-2 { background:#ecfeff; color:#0891b2; }
.card-3 { background:#f0fdf4; color:#16a34a; }
.card-4 { background:#fff7ed; color:#ea580c; }

.card-box i {
    font-size: 20px;
    margin-bottom: 10px;
}

.card-box h6 {
    margin: 0;
    font-weight: 600;
}

.card-box p {
    font-size: 13px;
    color: #64748b;
    margin-top: 5px;
}

.btn-custom {
    margin-top: 10px;
    font-size: 12px;
    border-radius: 8px;
    padding: 5px 10px;
}
</style>

</head>
<body>

<div class="wrapper">

    <div class="sidebar">

        <div class="logo-box">
            <img src="../assets/img/alka.png" alt="Logo Sekolah">
            <span>LAPOR ALKA</span>
        </div>

        <a href="#"><i class="fa-solid fa-house"></i> Dashboard</a>
        <a href="data-pengaduan.php"><i class="fa-solid fa-comment"></i>Pengaduan</a>
        <a href="kategori.php"><i class="fa-solid fa-list"></i>Kategori</a>
        <a href="tambah-siswa.php"><i class="fa-solid fa-user"></i> Siswa</a>
        <a href="laporan.php"><i class="fa-solid fa-chart-column"></i> Laporan</a>

        <hr style="border-color:#334155;">

        <a href="../proses/logout.php">
            <i class="fa-solid fa-right-from-bracket"></i> Logout
        </a>
    </div>

    <div class="content">

        <div class="greeting-box">
            <h5>Hi, <?= $_SESSION['admin']; ?> 👋</h5>
            <p>Welcome back! Manage your system easily today.</p>
        </div>

        <div class="grid">

            <div class="card-box card-1">
                <i class="fa-solid fa-comment"></i>
                <h6>Data Pengaduan</h6>
                <p>Kelola laporan siswa</p>
                <a href="data-pengaduan.php" class="btn btn-light btn-sm btn-custom">Kelola</a>
            </div>

            <div class="card-box card-2">
                <i class="fa-solid fa-list"></i>
                <h6>Kategori</h6>
                <p>Atur kategori</p>
                <a href="kategori.php" class="btn btn-light btn-sm btn-custom">Kelola</a>
            </div>

            <div class="card-box card-3">
                <i class="fa-solid fa-user"></i>
                <h6>Akun Siswa</h6>
                <p>Manajemen akun</p>
                <a href="tambah-siswa.php" class="btn btn-light btn-sm btn-custom">Tambah</a>
            </div>

            <div class="card-box card-4">
                <i class="fa-solid fa-chart-column"></i>
                <h6>Laporan</h6>
                <p>Rekap data</p>
                <a href="laporan.php" class="btn btn-light btn-sm btn-custom">Lihat</a>
            </div>

        </div>

    </div>

</div>

<script src="../assets/bootstrap/js/bootstrap.bundle.min.js"></script>

</body>
</html>