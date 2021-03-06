<?php
// -------------------------------- CLASSE USUARIO
require_once 'Crud.php';

class imagem extends Crud{
	
	protected $table = 'imagem';
        private $id;
        private $endereco;
        private $nome;
                        function getId() {
            return $this->id;
        }

        function getEndereco() {
            return $this->endereco;
        }

        function setId($id) {
            $this->id = $id;
        }

        function setEndereco($endereco) {
            $this->endereco = $endereco;
        }        
        
        function getNome() {
            return $this->nome;
        }

        function setNome($nome) {
            $this->nome = $nome;
        }

        public function insert(){
            $sql  = "INSERT INTO $this->table (endereco, nome) VALUES (:endereco, :nome)";
            $stmt = DB::prepare($sql);
            $stmt->bindParam(':endereco',   $this->endereco, PDO::PARAM_STR);
            $stmt->bindParam(':nome',       $this->nome, PDO::PARAM_STR);
            return $stmt->execute();
        }

        public function update($id){
            $sql  = "UPDATE $this->table SET nome = :nome WHERE id = :id";
            $stmt = DB::prepare($sql);
            $stmt->bindParam(':nome',   $this->nome);
            $stmt->bindParam(':id',     $id, PDO::PARAM_INT);
            return $stmt->execute();    
        }
        
        public function buscaimgs(){
            $sql  = "SELECT * FROM $this->table";
            $stmt = DB::prepare($sql);
            $stmt->execute();
            return $stmt->fetchAll();
	}
        
        public function buscaimg($endereco){
            $sql  = "SELECT * FROM $this->table WHERE endereco = :endereco";
            $stmt = DB::prepare($sql);
            $stmt->bindParam(':endereco', $endereco, PDO::PARAM_STR);
            $stmt->execute();
            return $stmt->fetchAll();
        }
//        public function selectestado($usuario){
//            $sql  = "SELECT * FROM $this->table WHERE usuario = :usuario AND ativo = '0'";
//            $stmt = DB::prepare($sql);
//            $stmt->bindParam(':usuario', $usuario, PDO::PARAM_STR);
//            $stmt->execute();
//            if ($stmt->rowCount() > 0){ #Se retornar valor true >1 o usu??rio existe e est?? inativo
//                return $stmt->fetchAll();
//            }
//        }
        
        public function logar($usuario, $senha){ // -------------------------------- M??TODO LOGAR
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
      
