<?php
    require_once "../database.php";
    $db = new Database("localhost","projetoaquaview","root","");

    $img = $_FILES["image"];
    $especie = $_POST["specie"];
    $apelido = $_POST["nick"];
    $cor = $_POST["color"];
    $temperatura = $_POST["temp"];
    $pH = $_POST["pH"];
    $alimento = $_POST["food"];
    $tipo = $_POST["type"];
    $salinidade = $_POST["salinity"];

    if($tipo == "Selecionar"){
        echo "Selecione uma categoria.";
    }

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
    try{
        $cmd = $db->setUserFish($imgNome, $especie, $apelido, $cor, $temperatura, $pH, $alimento, $tipo, $salinidade, $_SESSION["user"]);
        if($cmd){
            header("Location: ../../myFishes.php");
        }
    }catch(PDOException $e){
        echo "Erro no Banco de Dados: ".$e->getMessage();
        exit();
    }catch(Exception $e){
        echo "Erro genérico: ".$e->getMessage();
        exit();
    }