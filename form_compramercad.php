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

//Pesquisa o código da compra
$sql = " SELECT MAX(codcompra) maxcodcompra FROM fornvende";
foreach($conexao->query($sql) as $item)
{
$codfornvende=$item['maxcodcompra'];
}	

	$sql  = " SELECT fornecedor.nome nomeforn, fornecedor.cnpjforn, fornvende.dtcompra, fornvende.codcompra, ";
	$sql .= " fornvende.hrcompra, funcionario.nome nomefunc FROM funcionario, fornecedor, fornvende ";
	$sql .= "  WHERE fornvende.codcompra = $codfornvende and fornecedor.cnpjforn = fornvende.cnpj_forn ";
	$sql .= " and fornvende.cpf_funccompra = funcionario.cpffunc";
	
	echo '<center>';
	echo '<table border="1"  bordercolor="#FFFFFF" >';
	echo '<tr>';
	echo '<td><center>Código da compra</td>';
	echo '<td><center>Data da compra</td>';
	echo '<td><center>Horário</td>';
	echo '<td><center>fornecedor</td>';
	echo '<td><center>CNPJ</td>';
	echo '<td><center>Vendedor</td>';
	
	echo '</tr>';
	foreach($conexao->query($sql) as $item)
	{							
	echo '<tr>';
	echo '<td bgcolor="#E0DFEE"><center>' . $item['codcompra'] . '</td>';
	echo '<td bgcolor="#E0DFEE"><center>' . $item['dtcompra'] . '</td>';
	echo '<td bgcolor="#E0DFEE"><center>' . $item['hrcompra'] . '</td>';
	echo '<td bgcolor="#E0DFEE"><center>' . $item['nomeforn'] . '</td>';
	echo '<td bgcolor="#E0DFEE"><center>' . $item['cnpjforn'] . '</td>';
	echo '<td bgcolor="#E0DFEE"><center>' . $item['nomefunc'] . '</td>';
	
	echo '</tr>';
	}	
	echo '</table>';
	echo '</center>';
?>


<h4>INFORME OS DADOS SOLICITADOS PARA INCLUIR O(S) PRODUTO(S) NA COMPRA:</h4>


<form method="post" action="cad_compramercad.php"> 
Produto:
<select name="mercad">
<option value="0" selected="selected">Selecione o produto</option>
        <?php

          //Ligação ao ficheiro de ligação à BD  
          include('conexao.php');


          //Selecciona as cidades  
          $sql = "SELECT descricaomercad, codigomercad FROM mercadoria";
		  foreach($conexao->query($sql) as $item)
          {
         ?>
				<!-- O value possui o id da cidade a guardar na BD e na option mostra as cidades -->
                  <option value="<?php echo $item['codigomercad'];?>"><?php echo $item['descricaomercad'];?></option><br/>
			<?php	    
			}
           ?>
</select>
Quantidade:
<input type="text" name="qtde" />

<a href='del_item_compra.php' target='principal'><h4>CANCELAR ITEM(S)</h4></a>
<a href='finalizacompra.php' target='principal'><h1>DETALHAMENTO DA COMPRA</h1></a>

<center><input type="submit" value="REGISTRAR O PRODUTO" /></center><br>

</form>

<?php
include('conexao.php');

//Insere o código da compra
$sql = " SELECT MAX(codcompra) maxcod FROM fornvende";
foreach($conexao->query($sql) as $item)
{
$codfornvende=$item['maxcod'];
}	

$sql = "SELECT COUNT(*) QTDE  FROM altera where cod_compra = $codfornvende";
$resultado = $conexao->query($sql);
foreach($resultado as $valor)
{
	$qtdeprod = $valor['QTDE'];
}
if($qtdeprod){

	$sql  = " SELECT mercadoria.codigomercad, mercadoria.descricaomercad, altera.qtdecompra, mercadoria.preccusto ";
	$sql .= " FROM mercadoria, altera  WHERE  altera.cod_compra =  $codfornvende and ";
	$sql .= " altera.cod_mercadcomp = mercadoria.codigomercad ";
	echo '<center>';
	echo '<right><table border="1" bordercolor="#FFFFFF" >';
	echo '<tr>';
	echo '<td><center>Produto</td>';
	echo '<td><center>Código</td>';
	echo '<td><center>Quantidade</td>';
	echo '<td><center>Valor Unitário</td>';
	echo '<td><center>Valor Total do(s) Produto(s)</td>';
	echo '</tr>';
	
	foreach($conexao->query($sql) as $item)
	{							
	echo '<tr>';
	echo '<td bgcolor="#E0DFEE"><center>' . $item['descricaomercad'] . '</td>';
	echo '<td bgcolor="#E0DFEE"><center>' . $item['codigomercad'] . '</td>';
	echo '<td bgcolor="#E0DFEE"><center>' . $item['qtdecompra'] . '</td>';
	echo '<td bgcolor="#E0DFEE">R$ ' . $item['preccusto'] . '</td>';
	$total = $item['preccusto']*$item['qtdecompra'];
	echo '<td bgcolor="#E0DFEE"> R$ ' . number_format($total,2, ',', '.') . '</td>';
	echo '</tr>';
	}	
	echo '</table>';
	echo '</center>';
}
?>



</body>

</html>
