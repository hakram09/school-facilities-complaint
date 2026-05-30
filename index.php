<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
<link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600;700;800&display=swap" rel="stylesheet">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">

<title>LAPOR</title>

<style>
*{
    margin:0;
    padding:0;
    box-sizing:border-box;
    font-family:'Inter',sans-serif;
}

/* NAVBAR */
.navbar{
    position:absolute;
    width:100%;
    padding:20px 60px;
    display:flex;
    justify-content:space-between;
    align-items:center;
    z-index:10;
    color:white;
}

.logo{
    font-weight:800;
    font-size:20px;
}

.nav-menu a{
    color:white;
    text-decoration:none;
    margin-left:20px;
    font-weight:500;
}

/* HERO */
.hero{
    height:100vh;
    background:url('assets/img/ukk.jpeg') no-repeat center center fixed;
    position:relative;
    display:flex;
    align-items:center;
    padding:0 60px;
}

.hero::before{
    content:'';
    position:absolute;
    inset:0;
    background:rgba(0,0,0,0.55);
}

.hero-content{
    position:relative;
    color:white;
    max-width:600px;
}

.hero h1{
    font-size:48px;
    font-weight:800;
    line-height:1.2;
}

.hero h1 span{
    color:#60a5fa;
}

.hero p{
    margin:20px 0;
    color:#e2e8f0;
}

/* BUTTON */
.btn-custom{
    padding:12px 20px;
    border-radius:10px;
    font-weight:600;
    text-decoration:none;
    display:inline-block;
    margin-right:10px;
}

.btn-primary{
    background:#2563eb;
    color:white;
}

.btn-light{
    background:white;
    color:#0f172a;
}

/* CARDS */
.stats{
    display:flex;
    gap:20px;
    margin-top:30px;
}

.card-mini{
    background:rgba(255,255,255,0.1);
    padding:15px;
    border-radius:12px;
    backdrop-filter:blur(10px);
    color:white;
}

/* CREDIT */
.credit{
    position:absolute;
    bottom:15px;
    left:50%;
    transform:translateX(-50%);
    color:#e2e8f0;
    font-size:14px;
    opacity:0.8;
}

/* RESPONSIVE */
@media(max-width:768px){
    .hero{
        padding:0 20px;
        text-align:center;
        justify-content:center;
    }

    .hero h1{
        font-size:32px;
    }

    .stats{
        flex-direction:column;
    }
}
</style>
</head>

<body>

<div class="navbar">
    <div class="logo">LAPOR</div>

    <div class="nav-menu">
        <a href="#">Home</a>
        <a href="#">Laporan</a>
        <a href="#">Status</a>
        <a href="login.php">Login</a>
    </div>
</div>

<section class="hero">
    <div class="hero-content">
        <h1>
            Ada Fasilitas Rusak?<br>
            <span>Langsung Lapor Sekarang.</span>
        </h1>

        <p>
            Sistem pengaduan sekolah untuk melaporkan kerusakan fasilitas
            dengan cepat, mudah, dan transparan.
        </p>

        <a href="siswa/login-siswa.php" class="btn-custom btn-primary">
            Login Siswa
        </a>

        <a href="admin/login.php" class="btn-custom btn-light">
            Login Admin
        </a>

        <div class="stats">
            <div class="card-mini">📄 120+ Laporan</div>
            <div class="card-mini">✅ 98% Selesai</div>
            <div class="card-mini">⏳ 15 Diproses</div>
        </div>
    </div>

    <!-- CREDIT -->
    <div class="credit">
        By: hakram lovewave mulia
    </div>
</section>

</body>
</html>