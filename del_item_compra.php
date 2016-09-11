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
<h3> EXCLUSÃO DE ITENS DA COMPRA</h3>
<form method="post" action="del_engine_itemcompra.php">
<p>Informe os dados solicitados:</p>
Código da compra:
<br><input type="text" name="codcompra" /><br>
Código do produto:
<br><input type="text" name="codprod" /><br>
<p><input type="submit" value="Excluir"/></p>
<p><br><a href='form_compramercad.php' target='principal'><h2>Voltar</h2></a></p>
</body>
</html>