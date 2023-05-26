<?php
    require_once "../database.php";
    $db = new Database("localhost","projetoaquaview","root","");

    $img = $_FILES["image"];
    $nome = addslashes($_POST["name"]);
    $usuario = addslashes($_POST["user"]);
    $email = addslashes($_POST["email"]);
    $sexo = addslashes($_POST["sex"]);
    $dtNasc = addslashes($_POST["birth"]);
    $senha = addslashes($_POST["psw"]);
    $telefone = addslashes($_POST["phone"]);
    $dispositivo = addslashes($_POST["device"]);

    $email = filter_var(FILTER_SANITIZE_EMAIL);

    if(filter_var($email,FILTER_VALIDATE_EMAIL) == true){
        $cmd = $db->getAllMails($email);

        for($i = 0; $i < count($cmd); $i++){
            $user = $cmd[$i];
            if($user["email"] == $email){
                echo "Este email já foi cadastrado";
                die();
            }
        }
    }else{
        echo "Insira um email válido";
    }
    

    //checa se todos os campos necessarios foram preenchidos
    if($nome && $usuario && $email && $sexo && $dtNasc && $senha && $dispositivo != "")
    {
        //checa se os campos sao iguais
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
            $cmd = $db->setUser($imgNome, $nome, $usuario, $email, $sexo, $dtNasc, $senha, $telefone, $dispositivo);
            if(!$cmd){
                echo "Email já cadastrado";
            }
        }catch(PDOException $e){
            echo "Erro no Banco de Dados: ".$e->getMessage();
            exit();
        }catch(Exception $e){
            echo "Erro genérico: ".$e->getMessage();
            exit();
        }

    }else{
        echo "Preencha todo os Dados";
    }
    header("Location: ../../loginUser.php");