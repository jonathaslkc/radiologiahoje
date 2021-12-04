<?php
// -------------------------------- CLASSE USUARIO
require_once 'Crud.php';

class replysubtopico extends Crud{
	
	protected $table = 'replysubtopico';
        private $id;
        private $rel_usu_reply;
        private $rel_stop_reply;
        private $texto;
        private $data;

        
        function getId() {
            return $this->id;
        }

        function getRel_usu_reply() {
            return $this->rel_usu_reply;
        }

        function getRel_stop_reply() {
            return $this->rel_stop_reply;
        }

        function getTexto() {
            return $this->texto;
        }

        function getData() {
            return $this->data;
        }

        function setId($id) {
            $this->id = $id;
        }

        function setRel_usu_reply($rel_usu_reply) {
            $this->rel_usu_reply = $rel_usu_reply;
        }

        function setRel_stop_reply($rel_stop_reply) {
            $this->rel_stop_reply = $rel_stop_reply;
        }

        function setTexto($texto) {
            $this->texto = $texto;
        }

        function setData($data) {
            $this->data = $data;
        }
                
        public function insert(){
            $sql  = "INSERT INTO $this->table (rel_usu_reply, rel_stop_reply, texto) VALUES (:rel_usu_reply, :rel_stop_reply, :texto)";
            $stmt = DB::prepare($sql);
            $stmt->bindParam(':rel_usu_reply',  $this->rel_usu_reply);
            $stmt->bindParam(':rel_stop_reply', $this->rel_stop_reply);
            $stmt->bindParam(':texto',          $this->texto);
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
        
        public function findRes($id){
            $sql  = "SELECT * FROM $this->table WHERE rel_stop_reply = :rel_stop_reply";
            $stmt = DB::prepare($sql);
            $stmt->bindParam(':rel_stop_reply',                 $id, PDO::PARAM_INT);
            $stmt->execute();
            return $stmt->fetchAll();
        }
        
//        public function selectexiste($titulo){
//            $sql  = "SELECT * FROM $this->table WHERE titulo = :titulo";
//            $stmt = DB::prepare($sql);
//            $stmt->bindParam(':titulo', $titulo, PDO::PARAM_STR);
//            $stmt->execute();
//            if ($stmt->rowCount() > 0){ #Se retornar valor true >1 o usuário existe
//                return $stmt->fetchAll();
//            }
//        }
        
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
      
