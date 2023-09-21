<?php
$lista    = "lista";
$lines    = file($lista);
$id_g     = $_GET['id'];
$secret_g = $_GET['secret'];
date_default_timezone_set("UTC");
$result = "";
foreach ($lines as $line_num => $line) {
    $linija = $line;
    if (strpos($linija, " ") !== false) {
        $id     = substr($linija, 0, strpos($linija, " "));
        $linija = substr($linija, strpos($linija, " ") + 1);
        $secret = substr($linija, 0, strpos($linija, " "));
        if ($id != $id_g || $secret != $secret_g) {
            $result .= $line;
        }
    }
}
$fh = fopen($lista, 'w');
fwrite($fh, $result);
fclose($fh);