<?php
// -------------------------------- CLASSE USUARIO
require_once 'Crud.php';

class cattagadd extends Crud{
	
	protected $table = 'cattagadd';
        private $id;
        private $nometitulo;
        private $rel_cta_cat;
        private $rel_cta_tag;

        function getId() {
            return $this->id;
        }
        
        function getNometitulo() {
            return $this->nometitulo;
        }

        function getRel_cta_cat() {
            return $this->rel_cta_cat;
        }

        function getRel_cta_tag() {
            return $this->rel_cta_tag;
        }

        function setId($id) {
            $this->id = $id;
        }
        
        function setNometitulo($nometitulo) {
            $this->nometitulo = $nometitulo;
        }

        function setRel_cta_cat($rel_cta_cat) {
            $this->rel_cta_cat = $rel_cta_cat;
        }

        function setRel_cta_tag($rel_cta_tag) {
            $this->rel_cta_tag = $rel_cta_tag;
        }

                

        public function insert(){
            $sql  = "INSERT INTO $this->table (nometitulo, rel_cta_cat, rel_cta_tag) VALUES (:nometitulo, :rel_cta_cat, :rel_cta_tag)";
            $stmt = DB::prepare($sql);
            $stmt->bindParam(':nometitulo',  $this->nometitulo, PDO::PARAM_STR);
            $stmt->bindParam(':rel_cta_cat', $this->rel_cta_cat, PDO::PARAM_STR);
            $stmt->bindParam(':rel_cta_tag', $this->rel_cta_tag, PDO::PARAM_STR);
            return $stmt->execute();
        }

        public function update($id){
            $sql  = "UPDATE $this->table SET nometitulo = :nometitulo, rel_cta_cat = :rel_cta_cat, rel_cta_tag = :rel_cta_tag WHERE id = :id";
            $stmt = DB::prepare($sql);
            $stmt->bindParam(':nometitulo',  $this->nometitulo, PDO::PARAM_STR);
            $stmt->bindParam(':rel_cta_cat',   $this->rel_cta_cat);
            $stmt->bindParam(':rel_cta_tag',   $this->rel_cta_tag);
            $stmt->bindParam(':id',     $id, PDO::PARAM_INT);
            return $stmt->execute();    
        }
        
        public function buscacat($nometitulo){
		$sql  = "SELECT * FROM $this->table WHERE nometitulo = :nometitulo";
		$stmt = DB::prepare($sql);
                $stmt->bindParam(':rel_cta_cat',    $this->rel_cta_cat);
                $stmt->bindParam(':rel_cta_tag',    $this->rel_cta_tag);
                $stmt->bindParam(':nometitulo',     $nometitulo, PDO::PARAM_STR);
		$stmt->execute();
		return $stmt->fetchAll();
	}
        
//        public function verificaexistencia($nome){
//            $sql  = "SELECT * FROM $this->table WHERE nome = :nome";
//            $stmt = DB::prepare($sql);
//            $stmt->bindParam(':nome', $nome, PDO::PARAM_STR);
//            $stmt->execute();
//            if ($stmt->rowCount() > 0){ #Se retornar valor true >1 o usuário existe e está inativo
//                return $stmt->fetchAll();
//            }
//        }
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
      
