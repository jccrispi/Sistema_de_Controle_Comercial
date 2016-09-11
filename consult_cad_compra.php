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
if(isset($_POST['data']) && isset($_POST['mercad'])){
	$data = $_POST['data'];
	$mercad = $_POST['mercad'];

	
	
	if(!$data && !$mercad) {
			echo "<h2> Informe a data ou o nome do produto! </h2>";
			echo "<a href='consult_compra.php' target='principal'><h1>Voltar</h1></a>";
	}
	else{
	
	
	
		$sql = "SELECT COUNT(*) QTDE  FROM altera";
		$resultado = $conexao->query($sql);
		foreach($resultado as $valor)
		{
			$qtdealtera = $valor['QTDE'];
		}
		if(!$qtdealtera) {
			echo "<h1> Nenhum resultado encontrado, Tente novamente! </h1>";
			echo "<a href='consult_compra.php' target='principal'><h1>Voltar</h1></a>";
		}
		else
		{
			
					if (!$data && $mercad) {
						$sql = "SELECT COUNT(*) QTDE  FROM fornvende, altera WHERE   ";
						$sql .= "  altera.cod_compra = fornvende.codcompra and altera.cod_mercadcomp = '$mercad' ";
						$resultado = $conexao->query($sql);
						foreach($resultado as $valor)
						{
						$qtde = $valor['QTDE'];
						}
					}
					
					else {
						if ($data && !$mercad) {
							$sql  = "SELECT COUNT(*) QTDE  FROM fornvende ";
							$sql .= "WHERE codcompra IN ( SELECT cod_compra FROM altera) ";
							$sql .= "  AND dtcompra LIKE '%$data%'";
							$resultado = $conexao->query($sql);
							foreach($resultado as $valor)
							{
								$qtde = $valor['QTDE'];
							}
						}
						else {
							if ($data && $mercad) {
								$sql = "SELECT COUNT(*) QTDE  FROM fornvende, altera WHERE  altera.cod_compra = fornvende.codcompra ";
								$sql .= " and fornvende.dtcompra LIKE '%$data%' and altera.cod_mercadcomp = '$mercad'";
								$resultado = $conexao->query($sql);
								foreach($resultado as $valor)
								{
								$qtde = $valor['QTDE'];
								}
							}
						}
					}
								
					if($qtde==0){
						echo "<h1> Nenhum resultado encontrado, Tente novamente! </h1>";
						echo "<a href='consult_compra.php' target='principal'><h1>Voltar</h1></a>";
					}
					else{
				
						$sql = "SELECT descricaomercad FROM mercadoria WHERE codigomercad = '$mercad'";
						foreach($conexao->query($sql) as $item)
						{							
						$mercadnome = $item['descricaomercad'];
						}
					
						if(!$data && $mercad) {
						echo "<p><h2>Sua busca por '" . $mercadnome . "' retornou " .$qtde . " compra(s) realizada(s):</h2></p>";
						}
						else{
							if(!$mercad && $data){
								echo "<p><h2>Sua busca pela data '" . $data . "' retornou " .$qtde . " compra(s) realizada(s):</h2></p>";
							}
							elseif ($mercad && $data){
								echo "<p><h2>Sua busca por '" . $mercadnome . "' comprada(s) em " . $data . " retornou " .$qtde . " restultado(s):</h2></p>";
							}
						}
						if (!$data && $mercad) { 
							$sql  = " SELECT funcionario.nome nomefunc, fornecedor.nome nomeforn, fornecedor.cnpjforn, fornvende.hrcompra,  ";
							$sql .= "  fornvende.dtcompra, fornvende.codcompra  FROM fornecedor, fornvende, funcionario, altera WHERE   ";
							$sql .= "  fornecedor.cnpjforn = fornvende.cnpj_forn and fornvende.cpf_funccompra = funcionario.cpffunc and ";
							$sql .= " altera.cod_compra = fornvende.codcompra and altera.cod_mercadcomp = '$mercad' GROUP BY codcompra ORDER BY codcompra DESC";
							
							echo '<table border="1"  bordercolor="#FFFFFF">';
							echo '<tr>';
							echo '<td><center>Consulta</td>';
							echo '<td><center>Código da Compra</td>';
							echo '<td><center>Data da Compra</td>';
							echo '<td><center>Horário da Compra</td>';
							echo '<td><center>Fornecedor</td>';
							echo '<td><center>CNPJ</td>';
							echo '<td><center>Responsável/Compra</td>';
							echo '</tr>';
							foreach($conexao->query($sql) as $item)
							{							
							echo '<tr>';
							echo '<td bgcolor="#E0DFEE"><center><a href="compradetalhes.php?codcompra=' . $item['codcompra'] . '">Detalhes</a><br></td>';
							echo '<td bgcolor="#E0DFEE">' . $item['codcompra'] . '</td>';
							echo '<td bgcolor="#E0DFEE">' . $item['dtcompra'] . '</td>';
							echo '<td bgcolor="#E0DFEE">' . $item['hrcompra'] . '</td>';
							echo '<td bgcolor="#E0DFEE">' . $item['nomeforn'] . '</td>';
							echo '<td bgcolor="#E0DFEE">' . $item['cnpjforn'] . '</td>';
							echo '<td bgcolor="#E0DFEE">' . $item['nomefunc'] . '</td>';
							echo '</tr>';
							}	
							echo '</table>';
						}
						elseif($data && $mercad) {
							
							$sql  = " SELECT funcionario.nome nomefunc, fornecedor.nome nomeforn, fornecedor.cnpjforn, fornvende.hrcompra,  ";
							$sql .= "  fornvende.dtcompra, fornvende.codcompra  FROM fornecedor, fornvende, funcionario, altera WHERE   ";
							$sql .= "  fornecedor.cnpjforn = fornvende.cnpj_forn and fornvende.cpf_funccompra = funcionario.cpffunc and ";
							$sql .= " altera.cod_compra = fornvende.codcompra and fornvende.dtcompra LIKE '%$data%' ";
							$sql .= " and altera.cod_mercadcomp = '$mercad' GROUP BY codcompra ORDER BY codcompra DESC ";
							
							echo '<table border="1"  bordercolor="#FFFFFF">';
							echo '<tr>';
							echo '<td><center>Consulta</td>';
							echo '<td><center>Código da Compra</td>';
							echo '<td><center>Data da Compra</td>';
							echo '<td><center>Horário da Compra</td>';
							echo '<td><center>Fornecedor</td>';
							echo '<td><center>CNPJ</td>';
							echo '<td><center>Responsável/Compra</td>';
							echo '</tr>';
							foreach($conexao->query($sql) as $item)
							{							
							echo '<tr>';
							echo '<td bgcolor="#E0DFEE"><center><a href="compradetalhes.php?codcompra=' . $item['codcompra'] . '">Detalhes</a><br></td>';
							echo '<td bgcolor="#E0DFEE">' . $item['codcompra'] . '</td>';
							echo '<td bgcolor="#E0DFEE">' . $item['dtcompra'] . '</td>';
							echo '<td bgcolor="#E0DFEE">' . $item['hrcompra'] . '</td>';
							echo '<td bgcolor="#E0DFEE">' . $item['nomeforn'] . '</td>';
							echo '<td bgcolor="#E0DFEE">' . $item['cnpjforn'] . '</td>';
							echo '<td bgcolor="#E0DFEE">' . $item['nomefunc'] . '</td>';
							echo '</tr>';
							}	
							echo '</table>';
					
						}
						elseif ($data && !$mercad) {
								
							
								$sql  = " SELECT funcionario.nome nomefunc, fornecedor.nome nomeforn, fornecedor.cnpjforn, fornvende.hrcompra,  ";
								$sql .= "  fornvende.dtcompra, fornvende.codcompra  FROM fornecedor, fornvende, funcionario, altera WHERE   ";
								$sql .= "  fornecedor.cnpjforn = fornvende.cnpj_forn and fornvende.cpf_funccompra = funcionario.cpffunc and ";
								$sql .= " altera.cod_compra = fornvende.codcompra and fornvende.dtcompra LIKE '%$data%' GROUP BY codcompra ORDER BY codcompra DESC";
								
								echo '<table border="1"  bordercolor="#FFFFFF">';
								echo '<tr>';
								echo '<td><center>Consulta</td>';
								echo '<td><center>Código da Compra</td>';
								echo '<td><center>Data da Compra</td>';
								echo '<td><center>Horário da Compra</td>';
								echo '<td><center>Fornecedor</td>';
								echo '<td><center>CNPJ</td>';
								echo '<td><center>Responsável/Compra</td>';
								echo '</tr>';
								foreach($conexao->query($sql) as $item)
								{							
								echo '<tr>';
								echo '<td bgcolor="#E0DFEE"><center><a href="compradetalhes.php?codcompra=' . $item['codcompra'] . '">Detalhes</a><br></td>';
								echo '<td bgcolor="#E0DFEE">' . $item['codcompra'] . '</td>';
								echo '<td bgcolor="#E0DFEE">' . $item['dtcompra'] . '</td>';
								echo '<td bgcolor="#E0DFEE">' . $item['hrcompra'] . '</td>';
								echo '<td bgcolor="#E0DFEE">' . $item['nomeforn'] . '</td>';
								echo '<td bgcolor="#E0DFEE">' . $item['cnpjforn'] . '</td>';
								echo '<td bgcolor="#E0DFEE">' . $item['nomefunc'] . '</td>';
								echo '</tr>';
								}	
								echo '</table>';
							}
						}
						echo "<p><br><a href='consult_compra.php' target='principal'><h2>Nova consulta</h2></a></p>";
				
		}
	}
}
?>
</body>
</meta>
</html>