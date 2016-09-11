<html>
<meta charset="utf-8">
<body bgcolor="#FFFFFF" text="#000000" link="#000000" alink="#000000" vlink="#000000" >
<?php
include('conexao.php');
$nome = $_POST['nome'];
$cnpj = $_POST['cnpj'];
$inscricao = $_POST['inscricao'];
$rua = $_POST['rua'];
$numero = $_POST['numero'];
$bairro = $_POST['bairro'];
$codcidade = $_POST['cidade'];
$cep = $_POST['cep'];
$sql = "UPDATE cliente SET nome ='$nome', inscricao='$inscricao', rua='$rua', numero='$numero', ";
$sql .= "bairro='$bairro', cep='$cep', cod_cid='$codcidade' WHERE cnpjcli = $cnpj";
$resultado = $conexao->exec($sql);
if(!$resultado){
echo "<h2>Erro ao realizar a alteração</h2>";
echo "<a href='alt_cliente.php' target='principal'><h1>Voltar</h1></a>";
}
else
{
echo "<h2>Alteração de cadastro realizada com sucesso!</h2>";	
echo "<a href='alt_cliente.php' target='principal'><h1>Voltar</h1></a>";
}

?>
</body>
</html>