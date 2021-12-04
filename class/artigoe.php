<?php
// -------------------------------- CLASSE USUARIO
require_once 'Crud.php';

class artigoe extends Crud{
	
	protected $table = 'artigoe';
        private $id;
        private $rel_artigoe_usu;
        private $rel_artigo_submenu;
        private $texto;
        private $data;
        private $dataatualizacao;
        private $ativo;

        function getId() {
            return $this->id;
        }

        function getRel_artigoe_usu() {
            return $this->rel_artigoe_usu;
        }

        function setRel_artigoe_usu($rel_artigoe_usu) {
            $this->rel_artigoe_usu = $rel_artigoe_usu;
        }
        
        function getRel_artigo_submenu() {
            return $this->rel_artigo_submenu;
        }

        function getTexto() {
            return $this->texto;
        }

        function getData() {
            return $this->data;
        }

        function getDataatualizacao() {
            return $this->dataatualizacao;
        }

        function getAtivo() {
            return $this->ativo;
        }

        function setId($id) {
            $this->id = $id;
        }

        function setRel_artigo_submenu($rel_artigo_submenu) {
            $this->rel_artigo_submenu = $rel_artigo_submenu;
        }

        function setTexto($texto) {
            $this->texto = $texto;
        }

        function setData($data) {
            $this->data = $data;
        }

        function setDataatualizacao($dataatualizacao) {
            $this->dataatualizacao = $dataatualizacao;
        }

        function setAtivo($ativo) {
            $this->ativo = $ativo;
        }

                
        public function insert(){
            $sql  = "INSERT INTO $this->table (rel_artigo_usu, rel_artigo_submenu, titulo, descricao) VALUES (:rel_artigoe_usu, :rel_artigo_submenu, :titulo, :descricao)";
            $stmt = DB::prepare($sql);
            $stmt->bindParam(':rel_artigo_usu',     $this->rel_artigo_usu);
            $stmt->bindParam(':rel_artigo_submenu', $this->rel_artigo_submenu);
            $stmt->bindParam(':titulo',             $this->titulo);
            $stmt->bindParam(':descricao',          $this->descricao);
            return $stmt->execute();
        }

        public function update($id){
            $sql  = "UPDATE $this->table SET titulo = :titulo, descricao = :descricao WHERE id = :id";
            $stmt = DB::prepare($sql);
            $stmt->bindParam(':titulo',      $this->titulo);
            $stmt->bindParam(':descricao',   $this->descricao);
            $stmt->bindParam(':id',          $id, PDO::PARAM_INT);
            return $stmt->execute();
        }
        
        public function buscartopico(){
            $sql  = "SELECT * FROM $this->table";
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
      
