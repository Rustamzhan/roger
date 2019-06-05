<?php
	date_default_timezone_set("Europe/Moscow");
	header("Refresh: 1; chat.php");
	$path = "../private/chat";
	if (file_exists($path))
	{
		$inf = file_get_contents($path);
		$contents = unserialize($inf);
		$i = 0;
		foreach ($contents as $msg)
			$i++;
		$j = $i;
		for($i = ($i > 99) ? $i - 100 : 0; $i < $j; $i++)
			echo date("[H:i]", $contents[$i]["time"])." <b>".$contents[$i]["login"]."</b>: ".$contents[$i]["msg"]."<br />";
	}
?>
