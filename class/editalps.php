<?php
// -------------------------------- CLASSE USUARIO
require_once 'Crud.php';

class editalps extends Crud{
	
	protected $table = 'editalps';
        private $id;
        private $rel_edi_mem;
        private $descricao;
        private $tipo;
        private $estado;
        private $dataini;
        private $datafin;
        private $fonte;

        function getId() {
            return $this->id;
        }

        function getRel_edi_mem() {
            return $this->rel_edi_mem;
        }

        function getDescricao() {
            return $this->descricao;
        }

        function getTipo() {
            return $this->tipo;
        }

        function getEstado() {
            return $this->estado;
        }

        function getDataini() {
            return $this->dataini;
        }

        function getDatafin() {
            return $this->datafin;
        }

        function getFonte() {
            return $this->fonte;
        }

        function setId($id) {
            $this->id = $id;
        }

        function setRel_edi_mem($rel_edi_mem) {
            $this->rel_edi_mem = $rel_edi_mem;
        }

        function setDescricao($descricao) {
            $this->descricao = $descricao;
        }

        function setTipo($tipo) {
            $this->tipo = $tipo;
        }

        function setEstado($estado) {
            $this->estado = $estado;
        }

        function setDataini($dataini) {
            $this->dataini = $dataini;
        }

        function setDatafin($datafin) {
            $this->datafin = $datafin;
        }

        function setFonte($fonte) {
            $this->fonte = $fonte;
        }

        
        
        public function insert(){
            $sql  = "INSERT INTO $this->table (rel_edi_mem, descricao, tipo, estado, dataini, datafin, fonte) VALUES (:rel_edi_mem, :descricao, :tipo, :estado, :dataini, :datafin, :fonte)";
            $stmt = DB::prepare($sql);
            $stmt->bindParam(':rel_edi_mem',$this->rel_edi_mem);
            $stmt->bindParam(':descricao',  $this->descricao);
            $stmt->bindParam(':tipo',       $this->tipo);
            $stmt->bindParam(':estado',     $this->estado);
            $stmt->bindParam(':dataini',    $this->dataini);
            $stmt->bindParam(':datafin',    $this->datafin);
            $stmt->bindParam(':fonte',      $this->fonte);
            return $stmt->execute();
        }
		
        public function update($id){
            $sql  = "UPDATE $this->table SET descricao = :descricao, tipo = :tipo, estado = :estado, dataini = :dataini, datafin = :datafin, fonte = :fonte WHERE id = :id";
            $stmt = DB::prepare($sql);
            $stmt->bindParam(':descricao',  $this->descricao);
            $stmt->bindParam(':tipo',       $this->tipo);
            $stmt->bindParam(':estado',     $this->estado);
            $stmt->bindParam(':dataini',    $this->dataini);
            $stmt->bindParam(':datafin',    $this->datafin);
            $stmt->bindParam(':fonte',      $this->fonte);
            $stmt->bindParam(':id',         $id, PDO::PARAM_INT);
            return $stmt->execute();    
        }
        
        public function selecaoeditais(){
            $sql  = "SELECT * FROM $this->table ORDER BY dataini DESC";
            $stmt = DB::prepare($sql);
            $stmt->execute();
            return $stmt->fetchAll();
        }
        
//        public function buscarmaispop(){
//            $sql  = "SELECT titulo,datapublicacao,acessos FROM $this->table WHERE ativo = '1' ORDER BY acessos DESC LIMIT 3 ";
//            $stmt = DB::prepare($sql);
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
      
