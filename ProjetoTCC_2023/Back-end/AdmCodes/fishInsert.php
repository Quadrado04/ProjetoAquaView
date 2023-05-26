<?php
require_once "../database.php";
$db = new Database("localhost","projetoaquaview","root","");

$img = $_FILES["image"];
$species = $_POST["species"];
$color = $_POST["color"];
$descri = $_POST["desc"];
$tempMin = (float)$_POST["tempMin"];
$tempMax = (float)$_POST["tempMax"];
$phMin = (float)$_POST["phMin"];
$phMax = (float)$_POST["phMax"];
$comida = $_POST["food"];
$tipo = $_POST["type"];
$salinidade = $_POST["salinity"];
$dificuldade = $_POST["dificulty"];

if(!$img == ""){
    $imgNome = $img["name"];
    $from = $img["tmp_name"];
    $to = "../../Uploads/$imgNome";
    //checa se a imagem foi enviada ou nao
    if(!empty($imgNome)){
        $upload = move_uploaded_file($from, $to);
        //checa se o upload deu certo
        if($upload == false) {
            die("Algo deu errado ao enviar sua imagem");
        }
    }
}else{
    echo "Insira uma imagem";
}

$cmd = $db->setFish($imgNome,$species,$color,$descri,$tempMin,$tempMax,$phMin,$phMax,$comida,$tipo,$salinidade,$dificuldade);

if($cmd){
    header("Location: ../../dashboard.php");
}