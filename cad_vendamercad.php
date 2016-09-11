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
$mercad = $_POST['mercad'];
$qtde = $_POST['qtde'];

//Insere o código da venda
$sql = " SELECT MAX(codigovend) maxcod FROM venda";
foreach($conexao->query($sql) as $item)
{
$codvenda=$item['maxcod'];
}	

$sql = "SELECT COUNT(*) QTDE  FROM consome where cod_vendamercad = $codvenda and cod_mercad = $mercad";
$resultado = $conexao->query($sql);
foreach($resultado as $valor)
{
	$qtdeprod = $valor['QTDE'];
}
if($qtdeprod >= 1){
	echo  "<h2>Cada produto pode ser selecionado somente uma vez!</h2>";
	echo "<a href='form_vendamercad.php' target='principal'><h2>Voltar</h2></a>";
}
else{		


	if(!$mercad) {
		echo  "<h2>Selecione uma mercadoria!</h2>";
		echo "<a href='form_vendamercad.php' target='principal'><h2>Voltar</h2></a>";
	}
	else{
	if($mercad && $qtde == 0) {
			echo  "<h2>Informe a quantidade de produto(s)!</h2>";
			echo "<a href='form_vendamercad.php' target='principal'><h2>Voltar</h2></a>";
		}
	else{

	//Verifica quantidade em estoque
	$sql1 = "SELECT * from mercadoria where codigomercad = $mercad";
	foreach($conexao->query($sql1) as $item)
	{
	$estoque=$item['qtdemercad'];
	$produto=$item['descricaomercad'];
	}
	if($mercad && $qtde>$estoque) {
		echo "<h1><p>Não há produtos suficientes em estoque</h1></p>";
		echo "<h3>Produto: ". $produto . " | Quantidade: " . $estoque . "</h3>";
		echo "<br><h2>Informe uma quantidade compatível! </h2>";
		echo "<br><a href='form_vendamercad.php' target='principal'><h1>Voltar</h1></a>";
	}
	else{

		$sql = "INSERT INTO consome (cod_vendamercad, cod_mercad, qtdemercvenda)";
		$sql .= " values  ('$codvenda','$mercad','$qtde')";
		$resultado = $conexao->exec($sql);
		if(!$resultado){
		echo "<h2>Erro ao registrar o(s) produto(s)</h2>";
		echo "<br><a href='form_vendamercad.php' target='principal'><h1>Voltar</h1></a>";
		}
		else{
		include ('form_vendamercad.php');
		}
	}
	}
	}
}
?>

</body>
</html>