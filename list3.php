<?php
echo "cachev=".$_REQUEST['cachev'];
$lista = "lista";
$count = -1;
$lines = file($lista);
date_default_timezone_set("UTC"); 
$result = "";
foreach($lines as $line_num => $line)
{
	$linija = $line;
	if(strpos($linija, " ")!==false)
	{
		$id = substr($linija,0,strpos($linija, " "));
		$linija = substr($linija,strpos($linija, " ")+1);
		$secret = substr($linija,0,strpos($linija, " "));
		$linija = substr($linija,strpos($linija, " ")+1);
		$time = substr($linija,0,strpos($linija, " "));
		$linija = substr($linija,strpos($linija, " ")+1);
		$linija = substr($linija,0,strlen($linija)-1);
		$now = time();
		$diff = $now - $time;
		$m = $diff / 60 % 60; 
		if($m<1)
		{
			echo $linija;
			$count=$id;
			$result .= $line;
		}
	}
}
$count++;
echo '&number='.$count;
	$fh = fopen($lista, 'w');
	fwrite($fh, $result);
	fclose($fh);