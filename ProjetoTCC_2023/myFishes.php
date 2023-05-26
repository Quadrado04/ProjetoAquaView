<?php require_once "Back-end/database.php";?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="Stylesheet" href="Back-end/Style/myFishes.css">
    <title>AquaView</title>
    <!--https://coolors.co/palette/e63946-f1faee-a8dadc-457b9d-1d3557 -->
</head>
<body>
    <?php
    include "Back-end/Style/essentials.php";
    require_once "header.php";
    $db = new Database("localhost","projetoaquaview","root","");

    $dados = $db->getUserFishData($_SESSION["user"]);
    ?>
    <div id="content">
        <div id="wrap">
            <div id="container">
                <div class="top_button">
                    <a href="userProfile.php"><button type="submit">Voltar</button></a>
                    <a href="addUserFish.php"><button type="submit">Adicionar Peixes</button></a>
                </div>
                <div id="name_aq">
                        <h1>Meus Peixes</h1>
                </div>
                <div id="cards">
                    <?php
                        for($i = 0; $i < count($dados); $i++){
                            $fish = $dados[$i];
                    ?>
                    <a href="fishUserDescript.php?id=<?=$fish["idPeixeUser"]?>"><div id="fish">
                        <div id="image"> <img src="Uploads/<?=$fish["nomeImg"]?>" alt="Sem imagem"></div>
                        <div id="specie">
                            <h2><?=$fish["nome"]?></h2>
                            <p><em><?=$fish["especie"]?></em>
                        </div>
                    </div></a>
                    <?php }?>
                </div>
            </div>
        </div>
    </div>
    <script src = "Back-end/script.js"></script>
    <?php include "footer.php";?>
</body>
</html>