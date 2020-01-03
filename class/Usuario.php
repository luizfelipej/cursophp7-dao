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

public function loadById($id){

	$sql = new Sql();

	$results = $sql->select("SELECT * FROM tb_usuarios WHERE id_usuario = :ID", array(
			":ID"=>$id
		));

		if(count($results) > 0){
			$row = $results[0];
			$this->setIdUsuario($row['id_usuario']);
			$this->setDesLogin($row['des_login']);
			$this->setDesSenha($row['des_senha']);
			$this->setDtCadastro(new DateTime($row['dt_cadastro']));
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
			$row = $results[0];
			$this->setIdUsuario($row['id_usuario']);
			$this->setDesLogin($row['des_login']);
			$this->setDesSenha($row['des_senha']);
			$this->setDtCadastro(new DateTime($row['dt_cadastro']));
		} else {

			throw new Exception("Login e/ou senha invalidos.");
			
		}
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