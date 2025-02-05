<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="css/styles_petugas.css">
</head>
<body>
<?php include "layout/header.html"; ?>

<div class="top-bar">
    <a href="dashboard.php" class="dashboard-text">Dashboard</a>
    <span class="petugas-label">Petugas</span>
</div>

<div class="petugas-container">
        <h3>Data Kelompok</h3>
        <form action="dashboard.php" method="POST" enctype="multipart/form-data">
            <label for="nama">Nama Lengkap</label>
            <input type="text" name="nama" id="nama" required><br><br>

            <label for="absen">Nomor Absen</label>
            <input type="number" name="absen" id="absen" required><br><br>

            <label for="jenis">Jenis Piket</label>
            <input type="text" name="jenis" id=jenis" required><br><br>

            <label for="foto">Upload Foto</label>
            <input type="file" name="foto" id="foto" required><br><br>

            <label for="keterangan">keterangan Piket</label>
            <input type="text" name="keterangan" id="keterangan" required><br><br>

            <button type="submit">Tambah Petugas</button>
        </form>
    </div>

<?php include "layout/footer.html"; ?>
</body>
</html>