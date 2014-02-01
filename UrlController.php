<?php
require("UrlObj.php");

class UrlController
{
	public static function add_url($pdo, $url)
	{
		$insert = $pdo->prepare("INSERT INTO `url_matches` (`key`, `data`) VALUES(:key, :data)");
		$insert->bindParam(":key", $url->get_key(), PDO::PARAM_STR);
		$insert->bindParam(":data", $url->get_data(), PDO::PARAM_STR);

		if (!$insert)
		{
			return false;
		}
		else
		{
			if ($insert->execute())
			{
				return false;
			}
			else
			{
				return true;
			}
		}
	}
}
?>