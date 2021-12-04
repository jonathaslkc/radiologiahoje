<?php
// -------------------------------- CLASSE USUARIO
require_once 'Crud.php';

class topico extends Crud{
	
	protected $table = 'topico';
        private $id;
        private $titulo;
        private $descricao;

        function getId() {
            return $this->id;
        }

        function getTitulo() {
            return $this->titulo;
        }

        function getDescricao() {
            return $this->descricao;
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

        
        public function insert(){
            $sql  = "INSERT INTO $this->table (titulo, descricao) VALUES (:titulo, :descricao)";
            $stmt = DB::prepare($sql);
            $stmt->bindParam(':titulo',         $this->titulo);
            $stmt->bindParam(':descricao',      $this->descricao);
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
        
        public function carregarimagem($id){
            $sql  = "UPDATE $this->table SET img = :img WHERE id = :id";
            $stmt = DB::prepare($sql);
            $stmt->bindParam(':img',   	$this->img);
            $stmt->bindParam(':id',     $id, PDO::PARAM_INT);
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
      
