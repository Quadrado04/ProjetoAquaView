<?php require_once "Back-end/database.php";?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="Stylesheet" href="Back-end/Style/loginUser.css">
    <title>AquaView</title>
</head>
<body>
    <?php require_once "Back-end/Style/essentials.php"; require_once "header.php";?>   
    <div id="content">
        <div id="wrap">
            <h1>Entre com a sua conta</h1>
            <form action="Back-end/UserCodes/userLogIn.php" method="POST" enctype="multipart/form-data">
                <div class="text_container">
                    <div class="text_input">
                        <label for="email"><h3>Email:</h3></label>
                        <input id="email" type="email" name="email">
                    </div>
                    <div class="text_input">
                        <label for="psw"><h3>Senha:</h3></label>
                        <input id="psw" type="password" name="psw">
                    </div>
                </div>
                <div class="text_forgot">
                    <div id="forgot_psw">
                        <a href="#">Recuperar senha</a>
                    </div>
                    <div id="divider"></div>
                    <div id="forgot_mail">
                        <a href="signupUser.php">Criar conta</a>
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
                <button type="submit">Entrar</button>
            </form>
        </div>
    </div>
    <?php require_once "footer.php";?> 
</body>
</html>