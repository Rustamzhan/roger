<?php
	include ("auth.php");
	session_start();
	if (auth($_POST["login"], $_POST["passwd"]))
	{
		$_SESSION["loggued_on_user"] = $_POST["login"];
		echo "Hello, ".$_SESSION["loggued_on_user"]."\n";
	}
	else
	{
		header("Refresh: 3; index.html");
		$_SESSION["loggued_on_user"] = "";
		echo "ERROR\n";
		return ;
	}
?>
<html>
<body style="background-color:lavender">
	<iframe name="chat" src="chat.php" width="100%" height="550px"></iframe>
	<iframe name="speak" src="speak.php" width="100%" height="50px"></iframe>
	<br />
	<a href="logout.php"> LogOut </a>
</body>
</html>
