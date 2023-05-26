<?php 
require_once "../database.php";
$db = new Database("localhost","projetoaquaview","root","");

$id = $_GET["id"];

$cmd = $db->getOneFishData($id);

for($i = 0; $i < count($cmd); $i++){
    $fish = $cmd[$i];
}

$nomeImg = $fish["nomeImg"];

unlink($nomeImg);

$cmd = $db->deleteFish($id);

if(!$cmd){
    echo "Erro ao deletar";
}

header("Location: ../../dashboard.php");