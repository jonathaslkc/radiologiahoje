<?php
// -------------------------------- CLASSE USUARIO
require_once 'Crud.php';

class submenufilho extends Crud{
	
	protected $table = 'submenufilho';
        private $id;
        private $rel_sbfilho_subm;
        private $titulo;
        private $ativo;
        
        function getId() {
            return $this->id;
        }

        function getRel_sbfilho_subm() {
            return $this->rel_sbfilho_subm;
        }

        function setRel_sbfilho_subm($rel_sbfilho_subm) {
            $this->rel_sbfilho_subm = $rel_sbfilho_subm;
        }

                
        function getTitulo() {
            return $this->titulo;
        }

        function getAtivo() {
            return $this->ativo;
        }

        function setId($id) {
            $this->id = $id;
        }

        function setTitulo($titulo) {
            $this->titulo = $titulo;
        }

        function setAtivo($ativo) {
            $this->ativo = $ativo;
        }

        
        public function insert(){
            $sql  = "INSERT INTO $this->table (rel_sbfilho_subm, titulo, ativo) VALUES (:rel_sbfilho_subm, :titutlo, :ativo)";
            $stmt = DB::prepare($sql);
            $stmt->bindParam(':rel_sbfilho_subm', $this->rel_sbfilho_subm);
            $stmt->bindParam(':titulo',           $this->titulo);
            $stmt->bindParam(':ativo',            $this->ativo);
            return $stmt->execute();
        }

        public function update($id){
            $sql  = "UPDATE $this->table SET titulo = :titulo, ativo = :ativo WHERE id = :id";
            $stmt = DB::prepare($sql);
            $stmt->bindParam(':titulo',        $this->titulo);
            $stmt->bindParam(':ativo',        $this->ativo);
            $stmt->bindParam(':id',           $id, PDO::PARAM_INT);
            return $stmt->execute();    
        }
        
        public function buscasubmenus(){
            $sql  = "SELECT * FROM $this->table WHERE ativo = '1'";
            $stmt = DB::prepare($sql);
            $stmt->execute();
            return $stmt->fetchAll();
        }

        public function ativamenu($id){
            $sql  = "UPDATE $this->table SET ativo = 1 WHERE id = :id ";
            $stmt = DB::prepare($sql);
            $stmt->bindParam(':id', $id, PDO::PARAM_INT);
            return $stmt->execute();
        }
        
        public function desativamenu($id){
            $sql  = "UPDATE $this->table SET ativo = 0 WHERE id = :id ";
            $stmt = DB::prepare($sql);
            $stmt->bindParam(':id', $id, PDO::PARAM_INT);
            return $stmt->execute();
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


}
      
