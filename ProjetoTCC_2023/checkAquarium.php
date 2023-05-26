<?php require_once "Back-end/database.php";?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="Stylesheet" href="Back-end/Style/checkAquarium.css">
    <title>AquaView</title>
</head>
<body>
    <?php
        include "Back-end/Style/essentials.php";
        require_once "header.php";
        $db = new Database("localhost","projetoaquaview","root","");
        $cmd = $db->getLastAquariumData($_SESSION["user"]);
    ?>
    </div>
    <div id="content">
        <div id="wrap">
            <div class="check">
                <div class="button_container">
                    <div class="left">
                        <a href="userProfile.php"><button type="submit">Voltar</button></a>
                    </div>
                    <div class="right">
                        <a href="Back-end/AdmCodes/aquariumInsert.php"><button type="submit">Nova Leitura</button></a>
                        <a href="oldChecks.php"><button type="submit">Leituras Antigas</button></a>
                    </div>
                </div>
                <div id="check_data">
                    <?php
                        for($i = 0; $i < count($cmd); $i++){
                            $data = $cmd[$i];
                    ?>
                    <div id="name_aq">
                        <h1>Leitura Atual</h1>
                    </div>
                    <div id="id_number">
                        <label for="id_number">Número de série do produto</label>
                        <div class="data"></div>
                    </div>
                    <div id="pH">
                        <label for="pH">Valor de pH atual</label>
                        <div class="data"><?=$data["vlrPH"]?></div>
                    </div>
                    <div id="temperature">
                        <label for="temperature">Valor de temperatura atual</label>
                        <div class="data"><?=$data["vlrTemp"]?></div>
                    </div>
                    <div id="salinity">
                        <label for="salinity">Valor de salinidade atual</label>
                        <div class="data"><?=$data["vlrSal"]?></div>
                    </div>
                    <?php }?>
                </div>
            </div>
        </div>
    </div>
    <?php require_once "footer.php";?>
</body>
</html>