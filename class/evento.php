<?php
// -------------------------------- CLASSE USUARIO
require_once 'Crud.php';

class evento extends Crud{
	
	protected $table = 'evento';
        private $id;
        private $titulo;
        private $descricao;
        private $fonte;
        private $icon;
        private $dtexpirar;
        private $ativo;
                        
        function getId() {
            return $this->id;
        }

        function getTitulo() {
            return $this->titulo;
        }

        function getDescricao() {
            return $this->descricao;
        }

        function getFonte() {
            return $this->fonte;
        }

        function getIcon() {
            return $this->icon;
        }

        function getDtexpirar() {
            return $this->dtexpirar;
        }

        function getAtivo() {
            return $this->ativo;
        }

        function setAtivo($ativo) {
            $this->ativo = $ativo;
        }
        
        function setId($id) {
            $this->id = $id;
        }

        function setTitulo($titulo) {
            $this->titulo = $titulo;
        }

        function setDescricao($descricao) {
            $this->descricao = $descricao;
        }

        function setFonte($fonte) {
            $this->fonte = $fonte;
        }

        function setIcon($icon) {
            $this->icon = $icon;
        }

        function setDtexpirar($dtexpirar) {
            $this->dtexpirar = $dtexpirar;
        }

        
        public function insert(){
            $sql  = "INSERT INTO $this->table (titulo, descricao, fonte, icon, dtexpirar, ativo) VALUES (:titulo, :descricao, :fonte, :icon, :dtexpirar, :ativo)";
            #$sql  = "INSERT INTO $this->table (titulo) VALUES (:titulo)";
            $stmt = DB::prepare($sql);
            $stmt->bindParam(':titulo',    $this->titulo);
            $stmt->bindParam(':descricao', $this->descricao);
            $stmt->bindParam(':fonte',     $this->fonte);
            $stmt->bindParam(':icon',      $this->icon);
            $stmt->bindParam(':dtexpirar', $this->dtexpirar);
            $stmt->bindParam(':ativo',     $this->ativo);
            return $stmt->execute();
        }

        public function update($id){
            $sql  = "UPDATE $this->table SET titulo = :titulo, descricao = :descricao, fonte = :fonte, icon = :icon, dtexpirar = :dtexpirar, ativo = :ativo WHERE id = :id";
            $stmt = DB::prepare($sql);
            $stmt->bindParam(':titulo',    $this->titulo);
            $stmt->bindParam(':descricao', $this->descricao);
            $stmt->bindParam(':fonte',     $this->fonte);
            $stmt->bindParam(':icon',      $this->icon);
            $stmt->bindParam(':dtexpirar', $this->dtexpirar);
            $stmt->bindParam(':ativo',     $this->ativo);
            $stmt->bindParam(':id',        $id, PDO::PARAM_INT);
            return $stmt->execute();
        }

        public function buscareventoativos(){
            $sql  = "SELECT * FROM $this->table WHERE ativo = '1' AND dtexpirar >= CURDATE()";
            $stmt = DB::prepare($sql);
            $stmt->execute();
            return $stmt->fetchAll();
        }
        
        public function selectexiste($titulo){
            $sql  = "SELECT * FROM $this->table WHERE titulo = :titulo";
            $stmt = DB::prepare($sql);
            $stmt->bindParam(':titulo', $titulo, PDO::PARAM_STR);
            $stmt->execute();
            if ($stmt->rowCount() > 0){ #Se retornar valor true >1 o usuário existe
                return $stmt->fetchAll();
            }
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
      
