<?php
    require_once "../database.php";
    $db = new Database("localhost","projetoaquaview","root","");

    $img = $_FILES["image"];
    $nome = $_POST["name"];
    $usuario = $_POST["user"];
    $email = $_POST["email"];
    $senha = $_POST["psw"];
    $dtNasc = $_POST["birth"];
    $telefone = $_POST["phone"];

    if($senha == ""){
        echo "Por favor, insira uma senha.";
    } 

    $cmd = $db->getUserData($_SESSION["user"]);
    for($i = 0; $i < count($cmd); $i++){
        $user = $cmd[$i];
    }

    if($user["nomeImg"] != ""){
        $imgNome = $user["nomeImg"];
        $imgDel = "../../Uploads/$imgNome";
        unlink($imgDel);
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

    $cmd = $db->updateUserData($imgNome,$nome,$usuario,$email,$senha,$dtNasc,$telefone,$_SESSION["user"]);

    if(!$cmd){
        echo "Erro ao atualizar cadastro.";
    }else{
        header("Location: ../../userProfile.php");
    }