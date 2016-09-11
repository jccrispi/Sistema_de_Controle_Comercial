<?php
$usuario='root';
$senha='';
   $db="mysql:host=localhost;dbname=projeto1;charset=utf8";
	$opcoes = array(
    PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES UTF8'
	);

   try
   {
   	$conexao=new PDO($db, $usuario, $senha, $opcoes); //PHP Data Object
   }
   catch(PDOException $erro)
   {
   	exit("Falha ao conectar com BD: ".$erro->getMessage());
   }
?>