<?php require_once "Back-end/database.php";?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="Stylesheet" href="Back-end/Style/fishUserDescript.css">
    <title>AquaView</title>
    <!--https://coolors.co/palette/e63946-f1faee-a8dadc-457b9d-1d3557 -->
</head>
<body>
    <?php
        include "Back-end/Style/essentials.php";
        require_once "header.php";
        $db = new Database("localhost","projetoaquaview","root","");
        $id = $_GET["id"];
        $dados = $db->getOneUserFishData($id);
    ?>
    </div>
    <div id="content">
        <div id="wrap">
            <div id="fish_description">
                <div class="top_container">
                    <a href="myFishes.php"><button type="submit">Voltar</button></a>
                    <a href="Back-end/UserCodes/fishUserDelete.php?id=<?=$id?>"><button type="submit">Deletar</button></a>
                </div>
                <div id="fish">
                    <?php
                        for($i = 0; $i < count($dados); $i++){
                            $fish = $dados[$i];
                    ?>
                    <div id="image">
                        <img src="Uploads/<?=$fish["nomeImg"]?>" alt="Sem imagem">
                    </div>
                    <div id="text">
                        <div id="specie">
                            <h2><?=$fish["nome"]?></h2>
                            <p><em><?=$fish["especie"]?></em></p>
                        </div>
                        <div class="options_container">
                            <div class="info">
                                    <div class="datas">
                                        <img src="Uploads/agua.png" alt="" title="Categoria">
                                        <p><?=$fish["tipo"]?></p>
                                    </div>
                                    <div class="datas">
                                        <img src="Uploads/termometro.png" alt="" title="Temperatura">
                                        <p><?=$fish["temp"]?></p>
                                    </div>
                                    <div class="datas">
                                        <img src="Uploads/salinidade.png" alt="" title="Salinidade">
                                        <p><?=$fish["salinidade"]?></p>
                                    </div>
                                </div>
                                <div class="info">
                                    <div class="datas">
                                        <img src="Uploads/cor.png" alt="" title="Cor">
                                        <p><?=$fish["cor"]?></p>
                                    </div>
                                    <div class="datas">
                                        <img src="Uploads/ph.png" alt="" title="Nível de pH">
                                        <p><?=$fish["ph"]?></p>
                                    </div>
                                    <div class="datas">
                                        <img src="Uploads/alimento.png" alt="" title="Alimentação">
                                        <p><?=$fish["alimento"]?></p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <?php }?>
            </div>
        </div>
    </div>
    <?php require_once "footer.php";?>
</body>
</html>