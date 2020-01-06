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

/*
//carrega um usuario usando o login e a senha
$usuario3 = new Usuario();
$usuario3->login("jooj","MasQcuLindo!");
echo $usuario3;
*/

/*
//insere dados
$usuario4 = new Usuario("aluno", "TePegoEteJOOJ");
$usuario4->insert();
echo $usuario4;
*/

//atualiza os dados
$usuario5 = new Usuario();
$usuario5->loadById(4);
$usuario5->update("Bolsonaro", "38Alianca");
echo $usuario5;

?>