<?php
include "service/database.php";
session_start();

// Pastikan pengguna sudah login
if (!isset($_SESSION['id_users'])) {
    header("Location: login.php");
    exit();
}

$id_users = $_SESSION['id_users']; // Ambil id_users dari sesi login
$register_message = "";

// Cek jika form sudah disubmit
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Ambil data dari form
    $nama = $_POST['nama'];
    $absen = $_POST['absen'];
    $foto = $_FILES['foto']['name'];
    $file_tmp = $_FILES['foto']['tmp_name'];

    // Validasi file foto
    $allowed_extensions = ['jpg', 'jpeg', 'png'];
    $file_extension = pathinfo($foto, PATHINFO_EXTENSION);

    if (!in_array(strtolower($file_extension), $allowed_extensions)) {
        $register_message = "Hanya gambar dengan ekstensi jpg, jpeg, atau png yang diperbolehkan.";
    } else {
        // Pindahkan file foto ke folder 'file/'
        move_uploaded_file($file_tmp, 'file/' . $foto);

        // Insert data koordinator ke tabel 'koordinator' dengan id_users
        $sql = "INSERT INTO koordinator (nama, absen, foto, id_users) 
                VALUES ('$nama', '$absen', '$foto', '$id_users')";

        if (mysqli_query($db, $sql)) {
            $register_message = "Data koordinator berhasil disimpan!";
            header("Location: dashboard.php"); // Arahkan ke dashboard setelah berhasil
            exit();
        } else {
            $register_message = "Terjadi kesalahan saat menyimpan data: " . mysqli_error($db);
        }
    }
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registrasi Koordinator</title>
    <link rel="stylesheet" href="css/styles_koor.css">
</head>
<body>
    <?php include "layout/header.html" ?>

    <!-- Kontainer untuk Koordinator dan Kembali ke Dashboard -->
    <div class="top-bar">
        <a href="dashboard.php" class="dashboard-text">Dashboard</a>
        <span class="koordinator-label">Koordinator</span>
    </div>

    <div class="register-container">
        <h3>Data Koordinator</h3>
        <p><?= $register_message ?></p>
        <form action="" method="POST" enctype="multipart/form-data">
            <label for="nama">Nama Lengkap</label>
            <input type="text" name="nama" id="nama" required><br><br>

            <label for="absen">Nomor Absen</label>
            <input type="number" name="absen" id="absen" required><br><br>

            <label for="foto">Upload Foto</label>
            <input type="file" name="foto" id="foto" required><br><br>

            <button type="submit">Daftarkan Koordinator</button>
        </form>
    </div>

    <?php include "layout/footer.html" ?>
</body>
</html>
