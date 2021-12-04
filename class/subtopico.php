<?php
// -------------------------------- CLASSE USUARIO
require_once 'Crud.php';

class subtopico extends Crud{
	
	protected $table = 'subtopico';
        private $id;
        private $rel_usu_stopico;
        private $rel_stopico_topico;
        private $titulo;
        private $descricao;
        private $qtdacessos;
        private $ativo;

        function getId() {
            return $this->id;
        }

        function getRel_usu_stopico() {
            return $this->rel_usu_stopico;
        }

        function getRel_stopico_topico() {
            return $this->rel_stopico_topico;
        }

        function getTitulo() {
            return $this->titulo;
        }

        function getDescricao() {
            return $this->descricao;
        }

        function getQtdacessos() {
            return $this->qtdacessos;
        }

        function getAtivo() {
            return $this->ativo;
        }

        function setId($id) {
            $this->id = $id;
        }

        function setRel_usu_stopico($rel_usu_stopico) {
            $this->rel_usu_stopico = $rel_usu_stopico;
        }

        function setRel_stopico_topico($rel_stopico_topico) {
            $this->rel_stopico_topico = $rel_stopico_topico;
        }

        function setTitulo($titulo) {
            $this->titulo = $titulo;
        }

        function setDescricao($descricao) {
            $this->descricao = $descricao;
        }

        function setQtdacessos($qtdacessos) {
            $this->qtdacessos = $qtdacessos;
        }

        function setAtivo($ativo) {
            $this->ativo = $ativo;
        }

                
        public function insert(){
            $sql  = "INSERT INTO $this->table (rel_usu_stopico, rel_stopico_topico, titulo, descricao) VALUES (:rel_usu_stopico, :rel_stopico_topico, :titulo, :descricao)";
            $stmt = DB::prepare($sql);
            $stmt->bindParam(':rel_usu_stopico',    $this->rel_usu_stopico);
            $stmt->bindParam(':rel_stopico_topico', $this->rel_stopico_topico);
            $stmt->bindParam(':titulo',             $this->titulo);
            $stmt->bindParam(':descricao',          $this->descricao);
            return $stmt->execute();
        }

        public function update($id){
            $sql  = "UPDATE $this->table SET rel_stopico_topico = :rel_stopico_topico, titulo = :titulo, descricao = :descricao, ativo = :ativo WHERE id = :id";
            $stmt = DB::prepare($sql);
            $stmt->bindParam(':rel_stopico_topico', $this->rel_stopico_topico);
            $stmt->bindParam(':titulo',             $this->titulo);
            $stmt->bindParam(':descricao',          $this->descricao);
            $stmt->bindParam(':ativo',              $this->ativo);
            $stmt->bindParam(':id',                 $id, PDO::PARAM_INT);
            return $stmt->execute();
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
      
