<?php

require_once("config.php");

//$sql = new Sql();

//$usuarios = $sql->select("select * from tb_usuarios");

//$root = new Usuario();
//$root->loadById(4);
//echo $root;

//carrega uma lista de usuarios
//$lista = Usuario::getList();

//echo json_encode($lista);

// carrega lista buscando pelo login
//$search = Usuario::search("su");
//echo json_encode($search);

//carrega um usuario usando o login e senha

$usuario = new Usuario();
$usuario->login("leto", '12345');

echo $usuario;


?>