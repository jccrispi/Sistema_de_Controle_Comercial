<html>
<meta charset="utf-8">
<body bgcolor="#FFFFFF" text="#000000" link="#000000" alink="#000000" vlink="#000000" >
<?php
include('conexao.php');
$codigo = $_POST['codigo'];
$nome = $_POST['nome'];
$sql="UPDATE cidade SET nome ='$nome' WHERE codigocid = $codigo";
$resultado = $conexao->exec($sql);
if(!$resultado){
echo "<h2>Erro ao realizar a alteração</h2>";
echo "<a href='alt_cid.php' target='principal'><h1>Voltar</h1></a>";

}
else
{
echo "<h2>Alteração de cadastro realizada com sucesso!</h2>";
echo "<a href='alt_cid.php' target='principal'><h1>Voltar</h1></a>";	
}

?>
</body>
</html>