<?php
session_start();
include "../koneksi.php";

if (!isset($_SESSION['siswa'])) {
    header("location: login_siswa.php");
    exit;
}

$nis = $_SESSION['siswa']['nis'];

$query = mysqli_query($conn, "
    SELECT 
        ia.id_pelaporan,
        ia.tanggal,
        k.ket_kategori,
        ia.lokasi,
        ia.ket,
        a.status,
        a.feedback
    FROM input_aspirasi ia
    JOIN kategori k ON ia.id_kategori = k.id_kategori
    LEFT JOIN aspirasi a ON ia.id_pelaporan = a.id_pelaporan
    WHERE ia.nis = '$nis'
");

if(!$query){
    die(mysqli_error($conn));
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <title>Riwayat Pengaduan siswa</title>
</head>

<body class="bg-light">

    <!-- NAVBAR -->
    <nav class="navbar navbar-dark bg-success">
        <div class="container-fluid">
            <a href="index-siswa.php" class="navbar-brand">
                <i class="fa-solid fa-arrow-left"></i> kembali
            </a>

            <span class="navbar-text text-white">
                Riwayat pengaduan
            </span>
        </div>
    </nav>

    <!-- CONTENT -->
    <div class="container mt-4">
        <div class="card shadow-sm p-3">
            
            <h5 class="mb-3">
               <i class="fa-solid fa-list"></i> Riwayat pengaduan
            </h5>

            <div class="table-responsive">
                <table class="table table-bordered table-striped align-middle">
                    
                    <thead class="table-light text-center">
                        <tr>
                            <th>No</th>
                            <th>Tanggal</th>
                            <th>Kategori</th>
                            <th>Lokasi</th>
                            <th>Keterangan</th>
                            <th>Status</th>
                            <th>Feedback</th>
                        </tr>
                    </thead>

                    <tbody>
                        <?php
                        $no = 1;
                        if (mysqli_num_rows($query) > 0) {
                            while ($row = mysqli_fetch_assoc($query)) {
                        ?>
                        <tr>
                            <td class="text-center"><?= $no++; ?></td>
                            <td class="text-center"><?= date('d-m-y H:i', strtotime($row['tanggal'])); ?></td>
                            <td><?= htmlspecialchars($row['ket_kategori']); ?></td>
                            <td><?= htmlspecialchars($row['lokasi']); ?></td>
                            <td><?= htmlspecialchars($row['ket']); ?></td>

                            <td class="text-center">
                                <?php
                                    if ($row['status'] == 'menunggu') {
                                        echo '<span class="badge bg-secondary">Menunggu</span>';
                                    } elseif ($row['status'] == 'proses') {
                                        echo '<span class="badge bg-warning text-dark">Proses</span>';
                                    } elseif ($row['status'] == 'selesai') {
                                        echo '<span class="badge bg-success">Selesai</span>';
                                    } else {
                                        echo '<span class="badge bg-dark">-</span>';
                                    }
                                ?>
                            </td>

                            <td><?= $row['feedback'] ? htmlspecialchars($row['feedback']) : '-'; ?></td>
                        </tr>

                        <?php
                            }
                        } else {
                            echo "<tr><td colspan='7' class='text-center'>Belum ada pengaduan</td></tr>";
                        }
                        ?>
                    </tbody>

                </table>
            </div>

        </div>
    </div>

    <script src="../assets/bootstrap/js/bootstrap.bundle.min.js"></script>
</body>
</html>