<?php

function formatQuery($string)
{
	$string   = str_replace("\\", "\\\\", $string);
	$string   = str_replace("\"", "\\\"", $string);
	$string   = str_replace("'", "\'", $string);
	return $string;
}

?>
