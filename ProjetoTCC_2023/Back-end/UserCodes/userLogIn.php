<?php
    require_once "../database.php";
    $db = new Database("localhost","projetoaquaview","root","");

    $usuario = $_POST["email"];
    $senha = $_POST["psw"];

    if(isset($_SESSION["user"]) || isset($_SESSION["adm"])) {
        die('Você já está logado com outra conta!');
    }
    $cmd = $db->getUserLogIn($usuario);

    if($cmd == false){
        echo"Este usuário não está cadastrado.";
    }else{
        for($i = 0; $i < count($cmd); $i++){
            $user = $cmd[$i];
        }

        if ($user["email"] == $usuario && $user["senha"] == $senha){
            if($usuario == "admin@admin.com"){
                $_SESSION["adm"] = $user["idUsuario"];
                header("Location: ../../dashboard.php");
            }else{
                $_SESSION["user"] = $user["idUsuario"];
                header("Location: ../../userProfile.php");
            }
        }else {
            echo 'usuario ou senha invalidos!';
        }
    }