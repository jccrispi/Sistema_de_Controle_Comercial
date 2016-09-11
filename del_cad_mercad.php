<html>
<meta charset="utf-8">
<body bgcolor="#FFFFFF" text="#000000" link="#000000" alink="#000000" vlink="#000000" >
<?php
include('conexao.php');
$codigo = $_POST['codigo'];
$sql="DELETE FROM mercadoria WHERE codigomercad = $codigo";
if($codigo == 1) {
echo "<h2>Este item não pode ser excluído!</h2>";
}
else{
$resultado = $conexao->exec($sql);
if(!$resultado){
echo "<h2>Erro ao excluir a mercadoria</h2>";
}
else
{
echo "<h2>Mercadoria excluída com sucesso!</h2>";	
}
}
?>
</body>
</html>