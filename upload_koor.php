<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Upload Data Koordinator</title>
    <link rel="stylesheet" href="css/styles_koor.css">
</head>
<body>
    <div class="container">
        <h2>Upload Data Koordinator</h2>
        <form action="koordinator.php" method="POST" enctype="multipart/form-data">
            <!-- Input Nama Lengkap -->
            <label for="nama">Nama Lengkap</label>
            <input type="text" id="nama" name="nama" placeholder="Masukkan Nama Lengkap" required>

            <!-- Input Nomor Absen -->
            <label for="absen">Nomor Absen</label>
            <input type="number" id="absen" name="absen" placeholder="Masukkan Nomor Absen" required>

            <!-- Input Foto -->
            <label for="foto">Upload Foto</label>
            <input type="file" id="foto" name="foto" required>

            <input type="hidden" name="id_users" value="<?php echo $_SESSION['id_users']; ?>"> <!-- Gantilah dengan ID pengguna yang sesuai -->


            <!-- Tombol Submit -->
            <button type="submit">Submit</button>
        </form>
    </div>
</body>
</html>
