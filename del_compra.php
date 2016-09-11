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

<h4>INFORME OS DADOS SOLICITADOS PARA EXCLUIR O(S) PRODUTO(S) DA COMPRA:</h4>

<form method="post" action="del_cad_compra.php">
<br>Código da compra:<br>
<input type="text" name="codcompra" /><br>

<p>Código do produto a ser excluído:<br>
<input type="text" name="prodexcl" /></p>

<input type="submit" value="EXCLUIR" /><br>

</form>
</body>

</html>