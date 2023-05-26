<div id="header">
        <div id="wrap">
            <div id="logo">
                <a href="index.php"><img id="img" src="Uploads/AquaView_Logo_Horizontal_White.svg"></a>
            </div>
            <div id="search">
                <input type="text">
                <button onclick="" type="submit">Pesquisar</button>
            </div>
            <div id="connect">
                    <?php
                        $db = new Database("localhost","projetoaquaview","root","");

                        if(isset($_SESSION["adm"]) && $_SESSION["adm"] == true){
                    ?>
                    <a href="dashboard.php"><button id="adm" onclick="" type="submit">Dashboard</button></a>
                    <?php
                        }else if(isset($_SESSION["user"]) && $_SESSION["user"] == true){
                            $dados = $db->getUserData($_SESSION["user"]);
                            for($i = 0; $i < count($dados); $i++){
                                $user = $dados[$i];
                    ?>
                    <a href="userProfile.php">
                        <button id="profile" onclick="" type="submit">
                            <?php if($user["nomeImg"] != ""){?>
                            <img id="imgUser" src="Uploads/<?=$user["nomeImg"]?>" alt="Selecione uma foto para perfil">
                            <?php }else{?>
                                <img id="imgUser" src="Uploads/foto_perfil.png" alt="Selecione uma foto para perfil">
                            <?php }?>
                        </button>
                    </a>
                    <?php }}else{?>
                    <a href="loginUser.php"><button id="login" onclick="" type="submit">Fazer Login</button></a>
                    <a href="signupUser.php"><button id="signup" onclick="" type="submit">Cadastrar</button></a>
                    <?php }?>
            </div>
        </div>
    </div>