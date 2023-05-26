<?php require_once "Back-end/database.php";?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="Stylesheet" href="Back-end/Style/userUpdate.css">
    <title>AquaView</title>
</head>
<body>
    <?php
    require_once "Back-end/Style/essentials.php";
    require_once "header.php";
    $db = new Database("localhost","projetoaquaview","root","");
    $dados = $db->getUserData($_SESSION["user"]);

    ?>   
    <div id="content">
        <div id="wrap">
            <div class="top_container">
                <a href="userProfile.php"><button type="submit">Voltar</button></a>
            </div>
            <form action="Back-end/UserCodes/userUpdate.php" method="POST" enctype="multipart/form-data">
                <?php
                    for($i = 0; $i < count($dados); $i++){
                        $user = $dados[$i];
                ?>
                <div class="img_container">
                    <?php if($user["nomeImg"] != ""){?>
                        <img id="imgfile" src="Uploads/<?=$user["nomeImg"]?>" alt="Selecione uma foto para perfil">
                    <?php }else{?>
                        <img id="imgfile" src="Uploads/foto_perfil.png" alt="Selecione uma foto para perfil">
                    <?php }?>
                    <input id="image" type="file" name="image" accept="image/*">
                </div>
                <div class="text_container">
                    <div class="text_input">
                        <label for="name"><h3>Nome Completo:</h3></label>
                        <input id="name" type="text" name="name" value="<?= $user["nome"]?>">
                    </div>
                    <div class="text_input">
                        <label for="user"><h3>Usuário:</h3></label>
                        <input id="user" type="text" name="user" value="<?= $user["usuario"]?>">
                    </div>
                    <div class="text_input">
                        <label for="email"><h3>Email:</h3></label>
                        <input id="email" type="email" name="email" value="<?= $user["email"]?>">
                    </div>
                    <div class="text_input">
                        <label for="psw"><h3>Nova Senha:</h3></label>
                        <input id="psw" type="password" name="psw" value="<?= $user["senha"]?>">
                    </div>
                    <div class="text_input">
                        <label for="birth"><h3>Data de Nascimento:</h3></label>
                        <input id="birth" type="date" name="birth" value="<?= $user["dtNasc"]?>">
                    </div>
                    <div class="text_input">
                        <label for="phone"><h3>Telefone:</h3></label>
                        <input type="phone" name="phone" value="<?= $user["telefone"]?>">
                    </div>
                </div>
                <a href="Back-end/UserCodes/userAlteration.php?id=<?=$user["idUsuario"] ?>"><button type="submit">Alterar Cadastro</button></a>
                <?php }?>
            </form>
        </div>
    </div>
    <script src = "Back-end/script.js"></script>
    <?php require_once "footer.php";?> 
</body>
</html>