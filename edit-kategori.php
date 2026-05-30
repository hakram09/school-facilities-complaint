<?php 
session_start();

include "../koneksi.php";

if (!isset($_SESSION['admin'])) {
    header("location: ../admin/login.php");
    exit;
}

if (!isset($_GET['id'])) {
    header("location: ../admin/kategori.php");
    exit;
}

$id = $_GET['id'];
$nama = $_GET['nama'];

if (isset($_POST['update'])) {
    $nama_baru = htmlspecialchars($_POST['ket_kategori']);

    mysqli_query($conn, "UPDATE kategori
                         SET ket_kategori='$nama_baru'
                         WHERE id_kategori='$id'");

    echo "<script>
            alert('Data kategori berhasil di update');
            window.location='../admin/kategori.php';
          </script>";
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <title>Edit Kategori | Admin</title>
</head>
<body class="bg-light">

        <div class="container mt-5">
            <div class="cardshadow">
                <div class="card-header bg-warning text-dark ">
                    Edit Kategori
                </div>
                <div class="card-body">
                    <form method="POST">
                        <div class="mb-3">
                            <label> Nama kategori</label>

                            <input type="text"
                                         name="ket_kategori"
                                         class="form-control"
                                         value="<?= $nama ?>"
                                         required>
                        </div>
                        <button type="submit" name="update" class="btn btn-success">
                            Simpan
                        </button>

                        <a href="../admin/kategori.php" class="btn btn-secondary">
                            Kembali
                        </a>
                    </form>
                     
                </div>
            </div>
        </div>
    <script src="../assets/bootstrap/js/bootstrap.bundle.min.js"></script>
</body>
</html>