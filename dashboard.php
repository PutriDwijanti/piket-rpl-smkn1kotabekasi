<?php
session_start();
include 'service/database.php';  

// Redirect jika belum login
if (!isset($_SESSION['is_login'])) {
    header('location: login.php');
    exit;
}

// Logout
if (isset($_POST['logout'])) {
    session_unset();
    session_destroy();
    header('location: login.php');
    exit();
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link rel="stylesheet" href="css/styles_dashboard.css">
</head>
<body>
    <?php include "layout/header.html"; ?>
    <span class="coordinator-label">Dashboard</span>
    <div class="dashboard-container">
        <div class="welcome-message">
            <h3>Selamat Datang, <?= htmlspecialchars($_SESSION["username"]) ?></h3>
            <p>Kamu berhasil login sebagai <strong>Koordinator</strong></p>
        </div>

        <div class="circle-container">
            <a href="koordinator.php" class="circle">
                <img src="img/koor.png" alt="koordinator">
            </a>
            <a href="jadwal.php" class="circle">
                <img src="img/date.png" alt="Jadwal">
            </a>
            <a href="kelompok.php" class="circle">
                <img src="img/kelompok.png" alt="Petugas">
            </a>
            <a href="konfirmasi.php" class="circle">
                <img src="img/list.png" alt="Konfirmasi">
            </a>
        </div>

        <!-- Pratinjau gambar yang diunggah -->
        <?php if (isset($_SESSION['uploaded_image'])): ?>
            <div class="image-preview">
                <h4>Foto yang diunggah:</h4>
                <img src="../upload/<?= htmlspecialchars($_SESSION['uploaded_image']) ?>" alt="Foto Diri" style="max-width: 200px; height: auto; border: 1px solid #ddd; border-radius: 5px; padding: 5px;">
            </div>
        <?php endif; ?>
    </div>

    <!-- Tombol Logout -->
    <form class="button-group" action="dashboard.php" method="POST">
        <p class="logout-text">Anda ingin logout? 
            <button type="submit" name="logout" class="logout-button">Logout di sini</button>
        </p>
    </form>

    <?php include "layout/footer.html"; ?>
</body>
</html>
