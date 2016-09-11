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
$prodalt = $_POST['mercadalt'];
$prodnovo = $_POST['mercadnovo'];
$qtdenovo = $_POST['qtde'];


if($codvenda && $prodalt && $prodnovo && $qtdenovo){
	$sql = "SELECT COUNT(*) QTDE  FROM consome where cod_vendamercad = $codvenda and cod_mercad = $prodnovo";
	$resultado = $conexao->query($sql);
	foreach($resultado as $valor)
	{
		$qtdeprod = $valor['QTDE'];
	}
	if($prodnovo <> $prodalt && $qtdeprod >= 1){
		echo  "<h2>Cada produto pode ser informado somente uma vez!</h2>";
		echo "<a href='form_altvendamercad.php' target='principal'><h2>Voltar</h2></a>";
	}
	else{		


		if(!$prodnovo) {
			echo  "<h2>Informe um produto!</h2>";
			echo "<a href='form_altvendamercad.php' target='principal'><h2>Voltar</h2></a>";
		}
		else{
			if($prodnovo && $qtdenovo == 0) {
					echo  "<h2>Informe a quantidade de produto(s)!</h2>";
					echo "<a href='form_altvendamercad.php' target='principal'><h2>Voltar</h2></a>";
			}
			else{

				//Verifica quantidade em estoque
				$sql1 = "SELECT * from mercadoria where codigomercad = $prodnovo";
				foreach($conexao->query($sql1) as $item)
				{
				$estoque=$item['qtdemercad'];
				$produto=$item['descricaomercad'];
				}
				if($prodnovo && $qtdenovo>$estoque) {
					echo "<h1><p>Não há produtos suficientes em estoque</h1></p>";
					echo "<h3>Produto: ". $produto . " | Quantidade: " . $estoque . "</h3>";
					echo "<br><h2>Informe uma quantidade compatível! </h2>";
					echo "<br><a href='form_altvendamercad.php' target='principal'><h1>Voltar</h1></a>";
				}
				else{

					$sql  = "UPDATE consome SET cod_mercad = $prodnovo, qtdemercvenda = $qtdenovo WHERE cod_vendamercad = ";
					$sql .= " $codvenda and cod_mercad = $prodalt ";
					$resultado = $conexao->exec($sql);
					if(!$resultado){
					echo "<h2>Erro ao realizar a alteração do produto</h2>";
					echo "<a href='form_altvendamercad.php' target='principal'><h2>Voltar</h2></a>";
					}
					else{
						echo "<h2>Alteração realizada com sucesso!</h2>";
						echo "<a href='form_altvendamercad.php' target='principal'><h2>Nova alteração</h2></a>";

					}
				}
			}
		}
	}
}
else
{
	echo "<h2>Por favor, informe todos os dados solicitados!</h2>";
	echo "<a href='form_altvendamercad.php' target='principal'><h2>Voltar</h2></a>";	
}
?>
</body>
</html>