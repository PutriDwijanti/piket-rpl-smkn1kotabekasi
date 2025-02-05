<?php
session_start();

include 'service/database.php';


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Jadwal Piket</title>
    <link rel="stylesheet" href="css/styles_jadwal.css">
</head>
<body>
<?php include "layout/header.html"; ?>

<div class="top-bar">
    <a href="dashboard.php" class="dashboard-text">Dashboard</a>
    <span class="jadwal-label">Jadwal</span>
</div>
<?php include "layout/footer.html"; ?>
</body>
</html>
