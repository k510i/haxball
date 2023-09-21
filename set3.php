<?php
	$lista = "lista";
	//$slobodan = '1';
	//$ukupno = '0';
	date_default_timezone_set("UTC"); 
	$id=$_GET['id'];
	$result = "";
	$slobodan = -1;
	$lines = file($lista);
	foreach($lines as $line_num => $line)
	{
		if(strpos($line, " ")!==false)
		{
		//echo substr($line,0,strpos($line, " ")).'<br>';
			$slobodan = substr($line,0,strpos($line, " "));
			if($id==$slobodan)
			{
				$result .= $id.' '.$_GET['secret'].' '.time().' ';
				foreach ($_POST as $key => $value) {
				$result .= '&'.$key.$id.'='.$value;
				}
				$result .= "\n";
			}
			else
			{
				$result .= $line;
			}
		}
	}
	if($id=='-1')
	{
		$slobodan++;
		$id=$slobodan;
		$result .= $id.' '.$_GET['secret'].' '.time().' ';
		foreach ($_POST as $key => $value) {
		$result .= '&'.$key.$id.'='.$value;
		}
		$result .= "\n";
	}
	//$result
	//ob_start();
	//var_dump($_REQUEST);
	//$result = ob_get_clean();
	$fh = fopen($lista, 'w');
	fwrite($fh, $result);
	fclose($fh);
	echo "id=".$id;