<?php require_once "Back-end/database.php";?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="Stylesheet" href="Back-end/Style/addUserFish.css">
    <title>AquaView</title>
</head>
<body>
    <?php
        include "Back-end/Style/essentials.php";
        require_once "header.php";
    ?>
    <div id="content">
        <div id="wrap">
            <div id="container">
                <div class="top_button">
                    <a href="myFishes.php"><button type="submit">Voltar</button></a>
                </div>
                <div id="name_aq">
                        <h1>Adicionar Peixes do seu aquário</h1>
                </div>
                <form action="Back-end/UserCodes/fishUserInsert.php" method="POST" enctype="multipart/form-data">
                    <div class="img_container">
                        <h3>Adicione uma foto de seu peixe:</h3>
                        <img id="imgfile" src="Uploads/peixe.png" alt="Selecione uma foto para perfil">
                        <input id="image" type="file" name="image" accept="image/*">
                    </div>
                    <div class="text_container">
                        <div class="text_input">
                            <label for="specie"><h3>Espécie:</h3></label>
                            <input id="specie" type="text" name="specie">
                        </div>
                        <div class="text_input">
                            <label for="nick"><h3>Nome:</h3></label>
                            <input id="nick" type="text" name="nick">
                        </div>
                        <div class="text_input">
                            <label for="color"><h3>Cores predominantes:</h3></label>
                            <input id="color" type="text" name="color">
                        </div>
                        <div class="text_input">
                            <label for="temp"><h3>Temperatura ideal:</h3></label>
                            <input id="temp" type="text" name="temp">
                        </div>
                        <div class="text_input">
                            <label for="pH"><h3>Valores de pH ideais:</h3></label>
                            <input id="pH" type="text" name="pH">
                        </div>
                        <div class="text_input">
                            <label for="food"><h3>Tipo de alimento:</h3></label>
                            <input id="food" type="text" name="food">
                        </div>
                        <div class="text_input">
                            <label for="type"><h3>Categoria do peixe:</h3></label>
                            <select id="type" name="type">
                                <option>Selecionar</option>
                                <option>Água doce</option>
                                <option>Marinho</option>
                            </select>
                        </div>
                        <div class="text_input">
                            <label for="salinity"><h3>Nível salinidade:</h3></label>
                            <input id="salinity" type="text" name="salinity">
                        </div>
                    </div>
                    <button type="submit">Cadastrar</button>
                </form>
                </div>
            </div>
        </div>
    </div>
    <script src = "Back-end/script.js"></script>
    <?php include "footer.php";?>
</body>
</html>