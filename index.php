<?php

require_once("config.php");
/*
$sql = new Sql();

$usuarios = $sql->select("SELECT * FROM tb_usuarios");

echo json_encode($usuarios);
*/

/*
//busca um usuario pelo ID
$usuario = new Usuario();
$usuario->loadById(2);
echo $usuario;

$usuario2 = new Usuario();
$usuario2->loadById(4);
echo $usuario2;
*/

/*
//carrega uma lista compelta 
$lista = Usuario::getList();
echo json_encode($lista);
*/

/*
//carrega uma lista de usuarios buscando pelo login
$search = Usuario::search("jo");
echo json_encode($search);
*/

//carrega um usuario usando o login e a senha
$usuario = new Usuario();
$usuario->login("jooj","MasQcuLindo!");
echo $usuario;

?>