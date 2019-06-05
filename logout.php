<?php
	session_start();
	$_SESSION["loggued_on_user"] = "";
	header("Refresh: 3; index.html");
?>
