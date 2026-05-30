<?php
session_start();
include "../koneksi.php";

if (isset($_SESSION['siswa'])) {
    header("location: index-siswa.php");
    exit;
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<link rel="stylesheet" href="../assets/bootstrap/css/bootstrap.min.css">
<link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600&display=swap" rel="stylesheet">

<title>Login Siswa | SIPSAB</title>

<style>
*{margin:0;padding:0;box-sizing:border-box;}

body{
    font-family:'Inter',sans-serif;
    height:100vh;
    display:flex;
    background:linear-gradient(135deg,#e0f2fe,#ecfdf5);
}

.wrapper{
    display:flex;
    width:100%;
}

/* LEFT PANEL */
.left-panel{
    flex:1.2;
    background:linear-gradient(160deg,#2563eb,#22c55e);
    color:#fff;
    display:flex;
    flex-direction:column;
    justify-content:center;
    padding:80px;
    position:relative;
    overflow:hidden;
}

.left-panel::after{
    content:"";
    position:absolute;
    inset:0;
    background-image:
        linear-gradient(rgba(255,255,255,0.08) 1px, transparent 1px),
        linear-gradient(90deg, rgba(255,255,255,0.08) 1px, transparent 1px);
    background-size:40px 40px;
    opacity:.2;
}

.brand{
    text-align:center;
    z-index:1;
}

/* ⬇️ INI YANG DIGANTI */
.brand img{
    width:100%;
    max-width:320px;
    border-radius:12px;
    margin-bottom:20px;
    object-fit:cover;
}

.brand h1{
    font-size:30px;
    font-weight:600;
}

.left-panel p{
    text-align:center;
    margin-top:10px;
    opacity:.9;
}

.divider{
    width:60px;
    height:4px;
    background:#bbf7d0;
    margin:20px auto;
    border-radius:3px;
}

/* RIGHT PANEL */
.right-panel{
    flex:.8;
    display:flex;
    justify-content:center;
    align-items:center;
}

/* LOGIN CARD */
.login-card{
    width:100%;
    max-width:400px;
    background:rgba(255,255,255,0.85);
    backdrop-filter:blur(10px);
    padding:40px;
    border-radius:18px;
    box-shadow:0 15px 40px rgba(0,0,0,.08);
    transition:.3s;
    border:1px solid rgba(255,255,255,0.4);
}

.login-card:hover{
    transform:translateY(-5px);
}

.login-card h4{
    text-align:center;
    margin-bottom:10px;
    color:#2563eb;
}

/* INPUT */
.form-control{
    border-radius:10px;
    padding:12px;
    border:1px solid #cbd5e1;
}

.form-control:focus{
    border-color:#22c55e;
    box-shadow:0 0 0 3px rgba(34,197,94,.2);
}

/* BUTTON */
.btn-login{
    width:100%;
    padding:12px;
    border-radius:10px;
    background:linear-gradient(135deg,#2563eb,#22c55e);
    color:#fff;
    border:none;
    font-weight:500;
    transition:.3s;
}

.btn-login:hover{
    opacity:.9;
}

.btn-login:active{
    transform:scale(.97);
}

/* BACK */
.btn-back{
    display:block;
    text-align:center;
    margin-top:15px;
    font-size:14px;
    color:#64748b;
}

.btn-back:hover{
    color:#22c55e;
}

.footer-text{
    text-align:center;
    font-size:12px;
    margin-top:20px;
    color:#94a3b8;
}

/* RESPONSIVE */
@media(max-width:992px){
    .wrapper{flex-direction:column;}
    .left-panel{display:none;}
}
</style>
</head>

<body>

<div class="wrapper">

    <div class="left-panel">
        <div class="brand">
            <!-- ⬇️ INI DOANG YANG DIGANTI -->
            <img src="../assets/img/bg-sekolah1.jpg">
            <h1>Sistem Pengaduan Sarana Sekolah</h1>
        </div>

        <p>Silahkan login sebagai siswa untuk membuat pengaduan</p>
        <div class="divider"></div>
    </div>

    <div class="right-panel">
        <div class="login-card">
            <h4>Login Siswa</h4>
            <p style="text-align:center;font-size:13px;color:#64748b;">
                Gunakan Nama dan NIS sebagai password
            </p>

            <form method="post" action="../proses/login-siswa.php">

                <div class="mb-3">
                    <input type="text" name="nama" class="form-control" placeholder="Masukkan Nama" required>
                </div>

                <div class="mb-3">
                    <input type="password" name="password" class="form-control" placeholder="Masukkan Password" required>
                </div>

                <button type="submit" name="login" class="btn-login">
                    Masuk
                </button>

            </form>

            <a href="../index.php" class="btn-back">
                ← Kembali ke Halaman Utama
            </a>

            <div class="footer-text">
                © 2026 SIPSAB • Student Access
            </div>
        </div>
    </div>

</div>

</body>
</html>