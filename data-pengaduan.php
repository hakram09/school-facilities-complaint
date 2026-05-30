<?php
session_start();
include "../koneksi.php";

if (!isset($_SESSION['admin'])) {
    header("location: login.php");
    exit;
}

/* PAGINATION */
$batas = 10;
$halaman = isset($_GET['halaman']) ? (int)$_GET['halaman'] : 1;
$halaman_awal = ($halaman - 1) * $batas;

/* TOTAL DATA */
$total_data_query = mysqli_query($conn, "
    SELECT COUNT(*) as total
    FROM input_aspirasi ia
    JOIN siswa s ON ia.nis = s.nis
    LEFT JOIN aspirasi a ON ia.id_pelaporan = a.id_pelaporan
");

$total_data = mysqli_fetch_assoc($total_data_query)['total'];
$total_halaman = ceil($total_data / $batas);

/* DATA UTAMA */
$query = mysqli_query($conn, "
    SELECT
        ia.id_pelaporan,
        ia.tanggal,
        s.nis,
        s.nama,
        s.kelas,
        k.ket_kategori,
        ia.lokasi,
        ia.ket,
        IFNULL(a.status, 'menunggu') AS status
    FROM input_aspirasi ia
    JOIN siswa s ON ia.nis = s.nis
    JOIN kategori k ON ia.id_kategori = k.id_kategori
    LEFT JOIN aspirasi a ON ia.id_pelaporan = a.id_pelaporan
    ORDER BY ia.tanggal DESC
    LIMIT $halaman_awal, $batas
");
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<link rel="stylesheet" href="../assets/bootstrap/css/bootstrap.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">

<title>Data Pengaduan</title>
</head>

<body class="bg-light">

<nav class="navbar navbar-expand-lg navbar-dark bg-primary">
    <div class="container-fluid">

        <span class="navbar-brand fw-bold">
            <i class="fa-solid fa-school"></i> LAPOR - Admin
        </span>

        <div class="d-flex">
            <span class="text-white me-3">
                <i class="fa-solid fa-user"></i>
                <?= $_SESSION['admin']; ?>
            </span>

            <a href="index-admin.php" class="btn btn-light btn-sm me-2">
                <i class="fa-solid fa-arrow-left"></i> Kembali
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
            <h5><i class="fa-solid fa-comment"></i> Data Pengaduan Sarana</h5>
        </div>

        <div class="card-body">

            <div class="table-responsive">
                <table class="table table-bordered table-striped align-middle">

                    <thead class="table-light text-center">
                        <tr>
                            <th>No</th>
                            <th>Tanggal</th>
                            <th>NIS</th>
                            <th>Nama</th>
                            <th>Kelas</th>
                            <th>Kategori</th>
                            <th>Lokasi</th>
                            <th>Keterangan</th>
                            <th>Status</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>

                    <tbody>
                    <?php
                    $no = $halaman_awal + 1;

                    if (mysqli_num_rows($query) > 0) :
                        while ($row = mysqli_fetch_assoc($query)) :
                    ?>

                        <tr>
                            <td class="text-center"><?= $no++; ?></td>
                            <td class="text-center"><?= date('d-m-Y H:i', strtotime($row['tanggal'])); ?></td>
                            <td class="text-center"><?= $row['nis']; ?></td>
                            <td><?= $row['nama']; ?></td>
                            <td class="text-center"><?= $row['kelas']; ?></td>
                            <td><?= $row['ket_kategori']; ?></td>
                            <td><?= $row['lokasi']; ?></td>
                            <td><?= $row['ket']; ?></td>

                            <td class="text-center">
                                <?php
                                if ($row['status'] == 'menunggu') {
                                    echo '<span class="badge bg-secondary">Menunggu</span>';
                                } elseif ($row['status'] == 'proses') {
                                    echo '<span class="badge bg-warning">Proses</span>';
                                } else {
                                    echo '<span class="badge bg-success">Selesai</span>';
                                }
                                ?>
                            </td>

                            <td class="text-center">
                                <a href="lihat-pengaduan.php?id=<?= $row['id_pelaporan']; ?>" class="btn btn-info btn-sm">
                                    <i class="fa-solid fa-eye"></i>
                                </a>

                                <a href="../proses/hapus-pengaduan.php?id=<?= $row['id_pelaporan']; ?>"
                                   class="btn btn-danger btn-sm"
                                   onclick="return confirm('Yakin ingin menghapus?')">
                                    <i class="fa-solid fa-trash"></i>
                                </a>
                            </td>
                        </tr>

                    <?php endwhile; else : ?>
                        <tr>
                            <td colspan="10" class="text-center">Data belum tersedia</td>
                        </tr>
                    <?php endif; ?>
                    </tbody>

                </table>
            </div>

            <nav class="mt-3">
                <ul class="pagination justify-content-center">

                    <?php if ($halaman > 1) : ?>
                        <li class="page-item">
                            <a class="page-link" href="?halaman=<?= $halaman - 1 ?>">Prev</a>
                        </li>
                    <?php endif; ?>

                    <?php for ($i = 1; $i <= $total_halaman; $i++) : ?>
                        <li class="page-item <?= ($i == $halaman) ? 'active' : '' ?>">
                            <a class="page-link" href="?halaman=<?= $i ?>"><?= $i ?></a>
                        </li>
                    <?php endfor; ?>

                    <?php if ($halaman < $total_halaman) : ?>
                        <li class="page-item">
                            <a class="page-link" href="?halaman=<?= $halaman + 1 ?>">Next</a>
                        </li>
                    <?php endif; ?>

                </ul>
            </nav>

        </div>
    </div>

</div>

<script src="../assets/bootstrap/js/bootstrap.bundle.min.js"></script>

</body>
</html>