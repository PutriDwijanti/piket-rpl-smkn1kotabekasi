<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Piket RPL</title>
    <link rel="stylesheet" href="css/styles.css">
</head>
<body>

    <div class="loading-container">
        <div class="shield-icon">
            <img src="img/piket.png" alt="Shield Icon">
        </div>
        <h2 class="title">Piket RPL</h2>
        <div class="loading-animation">
            <span></span><span></span><span></span><span></span><span></span>
        </div>
    </div>

    <script>
        setTimeout(() => {
            window.location.href = "login.php";
        }, 10000); 
    </script>
    
    <?php include "layout/footer.html"; ?>
</body>
</html>
