<?php
include "service/database.php"; // Pastikan ini sudah benar

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    // Pastikan ID hanya angka untuk mencegah SQL Injection
    $id = intval($id);

    // Hapus data koordinator berdasarkan ID
    $delete_sql = "DELETE FROM koordinator WHERE id='$id'";
    
    if (mysqli_query($db, $delete_sql)) {
        echo "<script>alert('Data berhasil dihapus!'); window.location='konfirmasi.php';</script>";
    } else {
        echo "<script>alert('Gagal menghapus data: " . mysqli_error($db) . "');</script>";
    }
} else {
    echo "<script>alert('ID tidak ditemukan!'); window.location='konfirmasi.php';</script>";
}
?>
