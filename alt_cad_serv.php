<html>
<meta charset="utf-8">
<body bgcolor="#FFFFFF" text="#000000" link="#000000" alink="#000000" vlink="#000000" >
<style type="text/css">
a:link, a:visited {
	text-decoration: none
	}
a:hover {
	text-decoration: underline;
	color #f00
	}
a:active {
	text-decoration: none
	}
</style>
<?php
include('conexao.php');
$codigo = $_POST['codigo'];
$descricao = $_POST['descricao'];
$precoserv = $_POST['precoserv'];

if($codigo && $descricao && $precoserv){
	$sql="UPDATE servico SET descricaoserv ='$descricao', precserv='$precoserv' WHERE codigoserv = $codigo";
	$resultado = $conexao->exec($sql);
	if(!$resultado){
	echo "<h2>Erro ao realizar a alteração</h2>";
	echo "<a href='alt_serv.php' target='principal'><h1>Voltar</h1></a>";
	}
	else
	{
	echo "<h2>Alteração de cadastro realizada com sucesso!</h2>";	
	echo "<a href='alt_serv.php' target='principal'><h1>Voltar</h1></a>";
	}
	}
else
{
	echo "<h2>Por favor, preencha todos os campos!</h2>";
	echo "<a href='alt_serv.php' target='principal'><h1>Voltar</h1></a>";
}
?>
</body>
</html>