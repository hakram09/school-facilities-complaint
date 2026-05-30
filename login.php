<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<link rel="stylesheet" href="../assets/bootstrap/css/bootstrap.min.css">
<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600&display=swap" rel="stylesheet">

<title>Login Admin</title>

<style>
body{
    margin:0;
    height:100vh;
    font-family:'Poppins', sans-serif;

    /* 🔥 BACKGROUND GAMBAR */
    background: url('../assets/img/bg-sekolah.jpg') no-repeat center center/cover;

    display:flex;
    justify-content:center;
    align-items:center;
}

/* OVERLAY GELAP */
body::before{
    content:"";
    position:absolute;
    inset:0;
    background:rgba(0,0,0,0.5);
}

/* CARD LOGIN */
.login-box{
    position:relative;
    z-index:2;
    width:350px;
    background:#ffffff;
    padding:30px;
    border-radius:10px;
    text-align:center;
    box-shadow:0 10px 30px rgba(0,0,0,0.3);
}

/* LOGO */
.login-box img{
    width:80px;
    margin-bottom:10px;
}

/* TITLE */
.login-box h4{
    margin-bottom:20px;
    font-weight:600;
}

/* INPUT */
.form-control{
    border:none;
    border-bottom:2px solid #ccc;
    border-radius:0;
    margin-bottom:15px;
}

.form-control:focus{
    box-shadow:none;
    border-bottom:2px solid #2563eb;
}

/* BUTTON */
.btn-login{
    width:100%;
    background:#3b82f6;
    color:#fff;
    border:none;
}

.btn-login:hover{
    background:#2563eb;
}

/* LINK */
.login-box a{
    font-size:13px;
    color:red;
    display:block;
    margin-top:10px;
}
</style>

</head>

<body>

<div class="login-box">
    <img src="../assets/img/alka.png">

    <h4>::: Login Admin :::</h4>

    <form method="post" action="../proses/login-admin.php">
        <input type="text" name="username" class="form-control" placeholder="Username" required>
        <input type="password" name="password" class="form-control" placeholder="Password" required>

        <button type="submit" name="login" class="btn btn-login mt-2">
            Masuk
        </button>
    </form>

    <a href="../index.php">Klik disini untuk kembali</a>
</div>

</body>
</html>