<?php
include "service/database.php";
session_start();

// Pastikan pengguna sudah login
if (!isset($_SESSION['id_users'])) {
    header("Location: login.php");
    exit();
}

$id_users = $_SESSION['id_users'];
$crud_message = "";

// Hapus data koordinator jika ada permintaan
if (isset($_GET['delete']) && !empty($_GET['delete'])) {
    $id_koordinator = mysqli_real_escape_string($db, $_GET['delete']);
    $delete_sql = "DELETE FROM koordinator WHERE id_koordinator='$id_koordinator' AND id_users='$id_users'";
    
    if (mysqli_query($db, $delete_sql)) {
        $crud_message = "Data berhasil dihapus!";
    } else {
        $crud_message = "Gagal menghapus data: " . mysqli_error($db);
    }
}

// Ambil semua data koordinator
$sql = "SELECT * FROM koordinator WHERE id_users='$id_users'";
$result = mysqli_query($db, $sql);
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Konfirmasi Data Koordinator</title>
    <link rel="stylesheet" href="css/styles_konfirmasi.css">
</head>
<body>
    <?php include "layout/header.html"; ?>

    <div class="top-bar">
        <a href="dashboard.php" class="dashboard-text">Dashboard</a>
        <span class="konfirmasi-label">Konfirmasi</span>
    </div>

    <div class="crud-container">
        <h3>Konfirmasi Data Piket</h3>
        <p><?= htmlspecialchars($crud_message) ?></p>
        <table border="1">
    <tr>
        <th>No</th>
        <th>Nama</th>
        <th>Absen</th>
        <th>Foto</th>
        <th>Aksi</th>
    </tr>
    <?php $no = 1; while ($row = mysqli_fetch_assoc($result)) : ?>
    <tr>
        <td><?= $no++; ?></td>
        <td><?= htmlspecialchars($row['nama']); ?></td>
        <td><?= htmlspecialchars($row['absen']); ?></td>
        <td><img src="file/<?= htmlspecialchars($row['foto']); ?>" width="50"></td>
        <td>
            <button class="edit-btn">
                <a href="edit_koor.php?id=<?= $row['id_koordinator']; ?>" 
                   onclick="return confirm('Yakin ingin mengedit data ini?')">
                   Edit
                </a>
            </button>
            <button class="delete-btn">
                <a href="konfirmasi.php?delete=<?= $row['id_koordinator']; ?>" 
                   onclick="return confirm('Yakin ingin menghapus?')">
                   Delete
                </a>
            </button>
        </td>
    </tr>
    <?php endwhile; ?>
</table>
</div>

    <?php include "layout/footer.html"; ?>
</body>
</html>
