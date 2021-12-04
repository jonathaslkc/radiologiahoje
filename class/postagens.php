<?php
// -------------------------------- CLASSE USUARIO
require_once 'Crud.php';

class postagens extends Crud{
	
	protected $table = 'postagens';
        private $id;
        private $rel_post_membro;
        private $rel_categoria;
        private $titulo;
        private $texto;
        private $datapublicacao;
        private $img;
        private $ativo;
        private $acessos;

        function getId() {
            return $this->id;
        }

        function getRel_post_membro() {
            return $this->rel_post_membro;
        }
        
        function getRel_categoria() {
            return $this->rel_categoria;
        }

        function getTitulo() {
            return $this->titulo;
        }

        function getTexto() {
            return $this->texto;
        }

        function getDatapublicacao() {
            return $this->datapublicacao;
        }

        function getImg() {
            return $this->img;
        }

        function getAtivo() {
            return $this->ativo;
        }
        
        function getAcessos() {
            return $this->acessos;
        }        

        function setId($id) {
            $this->id = $id;
        }

        function setRel_post_membro($rel_post_membro) {
            $this->rel_post_membro = $rel_post_membro;
        }
        
        function setRel_categoria($rel_categoria) {
            $this->rel_categoria = $rel_categoria;
        }

        function setTitulo($titulo) {
            $this->titulo = $titulo;
        }

        function setTexto($texto) {
            $this->texto = $texto;
        }

        function setDatapublicacao($datapublicacao) {
            $this->datapublicacao = $datapublicacao;
        }

        function setImg($img) {
            $this->img = $img;
        }

        function setAtivo($ativo) {
            $this->ativo = $ativo;
        }
        
        function setAcessos($acessos) {
            $this->acessos = $acessos;
        }

        
        public function insert(){
            $sql  = "INSERT INTO $this->table (rel_post_membro, rel_categoria, titulo, texto, img, ativo) VALUES (:rel_post_membro, :rel_categoria, :titulo, :texto, :img, :ativo)";
            $stmt = DB::prepare($sql);
            $stmt->bindParam(':rel_post_membro',$this->rel_post_membro);
            $stmt->bindParam(':rel_categoria',  $this->rel_categoria);
            $stmt->bindParam(':titulo',         $this->titulo);
            $stmt->bindParam(':texto',          $this->texto);
            $stmt->bindParam(':img',            $this->img);
            $stmt->bindParam(':ativo',          $this->ativo);
            
            return $stmt->execute();
        }
		
        public function update($id){
            $sql  = "UPDATE $this->table SET rel_categoria = :rel_categoria, titulo = :titulo, texto = :texto, datapublicacao = :datapublicacao, img = :img, ativo = :ativo WHERE id = :id";
            $stmt = DB::prepare($sql);
            $stmt->bindParam(':rel_categoria',  $this->rel_categoria);
            $stmt->bindParam(':titulo',         $this->titulo);
            $stmt->bindParam(':texto',          $this->texto);
            $stmt->bindParam(':datapublicacao', $this->datapublicacao);
            $stmt->bindParam(':img',            $this->img);
            $stmt->bindParam(':ativo',          $this->ativo);
            $stmt->bindParam(':id',             $id, PDO::PARAM_INT);
            return $stmt->execute();    
        }
        
        public function updatesimg($id){
            $sql  = "UPDATE $this->table SET rel_categoria = :rel_categoria, titulo = :titulo, texto = :texto, datapublicacao = :datapublicacao, ativo = :ativo WHERE id = :id";
            $stmt = DB::prepare($sql);
            $stmt->bindParam(':rel_categoria',  $this->rel_categoria);
            $stmt->bindParam(':titulo',         $this->titulo);
            $stmt->bindParam(':texto',          $this->texto);
            $stmt->bindParam(':datapublicacao', $this->datapublicacao);
            $stmt->bindParam(':ativo',          $this->ativo);
            $stmt->bindParam(':id',             $id, PDO::PARAM_INT);
            return $stmt->execute();    
        }

        public function update2($id){
            $sql  = "UPDATE $this->table SET rel_categoria = :rel_categoria, texto = :texto, datapublicacao = :datapublicacao, img = :img, ativo = :ativo WHERE id = :id";
            $stmt = DB::prepare($sql);
            $stmt->bindParam(':rel_categoria',  $this->rel_categoria);
            $stmt->bindParam(':texto',          $this->texto);
            $stmt->bindParam(':datapublicacao', $this->datapublicacao);
            $stmt->bindParam(':img',            $this->img);
            $stmt->bindParam(':ativo',          $this->ativo);
            $stmt->bindParam(':id',             $id, PDO::PARAM_INT);
            return $stmt->execute();    
        }
        
        public function update2simg($id){
            $sql  = "UPDATE $this->table SET rel_categoria = :rel_categoria, texto = :texto, datapublicacao = :datapublicacao, ativo = :ativo WHERE id = :id";
            $stmt = DB::prepare($sql);
            $stmt->bindParam(':rel_categoria',  $this->rel_categoria);
            $stmt->bindParam(':texto',          $this->texto);
            $stmt->bindParam(':datapublicacao', $this->datapublicacao);
            $stmt->bindParam(':ativo',          $this->ativo);
            $stmt->bindParam(':id',             $id, PDO::PARAM_INT);
            return $stmt->execute();    
        }
        
        public function updateacess($titulo){
            $sql  = "UPDATE $this->table SET acessos = :acessos WHERE titulo = :titulo";
            $stmt = DB::prepare($sql);
            $stmt->bindParam(':acessos',        $this->acessos);
            $stmt->bindParam(':titulo',         $titulo, PDO::PARAM_STR);
            return $stmt->execute();    
        }
        
        public function updatecta($titulo){
            $sql  = "UPDATE $this->table SET cattagadd = :cattagadd WHERE titulo = :titulo";
            $stmt = DB::prepare($sql);
            $stmt->bindParam(':cattagadd',      $this->cattagadd);
            $stmt->bindParam(':titulo',         $titulo, PDO::PARAM_STR);
            return $stmt->execute();    
        }
        
        public function linhas(){
            $sql  = "SELECT COUNT(*) AS NumLinhas FROM $this->table";
            $stmt = DB::prepare($sql);
            $stmt->execute();
            return $stmt->fetch();
        }
        
        public function verificaexistencia($titulo){
            $sql  = "SELECT * FROM $this->table WHERE titulo = :titulo";
            $stmt = DB::prepare($sql);
            $stmt->bindParam(':titulo', $titulo, PDO::PARAM_STR);
            $stmt->execute();
            if ($stmt->rowCount() > 0){ #Se retornar valor true >1 o usuário existe e está inativo
                return $stmt->fetchAll();
            }
        }    
        
        public function verificaexistencia2($titulo){
            $sql  = "SELECT COUNT(*) FROM $this->table WHERE titulo = :titulo";
            $stmt = DB::prepare($sql);
            $stmt->bindParam(':titulo', $titulo, PDO::PARAM_STR);
            $stmt->execute();
            return $stmt->fetchAll();
        }
        
        public function buscarmaispop(){
            $sql  = "SELECT titulo,datapublicacao,acessos FROM $this->table WHERE ativo = '1' ORDER BY acessos DESC LIMIT 3 ";
            $stmt = DB::prepare($sql);
            $stmt->execute();
            if ($stmt->rowCount() > 0){ #Se retornar valor true >1 o usuário existe e está inativo
                return $stmt->fetchAll();
            }
        }
        
        public function verificaracessos($titulo){
		$sql  = "SELECT * FROM $this->table WHERE titulo = :titulo";
		$stmt = DB::prepare($sql);
		$stmt->bindParam(':titulo', $titulo, PDO::PARAM_STR);
		$stmt->execute();
		return $stmt->fetch();
	}

        public function  buscapostord2($paginaAtual,$artigopPagina){
		$sql  = "SELECT * FROM $this->table WHERE ativo = '1' ORDER BY datapublicacao DESC LIMIT :paginaAtual, :artigopPagina";
		$stmt = DB::prepare($sql);
                $stmt->bindParam(':paginaAtual', $paginaAtual, PDO::PARAM_INT);
                $stmt->bindParam(':artigopPagina', $artigopPagina, PDO::PARAM_INT);
		$stmt->execute();
		return $stmt->fetchAll();
	}
        
        public function  buscapostrec(){
		$sql  = "SELECT * FROM $this->table WHERE ativo = '1' ORDER BY datapublicacao DESC LIMIT 3";
		$stmt = DB::prepare($sql);
		$stmt->execute();
		return $stmt->fetchAll();
	}
        
        public function  buscapostord(){
		$sql  = "SELECT * FROM $this->table WHERE ativo = '1' ORDER BY datapublicacao DESC LIMIT 0";
		$stmt = DB::prepare($sql);
		$stmt->execute();
		return $stmt->fetchAll();
	}
        
	public function localizapost($titulo){
		$sql  = "SELECT * FROM $this->table WHERE titulo = :titulo";
		$stmt = DB::prepare($sql);
		$stmt->bindParam(':titulo', $titulo, PDO::PARAM_STR);
		$stmt->execute();
		return $stmt->fetch();
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
      
