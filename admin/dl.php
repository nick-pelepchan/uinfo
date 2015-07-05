<?php
$dl = isset($_GET['dl'])?$_GET['dl']:"main";
$bn = basename($dl);
header("Content-disposition: attachment; filename=$bn");
//header("Content-type: application/pdf");
readfile(".$dl");
?>