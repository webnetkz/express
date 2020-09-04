<?php

	require_once '../dataBase/connectDB.php';

	$track = $_GET['track'];
	$mass = $_GET['mass'];

	$sql = 'UPDATE dispatch SET mass = "'.$mass.'" WHERE qr_name = "'.$track.'"';
	$pdo->query($sql);

	header("Location: ../../auth/parcel.php?track=$track");
