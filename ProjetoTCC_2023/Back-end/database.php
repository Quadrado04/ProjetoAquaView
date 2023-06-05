<?php
session_start();
    Class Database{
        private $pdo;

        //------------------- CONEXAO com o banco de dados -------------------//
        // database: projetoaquaview; host: localhost; user: root; password: ;//

        public function __construct($host, $dbname, $user, $psw)
        {
            try{
                $this->pdo = new PDO("mysql:host=".$host.";dbname=".$dbname,$user,$psw);
            }catch(PDOException $e){
                echo "Erro no Banco de Dados: ".$e->getMessage();
                exit();
            }catch(Exception $e){
                echo "Erro genérico: ".$e->getMessage();
                exit();
            }

        }

        ////////////// CRUD USUARIO //////////////

        //   INSERT

        public function setUser($img,$n,$u,$e,$sexo,$nasc,$psw,$tel,$nDis){

            $cmd = $this->pdo->query("SELECT email FROM usuario WHERE email = '$e'");

            if($cmd->rowCount() > 0){
                return false;
            }else{
                $this->pdo->query("INSERT INTO usuario (nomeImg, nome, usuario, email, sexo, dtNasc, senha, telefone, numDispositivo)
                VALUES ('$img', '$n', '$u', '$e', '$sexo', '$nasc', '$psw', '$tel', '$nDis')");
                return true;
            }
        }

        //   SELECT PARA CONFIRMAR LOGIN

        public function getUserLogIn($email){
            $cmd = $this->pdo->query("SELECT * FROM usuario WHERE email = '$email'");

            if($cmd != null){
                return $cmd->fetchAll(PDO::FETCH_ASSOC);
            }else {
                return false;
            }
        }

        //   SELECT

        public function getUserData($id){
            $cmd = $this->pdo->query("SELECT * FROM usuario WHERE idUsuario = '$id'");
            return $cmd->fetchAll(PDO::FETCH_ASSOC);
        }

        //   UPDATE

        public function updateUserData($img,$nome,$usuario,$email,$senha,$dtNasc,$telefone,$id){
            $this->pdo->query("UPDATE usuario SET nomeImg = '$img', nome = '$nome', usuario = '$usuario', email = '$email', dtNasc = '$dtNasc', senha = '$senha', telefone = '$telefone' WHERE idUsuario = '$id'");
            return true;

        }
        ////////////// CRUD PEIXE USUARIO //////////////

         //   INSERT PEIXE DO USUARIO
        public function setUserFish($nomeImg,$e,$nome,$cor,$temp,$ph,$alimento,$tipo,$salinity,$fk){
            $this->pdo->query("INSERT INTO peixeusuario (nomeImg, especie, nome, cor, temp, ph, alimento, tipo, salinidade, idUsuario)
            VALUES ('$nomeImg','$e', '$nome', '$cor', '$temp', '$ph', '$alimento', '$tipo','$salinity','$fk')");
            return true;
        }

        //   SELECT TODOS OS PEIXE DO USUARIO

        public function getUserFishData($id){
            $cmd = $this->pdo->query("SELECT * FROM peixeusuario WHERE idUsuario = '$id' ORDER BY especie");
            return $cmd->fetchAll(PDO::FETCH_ASSOC);
        }

         //   SELECT APENAS UM PEIXE DO USUARIO

         public function getOneUserFishData($id){
            $cmd = $this->pdo->query("SELECT * FROM peixeusuario WHERE idPeixeUser = '$id'");
            return $cmd->fetchAll(PDO::FETCH_ASSOC);
        }

        //   DELETE PEIXE DO USUARIO

        public function deleteUserFish($id){
            $this->pdo->query("DELETE FROM peixeusuario WHERE idPeixeUser = '$id'");
            return true;
        }

        ////////////// CRUD ADM //////////////

        //    SELECT PESQUISA PEIXE POR ESPECIE

        public function getFishSearch($pesquisa,$caract){
            $cmd = $this->pdo->query("SELECT * FROM peixe WHERE $caract LIKE '%$pesquisa%'");
            return $cmd->fetchAll(PDO::FETCH_ASSOC);
        }

        //   SELECT TODOS OS USUARIOS

        public function getAllUsers(){
            $cmd = $this->pdo->query("SELECT * FROM usuario");
            return $cmd->fetchAll(PDO::FETCH_ASSOC);
        }

        //   SELECT EMAIL DOS USUARIOS

        public function getAllMails($email){
            $cmd = $this->pdo->query("SELECT email FROM usuario WHERE email = '$email'");
            return $cmd->fetchAll(PDO::FETCH_ASSOC);
        }

        //   INSERT PEIXE

        public function setFish($img,$e,$cor,$desc,$tempMin,$tempMax,$phMin,$phMax,$alimento,$tipo,$sali,$difi){
            $this->pdo->query("INSERT INTO peixe (nomeImg, especie, cor, descri, tempMin, tempMax, phMin, phMax, alimento, tipo, salinidade, dificuldade)
            VALUES ('$img', '$e', '$cor', '$desc', '$tempMin', '$tempMax', '$phMin', '$phMax', '$alimento', '$tipo', '$sali', '$difi')");
            return true;
        }

        //   DELETE USUARIO

        public function deleteuser($id){
            $this->pdo->query("DELETE FROM usuario WHERE idUsuario = '$id'");
            return true;
        }

        //   DELETE PEIXE

        public function deleteFish($id){
            $this->pdo->query("DELETE FROM peixe WHERE idPeixe = '$id'");
            return true;
        }

        public function getImgFish($id){
        $cmd = $this->pdo->query("SELECT nomeImg FROM Peixe WHERE idPeixe = '$id'");
        return $cmd->fetchAll(PDO::FETCH_ASSOC);
        }

       //    SELECT PARA PEGAR O ID DO PEIXE ATRAVES DA ESPECIE

        public function getFishType($specie){
        $cmd = $this->pdo->query("SELECT * FROM peixe WHERE especie = '$specie'");
        return $cmd->fetchAll(PDO::FETCH_ASSOC);
        }

       //    SELECT UM UNICO PEIXE

        public function getOneFishData($id){
        $cmd = $this->pdo->query("SELECT * FROM peixe WHERE idPeixe = '$id'");
        return $cmd->fetchAll(PDO::FETCH_ASSOC);
        }

        //   SELECT PEIXES COMPATIVEIS COM DADOS AQUARIO

        public function getCompatibleFish($pH,$temp){
            $cmd = $this->pdo->query("SELECT * FROM peixe WHERE '$pH' BETWEEN phMin AND phMax and $temp BETWEEN tempMin AND tempMax;");
            return $cmd->fetchAll(PDO::FETCH_ASSOC);
        }

        //   SELECT TODOS OS PEIXE

        public function getAllFish(){
            $cmd = $this->pdo->query("SELECT * FROM peixe ORDER BY especie");
            return $cmd->fetchAll(PDO::FETCH_ASSOC);
        }

        //   SELECT FILTRO DA PAGINA INICIAL

        public function getFilter($filter){
            $cmd = $this->pdo->query("SELECT * FROM peixe WHERE tipo = '$filter'");
            return $cmd->fetchAll(PDO::FETCH_ASSOC);
        }

        ////////////// CRUD AQUARIO //////////////

        //   INSERT DE DADOS

        public function setAquariumData($pH,$temp,$salinity,$idUser){
            $this->pdo->query("INSERT INTO dadosAquario (vlrPH, vlrTemp, vlrSal, dtAtual, idUsuario)
            VALUES ('$pH', '$temp', '$salinity', NOW(),'$idUser')");
            return true;
        }

        //   SELECT DO ULTIMO DADO

        public function getLastAquariumData($idUser){
            $cmd = $this->pdo->query("SELECT * FROM dadosAquario WHERE idUsuario = '$idUser' ORDER BY idDados DESC LIMIT 1");
            return $cmd->fetchAll(PDO::FETCH_ASSOC);
        }

        //   SELECT DE TODOS OS DADOS

        public function getAquariumData($idUser){
            $cmd = $this->pdo->query("SELECT * FROM dadosAquario WHERE idUsuario = '$idUser' ORDER BY dtAtual DESC LIMIT 10");
            return $cmd->fetchAll(PDO::FETCH_ASSOC);
        }
    }
?>