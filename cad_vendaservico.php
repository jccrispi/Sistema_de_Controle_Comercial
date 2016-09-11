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
$servico = $_POST['servico'];

//Insere o código da venda
$sql = " SELECT MAX(codigovend) maxcod FROM venda";
foreach($conexao->query($sql) as $item)
{
$codvenda=$item['maxcod'];
}	

$sql = "SELECT COUNT(*) QTDE  FROM recai where codvenda = $codvenda and codservico = $servico";
$resultado = $conexao->query($sql);
foreach($resultado as $valor)
{
	$qtdeprod = $valor['QTDE'];
}
if($qtdeprod >= 1){
	echo  "<h2>Cada serviço pode ser selecionado somente uma vez!</h2>";
	echo "<a href='form_vendaservico.php' target='principal'><h2>Voltar</h2></a>";
}
else{

	if(!$servico) {
		echo  "<h2>Selecione um serviço!</h2>";
		echo "<a href='form_vendaservico.php' target='principal'><h2>Voltar</h2></a>";
	}
	else{


				

	$sql = "INSERT INTO recai (codservico, codvenda)";
	$sql .= " values  ('$servico','$codvenda')";
	$resultado = $conexao->exec($sql);
	if(!$resultado){
	echo "<h2>Erro ao registrar o(s) serviço(s)</h2>";
	}

	include ('form_vendaservico.php');
	}
}
?>

</body>
</html>