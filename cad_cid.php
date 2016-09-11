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
if(!$nome) {
echo "<h2>Informe o nome da cidade!</h2>";
echo "<a href='novo_cid.php' target='principal'><h1>Voltar</h1></a>";
}
else{
$sql = "INSERT INTO cidade (nome) values ('$nome')";
$resultado = $conexao->exec($sql);
if(!$resultado){
echo "<h2>Erro ao realizar o cadastro</h2>";
}
else
{
echo "<h2>Cidade cadastrada com sucesso!</h2>";	
echo "<a href='novo_cid.php' target='principal'><h1>Nova cidade</h1></a>";
}
}
?>
</body>
</html>