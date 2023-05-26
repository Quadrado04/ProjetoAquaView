<?php require_once "Back-end/database.php";?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="Stylesheet" href="Back-end/Style/dashboard.css">
    <?php include "Back-end/Style/essentials.php";?>
    <title>AquaView</title>
</head>
<body>
    <?php require_once "header.php";
    $db = new Database("localhost","projetoaquaview","root","");

    $dadosUser = $db->getAllUsers();
    $dadosFish = $db->getAllFish();
    ?>
    <div id="content">
        <div id="wrap">
            <div id="dashboard">
                <div class="top_button">
                <a href="Back-end/UserCodes/userLogoff.php"><button>Sair</button></a>
                </div>
                <div id="data_Wrapper">
                    <div id="addFish">
                        <h2>Adicionar Peixes</h2>
                        <form action="Back-end/AdmCodes/fishInsert.php" method="POST" enctype="multipart/form-data">
                            <div class="img_container">
                                <img id="imgfile" src="Uploads/peixe.png" alt="Selecione uma foto para perfil">
                                <input id="image" type="file" name="image" accept="image/*">
                            </div>
                            <div id="data">
                                <div class="info">
                                <h4>Espécie:</h4>
                                <input id="species" type="text" name="species">
                                </div>
                                <div class="info">
                                <h4>Coloração:</h4>
                                <input id="color" type="text" name="color">
                                </div>
                                <div class="info">
                                <h4>Descrição:</h4>
                                <input id="desc" type="text" name="desc">
                                </div>
                                <div class="info">
                                <h4>Temperatura Mínima:</h4>
                                <input id="tempMin" type="text" name="tempMin">
                                </div>
                                <div class="info">
                                <h4>Temperatura Máxima:</h4>
                                <input id="tempMax" type="text" name="tempMax">
                                </div>
                                <div class="info">
                                <h4>Tipo de alimento:</h4>
                                <input id="food" type="text" name="food">
                                </div>
                                <div class="info">
                                <h4>PH Min:</h4>
                                <input id="phMin" type="text" name="phMin">
                                </div>
                                <div class="info">
                                <h4>PH Máx:</h4>
                                <input id="phMax" type="text" name="phMax">
                                </div>
                                <div class="info">
                                <h4>Categoria:</h4>
                                <select id="type" name="type">
                                <option>Selecionar</option>
                                <option>Água doce</option>
                                <option>Marinho</option>
                                </select>
                                </div>
                                <div class="info">
                                <h4>Nível de salinidade:</h4>
                                <input id="salinity" type="text" name="salinity">
                                </div>
                                <div class="info">
                                <h4>Nível de dificuldade:</h4>
                                <input id="dificulty" type="text" name="dificulty">
                                </div>
                                <a href="Back-end/AdmCodes/fishInsert.php"><button onclick="" type="submit">Cadastrar</button></a>
                            </div>
                        </form>
                    </div>
                    <div id="fishData">
                        <h2>Peixes</h2>
                        <table class="showFishData">
                            <tr class="header">
                                <th>Id</th>
                                <th>Espécie</th>
                                <th>pH Mínimo</th>
                                <th>pH Máximo</th>
                                <th>Temperatura Máx</th>
                                <th>Temperatura Min</th>
                                <th>Categoria</th>
                                <th>Ação</th>
                            </tr>
                            <tbody>
                                <?php 
                                    for($i = 0; $i < count($dadosFish); $i++){
                                        $fish = $dadosFish[$i];
                                ?>
                                        <tr>
                                            <td><?= $fish["idPeixe"]?></td>
                                            <td><?= $fish["especie"]?></td>
                                            <td><?= $fish["phMin"]?></td>
                                            <td><?= $fish["phMax"]?></td>
                                            <td><?= $fish["tempMin"]?></td>
                                            <td><?= $fish["tempMax"]?></td>
                                            <td><?= $fish["tipo"]?></td>
                                            <td><a href="Back-end/AdmCodes/fishDelete.php?id=<?=$fish["idPeixe"]?>"><button>Deletar</button></a></td>
                                        </tr>
                                <?php }?>
                            </tbody>
                        </table>
                    </div>
                    <div id="userData">
                        <h2>Usuários</h2>
                        <table class="showUserData">
                            <tr class="header">
                                <th>Id</th>
                                <th>Nome</th>
                                <th>Usuário</th>
                                <th>Email</th>
                                <th>Ação</th>
                            </tr>
                            <tbody>
                            <?php 
                                for($i = 0; $i < count($dadosUser); $i++){
                                    $user = $dadosUser[$i];
                            ?>
                                    <tr>
                                        <td><?= $user["idUsuario"]?></td>
                                        <td><?= $user["nome"]?></td>
                                        <td><?= $user["usuario"]?></td>
                                        <td><?= $user["email"]?></td>
                                        <td><a href="Back-end/AdmCodes/userDelete.php?id=<?=$user["idUsuario"]?>"><button>Deletar</button></a></td>
                                    </tr>
                            <?php }?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src = "Back-end/script.js"></script>
    <?php require_once "footer.php"?>
</body>
</html>