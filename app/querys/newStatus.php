<?php

	require_once '../dataBase/connectDB.php';

	$track = $_GET['track'];
	$status = $_GET['status'];

	$sql = 'UPDATE dispatch SET status = "'.$status.'" WHERE qr_name = "'.$track.'"';
	$pdo->query($sql);

	header("Location: ../../auth/parcel.php?track=$track");
