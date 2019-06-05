<?php
	session_start();
	$file_path = "../private/chat";
	if ($_SESSION["loggued_on_user"])
	{
		if (file_exists($file_path))
		{
			$str= file_get_contents($file_path);
			$msg_array = unserialize($str);
		}
		$msg = array(
			"login" => value1,
			"time" => value2,
			"msg" => value3
		);
		$msg["login"] = $_SESSION["loggued_on_user"];
		$msg["time"] = time();
		$msg["msg"] = $_POST["msg"];
		$msg_array[] = $msg;
		$content = serialize($msg_array);
		file_put_contents($file_path, $content, LOCK_EX);
	}
	else
	{
		header("Refresh: 3; index.html");
		echo "ERROR\n";
		return ;
	}
?>
<html>
<body>
	<form action="speak.php" method="POST">
		MSG: <input type="text" name="msg" value=""/>
		<input type="submit" name="send" value="OK"/>

	</form>
</body>
</html>
