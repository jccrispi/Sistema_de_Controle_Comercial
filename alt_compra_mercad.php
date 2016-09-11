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
$codcompra = $_POST['codcompra'];
$prodalt = $_POST['mercadalt'];
$prodnovo = $_POST['mercadnovo'];
$qtdenovo = $_POST['qtde'];

if(!$codcompra || !$prodalt || !$prodnovo || !$qtdenovo) {
			echo  "<h2>Preencha todos os campos solicitados!</h2>";
			echo "<a href='alt_compra.php' target='principal'><h2>Voltar</h2></a>";
}
else{			
	$sql = "SELECT COUNT(*) QTDE  FROM altera where cod_compra = $codcompra and cod_mercadcomp = $prodalt";
		$resultado = $conexao->query($sql);
		foreach($resultado as $valor)
		{
			$qtdeprod = $valor['QTDE'];
		}
	if($qtdeprod) {
		
		$sql = "SELECT qtdecompra FROM altera where cod_compra = $codcompra and cod_mercadcomp = $prodalt";
		$resultado = $conexao->query($sql);
		foreach($resultado as $valor)
		{
			$qtdealt = $valor['qtdecompra'];
		}

		$sql = "SELECT qtdemercad FROM mercadoria where codigomercad = $prodalt";
		$resultado = $conexao->query($sql);
		foreach($resultado as $valor)
		{
			$qtdeest = $valor['qtdemercad'];
		}

		if(($qtdeest < $qtdealt && $prodnovo <> $prodalt) || ($prodnovo == $prodalt && $qtdenovo <= $qtdealt)) {
				echo  "<h2>Esta compra não pode ser modificada!</h2>";
				echo "<a href='alt_compra.php' target='principal'><h2>Voltar</h2></a>";
		}
		else{
			$sql = "SELECT COUNT(*) QTDE  FROM altera where cod_compra = $codcompra and cod_mercadcomp = $prodnovo";
			$resultado = $conexao->query($sql);
			foreach($resultado as $valor)
			{
				$qtdeprod = $valor['QTDE'];
			}
			if($prodnovo <> $prodalt && $qtdeprod >= 1){
				echo  "<h2>Cada produto pode ser informado somente uma vez!</h2>";
				echo "<a href='alt_compra.php' target='principal'><h2>Voltar</h2></a>";
			}
			else{		


				if(!$prodnovo) {
					echo  "<h2>Informe um produto!</h2>";
					echo "<a href='alt_compra.php' target='principal'><h2>Voltar</h2></a>";
				}
				else{
					if($prodnovo && $qtdenovo == 0) {
							echo  "<h2>Informe a quantidade de produto(s)!</h2>";
							echo "<a href='alt_compra.php' target='principal'><h2>Voltar</h2></a>";
					}
					else{

						

						$sql  = "UPDATE altera SET cod_mercadcomp = $prodnovo, qtdecompra = $qtdenovo WHERE cod_compra = ";
						$sql .= " $codcompra and cod_mercadcomp = $prodalt ";
						$resultado = $conexao->exec($sql);
						if(!$resultado){
						echo "<h2>Erro ao realizar a alteração do produto</h2>";
						echo "<a href='alt_compra.php' target='principal'><h2>Voltar</h2></a>";
						}
						else{
							echo "<h2>Alteração realizada com sucesso!</h2>";	
							echo "<a href='alt_compra.php' target='principal'><h2>Nova alteração</h2></a>";

						}
						
					}
				}
			}
		}
	}
	else{
				echo  "<h2>Produto/compra não localizados!</h2>";
				echo "<a href='alt_compra.php' target='principal'><h2>Voltar</h2></a>";
	}
}
?>
</body>
</html>