<?php

class Usuario {
	
private $idUsuario;
private $desLogin;
private $desSenha;
private $dtCadastro;

public function getIdUsuario(){
	return $this->idUsuario;
}

public function setIdUsuario($value){
	$this->idUsuario = $value;
}

public function getDesLogin(){
	return $this->desLogin;
}

public function setDesLogin($value){
	$this->desLogin = $value;
}

public function getDesSenha(){
	return $this->desSenha;
}

public function setDesSenha($value){
	$this->desSenha = $value;
}

public function getDtCadastro(){
	return $this->dtCadastro;
}

public function setDtCadastro($value){
	$this->dtCadastro = $value;
}

// ="" não o torna obrigatório
public function __construct($login ="", $senha =""){
	$this->setDesLogin($login);
	$this->setDesSenha($senha);
}

public function loadById($id){

	$sql = new Sql();

	$results = $sql->select("SELECT * FROM tb_usuarios WHERE id_usuario = :ID", array(
			":ID"=>$id
		));

		if(count($results) > 0){
			$this->setData($results[0]);
		}
}

public static function getList(){

	$sql = new Sql();

	return $sql->select("SELECT * FROM tb_usuarios ORDER BY des_login;");

}

public static function search($login){

	$sql = new Sql();

	return $sql->select("SELECT * FROM tb_usuarios WHERE des_login LIKE :SEARCH ORDER BY des_login", array(
			':SEARCH'=>"%".$login."%"
		));
}

public function login ($login, $password){

	$sql = new Sql();

	$results = $sql->select("SELECT * FROM tb_usuarios WHERE des_login = :LOGIN AND des_senha = :PASSWORD", array(
			":LOGIN"=>$login,
			":PASSWORD"=>$password
		));

		if(count($results) > 0){
			$this->setData($results[0]);

		} else {
			throw new Exception("Login e/ou senha invalidos.");
			
		}
}

public function setData($data){
	$this->setIdUsuario($data['id_usuario']);
	$this->setDesLogin($data['des_login']);
	$this->setDesSenha($data['des_senha']);
	$this->setDtCadastro(new DateTime($data['dt_cadastro']));
}

public function insert(){
	$sql = new Sql();

	$results= $sql->select("CALL sp_usuarios_insert(:LOGIN, :PASSWORD)", array(
		':LOGIN'=>$this->getDesLogin(),
		':PASSWORD'=>$this->getDesSenha()

	));

	if(count($results) > 0){
		$this->setData($results[0]);
	}
}

public function update($login, $senha){
	$this->setDesLogin($login);
	$this->setDesSenha($senha);

	$sql = new Sql();

	$sql->query("UPDATE tb_usuarios SET des_login = :LOGIN, des_senha = :PASSWORD WHERE id_usuario = :ID", array(
		':LOGIN'=>$this->getDesLogin(),
		':PASSWORD'=>$this->getDesSenha(),
		':ID'=>$this->getIdUsuario()
	));
}

public function __toString(){
	return json_encode(array(
		"id_usuario"=>$this->getIdUsuario(),
		"des_login"=>$this->getDesLogin(),
		"des_senha"=>$this->getDesSenha(),
		"dt_cadastro"=>$this->getDtCadastro()->format("d/m/Y H:i:s")
	));
}

}


?>