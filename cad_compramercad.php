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

//Pesquisa o código da compra
$sql = " SELECT MAX(codcompra) maxcodcompra FROM fornvende";
foreach($conexao->query($sql) as $item)
{
$codfornvende=$item['maxcodcompra'];
}	

$sql = "SELECT COUNT(*) QTDE  FROM altera where cod_compra = $codfornvende and cod_mercadcomp = $mercad";
$resultado = $conexao->query($sql);
foreach($resultado as $valor)
{
	$qtdeprod = $valor['QTDE'];
}
if($qtdeprod >= 1){
	echo  "<h2>Cada produto pode ser selecionado somente uma vez!</h2>";
	echo "<a href='form_compramercad.php' target='principal'><h2>Voltar</h2></a>";
	
}
else{		


	if(!$mercad) {
		echo  "<h2>Selecione um produto!</h2>";
		echo "<a href='form_compramercad.php' target='principal'><h2>Voltar</h2></a>";
	}
	else{
		if($mercad && $qtde == 0) {
				echo  "<h2>Informe a quantidade de produto(s)!</h2>";
				echo "<a href='form_compramercad.php' target='principal'><h2>Voltar</h2></a>";
			}
		else{
		
			$sql = "INSERT INTO altera (cod_mercadcomp, cod_compra, qtdecompra)";
			$sql .= " VALUES  ('$mercad','$codfornvende','$qtde')";
			$resultado = $conexao->exec($sql);
			if(!$resultado){
			echo "<h2>Erro ao registrar o(s) produto(s)</h2>";
			echo "<a href='form_compramercad.php' target='principal'><h2>Voltar</h2></a>";
				echo $codfornvende .'<br>';
			echo $mercad .'<br>';
			echo $qtde .'<br>';
			}
			else{
			include ('form_compramercad.php');
			}
		}
	}
}
?>

</body>
</html>