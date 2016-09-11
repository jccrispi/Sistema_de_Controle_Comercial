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
if(isset($_POST['data']) && isset($_POST['cliente'])){
	$data = $_POST['data'];
	$cliente = $_POST['cliente'];
	
	if(!$data && !$cliente) {
		echo "<h2> Informe a data ou o nome do produto! </h2>";
		echo "<a href='consult_venda.php' target='principal'><h1>Voltar</h1></a>";
	}
	else{
		if (!$data && $cliente) {
			$sql = "SELECT COUNT(*) QTDE  FROM  venda WHERE cnpj_cliente = $cliente";
			$resultado = $conexao->query($sql);
			foreach($resultado as $valor)
			{
				$qtde = $valor['QTDE'];
			}
		}
		else {
			if ($data && !$cliente) {
				$sql = "SELECT COUNT(*) QTDE  FROM  venda WHERE  dtvenda LIKE '%$data%'";
				$resultado = $conexao->query($sql);
				foreach($resultado as $valor)
				{
					$qtde = $valor['QTDE'];
				}
			}
			else {
				if ($data && $cliente) {
					$sql = "SELECT COUNT(*) QTDE  FROM venda WHERE venda.dtvenda LIKE '%$data%' and venda.cnpj_cliente = '$cliente'";
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
			echo "<a href='consult_venda.php' target='principal'><h1>Voltar</h1></a>";
		}
		else{

			$sql = "SELECT nome FROM cliente WHERE cnpjcli = '$cliente'";
			foreach($conexao->query($sql) as $item)
			{							
			$nomecli = $item['nome'];
			}
		
			if(!$data && $cliente) {
			echo "<p><h2>Sua busca por venda(s) realizada(s) ao cliente '" . $nomecli . "' retornou " .$qtde . " resultado(s):</h2></p>";
			}
			else{
				if(!$cliente && $data){
					echo "<p><h2>Sua busca por venda(s) realizada(s) em '" . $data . "' retornou " .$qtde . " resultado(s):</h2></p>";
				}
				elseif ($cliente && $data){
					echo "<p><h2>Sua busca por vendas realizadas em " . $data . " ao cliente '" . $nomecli . "'  retornou " .$qtde . " restultado(s):</h2></p>";
				}
			}		
			
		
			if (!$data && $cliente) {
				$sql = " SELECT cliente.nome nomecli, cliente.cnpjcli, venda.dtvenda, venda.codigovend, ";
				$sql .= " venda.preventrega, venda.hrvenda, funcionario.nome nomefunc  FROM funcionario, cliente, venda ";
				$sql .= " WHERE cliente.cnpjcli = venda.cnpj_cliente and venda.cpf_func = funcionario.cpffunc and ";
				$sql .= " venda.cnpj_cliente = $cliente GROUP BY codigovend ORDER BY codigovend DESC ";
				
				echo '<table border="1"  bordercolor="#FFFFFF">';
				echo '<tr>';
				echo '<td><center>Consulta</td>';
				echo '<td><center>Código da Venda</td>';
				echo '<td><center>Data da Venda</td>';
				echo '<td><center>Horário da Venda</td>';
				echo '<td><center>Cliente</td>';
				echo '<td><center>CNPJ</td>';
				echo '<td><center>Previsão de Entrega</td>';
				echo '<td><center>Vendedor</td>';

				
				echo '</tr>';
				foreach($conexao->query($sql) as $item)
				{							
				echo '<tr>';	
				echo '<td bgcolor="#E0DFEE"><center><a href="vendadetalhes.php?codigovend=' . $item['codigovend'] . '">Detalhes</a><br></td>';
				echo '<td bgcolor="#E0DFEE"><center>' . $item['codigovend'] . '</td>';
				echo '<td bgcolor="#E0DFEE"><center>' . $item['dtvenda'] . '</td>';
				echo '<td bgcolor="#E0DFEE"><center>' . $item['hrvenda'] . '</td>';
				echo '<td bgcolor="#E0DFEE"><center>' . $item['nomecli'] . '</td>';
				echo '<td bgcolor="#E0DFEE"><center>' . $item['cnpjcli'] . '</td>';
				echo '<td bgcolor="#E0DFEE"><center>' . $item['preventrega'] . '</td>';
				echo '<td bgcolor="#E0DFEE"><center>' . $item['nomefunc'] . '</td>';

				echo '</tr>';
				}	
				echo '</table>';
			}
			elseif ($data && !$cliente) {
				$sql  = " SELECT cliente.nome nomecli, cliente.cnpjcli, venda.dtvenda, venda.codigovend, ";
				$sql .= " venda.preventrega, venda.hrvenda, funcionario.nome nomefunc  FROM funcionario, cliente, venda ";
				$sql .= " WHERE cliente.cnpjcli = venda.cnpj_cliente and venda.cpf_func = funcionario.cpffunc and ";
				$sql .= " venda.dtvenda LIKE '%$data%' GROUP BY codigovend ORDER BY codigovend DESC ";
				
				echo '<table border="1"  bordercolor="#FFFFFF">';
				echo '<tr>';
				echo '<td><center>Consulta</td>';
				echo '<td><center>Código da Venda</td>';
				echo '<td><center>Data da Venda</td>';
				echo '<td><center>Horário da Venda</td>';
				echo '<td><center>Cliente</td>';
				echo '<td><center>CNPJ</td>';
				echo '<td><center>Previsão de Entrega</td>';
				echo '<td><center>Vendedor</td>';
				echo '</tr>';
				foreach($conexao->query($sql) as $item)
				{							
				echo '<tr>';
				echo '<td bgcolor="#E0DFEE"><center><a href="vendadetalhes.php?codigovend=' . $item['codigovend'] . '">Detalhes</a><br></td>';
				echo '<td bgcolor="#E0DFEE"><center>' . $item['codigovend'] . '</td>';
				echo '<td bgcolor="#E0DFEE"><center>' . $item['dtvenda'] . '</td>';
				echo '<td bgcolor="#E0DFEE"><center>' . $item['hrvenda'] . '</td>';
				echo '<td bgcolor="#E0DFEE"><center>' . $item['nomecli'] . '</td>';
				echo '<td bgcolor="#E0DFEE"><center>' . $item['cnpjcli'] . '</td>';
				echo '<td bgcolor="#E0DFEE"><center>' . $item['preventrega'] . '</td>';
				echo '<td bgcolor="#E0DFEE"><center>' . $item['nomefunc'] . '</td>';
				echo '</tr>';
				}	
				echo '</table>';
			}
			elseif ($cliente && $data){
				$sql = " SELECT cliente.nome nomecli, cliente.cnpjcli, venda.dtvenda, venda.codigovend, ";
				$sql .= " venda.preventrega, venda.hrvenda, funcionario.nome nomefunc  FROM funcionario, cliente, venda ";
				$sql .= " WHERE cliente.cnpjcli = venda.cnpj_cliente and venda.cpf_func = funcionario.cpffunc and ";
				$sql .= " venda.cnpj_cliente = $cliente AND venda.dtvenda LIKE '%$data%' GROUP BY codigovend ORDER ";
				$sql .=	" BY codigovend DESC ";
			
				echo '<table border="1"  bordercolor="#FFFFFF">';
				echo '<tr>';
				echo '<td><center>Consulta</td>';
				echo '<td><center>Código da Venda</td>';
				echo '<td><center>Data da Venda</td>';
				echo '<td><center>Horário da Venda</td>';
				echo '<td><center>Cliente</td>';
				echo '<td><center>CNPJ</td>';
				echo '<td><center>Previsão de Entrega</td>';
				echo '<td><center>Vendedor</td>';
				echo '</tr>';
				foreach($conexao->query($sql) as $item)
				{							
				echo '<tr>';
				echo '<td bgcolor="#E0DFEE"><center><a href="vendadetalhes.php?codigovend=' . $item['codigovend'] . '">Detalhes</a><br></td>';
				echo '<td bgcolor="#E0DFEE"><center>' . $item['codigovend'] . '</td>';
				echo '<td bgcolor="#E0DFEE"><center>' . $item['dtvenda'] . '</td>';
				echo '<td bgcolor="#E0DFEE"><center>' . $item['hrvenda'] . '</td>';
				echo '<td bgcolor="#E0DFEE"><center>' . $item['nomecli'] . '</td>';
				echo '<td bgcolor="#E0DFEE"><center>' . $item['cnpjcli'] . '</td>';
				echo '<td bgcolor="#E0DFEE"><center>' . $item['preventrega'] . '</td>';
				echo '<td bgcolor="#E0DFEE"><center>' . $item['nomefunc'] . '</td>';
				echo '</tr>';
				}	
				echo '</table>';
			}
			
		}
		
	}
}
?>
</body>
</meta>
</html>