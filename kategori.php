<?php
session_start();

include "../koneksi.php";

if (!isset($_SESSION['admin'])) {
    header("location: login.php");
    exit;
}
 $data = mysqli_query($conn, "
 SELECT * FROM kategori
 ORDER By id_kategori DESC
 ");

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <title>Data Kategori | admin </title>
</head>
<body class="bg-light">

<nav class="navbar navbar-dark bg-primary">
    <div class="container-fluid">

        <a href="index-admin.php" class="navbar-brand">
            <i class="fa-solid fa-tags"></i> Data kategori
        </a>

        <div class="d-flex">

        <a href="index-admin.php" class="btn btn-sm btn-light me-2">
             <i class="fa-solid fa-arrow-left"></i> kembali
        </a>

        <a href="../proses/logout.php" class="btn btn-danger btn-sm">
             <i class="fa-solid fa-right-from-bracket"></i> Logout
        </a>
        
        </div>
     </div>
</nav>

        <div class="container mt-4">
            <div class="card shadow-sm">

                <div class="card-header bg-primary text-white">
                    <h5 class="mb-0">
                        <i class="fa-solid fa-list"></i> Kategori sarana
                    </h5>
                </div>
                    <div class="card-body">
                        <form method="post" action="../proses/tambah-kategori.php" class="mb-3">
                            <div class="row">
                                <div class="col-md-8">
                                    <input type="text" 
                                        name="ket_kategori" 
                                        class="form-control" 
                                        placeholder="Nama Kategori" required>
                            
                            </div>

                            <div class="col-md-4 d-grid">
                                <button type="submit" name="simpan" class="btn btn-success">
                                    <i class="fa-solid fa-plus"></i>Tambah
                                </button>

                                 </div>
                         </div>
                     </form>

                        <div class="table-responsive">
                            <table class="table table-bordered table-stripped">
                                <thead class="table-light text-center">
                                <tr>
                                    <th width="5%">No</th>
                                    <th>Nama Kategori</th>
                                    <th width="20%">Aksi</th>
                                </tr>
                                </thead>

                                <tbody>
                                    <?php
                                        $no=1;
                                        while ($row = mysqli_fetch_assoc($data)) {
                                            ?>
                                            
                                            <tr>
                                                <td class=text-center>
                                                    <?=  $no++; ?>
                                                </td>
                                                <td>
                                                    <?=  $row['ket_kategori']; ?>
                                                </td>
                                                <td class="text-center">
                                                    <a href="../proses/edit-kategori.php?id=<?= $row['id_kategori']; ?>&nama=<?= urlencode($row['ket_kategori']); ?>"
                                                    class="btn btn-sm btn-warning">
                                                    <i class="fa-solid fa-pen-to-square"></i>
                                                    </a>

                                                    <a href="../proses/hapus-kategori.php?id=<?= $row['id_kategori']; ?>"
                                                    class="btn btn-sm btn-danger" onclick="return confirm('Hapus kategori ini?')">
                                                    <i class="fa-solid fa-trash"></i>
                                                    </a>

                                                </td>
                                                </tr>
                                            <?php } ?>       
                                </tbody>
                            </table>
                        </div>
                    </div>
            </div>
        </div>

        <script src="../assets/bootstrap/js/bootstrap.bundle.min.js"></script>
</body>
</html>