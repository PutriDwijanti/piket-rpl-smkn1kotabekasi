<?php
include "service/database.php";
session_start();

$register_message = "";

if (isset($_SESSION["is_login"])) {
    header("location: dashboard.php");
    exit();
}

if (isset($_POST["register"])) {
    $username = trim($_POST["username"]);
    $email = trim($_POST["email"]);
    $password = trim($_POST["password"]);
    
    if (empty($username) || empty($email) || empty($password)) { 
        $register_message = "Username, email, dan password tidak boleh kosong";
    } else {
        $hash_password = hash("sha256", $password);

        try {
            $sql = "INSERT INTO users (username, email, password) VALUES ('$username', '$email', '$hash_password')";
            
            if ($db->query($sql)) {
                $register_message = "Daftar akun berhasil, silahkan login";
            } else {
                $register_message = "Daftar akun gagal, silahkan coba lagi";
            }
        } catch (mysqli_sql_exception) {
            $register_message = "Username sudah digunakan, silahkan gunakan username lain";
        }
        $db->close();
    }
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registrasi</title>
    <link rel="stylesheet" href="css/styles_register.css">
</head>
<body>
    <?php include "layout/header.html" ?>

    <div class="register-container">
        <h3>REGISTER</h3>
        <p><?= $register_message ?></p>
        <form action="register.php" method="POST">
            <input type="text" placeholder="Username" name="username" required/><br><br>
            <input type="email" placeholder="Email" name="email" required/><br><br>
            <input type="password" placeholder="Password" name="password" required/><br><br>
            <button type="submit" name="register">Signup</button>
        </form>
    </div>

    <p>Sudah memiliki akun? <a href="login.php">Login di sini</a></p>

    <?php include "layout/footer.html" ?>
</body>
</html>
