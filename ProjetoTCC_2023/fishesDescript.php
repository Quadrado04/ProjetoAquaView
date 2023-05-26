<?php require_once "Back-end/database.php";?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="Stylesheet" href="Back-end/Style/fishesDescript.css">
    <title>AquaView</title>
    <!--https://coolors.co/palette/e63946-f1faee-a8dadc-457b9d-1d3557 -->
</head>
<body>
    <?php
        include "Back-end/Style/essentials.php";
        require_once "header.php";
        $id = $_GET["id"];

        $db = new Database("localhost","projetoaquaview","root","");
        $dados = $db->getOneFishData($id);
    ?>
    </div>
    <div id="content">
        <div id="wrap">
            <div id="fish_description">
                <div class="top_container">
                    <a href="index.php"><button type="submit">Voltar</button></a>
                </div>
                <div id="fish">
                    <?php
                        for($i = 0; $i < count($dados); $i++){
                            $fish = $dados[$i];
                    ?>
                    <div id="image">
                        <?php if($fish["nomeImg"] != ""){?>
                            <img src="Uploads/<?=$fish["nomeImg"]?>" alt="Imagem de um peixe">
                        <?php }else{?>
                            <img src="Uploads/noimage.png" alt="Sem imagem de peixe">
                        <?php }?>
                    </div>
                    <div id="text">
                        <div id="specie">
                            <h2><?=$fish["especie"]?></h2>
                        </div>
                        <div id="description">
                            <p><?=$fish["descri"]?></p>
                        </div>
                        <div class="options_container">
                            <div class="info">
                                <div class="datas">
                                    <img src="Uploads/agua.png" alt="" title="Categoria">
                                    <p><?=$fish["tipo"]?></p>
                                </div>
                                <div class="datas">
                                    <img src="Uploads/termometro.png" alt="" title="Temperatura">
                                    <p><?=number_format($fish["tempMin"],1,'.','')?>°C – <?=number_format($fish["tempMax"],1,'.','')?>°C</p>
                                </div>
                                <div class="datas">
                                    <img src="Uploads/ph.png" alt="" title="Nível de pH mínimo e máximo">
                                    <p><?=number_format($fish["phMin"],1,'.','')?> – <?=number_format($fish["phMax"],1,'.','')?></p>
                                </div>
                                <div class="datas">
                                    <img src="Uploads/Salinidade.png" alt="" title="Salinidade">
                                    <p><?=$fish["salinidade"]?></p>
                                </div>
                            </div>
                            <div class="info">
                                <div class="datas">
                                    <img src="Uploads/cor.png" alt="" title="Cor predominante">
                                    <p><?=$fish["cor"]?></p>
                                </div>
                                <div class="datas">
                                    <img src="Uploads/alimento.png" alt="" title="Alimentação">
                                    <p><?=$fish["alimento"]?></p>
                                </div>
                                <div class="datas">
                                    <img src="Uploads/dificuldade.png" alt="" title="Dificuldade em cuidar">
                                    <p><?=$fish["dificuldade"]?></p>
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