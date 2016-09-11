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
if(isset($_POST['descricao'])){
	$descserv = $_POST['descricao'];
	
	if(!$descserv) {
	echo "<h2> Informe o serviço! </h2>";
	echo "<a href='consult_serv.php' target='principal'><h1>Voltar</h1></a>";
	}
	else{
	
		$sql = "SELECT COUNT(*) QTDE  FROM servico WHERE UPPER(descricaoserv) LIKE UPPER ('%$descserv%')";
		$resultado = $conexao->query($sql);
		foreach($resultado as $valor)
		{
			$qtde = $valor['QTDE'];
		}
		
		if($qtde!=0){
			echo "<p><h2>Sua busca por '" . $descserv . "' retornou " .$qtde . " serviço(s):</h2></p>";
			$sql="SELECT descricaoserv, codigoserv, precserv FROM servico WHERE UPPER(descricaoserv) LIKE UPPER ('%$descserv%')";
				echo '<table border="1"  bordercolor="#FFFFFF">';
				echo '<tr>';
				echo '<td><center>Código   </td>';
				echo '<td><center>Descrição   </td>';
				echo '<td><center>Valor </td>';
				echo '</tr>';
				foreach($conexao->query($sql) as $item)
				{							
				echo '<tr>';
				echo '<td bgcolor="#E0DFEE">' . $item['codigoserv'] . '</td>';
				echo '<td bgcolor="#E0DFEE">' . $item['descricaoserv'] . '</td>';
				echo '<td bgcolor="#E0DFEE">' . $item['precserv'] . '</td>';
				echo '</tr>';
				}	
			echo '</table>';
		}
		else {
			echo "<h1> Nenhum resultado encontrado, Tente novamente! </h1>";
			echo "<a href='consult_serv.php' target='principal'><h1>Voltar</h1></a>";
		}
	}	
}
echo "<p><br><a href='consult_serv.php' target='principal'><h2>Nova consulta</h2></a></p>";
?>
</body>
</meta>
</html>