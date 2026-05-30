<?php
session_start();

if (!isset($_SESSION['siswa'])) {
    header("location: ../login-siswa.php");
    exit;
}

$siswa = $_SESSION['siswa'];
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<link rel="stylesheet" href="../assets/bootstrap/css/bootstrap.min.css">
<link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600;700&display=swap" rel="stylesheet">
<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" rel="stylesheet">

<title>Dashboard Siswa</title>

<style>
body{
    font-family:'Inter',sans-serif;
    background:#f4f6f9;
    margin:0;
}

/* SIDEBAR */
.sidebar{
    width:250px;
    height:100vh;
    position:fixed;
    background:#1e293b;
    color:white;
    padding:20px 15px;
    display:flex;
    flex-direction:column;
}

.logo{
    display:flex;
    align-items:center;
    gap:10px;
    margin-bottom:30px;
}

.logo img{
    width:40px;
}

.logo span{
    font-weight:700;
    font-size:18px;
}

.menu a{
    display:flex;
    align-items:center;
    gap:12px;
    padding:12px 15px;
    color:#cbd5f5;
    text-decoration:none;
    border-radius:10px;
    margin-bottom:8px;
    transition:.2s;
}

.menu a:hover{
    background:#334155;
    color:white;
}

.menu i{
    width:18px;
}

/* MAIN */
.main{
    margin-left:250px;
}

/* TOPBAR */
.topbar{
    display:flex;
    justify-content:space-between;
    align-items:center;
    padding:15px 30px;
    background:white;
    border-bottom:1px solid #e5e7eb;
}

.topbar h5{
    margin:0;
}

.topbar .btn{
    background:#ef4444;
    color:white;
    border:none;
    border-radius:8px;
}

/* CONTENT FIX (INI YANG PENTING) */
.container{
    max-width:900px;
}

/* PROFILE */
.profile-card{
    border-radius:15px;
    box-shadow:0 5px 15px rgba(0,0,0,.08);
    padding:25px;
}

/* AVATAR */
.avatar{
    width:55px;
    height:55px;
    border-radius:50%;
    background:#6366f1;
    display:flex;
    align-items:center;
    justify-content:center;
    color:white;
    font-size:20px;
}
</style>
</head>

<body>

<!-- SIDEBAR -->
<div class="sidebar">

    <div class="logo">
        <img src="../assets/logo.png" onerror="this.style.display='none'">
        <span>LAPOR ALKA</span>
    </div>

    <div class="menu">
        <a href="#"><i class="fas fa-home"></i> Dashboard</a>

        <a href="input-pengaduan.php">
            <i class="fas fa-paper-plane"></i> Buat Laporan
        </a>

        <a href="riwayat-pengaduan.php">
            <i class="fas fa-file-alt"></i> Riwayat Laporan
        </a>
    </div>

    <div style="margin-top:auto;">
        <a href="../proses/logout-siswa.php" class="menu">
            <i class="fas fa-sign-out-alt"></i> Logout
        </a>
    </div>

</div>

<div class="main">

<!-- TOPBAR -->
<div class="topbar">
    <h5>👋 Halo, <?= $siswa['nama'] ?></h5>
    
</div>

<div class="container py-4">

    <!-- PROFILE -->
    <div class="profile-card">

        <div class="d-flex align-items-center gap-3">

            <div class="avatar">
                <?= strtoupper(substr($siswa['nama'],0,1)) ?>
            </div>

            <div>
                <h5 class="mb-1"><?= $siswa['nama'] ?></h5>
                <small class="text-muted">
                    NIS: <?= $siswa['nis'] ?> • Kelas <?= $siswa['kelas'] ?>
                </small>
            </div>

        </div>

        <hr>

        <div class="row text-center">
            <div class="col">
                <small class="text-muted">Status</small>
                <p class="mb-0 fw-semibold text-success">Aktif</p>
            </div>

            <div class="col">
                <small class="text-muted">Role</small>
                <p class="mb-0 fw-semibold">Siswa</p>
            </div>

            <div class="col">
                <small class="text-muted">ID</small>
                <p class="mb-0 fw-semibold"><?= substr($siswa['nis'], -3) ?></p>
            </div>
        </div>

    </div>

</div>

</div>

<script src="../assets/bootstrap/js/bootstrap.bundle.min.js"></script>

</body>
</html>