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
echo "<p><h5>COMPRAS EFETUADAS CONFORME PESQUISA REALIZADA:</h5></p>";
include('conexao.php');
if(isset($_POST['data']) && isset($_POST['mercad'])){
	$data = $_POST['previsao'];
	$mercad = $_POST['mercad'];
	$cliente = $_POST['cliente'];
	if (!$data) {
		$data = "99/99/99";
	}
	$sql = "SELECT COUNT(*) QTDE  FROM cliente, mercadoria, vende WHERE   ";
	$sql .= " cliente.cnpj = vende.cnpj_forn and vende.cod_mercad = mercadoria.codigo ";
	$sql .= " and (UPPER(vende.data) LIKE UPPER ('%$data%') AND mercadoria.codigo = '$mercad' AND cliente.cnpj = '$cliente')";
	$resultado = $conexao->query($sql);
	foreach($resultado as $valor)
	{
		$qtde = $valor['QTDE'];
	}
	
	if($qtde!=0){
		$sql  = " SELECT cliente.nome, cliente.cnpj, mercadoria.descricao,  ";
		$sql .= " venda.qtde, vende.data FROM cliente, mercadoria, vende WHERE   ";
		$sql .= " cliente.cnpj = vende.cnpj_forn and vende.cod_mercad = mercadoria.codigo ";
		$sql .= " and (UPPER(vende.data) LIKE UPPER ('%$data%') or mercadoria.codigo = '$mercad')";
		
		echo '<table border="2">';
		echo '<tr>';
		echo '<td>cliente</td>';
		echo '<td>CNPJ</td>';
		echo '<td>Descrição</td>';
		echo '<td>Quantidade</td>';
		echo '<td>Data</td>';
		echo '</tr>';
		foreach($conexao->query($sql) as $item)
		{							
		echo '<tr>';
		echo '<td>' . $item['nome'] . '</td>';
		echo '<td>' . $item['cnpj'] . '</td>';
		echo '<td>' . $item['descricao'] . '</td>';
		echo '<td>' . $item['qtdev'] . '</td>';
		echo '<td>' . $item['data'] . '</td>';
		echo '</tr>';
		}	
		echo '</table>';
	}
	else {
		echo "<h1> Nenhum resultado encontrado, Tente novamente! </h1>";
	}
}
?>
</body>
</meta>
</html>