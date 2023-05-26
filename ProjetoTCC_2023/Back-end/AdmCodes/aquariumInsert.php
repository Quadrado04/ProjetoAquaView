<?php
require_once "../database.php";
$db = new Database("localhost","projetoaquaview","root","");

$n1 = (float)rand(0,14);

$pH = number_format($n1, 1, '.', '');

$n1 = (float)rand(12,36);

$temp = number_format($n1, 1, '.', '');

//$n1 = (float)rand(0,14);

$salinity = 0;//number_format($n1, 1, '.', '');

$cmd = $db->setAquariumData($pH,$temp,$salinity,$_SESSION["user"]);

if(!$cmd){
    echo "Algo deu errado";
    die();
}

header("Location: ../../checkAquarium.php");