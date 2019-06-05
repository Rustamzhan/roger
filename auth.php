<?php
	function auth($login, $passwd)
	{
		$path = "../private/passwd";
		if (!file_exists($path))
			return false;
		$cont = file_get_contents($path);
		$arrays = unserialize($cont);
		foreach($arrays as $key => $value)
		{
			if($value["login"] === $login)
			{
				if ($value["passwd"] === hash("whirlpool", $passwd))
					return true;
				else
					return false;
			}
		}
		return false;
	}
?>
