<?php
// -------------------------------- CLASSE USUARIO
require_once 'Crud.php';

class membro extends Crud{
	
	protected $table = 'membro';
        private $id;
        private $nome;
        private $sobrenome;
        private $dtnasc;
        private $cpf;
        private $cep;
        private $logradouro;
        private $complemento;
        private $numero;
        private $telefone;
        private $celular;
        private $email;
        private $ativo;

        function getId() {
            return $this->id;
        }

        function getNome() {
            return $this->nome;
        }

        function getSobrenome() {
            return $this->sobrenome;
        }

        function getDtnasc() {
            return $this->dtnasc;
        }

        function getCpf() {
            return $this->cpf;
        }

        function getCep() {
            return $this->cep;
        }

        function getLogradouro() {
            return $this->logradouro;
        }

        function getComplemento() {
            return $this->complemento;
        }

        function getNumero() {
            return $this->numero;
        }

        function getTelefone() {
            return $this->telefone;
        }

        function getCelular() {
            return $this->celular;
        }

        function getEmail() {
            return $this->email;
        }

        function getAtivo() {
            return $this->ativo;
        }

        function setId($id) {
            $this->id = $id;
        }

        function setNome($nome) {
            $this->nome = $nome;
        }

        function setSobrenome($sobrenome) {
            $this->sobrenome = $sobrenome;
        }

        function setDtnasc($dtnasc) {
            $this->dtnasc = $dtnasc;
        }

        function setCpf($cpf) {
            $this->cpf = $cpf;
        }

        function setCep($cep) {
            $this->cep = $cep;
        }

        function setLogradouro($logradouro) {
            $this->logradouro = $logradouro;
        }

        function setComplemento($complemento) {
            $this->complemento = $complemento;
        }

        function setNumero($numero) {
            $this->numero = $numero;
        }

        function setTelefone($telefone) {
            $this->telefone = $telefone;
        }

        function setCelular($celular) {
            $this->celular = $celular;
        }

        function setEmail($email) {
            $this->email = $email;
        }

        function setAtivo($ativo) {
            $this->ativo = $ativo;
        }

        public function insert(){
            $sql  = "INSERT INTO $this->table (nome, sobrenome, dtnasc, cpf, cep, logradouro, complemento, numero, telefone, celular, email, ativo) VALUES (:nome, :sobrenome, :dtnasc, :cpf, :cep, :logradouro, :complemento, :numero, :telefone, :celular, :email, :ativo)";
            $stmt = DB::prepare($sql);
            $stmt->bindParam(':nome',       $this->nome);
            $stmt->bindParam(':sobrenome',  $this->sobrenome);
            $stmt->bindParam(':dtnasc',     $this->dtnasc);
            $stmt->bindParam(':cpf',        $this->cpf);
            $stmt->bindParam(':cep',        $this->cep);
            $stmt->bindParam(':logradouro', $this->logradouro);
            $stmt->bindParam(':complemento',$this->complemento);
            $stmt->bindParam(':numero',     $this->numero);
            $stmt->bindParam(':telefone',   $this->telefone);
            $stmt->bindParam(':celular',    $this->celular);
            $stmt->bindParam(':email',      $this->email);
            $stmt->bindParam(':ativo',      $this->ativo);
            return $stmt->execute();
        }
		
        public function update($id){
            $sql  = "UPDATE $this->table SET nome = :nome, sobrenome = :sobrenome, dtnasc = :dtnasc, cpf = :cpf, cep = :cep, logradouro = :logradouro, complemento = :complemento, numero = :numero, telefone = :telefone, celular = :celular, ativo = :ativo WHERE id = :id";
            $stmt = DB::prepare($sql);
            $stmt->bindParam(':nome',       $this->nome);
            $stmt->bindParam(':sobrenome',  $this->sobrenome);
            $stmt->bindParam(':dtnasc',     $this->dtnasc);
            $stmt->bindParam(':cpf',        $this->cpf);
            $stmt->bindParam(':cep',        $this->cep);
            $stmt->bindParam(':logradouro', $this->logradouro);
            $stmt->bindParam(':complemento',$this->complemento);
            $stmt->bindParam(':numero',     $this->numero);
            $stmt->bindParam(':telefone',   $this->telefone);
            $stmt->bindParam(':celular',    $this->celular);
            $stmt->bindParam(':ativo',      $this->ativo);
            $stmt->bindParam(':id',         $id, PDO::PARAM_INT);
            return $stmt->execute();    
        }
        
        public function verificarexistenciacpf($cpf){
            $sql  = "SELECT * FROM $this->table WHERE cpf = :cpf";
            $stmt = DB::prepare($sql);
            $stmt->bindParam(':cpf', $cpf, PDO::PARAM_STR);
            $stmt->execute();
            if ($stmt->rowCount() > 0){ #Se retornar valor true >1 o usuário existe e está inativo
                return $stmt->fetchAll();
            }
        }
        
        public function findMembro($email){
            $sql  = "SELECT nome,sobrenome FROM $this->table WHERE email = :email";
            $stmt = DB::prepare($sql);
            $stmt->bindParam(':email', $email, PDO::PARAM_STR);
            $stmt->execute();
            return $stmt->fetch();
        }
        
        public function verificarexistenciaemail($email){
            $sql  = "SELECT * FROM $this->table WHERE email = :email";
            $stmt = DB::prepare($sql);
            $stmt->bindParam(':email', $email, PDO::PARAM_STR);
            $stmt->execute();
            if ($stmt->rowCount() > 0){ #Se retornar valor true >1 o usuário existe e está inativo
                return $stmt->fetchAll();
            }
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
      
