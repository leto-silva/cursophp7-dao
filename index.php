<?php

require_once("config.php");

//$sql = new Sql();

//$usuarios = $sql->select("select * from tb_usuarios");

$root = new Usuario();

$root->loadById(4);

echo $root;


?>