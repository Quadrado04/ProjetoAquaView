<?php
    require_once "../database.php";
    $db = new Database("localhost","projetoaquaview","root","");

    $id = $_GET["id"];

    $cmd = $db->getOneUserFishData($id);

    for($i = 0; $i < count($cmd); $i++){
        $fish = $cmd[$i];
    }

    $nomeImg = $fish["nomeImg"];

    unlink($nomeImg);

    $cmd = $db->deleteUserFish($id);

    if($cmd){
        header("Location: ../../myFishes.php");
    }