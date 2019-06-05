<?php
	if ($_POST["submit"] === "OK" && file_exists("../private/passwd"))
	{
		if ($_POST["login"] && $_POST["oldpw"] && $_POST["newpw"])
		{
			$path = "../private/passwd";
			$cont = file_get_contents($path);
			$arrays = unserialize($cont);
			foreach($arrays as $key => $value)
			{
				if($value["login"] === $_POST["login"])
				{
					if ($value["passwd"] === hash("whirlpool", $_POST["oldpw"]))
					{
						$arrays[$key]["passwd"] = hash("whirlpool", $_POST["newpw"]);
						$cont = serialize($arrays);
						file_put_contents($path, $cont);
						header("Refresh: 3; index.html");
						echo "OK\n";
						exit();
					}
					else
					{
						header("Refresh: 3; index.html");
						echo "Check Password\n";
						exit();
					}
				}
				else
				{
					header("Refresh: 3; index.html");
					echo "Check Username\n";
					exit();
				}
			}
		}
	}
	header("Refresh: 3; index.html");
	echo "ERROR\n";
?>
