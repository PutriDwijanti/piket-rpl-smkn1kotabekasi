<?php
include "service/database.php";
session_start();

// Pastikan pengguna sudah login
if (!isset($_SESSION['id_users'])) {
    header("Location: login.php");
    exit();
}

$id_users = $_SESSION['id_users'];
$edit_message = "";

// Ambil data koordinator berdasarkan id
if (isset($_GET['id'])) {
    $id_koordinator = intval($_GET['id']); // Pastikan ID berupa angka untuk keamanan
    $query = "SELECT * FROM koordinator WHERE id_koordinator='$id_koordinator' AND id_users='$id_users'";
    $result = mysqli_query($db, $query);

    if (mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);
    } else {
        die("Data tidak ditemukan atau Anda tidak berhak mengedit ini.");
    }
} else {
    die("ID tidak valid.");
}

// Jika form disubmit
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nama = mysqli_real_escape_string($db, $_POST['nama']);
    $absen = mysqli_real_escape_string($db, $_POST['absen']);

    // Proses upload foto baru (jika diunggah)
    if (!empty($_FILES['foto']['name'])) {
        $foto = $_FILES['foto']['name'];
        $file_tmp = $_FILES['foto']['tmp_name'];
        $file_extension = strtolower(pathinfo($foto, PATHINFO_EXTENSION));
        $allowed_extensions = ['jpg', 'jpeg', 'png'];

        if (in_array($file_extension, $allowed_extensions)) {
            move_uploaded_file($file_tmp, "file/" . $foto);
        } else {
            $edit_message = "Format foto tidak valid. Hanya JPG, JPEG, atau PNG yang diizinkan.";
            $foto = $row['foto']; // Gunakan foto lama jika format salah
        }
    } else {
        $foto = $row['foto']; // Gunakan foto lama jika tidak ada unggahan baru
    }

    // Update data di database
    $update_sql = "UPDATE koordinator SET nama='$nama', absen='$absen', foto='$foto' 
                   WHERE id_koordinator='$id_koordinator' AND id_users='$id_users'";

    if (mysqli_query($db, $update_sql)) {
        echo "<script>alert('Data berhasil diperbarui!'); window.location='konfirmasi.php';</script>";
        exit();
    } else {
        $edit_message = "Gagal memperbarui data: " . mysqli_error($db);
    }
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Data Koordinator</title>
    <link rel="stylesheet" href="css/styles_koor.css">
</head>
<body>
    <?php include "layout/header.html"; ?>

    <div class="top-bar">
        <a href="konfirmasi.php" class="konfirmasi-text">Konfirmasi</a>
        <span class="konfirmasi-label">Edit Koordinator</span>
    </div>

    <div class="edit-container">
        <h3>Edit Data Koordinator</h3>
        <p><?= htmlspecialchars($edit_message) ?></p>
        <form action="" method="POST" enctype="multipart/form-data">
            <label for="nama">Nama Lengkap</label>
            <input type="text" name="nama" id="nama" value="<?= htmlspecialchars($row['nama']); ?>" required><br><br>

            <label for="absen">Nomor Absen</label>
            <input type="number" name="absen" id="absen" value="<?= htmlspecialchars($row['absen']); ?>" required><br><br>

            <label>Foto Lama</label><br>
            <img src="file/<?= htmlspecialchars($row['foto']); ?>" width="100"><br><br>

            <label for="foto">Upload Foto Baru (Opsional)</label>
            <input type="file" name="foto" id="foto"><br><br>

            <button type="submit">Simpan Perubahan</button>
            <a href="konfirmasi.php" class="cancel-btn">Batal</a>
        </form>
    </div>

    <?php include "layout/footer.html"; ?>
</body>
</html>
