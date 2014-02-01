<?php
$dests = array(
	array('Anchorage', 'Boston'),
	array('Houston', 'Indianapolis'),
	array('Seattle', 'Los Angeles')
);

function fetch_itinerary($array)
{
	$m = array();

	for ($i = 0; $i < count($array); ++$i)
	{
		$orig = $array[$i][0];
		$dest = $array[$i][1];

		$m[] = $orig;
		$m[] = $dest;
	}

	$r = (string) NULL;

	for ($i = 0; $i < count($m) - 1; ++$i)
	{
		$n = $i + 1;
		$r .= $n.'.&nbsp;'.$m[$i];
		if ($i < count($m) - 1)
			$r .= '&nbsp;=>&nbsp;'.$m[$i+1].'<br/>';
	}

	return $r;
}
?>