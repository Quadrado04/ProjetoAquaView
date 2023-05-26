<?php require_once "Back-end/database.php";?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="Stylesheet" href="Back-end/Style/userProfile.css">
    <title>AquaView</title>
</head>
<body>
    <?php
        require_once "Back-end/Style/essentials.php";
        require_once "header.php";
        $db = new Database("localhost","projetoaquaview","root","");

        $cmd = $db->getUserData($_SESSION["user"]);

        for($i = 0; $i < count($cmd); $i++){
            $user = $cmd[$i];
        }
    ?>   
    <div id="content">
        <div id="wrap">
            <div id="user_profile">
                <div class="top_container">
                    <a href="index.php"><button type="submit">Voltar</button></a>
                    <a href="Back-end/UserCodes/userLogoff.php"><button type="submit">Sair</button></a>
                </div>
                <div class="img_container">
                    <?php if($user["nomeImg"] != ""){?>
                        <img id="imgfile" src="Uploads/<?=$user["nomeImg"]?>" alt="Selecione uma foto para perfil">
                    <?php }else{?>
                        <img id="imgfile" src="Uploads/foto_perfil.png" alt="Selecione uma foto para perfil">
                    <?php }?>
                    <h2>Olá, <?=$user["usuario"]?></h2>
                </div>
                <div class="options_container">
                    <a href="myFishes.php">
                        <button type="submit"><img src="Uploads/peixe.png" alt=""><h4>Meus Peixes</h4></button>
                    </a>
                    <a href="checkAquarium.php">
                        <button type="submit"><img src="Uploads/aquario.png" alt=""><h4>Verificar Aquário</h4></button>
                    </a>
                    <a href="compatibleFish.php">
                        <button type="submit"><img src="Uploads/peixes.png" alt=""><h4>Peixes Compatíveis</h4></button>
                    </a>
                    <a href="profileAlteration.php">
                        <button type="submit"><img src="Uploads/cadastro.png" alt=""><h4>Alterar Cadastro</h4></button>
                    </a>
                </div>
            </div>
        </div>
    </div>
    <?php require_once "footer.php";?> 
</body>
</html>