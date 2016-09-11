<html>
<meta charset="utf-8">
<body bgcolor="#FFFFFF" text="#000000" link="#000000" alink="#000000" vlink="#000000" >
<?php
include('conexao.php');
$cpf = $_POST['cpf'];
$sql="DELETE FROM funcionario WHERE cpffunc = $cpf";
$resultado = $conexao->exec($sql);
if(!$resultado){
echo "<h2>Erro ao excluir o cadastro do funcionário</h2>";
echo "<a href='del_func.php' target='principal'><h2>Voltar</h2></a>";
}
else
{
echo "<h2>Cadastro removido com sucesso!</h2>";	
echo "<a href='del_func.php' target='principal'><h2>Voltar</h2></a>";
}
?>
</body>
</html>
