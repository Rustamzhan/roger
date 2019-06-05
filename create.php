<?php
	if ($_POST["submit"] === "OK")
	{
		if ($_POST["login"] && $_POST["passwd"])
		{
			if (!(file_exists("../private")))
				mkdir("../private", 0755, true);
			$path = "../private/passwd";
			if (file_exists($path))
			{
				$cont = file_get_contents($path);
				$arrays = unserialize($cont);
				foreach($arrays as $key => $array)
					foreach($array as $key => $value)
						if($key == "login" && $value === $_POST["login"])
						{
							header("Refresh: 3; index.html");
							echo "ERROR\n";
							exit();
						}
				$arr = array("login" => $_POST["login"],
							"passwd" => hash("whirlpool", $_POST["passwd"]));
				$arrays[$_POST["login"]] = $arr;
				$cont = serialize($arrays);
				file_put_contents($path, $cont);
			}
			else
			{
				$arr = array("login" => $_POST["login"],
							"passwd" => hash("whirlpool", $_POST["passwd"]));
				$arrays[$_POST["login"]] = $arr;
				$cont = serialize($arrays);
				file_put_contents($path, $cont);
			}
			header("Refresh: 3; index.html");
			echo "OK\n";
		}
		else
		{
			header("Refresh: 3; index.html");
			echo "ERROR\n";
		}
	}
	else
	{
		header("Refresh: 3; index.html");
		echo "ERROR\n";
	}
?>
