<html>
<meta charset="utf-8">
<body bgcolor="#FFFFFF" text="#000000" link="#000000" alink="#000000" vlink="#000000" >
<?php
include('conexao.php');
$codigo = $_POST['codigo'];
if($codigo == 1) {
echo "<h2>Este item não pode ser excluído!</h2>";
}
else{
$sql="DELETE FROM servico WHERE codigoserv = $codigo";
$resultado = $conexao->exec($sql);
if(!$resultado){
echo "<h2>Erro ao excluir o serviço</h2>";
echo "<a href='del_serv.php' target='principal'><h1>Voltar</h1></a>";
}
else
{
echo "<h2>Serviço excluído com sucesso!</h2>";
echo "<a href='del_serv.php' target='principal'><h1>Voltar</h1></a>";
}
}
?>
</body>
</html>