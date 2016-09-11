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
$forn = $_POST['forn'];
$data = gmdate("d/m/Y");
$time = mktime(date('H')-3, date('i'), date('s'));
$hora = gmdate("H:i:s", $time);

//Buscar CPF do funcionário
$sql  = " SELECT numcpf FROM login WHERE  cod = 1";
			foreach($conexao->query($sql) as $item) {
			$cadcpf = $item['numcpf'];
			}	


$sql = "INSERT INTO fornvende (cnpj_forn, dtcompra, hrcompra, cpf_funccompra) values ";
$sql .= "('$forn','$data','$hora','$cadcpf')";
$resultado = $conexao->exec($sql);
if(!$resultado){
echo "<h2>Erro ao registrar a compra</h2>";
echo "<a href='novo_compra.php' target='principal'><h1>Voltar</h1></a>";
}
else
{
include ('form_compramercad.php');
}
?>
</body>
</html>