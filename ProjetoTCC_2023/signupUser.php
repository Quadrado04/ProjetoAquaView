<?php require_once "Back-end/database.php";?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="Stylesheet" href="Back-end/Style/signupUser.css">
    <title>AquaView</title>
</head>
<body>
    <?php require_once "Back-end/Style/essentials.php"; require_once "header.php";?>   
    <div id="content">
        <div id="wrap">
            <form action="Back-end/UserCodes/userInsert.php" method="POST" enctype="multipart/form-data">
                <div class="img_container">
                    <img id="imgfile" src="Uploads/foto_perfil.png" alt="Selecione uma foto para perfil">
                    <input id="image" type="file" name="image" accept="image/*">
                    <h3>Adicione uma foto</h3>
                </div>
                <div class="text_container">
                    <div class="text_input">
                        <label for="name"><h3>Nome completo:</h3></label>
                        <input id="name" type="text" name="name">
                    </div>
                    <div class="text_input">
                        <label for="user"><h3>Usuário:</h3></label>
                        <input id="user" type="text" name="user">
                    </div>
                    <div class="text_input">
                        <label for="email"><h3>Email:</h3></label>
                        <input id="email" type="email" name="email">
                    </div>
                    <div class="text_input">
                        <label for="sex"><h3>Como você se identifica?</h3></label>
                        <select id="sex" name="sex">
                            <option>Selecionar</option>
                            <option>Homem</option>
                            <option>Mulher</option>
                            <option>Não Binário</option>
                            <option>Outros</option>
                        </select>
                    </div>
                    <div class="text_input">
                        <label for="birth"><h3>Data de Nascimento:</h3></label>
                        <input id="birth" type="date" name="birth">
                    </div>
                    <div class="text_input">
                        <label for="psw"><h3>Senha:</h3></label>
                        <input id="psw" type="password" name="psw">
                    </div>
                    <div class="text_input">
                        <label for="phone"><h3>Telefone:</h3></label>
                        <input type="phone" name="phone">
                    </div>
                    <div class="text_input">
                        <label for="device"><h3>Número do dispositivo:</h3></label>
                        <input id="device "type="text" name="device">
                    </div>
                </div>
                <div class="login_alt">
                    <div id="google">
                        <img src="Uploads/google.png" alt="">Entrar com Google
                    </div>
                    <div id="facebook">
                        <img src="Uploads/facebook.png" alt="">Entrar com Facebook
                    </div>
                </div>
                <button type="submit">Cadastrar</button>
            </form>
        </div>
    </div>
    <script src = "Back-end/script.js"></script>
    <?php require_once "footer.php";?> 
</body>
</html>