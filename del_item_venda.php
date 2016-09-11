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
$codvenda = $_POST['codvenda'];
$codprod = $_POST['codprod'];
$sql="DELETE FROM consome WHERE cod_vendamercad = $codvenda and cod_mercad = $codprod";
$resultado = $conexao->exec($sql);
if(!$resultado){
echo "<h2>Erro ao excluir o item!</h2>";
echo "<a href='form_vendamercad.php' target='principal'><h2>Voltar</h2></a>";
}
else
{
echo "<p><h2>Item removido com sucesso!</h2></p><br>";	
echo "<a href='del_itemvendamercad.php' target='principal'><h2>Cancelar outro item</h2></a>";
echo "<a href='form_vendamercad.php' target='principal'><h2>Voltar</h2></a>";
}
?>
</body>
</html>
