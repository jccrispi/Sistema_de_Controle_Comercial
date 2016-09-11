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

if($codigo){
	$sql = "SELECT COUNT(*) QTDE  FROM consome where cod_vendamercad = $codigo";
	$resultado = $conexao->query($sql);
	foreach($resultado as $valor)
	{
		$qtdeprod1 = $valor['QTDE'];
	}

	$sql = "SELECT COUNT(*) QTDE  FROM recai where codvenda = $codigo";
	$resultado = $conexao->query($sql);
	foreach($resultado as $valor)
	{
		$qtdeprod2 = $valor['QTDE'];
	}

	if($qtdeprod1 && !$qtdeprod2) {
		$sql  ="DELETE FROM consome WHERE cod_vendamercad = '$codigo'; DELETE";
		$sql .="  FROM venda WHERE codigovend = '$codigo' ";
		$resultado = $conexao->exec($sql);
		if(!$resultado){
		echo "<h2>Erro ao excluir a venda</h2>";
		echo "<a href='del_venda.php' target='principal'><h1>Voltar</h1></a>";
		}
		else
		{
		echo "<h2>Venda excluída com sucesso!</h2>";	
		echo "<a href='del_venda.php' target='principal'><h1>Voltar</h1></a>";
		}
	}
	elseif($qtdeprod2 && !$qtdeprod1) {
		$sql  ="DELETE FROM recai WHERE codvenda = '$codigo'; DELETE";
		$sql .="  FROM venda WHERE codigovend = '$codigo' ";
		$resultado = $conexao->exec($sql);
		if(!$resultado){
		echo "<h2>Erro ao excluir a venda</h2>";
		echo "<a href='del_venda.php' target='principal'><h1>Voltar</h1></a>";
		}
		else
		{
		echo "<h2>Venda excluída com sucesso!</h2>";	
		echo "<a href='del_venda.php' target='principal'><h1>Voltar</h1></a>";
		}
	}
	elseif(!$qtdeprod1 && !$qtdeprod2) {
		$sql .=" DELETE FROM venda WHERE codigovend = '$codigo' ";
		$resultado = $conexao->exec($sql);
		if(!$resultado){
		echo "<h2>Erro ao excluir a venda</h2>";
		echo "<a href='del_venda.php' target='principal'><h1>Voltar</h1></a>";
		}
		else
		{
		echo "<h2>Venda excluída com sucesso!</h2>";	
		echo "<a href='del_venda.php' target='principal'><h1>Voltar</h1></a>";
		}
	}
	elseif($qtdeprod1 && $qtdeprod2){
		$sql  ="DELETE FROM recai WHERE codvenda = '$codigo'; DELETE FROM consome WHERE cod_vendamercad = '$codigo'; DELETE";
		$sql .="  FROM venda WHERE codigovend = '$codigo' ";
		$resultado = $conexao->exec($sql);
		if(!$resultado){
		echo "<h2>Erro ao excluir a venda</h2>";
		echo "<a href='del_venda.php' target='principal'><h1>Voltar</h1></a>";
		}
		else
		{
		echo "<h2>Venda excluída com sucesso!</h2>";	
		echo "<a href='del_venda.php' target='principal'><h1>Voltar</h1></a>";
		}
	}
}
else
{
	echo "<h2>Por favor, informe o codigo!</h2>";	
	echo "<a href='del_venda.php' target='principal'><h1>Voltar</h1></a>";	
}
?>
</body>
</html>