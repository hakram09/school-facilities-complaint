<?php 

session_start(); 
if (!isset($_SESSION['siswa']))

{ header("location: ../login-siswa.php"); 
exit; } 

$siswa = $_SESSION['siswa']; 

?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
<link rel="stylesheet" href="assets/css/style.css">
<link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap" rel="stylesheet">

<title>UI KIT - SIPSAB</title>

<style>
body{
    background:#f8fafc;
    font-family:'Inter',sans-serif;
    padding:40px;
}

.section{
    margin-bottom:50px;
}

.section h3{
    margin-bottom:20px;
}

.preview-box{
    background:white;
    padding:20px;
    border-radius:15px;
    box-shadow:0 10px 30px rgba(0,0,0,.05);
}
</style>
</head>

<body>

<h2 class="mb-4">🎨 UI KIT SIPSAB</h2>

<!-- COLORS -->
<div class="section">
    <h3>Color System</h3>
    <div class="d-flex gap-3">
        <div class="preview-box" style="background:#2563eb;color:white;">Primary</div>
        <div class="preview-box" style="background:#16a34a;color:white;">Success</div>
        <div class="preview-box" style="background:#f59e0b;color:white;">Warning</div>
        <div class="preview-box" style="background:#ef4444;color:white;">Danger</div>
        <div class="preview-box">Neutral</div>
    </div>
</div>

<!-- BUTTON -->
<div class="section">
    <h3>Buttons</h3>
    <div class="preview-box d-flex gap-3 flex-wrap">
        <button class="btn-main btn-primary">Primary</button>
        <button class="btn-main btn-secondary">Secondary</button>
        <button class="btn-main btn-success">Success</button>
    </div>
</div>

<!-- INPUT -->
<div class="section">
    <h3>Inputs</h3>
    <div class="preview-box">
        <input type="text" class="input-custom w-100 mb-3" placeholder="Input text">
        <textarea class="input-custom w-100" placeholder="Textarea"></textarea>
    </div>
</div>

<!-- CARD -->
<div class="section">
    <h3>Card</h3>
    <div class="preview-box">
        <div class="card-custom">
            <h5>Card Title</h5>
            <p>Ini contoh card sesuai design system</p>
        </div>
    </div>
</div>

<!-- TYPOGRAPHY -->
<div class="section">
    <h3>Typography</h3>
    <div class="preview-box">
        <h1>Heading 1</h1>
        <h2>Heading 2</h2>
        <h3>Heading 3</h3>
        <p>Ini paragraf biasa</p>
        <small>Ini small text</small>
    </div>
</div>

<!-- BADGE -->
<div class="section">
    <h3>Status Badge</h3>
    <div class="preview-box d-flex gap-3">
        <span class="badge bg-success">Selesai</span>
        <span class="badge bg-warning text-dark">Proses</span>
        <span class="badge bg-danger">Ditolak</span>
    </div>
</div>

</body>
</html>