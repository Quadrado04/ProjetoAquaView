<?php require_once "Back-end/database.php";?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="Stylesheet" href="Back-end/Style/index.css">
    <title>AquaView</title>
    <!--https://coolors.co/palette/e63946-f1faee-a8dadc-457b9d-1d3557 -->
</head>
<body>
    <?php
        include "Back-end/Style/essentials.php";
        require_once "header.php";
        $db = new Database("localhost","projetoaquaview","root","");

        if(isset($_GET["filter"])){
            echo $filter = $_GET["filter"];

            if($filter == "AguaDoce"){
                $filter = "Água doce";
                $dados = $db->getFilter($filter);
            }else{
                $dados = $db->getFilter($filter);
            }
        }else{
            $dados = $db->getAllFish();
        }
    ?>
     <div id="banner_wrap">
        <div id="banner">
            <img src="Uploads/Banner_Peixes.png" alt="imagem com diversos peixes ornamentais">
        </div>
    </div>
    <div id="content">
        <div id="wrap">
            <div class="top_button">
                <a href="/ProjetoTCC_2023/index.php" class="filter active"><button type="submit">Todos</button></a>
                <a href="/ProjetoTCC_2023/index.php?filter=AguaDoce" class="filter"><button type="submit">Água Doce</button></a>
                <a href="/ProjetoTCC_2023/index.php?filter=Marinho" class="filter"><button type="submit">Marinho</button></a>
            </div>
            <script>
                let url = window.location.pathname + window.location.search;
                let buttons = document.querySelectorAll(".filter");

                buttons.forEach(function(e){
                let href = e.getAttribute("href");
                e.classList.remove('active');
                if(href == url){
                    e.classList.add('active');
                }
                })
            </script>
            <div id="cards">
                <?php
                    for($i = 0; $i < count($dados); $i++){
                        $fish = $dados[$i];
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