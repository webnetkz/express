<?php
	session_start();
	if(!empty($_SESSION['name'])) {
		header('Location: ../index.php');
	}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Express</title>
    <link rel="stylesheet" href="public/css/style.css">
</head>
<body>
    <section id="content">
        <button class="btn" style="width: 50%; margin-left: 25%; margin-top: 40%;" onclick="location.href = 'scan.php'">Войти по QR</button>
    </section>
    <footer>

    </footer>
    <script src="public/js/es6.js"></script>
    <script src="public/js/main.js"></script>
</body>
</html>