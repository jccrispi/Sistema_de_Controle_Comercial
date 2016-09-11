<html>
<meta charset="utf-8">
<body bgcolor="#FFFFFF" text="#000000" link="#000000" alink="#000000" vlink="#000000" >
<?php
include('conexao.php');
$codigo = $_POST['codigo'];
$sql="DELETE FROM cidade WHERE codigocid = $codigo";
$resultado = $conexao->exec($sql);
if(!$resultado){
echo "<h2>Erro ao excluir a cidade</h2>";
echo "<a href='del_cid.php' target='principal'><h2>Voltar</h2></a>";
}
else
{
echo "<h2>Cidade excluída com sucesso!</h2>";	
echo "<a href='del_cid.php' target='principal'><h2>Voltar</h2></a>";
}
?>
</body>
</html>