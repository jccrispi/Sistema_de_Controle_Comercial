<html>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
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

if ($_SERVER['REQUEST_METHOD'] == 'GET') 
{

	$codcompra = $_GET['codcompra'];
		

	$sql = "SELECT COUNT(*) QTDE  FROM altera where cod_compra = $codcompra";
	$resultado = $conexao->query($sql);
	foreach($resultado as $valor)
	{
		$qtdeprod = $valor['QTDE'];
	}



	if(!$qtdeprod){
		echo  "<h2><center>NÃO HÁ PRODUTOS OU SERVIÇOS REGISTRADOS NESTA COMPRA!</center></h2>";
		echo "<a href='consult_compra.php' target='principal'><h2>Nova consulta</h2></a>";
	}
	else
	{

		echo '<h2><center>DETALHAMENTO DA COMPRA</center></h2>';


			$sql  = " SELECT fornecedor.nome nomeforn, fornecedor.cnpjforn, fornvende.dtcompra, fornvende.codcompra, ";
			$sql .= " fornvende.hrcompra, funcionario.nome nomefunc FROM funcionario, fornecedor, fornvende ";
			$sql .= "  WHERE fornvende.codcompra = $codcompra and fornecedor.cnpjforn = fornvende.cnpj_forn ";
			$sql .= " and fornvende.cpf_funccompra = funcionario.cpffunc";
			
			echo '<center>';
			echo '<table border="1"  bordercolor="#FFFFFF" >';
			echo '<tr>';
			echo '<td><center>Código da compra</td>';
			echo '<td><center>Data da compra</td>';
			echo '<td><center>Horário</td>';
			echo '<td><center>fornecedor</td>';
			echo '<td><center>CNPJ</td>';
			echo '<td><center>Colaborador</td>';
			
			echo '</tr>';
			foreach($conexao->query($sql) as $item)
			{							
			echo '<tr>';
			echo '<td bgcolor="#E0DFEE"><center>' . $item['codcompra'] . '</td>';
			echo '<td bgcolor="#E0DFEE"><center>' . $item['dtcompra'] . '</td>';
			echo '<td bgcolor="#E0DFEE"><center>' . $item['hrcompra'] . '</td>';
			echo '<td bgcolor="#E0DFEE"><center>' . $item['nomeforn'] . '</td>';
			echo '<td bgcolor="#E0DFEE"><center>' . $item['cnpjforn'] . '</td>';
			echo '<td bgcolor="#E0DFEE"><center>' . $item['nomefunc'] . '</td>';
			
			echo '</tr>';
			}	
			echo '</table>';
			echo '</center>';
		


		echo '<h3>RESUMO DA OPERAÇÃO:</h3>';

		
		

		//Pesquisa o código da compra
		$sql = " SELECT MAX(codcompra) maxcod FROM fornvende";
		foreach($conexao->query($sql) as $item)
		{
		$qtdeprod=$item['maxcod'];
		}
				$totprod = 0;

		if($qtdeprod) {
					
			$sql  = " SELECT mercadoria.descricaomercad, mercadoria.preccusto, altera.qtdecompra, altera.cod_mercadcomp FROM  ";
			$sql .= " mercadoria, fornvende, altera WHERE mercadoria.codigomercad = altera.cod_mercadcomp ";
			$sql .= "  and altera.cod_compra = fornvende.codcompra and fornvende.codcompra = $codcompra";
			$sql .= "  and altera.cod_compra = $codcompra GROUP BY codigomercad ";
			
			echo '<h4>PRODUTOS:</h4>';
			echo '<table border="1"  bordercolor="#FFFFFF" >';
			echo '<tr>';
			echo '<td><center>Código</td>';
			echo '<td><center>Descrição</td>';
			echo '<td><center>Valor Unitário</td>';
			echo '<td><center>Quantidade</td>';
			echo '<td><center>Total</td>';
			echo '</tr>';
			
			foreach($conexao->query($sql) as $item)
			{							
			echo '<tr>';
			echo '<td bgcolor="#E0DFEE">' . $item['cod_mercadcomp'] . '</td>';
			echo '<td bgcolor="#E0DFEE">' . $item['descricaomercad'] . '</td>';
			echo '<td bgcolor="#E0DFEE">R$ ' . $item['preccusto'] . '</td>';
			echo '<td bgcolor="#E0DFEE">' . $item['qtdecompra'] . '</td>';
			$total = $item['preccusto']*$item['qtdecompra'];
			$totprod += $total;
			echo '<td bgcolor="#E0DFEE">R$ ' . number_format($total,2, ',', '.') . '</td>';
			echo '</tr>';
			
			
			}	
			echo '</table>';
			
		}


		echo '<br><table border="1"  bordercolor="#FFFFFF" >';
		echo '<tr>';
		echo '<td bgcolor="#E0DFEE"><h2><center>VALOR TOTAL DA COMPRA</h2></td>';
		echo '<td bgcolor="#E0DFEE"><h2>R$ ' . number_format($totprod,2, ',', '.').'</h2></td>';
		echo '</tr>';
		echo '</table>';
		
		echo "<a href='consult_compra.php' target='principal'><h2>Nova consulta</h2></a>";
					
					
	}
}

	?>
</body>
</meta>
</html>