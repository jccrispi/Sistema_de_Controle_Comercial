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
$nome = $_POST['nome'];
$cnpj = $_POST['cnpj'];
$inscricao = $_POST['inscricao'];
$rua = $_POST['rua'];
$numero = $_POST['numero'];
$bairro = $_POST['bairro'];
$codcidade = $_POST['cidade'];
$cep = $_POST['cep'];
$sql = "INSERT INTO fornecedor (nome, cnpjforn, inscricaoforn, rua, numero, bairro, cep, cod_cid) values ";
$sql .= "('$nome','$cnpj','$inscricao','$rua','$numero','$bairro','$cep','$codcidade')";
$resultado = $conexao->exec($sql);
if(!$resultado){
echo "<h2>Erro ao realizar o cadastro</h2>";
echo "<a href='novo_forn.php' target='principal'><h1>Voltar</h1></a>";
}
else
{
echo "<h2>Fornecedor cadastrado com sucesso!</h2>";	
echo "<a href='novo_forn.php' target='principal'><h1>Novo fornecedor</h1></a>";
}
?>
</body>
</html>