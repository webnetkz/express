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
        <form action="app/libs/sign/signin.php" method="POST">
            <p style="text-align: center; margin-top: 15px;">Войти по логину</p>
            <input name="login" type="text" class="inp" style="margin: 10px 0;" placeholder="Логин" required>
            <input name="pass" type="password" class="inp" style="margin: 10px 0;" placeholder="Пароль" required>
            <button class="btn" style="width: 50%; margin-left: 25%;" type="submit" name="sing">Войти</button>
        </form>
    </section>
    <footer>

    </footer>
    <script src="public/js/es6.js"></script>
    <script src="public/js/main.js"></script>
</body>
</html>