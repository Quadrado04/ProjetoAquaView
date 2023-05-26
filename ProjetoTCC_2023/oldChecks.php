<?php require_once "Back-end/database.php";?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="Stylesheet" href="Back-end/Style/oldChecks.css">
    <title>AquaView</title>
</head>
<body>
    <?php
        include "Back-end/Style/essentials.php";
        require_once "header.php";
        $db = new Database("localhost","projetoaquaview","root","");
        $cmd = $db->getAquariumData($_SESSION["user"]);
        $cmdUser = $db->getUserData($_SESSION["user"]);
        for($i = 0; $i < count($cmdUser); $i++){
            $user = $cmdUser[$i];
        }
    ?>
    </div>
    <div id="content">
        <div id="wrap">
            <div class="check">
                <div class="button_container">
                    <a href="checkAquarium.php"><button type="submit">Voltar</button></a>
                </div>
                <div id="check_data">
                    <div id="name_aq">
                        <h1>Leituras Antigas</h1>
                    </div>
                    <div id="userData">
                        <table class="showUserData">
                            <tr class="header">
                                <th>Usuário</th>
                                <th>Valor do pH</th>
                                <th>Temperatura</th>
                                <th>Salinidade</th>
                                <th>Data</th>
                            </tr>
                            <tbody>
                            <?php 
                                for($i = 0; $i < count($cmd); $i++){
                                    $data = $cmd[$i];
                            ?>
                                    <tr>
                                        <td><?= $user["usuario"]?></td>
                                        <td><?= $data["vlrPH"]?></td>
                                        <td><?= $data["vlrTemp"]?></td>
                                        <td><?= $data["vlrSal"]?></td>
                                        <td><?= $data["dtAtual"]?></td>
                                    </tr>
                            <?php }?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php require_once "footer.php";?>
</body>
</html>