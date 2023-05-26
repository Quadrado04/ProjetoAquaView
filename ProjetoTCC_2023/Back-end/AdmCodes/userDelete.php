<?php
require_once "../database.php";
$db = new Database("localhost","projetoaquaview","root","");

$id = $_GET["id"];

$cmd = $db->getUserData($id);

for($i = 0; $i < count($cmd); $i++){
    $user = $$cmd[$i];
}

$nomeImg = $user["nomeImg"];

unlink($nomeImg);

$cmd = $db->deleteUser($id);

if(!$cmd){
    echo "Erro ao deletar";
}

header("Location: ../../dashboard.php");