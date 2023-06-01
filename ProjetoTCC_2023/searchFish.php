<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="Stylesheet" href="Back-end/Style/index.css">
    <title>AquaView</title>
</head>
<body>
    <?php
    require_once "Back-end/database.php";
    require_once "header.php";
    include "Back-end/Style/essentials.php";
    $db = new Database("localhost","projetoaquaview","root","");

    $pesquisa = $_POST["search"];
    $caracteristica = "especie";

    $cmd = $db->getFishSearch($pesquisa,$caracteristica);

    if($cmd == null){
        $caracteristica = "tipo";
        $cmd = $db->getFishSearch($pesquisa,$caracteristica);
        if($cmd == null){
            echo "Nao foi encontrado nenhuma correspondencia para esta pesquisa. Tente novamente.";
            die();
        }
    }
    ?>
    <div id="banner_wrap">
        <div id="banner">
            <img src="Uploads/Banner_Peixes.png" alt="imagem com diversos peixes ornamentais">
        </div>
    </div>
    <div id="content">
        <div id="wrap">
        <div id="cards">
                <?php
                    for($i = 0; $i < count($cmd); $i++){
                        $fish = $cmd[$i];
                ?>
                <a href="fishesDescript.php?id=<?=$fish["idPeixe"]?>"><div id="fish">
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
                </div></a>
                <?php }?>
            </div>
        </div>
    </div>
    <?php include "footer.php";?>
</body>
</html>