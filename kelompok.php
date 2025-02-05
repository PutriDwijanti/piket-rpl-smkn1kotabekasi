<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="css/styles_kelompok.css">
</head>
<body>
<?php include "layout/header.html"; ?>

<div class="top-bar">
    <a href="petugas.php" class="petugas-text">Petugas Piket</a>
    <span class="kelompok-label">Kelompok</span>
</div>

<div class="kelompok-container">
        <h3>Data Kelompok</h3>
        <form action="petugas.php" method="POST" enctype="multipart/form-data">
            <label for="kelas">Kelas</label>
            <input type="text" name="kelas" id="kelas" required><br><br>

            <label for="ruangan">Ruangan Lab</label>
            <input type="text" name="ruangan" id="ruangan" required><br><br>

            <label for="foto">Upload Foto</label>
            <input type="file" name="foto" id="foto" required><br><br>

            <button type="submit">Tambah Kelompok</button>
        </form>
    </div>


<?php include "layout/footer.html"; ?>
</body>
</html>