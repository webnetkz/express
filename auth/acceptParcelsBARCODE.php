<?php
	session_start();
	if( empty($_SESSION['name']) ) {
		header('Location: ../index.php');
	}
	require_once "../app/dataBase/connectDB.php";	

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Express</title>
    <link rel="stylesheet" href="../public/css/style.css">
</head>
<body>
    <section id="content">
		<h1>
			<?php
				if( !empty($_SESSION['msg']) ) {
					echo $_SESSION['msg'];
					unset($_SESSION['msg']);
				}
			?>
		</h1>
		<input type="text" id="barCode" class="inp" onchange="location.href = 'acceptParcelBARCODE.php?track='+this.value">
    </section>
	<?php require_once 'template/footer.php'; ?>
    <script>

	</script>
    <script src="../../public/js/main.js"></script>
</body>
</html>
