<?php
session_start();
include "../koneksi.php";

if (!isset($_SESSION['admin'])) {
    header("location: login.php");
    exit;
}

$query = mysqli_query($conn, "
    SELECT
        ia.tanggal,
        s.nis,
        s.kelas,
        k.ket_kategori,
        ia.ket AS pengaduan,
        a.feedback
    FROM input_aspirasi ia
    JOIN siswa s ON ia.nis = s.nis
    JOIN kategori k ON ia.id_kategori = k.id_kategori
    LEFT JOIN aspirasi a ON ia.id_pelaporan = a.id_pelaporan
    ORDER BY ia.tanggal DESC
");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <title>Laporan | Admin</title>
</head>

<body class="bg-light">

<nav class="navbar navbar-expand-lg navbar-dark bg-primary">
<div class="container-fluid">

<span class="navbar-brand fw-bold">
<i class="fa-solid fa-school"></i> LAPOR - Admin
</span>

<div class="d-flex align-items-center gap-3">

<span class="text-white">
<i class="fa-solid fa-user"></i>
<?= htmlspecialchars($_SESSION['admin']); ?>
</span>
                <a href="index-admin.php" class="btn btn-light btn-sm me-2">
                   <i class="fa-solid fa-arrow-left"></i> Kembali
                </a>

<a href="cetak-laporan.php" target="_blank"class="btn btn-warning btn-sm">
<i class="fa-solid fa-print"></i> Cetak
</a>

        <a href="../proses/logout.php"
             class="btn btn-danger btn-sm">
             <i class="fa-solid fa-right-from-bracket"></i> Logout
        </a>

        </div>
    </div>
</nav>

    <div class="container mt-4">
    <div class="card shadow-sm">
    <div class="card-header bg-primary text-white fw-semibold">Laporan Pengaduan Sarana Sekolah</div>
    <div class="card-body">
    <div class="table-responsive">
    <table class="table table-bordered table-striped align-middle">

        <thead class="table-light text-center">
            <tr>
                <th>No</th>
                <th>Tanggal</th>
                <th>NIS</th>
                <th>Kelas</th>
                <th>Kategori</th>
                <th>Pengaduan</th>
                <th>Feedback</th>
            </tr>
        </thead>
    <tbody>

<?php
$no = 1;
while ($row = mysqli_fetch_assoc($query)) :
?>

    <tr>
        <td class="text-center"><?= $no++; ?></td>
    <td>
        <?= date('d-m-Y', strtotime($row['tanggal'])); ?>
    </td>

    <td class="text-center">
        <?= htmlspecialchars($row['nis']); ?>
    </td>

    <td class="text-center">
        <?= htmlspecialchars($row['kelas']); ?>
    </td>

    <td>
        <?= htmlspecialchars($row['ket_kategori']); ?>
    </td>

    <td>
        <?= htmlspecialchars($row['pengaduan']); ?>
    </td>

    <td>
        <?=$row['feedback']? htmlspecialchars($row['feedback'])
        : '<em class="text-muted">Belum ada tanggapan</em>';
        ?>
    </td>
</tr>

<?php endwhile; ?>

</tbody>
</table>

                </div>
            </div>
        </div>
    </div>
    <script src="../assets/bootstrap/js/bootstrap.bundle.min.js"></script>
</body>
</html>