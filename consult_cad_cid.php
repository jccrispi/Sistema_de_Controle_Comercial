<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
</head>
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
if(isset($_POST['nome'])){
	$nomecid = $_POST['nome'];
	
	if(!$nomecid) {
		echo "<h2> Informe o nome da cidade! </h2>";
		echo "<a href='consult_cid.php' target='principal'><h1>Voltar</h1></a>";
	}
	else{
	
		$sql = "SELECT COUNT(*) QTDE  FROM cidade WHERE UPPER(nome) LIKE UPPER ('$nomecid%')";
		$resultado = $conexao->query($sql);
		foreach($resultado as $valor)
		{
			$qtde = $valor['QTDE'];
		}
		if($qtde!=0){
			echo "<p><h2>Sua busca por '" . $nomecid . "' retornou " .$qtde . " cidade(s):</h2></p>";
			$sql="SELECT nome, codigocid FROM cidade WHERE UPPER(nome) LIKE UPPER ('$nomecid%')";
				echo '<table border="1"  bordercolor="#FFFFFF">';
				echo '<tr>';
				echo '<td><center>Nome   </td>';
				echo '<td><center>Código   </td>';
				echo '</tr>';
				foreach($conexao->query($sql) as $item)
				{							
				echo '<tr>';
				echo '<td bgcolor="#E0DFEE">' . $item['nome'] . '</td>';
				echo '<td bgcolor="#E0DFEE">' . $item['codigocid'] . '</td>';
				echo '</tr>';
				}	
			echo '</table>';
		}
		else {
			echo "<h1> Nenhum resultado encontrado, Tente novamente! </h1>";
			echo "<a href='consult_cid.php' target='principal'><h1>Voltar</h1></a>";
		}
	}
}
echo "<p><br><a href='consult_cid.php' target='principal'><h2>Nova consulta</h2></a></p>";
?>
</body>
</meta>
</html>