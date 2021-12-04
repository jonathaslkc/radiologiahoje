<?php
// -------------------------------- CLASSE USUARIO
require_once 'Crud.php';

class tags extends Crud{
	
	protected $table = 'tags';
        private $id;
        private $rel_tags_post;
        private $nome;

        function getId() {
            return $this->id;
        }

        function getRel_tags_post() {
            return $this->rel_tags_post;
        }
        
        function getNome() {
            return $this->nome;
        }
        
        function setId($id) {
            $this->id = $id;
        }

        function setRel_tags_post($rel_tags_post) {
            $this->rel_tags_post = $rel_tags_post;
        }
        
        function setNome($nome) {
            $this->nome = $nome;
        }
        

        public function insert(){
            $sql  = "INSERT INTO $this->table (rel_tags_post, nome) VALUES (:rel_tags_post, :nome)";
            $stmt = DB::prepare($sql);
            $stmt->bindParam(':rel_tags_post',$this->rel_tags_post);
            $stmt->bindParam(':nome',         $this->nome);
            return $stmt->execute();
        }

        public function update($id){
            $sql  = "UPDATE $this->table SET rel_tags_post = :rel_tags_post, nome = :nome WHERE id = :id";
            $stmt = DB::prepare($sql);
            $stmt->bindParam(':rel_tags_post',$this->rel_tags_post);
            $stmt->bindParam(':nome',         $this->nome);
            $stmt->bindParam(':id',           $id, PDO::PARAM_INT);
            return $stmt->execute();    
        }
        
        public function verificaexistencia($nome){
            $sql  = "SELECT * FROM $this->table WHERE nome = :nome";
            $stmt = DB::prepare($sql);
            $stmt->bindParam(':nome', $nome, PDO::PARAM_STR);
            $stmt->execute();
            if ($stmt->rowCount() > 0){ #Se retornar valor true >1 o usuário existe e está inativo
                return $stmt->fetchAll();
            }
        }
        
        public function buscatags($rel_tags_post){
            $sql  = "SELECT * FROM $this->table WHERE rel_tags_post = :rel_tags_post ORDER BY nome";
            $stmt = DB::prepare($sql);
            $stmt->bindParam(':rel_tags_post', $rel_tags_post, PDO::PARAM_STR);
            $stmt->execute();
            return $stmt->fetchAll();
        }
        
//        public function selectestado($usuario){
//            $sql  = "SELECT * FROM $this->table WHERE usuario = :usuario AND ativo = '0'";
//            $stmt = DB::prepare($sql);
//            $stmt->bindParam(':usuario', $usuario, PDO::PARAM_STR);
//            $stmt->execute();
//            if ($stmt->rowCount() > 0){ #Se retornar valor true >1 o usuário existe e está inativo
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


}
      
