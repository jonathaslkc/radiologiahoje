<?php
// -------------------------------- CLASSE USUARIO
require_once 'Crud.php';

class usuario extends Crud{
	
	protected $table = 'usuario';
        private $id;
        private $rel_usu_membro;
        private $usuario;
        private $senha;
        private $tipoacesso;
        private $img;
        private $ativo;
        private $ultacesso;
        private $dtcriacao;

        public function setId($id){
            $this->id = $id;
        }
        
        public function getId(){
            return $this->id;
        }
        public function setRel_usu_membro($rel_usu_membro){
            $this->rel_usu_membro = $rel_usu_membro;
        }

        public function getRel_usu_membro(){
            return $this->rel_usu_membro;
        }
        
        public function setUsuario($usuario){
            $this->usuario = $usuario;
        }

        public function getUsuario(){
            return $this->usuario;
        }
        
        public function setSenha($senha){
            $this->senha = $senha;
        }
        
        public function getSenha(){
            return $this->senha;
        }
        
        public function setTipoacesso($tipoacesso){
            $this->tipoacesso = $tipoacesso;
        }
        
        public function getTipoacesso(){
            return $this->tipoacesso;
        }
        
        function getImg() {
            return $this->img;
        }

        function setImg($img) {
            $this->img = $img;
        }

                
        public function setAtivo($ativo){
            $this->ativo = $ativo;
        }

        public function getAtivo(){
            return $this->ativo;
        }
        
        public function setUltAcesso($ultAcesso){
            $this->ultAcesso = $ultAcesso;
        }

        public function getUltAcesso(){
            return $this->ultAcesso;
        }
        
        public function setDtcriacao($dtcriacao){
            $this->dtcriacao = $dtcriacao;
        }

        public function getDtcriacao(){
            return $this->dtcriacao;
        }

        public function insert(){
            $sql  = "INSERT INTO $this->table (rel_usu_membro, usuario, senha, tipoacesso, ativo) VALUES (:rel_usu_membro, :usuario, :senha, :tipoacesso, :ativo)";
            $stmt = DB::prepare($sql);
            $stmt->bindParam(':rel_usu_membro', $this->rel_usu_membro);
            $stmt->bindParam(':usuario',	$this->usuario);
            $stmt->bindParam(':senha', 		$this->senha);
            $stmt->bindParam(':tipoacesso',   	$this->tipoacesso);
            $stmt->bindParam(':ativo',      	$this->ativo);
            return $stmt->execute();
        }

        public function update($id){
            $sql  = "UPDATE $this->table SET usuario = :usuario, senha = :senha, tipoacesso = :tipoacesso, ativo = :ativo WHERE id = :id";
            $stmt = DB::prepare($sql);
            $stmt->bindParam(':usuario',	$this->usuario);
            $stmt->bindParam(':senha', 		$this->senha);
            $stmt->bindParam(':tipoacesso',   	$this->tipoacesso);
            $stmt->bindParam(':ativo',      	$this->ativo);
            $stmt->bindParam(':id', $id, PDO::PARAM_INT);
            return $stmt->execute();
        }
        
        public function carregarimagem($id){
            $sql  = "UPDATE $this->table SET img = :img WHERE id = :id";
            $stmt = DB::prepare($sql);
            $stmt->bindParam(':img',   	$this->img);
            $stmt->bindParam(':id',     $id, PDO::PARAM_INT);
            return $stmt->execute();
        }
        
        public function updateST($id){
            $sql  = "UPDATE $this->table SET usuario = :usuario, tipoacesso = :tipoacesso, ativo = :ativo WHERE id = :id";
            $stmt = DB::prepare($sql);
            $stmt->bindParam(':usuario',	$this->usuario);
            $stmt->bindParam(':tipoacesso',   	$this->tipoacesso);
            $stmt->bindParam(':ativo',      	$this->ativo);
            $stmt->bindParam(':id', $id, PDO::PARAM_INT);
            return $stmt->execute();
        }
        
        public function select($usuario){
            $sql  = "SELECT razao,cpfcnpj FROM empresa WHERE fkempresausuario = :login";
            $stmt = DB::prepare($sql);
            $stmt->bindParam(':usuario', $usuario, PDO::PARAM_STR);
            $stmt->execute();
            return $stmt->fetchAll();
        }
        
        public function selectdif($login, $empacesso){
            $sql  = "SELECT razao,cpfcnpj FROM empresa WHERE fkempresausuario = :login AND cpfcnpj = :empacesso";
            $stmt = DB::prepare($sql);
            $stmt->bindParam(':login', $login, PDO::PARAM_STR);
            $stmt->bindParam(':empacesso', $empacesso, PDO::PARAM_STR);
            $stmt->execute();
            return $stmt->fetchAll();
        }
        
        public function selectestado($usuario){
            $sql  = "SELECT * FROM $this->table WHERE usuario = :usuario AND ativo = '0'";
            $stmt = DB::prepare($sql);
            $stmt->bindParam(':usuario', $usuario, PDO::PARAM_STR);
            $stmt->execute();
            if ($stmt->rowCount() > 0){ #Se retornar valor true >1 o usuário existe e está inativo
                return $stmt->fetchAll();
            }
        }
        
        public function selectexiste($usuario){
            $sql  = "SELECT * FROM $this->table WHERE usuario = :usuario";
            $stmt = DB::prepare($sql);
            $stmt->bindParam(':usuario', $usuario, PDO::PARAM_STR);
            $stmt->execute();
            if ($stmt->rowCount() > 0){ #Se retornar valor true >1 o usuário existe
                return $stmt->fetchAll();
            }
        }

        public function selectexistedif($loginpai){
            $sql  = "SELECT * FROM $this->table WHERE login = :loginpai OR loginpai = :loginpai";
            $stmt = DB::prepare($sql);
            $stmt->bindParam(':loginpai', $loginpai, PDO::PARAM_STR);
            $stmt->execute();
            if ($stmt->rowCount() > 0){ #Se retornar valor true >1 o usuário existe
                return $stmt->fetchAll();
            }
        }

        public function selectloginpai($loginpai){
            $sql  = "SELECT * FROM $this->table WHERE loginpai = :loginpai";
            $stmt = DB::prepare($sql);
            $stmt->bindParam(':loginpai', $loginpai, PDO::PARAM_STR);
            $stmt->execute();
            return $stmt->fetchAll();
	}
        
        public function findUsuario($usuario){
            $sql  = "SELECT tipoacesso,img,ativo,ultacesso,dtcriacao,rel_usu_membro FROM $this->table WHERE usuario = :usuario";
            $stmt = DB::prepare($sql);
            $stmt->bindParam(':usuario', $usuario, PDO::PARAM_STR);
            $stmt->execute();
            return $stmt->fetch();
        }
        
        public function logar($usuario, $senha){ // -------------------------------- MÉTODO LOGAR
            $sql  = "SELECT * FROM $this->table WHERE usuario = :usuario AND senha = :senha AND ativo = '1'";
#            $sql  = "SELECT empresa.razao, empresa.cpfcnpj, usuario.id, usuario.login, usuario.senha, usuario.ultacesso, usuario.dt_criacao "
#                    . "FROM empresa INNER JOIN usuario "
#                    . "ON empresa.fkempresausuario = :login AND login = :login AND senha = :senha";
            $stmt = DB::prepare($sql);
            $stmt->bindParam(':usuario', $usuario, PDO::PARAM_STR);
            $stmt->bindParam(':senha'  , $senha  , PDO::PARAM_STR);
            $stmt->execute();
            if ($stmt->rowCount() > 0):
                $dadoslogin = $stmt->fetch(PDO::FETCH_OBJ);
                    $_SESSION['id']              = $dadoslogin->id;
                    $_SESSION['usuario']         = $dadoslogin->usuario;
                    $_SESSION['usuariomembro']   = $dadoslogin->rel_usu_membro;
                    $_SESSION['tipoacesso']      = $dadoslogin->tipoacesso;
                    $_SESSION['ultacesso']       = $dadoslogin->ultacesso;
                    $_SESSION['logado']          = true;
                
                $sql = "UPDATE $this->table SET ultacesso = NOW() WHERE id = $dadoslogin->id";
                $stmt = DB::prepare($sql);
                $stmt->execute();
                return true;
            else:
                return false;
            endif;
        }
        public static function deslogar(){ // -------------------------------- MÉTODO DESLOGAR
            if(isset($_SESSION['logado'])):
                unset($_SESSION['logado']);  //Destruir Sessão logado
                session_destroy();
                header('location: index.php');
            endif;
        }
}
      
