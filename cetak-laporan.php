<?php
session_start();
include "../koneksi.php";

if (!isset($_SESSION['admin'])) {
    header("location: login.php");
    exit;
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <title>Cetak Laporan</title>
    <style> 
        body {font-family: arial, sans-serif;}
        h2, p {text-align: center;}
        h2 {margin-bottom: 5px;}
        p {margin-top: 0; font-size: 14px}
        
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
            font-size: 12px;
        }

        table, th, td { border: 1px solid #000 ; }
        th, td {padding: 6px; text-align: center;}
        th {background-color: f7f2f2;}

        @media print {
            body {margin: 0;}
        }
    </style>
</head>
<body class="bg-light" onload="window.print()">

    <h2>LAPORAN PENGADUAN SARANA SEKOLAH</h2>
    <p>Sistem informasi pengaduan sarana</p>

    <table>
    <thead>
        <tr>
        <th>No</th>
        <th>Tanggal</th>
        <th>NIS</th>
        <th>Kelas</th>
        <th>Kategori</th>
        <th>Pengaduan</th>
        <th>feedback</th>
        </tr>
    </thead>

    <tbody>
        <?php
        $no =1;
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

if(!$query){
    die(mysqli_error($conn));
}
        if ($query && mysqli_num_rows($query) > 0)
            while ($row = mysqli_fetch_assoc($query)) {
        ?>
        <tr>
            <td><?= $no++; ?></td>
            <td><?= date('d-m-y', strtotime($row['tanggal'])); ?></td>
            <td><?= htmlspecialchars($row['nis']); ?></td>
            <td><?= htmlspecialchars($row['kelas']); ?></td>
            <td><?= htmlspecialchars($row['ket_kategori']); ?></td>

            <td style="text-align: left"><?= htmlspecialchars($row['pengaduan']);?></td>
            <td style="text-align: left"><?= ($row['feedback']) ? htmlspecialchars($row['feedback']) : '-' ;?></td>
        </tr>
        <?php
            }
        else {
            echo "<tr><td colspan='7'>Data belum tersedia</td></tr>";
        }
        ?>
    </tbody>
    </table>
    <script src="../assets/bootstrap/js/bootstrap.bundle.min.js"></script>
</body>
</html>