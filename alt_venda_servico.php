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
$codvenda = $_POST['codvend'];
$servalt = $_POST['servalt'];
$novoserv = $_POST['novoserv'];


if($codvenda && $servalt && $novoserv){
$sql = "SELECT COUNT(*) QTDE  FROM recai where codvenda = $codvenda and codservico = $novoserv";
$resultado = $conexao->query($sql);
foreach($resultado as $valor)
{
	$qtdeprod = $valor['QTDE'];
}	
if($qtdeprod >= 1){
	echo  "<h2>Este serviço já está selecionado!</h2>";
	echo "<a href='form_altvendaserv.php' target='principal'><h2>Voltar</h2></a>";
}
else{

	if(!$novoserv) {
		echo  "<h2>Selecione um serviço!</h2>";
		echo "<a href='form_altvendaserv.php' target='principal'><h2>Voltar</h2></a>";
	}
	else{
		$sql = "UPDATE recai SET codservico = $novoserv WHERE  codvenda = $codvenda and codservico = $servalt";
		$resultado = $conexao->exec($sql);
		if(!$resultado){
		echo "<h2>Erro ao alterar o serviço</h2>";
		echo "<a href='form_altvendaserv.php' target='principal'><h2>Voltar</h2></a>";
		}
		else {
		echo "<h2>Alteração realizada com sucesso!</h2>";
		echo "<a href='form_altvendaserv.php' target='principal'><h2>Nova alteração</h2></a>";
		}
	}
}
}
else
{
	echo "<h2>Por favor, informe todos os dados solicitados!</h2>";
	echo "<a href='form_altvendaserv.php' target='principal'><h2>Voltar</h2></a>";	
}
?>

</body>
</html>