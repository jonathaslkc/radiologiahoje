<?php
// -------------------------------- CLASSE USUARIO
require_once 'Crud.php';

class comentarios extends Crud{
	
	protected $table = 'comentarios';
        private $id;
        private $rel_com_post;
        private $texto;
        private $nome;
        private $email;
        private $website;
        private $data;
        private $ativo;
        
        
        function getId() {
            return $this->id;
        }

        function getRel_com_post() {
            return $this->rel_com_post;
        }

        function getTexto() {
            return $this->texto;
        }

        function getNome() {
            return $this->nome;
        }

        function getEmail() {
            return $this->email;
        }

        function getWebsite() {
            return $this->website;
        }
        
        function getData() {
            return $this->data;
        }

        function getAtivo() {
            return $this->ativo;
        }

        function setId($id) {
            $this->id = $id;
        }

        function setRel_com_post($rel_com_post) {
            $this->rel_com_post = $rel_com_post;
        }

        function setTexto($texto) {
            $this->texto = $texto;
        }

        function setNome($nome) {
            $this->nome = $nome;
        }

        function setEmail($email) {
            $this->email = $email;
        }

        function setWebsite($website) {
            $this->website = $website;
        }
        
        function setData($data) {
            $this->data = $data;
        }

        function setAtivo($ativo) {
            $this->ativo = $ativo;
        }

        public function insert(){
            $sql  = "INSERT INTO $this->table (rel_com_post, texto, nome, email, website) VALUES (:rel_com_post, :texto, :nome, :nome, :website)";
            $stmt = DB::prepare($sql);
            $stmt->bindParam(':rel_com_post', $this->rel_com_post);
            $stmt->bindParam(':texto',        $this->texto);
            $stmt->bindParam(':nome',         $this->nome);
            $stmt->bindParam(':email',        $this->email);
            $stmt->bindParam(':website',      $this->website);
            return $stmt->execute();
        }

        public function update($id){
            $sql  = "UPDATE $this->table SET rel_com_post = :rel_com_post, texto = :texto, nome = :nome, email = :email, website = :website, ativo = :ativo WHERE id = :id";
            $stmt = DB::prepare($sql);
            $stmt->bindParam(':rel_com_post', $this->rel_com_post);
            $stmt->bindParam(':texto',        $this->texto);
            $stmt->bindParam(':nome',         $this->nome);
            $stmt->bindParam(':email',        $this->email);
            $stmt->bindParam(':website',      $this->website);
            $stmt->bindParam(':ativo',        $this->ativo);
            $stmt->bindParam(':id',           $id, PDO::PARAM_INT);
            return $stmt->execute();    
        }
        
        public function buscacomentarios($titulo){
            $sql  = "SELECT * FROM $this->table WHERE rel_com_post = :titulo AND ativo = '1'";
            $stmt = DB::prepare($sql);
            $stmt->bindParam(':titulo', $titulo, PDO::PARAM_STR);
            $stmt->execute();
            return $stmt->fetchAll();
        }

        public function upaceite($id){
            $sql  = "UPDATE $this->table SET ativo = 1 WHERE id = :id ";
            $stmt = DB::prepare($sql);
            $stmt->bindParam(':id', $id, PDO::PARAM_INT);
            return $stmt->execute();
        }
        
        public function upindeferir($id){
            $sql  = "UPDATE $this->table SET ativo = 0 WHERE id = :id ";
            $stmt = DB::prepare($sql);
            $stmt->bindParam(':id', $id, PDO::PARAM_INT);
            return $stmt->execute();
        }
        
        public function findAllcoment(){
            $sql  = "SELECT * FROM $this->table ORDER BY ativo, data DESC";
            $stmt = DB::prepare($sql);
            $stmt->execute();
            return $stmt->fetchAll();
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
      
