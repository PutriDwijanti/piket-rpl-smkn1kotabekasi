<?php
include "service/database.php";
session_start();

$login_message = "";

// Cek apakah pengguna sudah login
if (isset($_SESSION['is_login'])) {
    header("Location: dashboard.php");
    exit();
}

if (isset($_POST['login'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];
    $hash_password = hash("sha256", $password);

    // Query untuk cek username dan password
    $sql = "SELECT * FROM users WHERE username = '$username' AND password = '$hash_password'";

    $result = $db->query($sql);

    if ($result->num_rows > 0) {
        $data = $result->fetch_assoc();
        $_SESSION['username'] = $data["username"];
        $_SESSION['id_users'] = $data['id_users'];  // Simpan id_users di sesi
        $_SESSION['is_login'] = true;
        header("Location: dashboard.php");
        exit();
    } else {
        $login_message = "Login gagal, username atau password salah.";
    }
    $db->close();
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="css/styles_login.css">
</head>
<body>
    <?php include "layout/header.html" ?>
    
    <div class="login-container">
        <h3>LOGIN</h3>
        <p><?= $login_message ?></p>
        <form action="login.php" method="POST">
            <input type="text" name="username" placeholder="Username" required/><br><br>
            <input type="password" name="password" placeholder="Password" required/><br><br>
            <button type="submit" name="login">Login</button>
        </form>
    </div>
    <p>Belum memiliki akun? <a href="register.php">Regist di sini</a></p>

    <?php include "layout/footer.html" ?>
</body>
</html>
