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


//$usuario = new Usuario();
//$usuario->login("rafael", '123456');

//$usuario = new Usuario();
//$usuario->login("leto", '123456');
//>>>>>>> 0bd978a8c4fc201b805d1664d963fe463f53e2cd

//$aluno->Insert();

//echo json_encode($aluno);

$usuario = new Usuario();
$usuario->loadById(5);

$usuario->delete();

echo json_encode($usuario);


?>