<?php

	$_SESSION['name'] = '';
	unset($_SESSION['name']);
	header('Location: ../../index.php');