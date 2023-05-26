<?php require_once "Back-end/database.php";?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="Stylesheet" href="Back-end/Style/compatibleFish.css">
    <title>AquaView</title>
</head>
<body>
    <?php
    include "Back-end/Style/essentials.php";
    require_once "header.php";
    $db = new Database("localhost","projetoaquaview","root","");
    $cmd = $db->getLastAquariumData($_SESSION["user"]);
    ?>
    <div id="content">
        <div id="wrap">
            <div id="container">
                <div class="top_button">
                    <a href="userProfile.php"><button type="submit">Voltar</button></a>
                </div>
                <div id="name_aq">
                        <h1>Peixes Compatíveis</h1>
                </div>
                <div id="check_data">
                    <div id="name">
                        <h3>Última Leitura</h3>
                    </div>
                    <?php
                        for($i = 0; $i < count($cmd); $i++){
                            $data = $cmd[$i];
                    ?>
                    <div class="info_wrapper">
                        <div class="info">
                        <label>Número de série:</label>
                        <div class="data"></div>
                        </div>
                        <div class="info">
                        <label>Valor de pH:</label>
                        <div class="data"><?=$data["vlrPH"]?></div>
                        </div>
                        <div class="info">
                        <label>Temperatura:</label>
                        <div class="data"><?=$data["vlrTemp"]?></div>
                        </div>
                        <div class="info">
                        <label>Salinidade:</label>
                        <div class="data"><?=$data["vlrSal"]?></div>
                        </div>
                    </div>
                    <?php 
                    }
                    $dados = $db->getCompatibleFish($data["vlrPH"],$data["vlrTemp"]);
                    ?>
                </div>
                <div id="container_cards">
                    <div id="cards">
                    <?php
                        for($i = 0; $i < count($dados); $i++){
                            $fish = $dados[$i];
                    ?>
                    <a href="fishesCompatibleDescript.php?id=<?=$fish["idPeixe"]?>">
                        <div id="fish">
                            <?php    
                            ?>
                            <div id="image">
                                <?php if($fish["nomeImg"] != ""){?>
                                    <img src="Uploads/<?=$fish["nomeImg"]?>" alt="imagem de um peixe">
                                <?php }else{?>
                                    <img src="Uploads/noimage.png" alt="sem imagem">
                                <?php }?>
                            </div>
                            <div id="text">
                                <div id="specie">
                                    <h2><?=$fish["especie"]?></h2>
                                </div>
                                <div id="description">
                                    <?=$fish["descri"]?>
                                </div>
                                <div class="info">
                                    <div class="datas">
                                        <img src="Uploads/agua.png" alt="" title="Categoria">
                                        <p><?=$fish["tipo"]?></p>
                                    </div>
                                    <div class="datas">
                                        <img src="Uploads/dificuldade.png" alt="" title="Dificuldade em cuidar">
                                        <p><?=$fish["dificuldade"]?></p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </a>
                    <?php }?>
                </div>
            </div>
        </div>
    </div>
    <?php include "footer.php";?>
</body>
</html>