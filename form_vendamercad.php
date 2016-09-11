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

//Pesquisa o código da venda
$sql = " SELECT MAX(codigovend) maxcod FROM venda";
foreach($conexao->query($sql) as $item)
{
$codvenda=$item['maxcod'];
}	


	$sql  = " SELECT cliente.nome nomecli, cliente.cnpjcli, venda.dtvenda, venda.codigovend, ";
	$sql .= " venda.preventrega, venda.hrvenda, funcionario.nome nomefunc FROM funcionario, cliente, venda ";
	$sql .= "  WHERE venda.codigovend = $codvenda and cliente.cnpjcli = venda.cnpj_cliente ";
	$sql .= " and venda.cpf_func = funcionario.cpffunc";
	echo '<center>';
	echo '<table border="1"  bordercolor="#FFFFFF" >';
	echo '<tr>';
	echo '<td><center>Código da Venda</td>';
	echo '<td><center>Data da Venda</td>';
	echo '<td><center>Horário</td>';
	echo '<td><center>Cliente</td>';
	echo '<td><center>CNPJ</td>';
	echo '<td><center>Previsão de Entrega</td>';
	echo '<td><center>Vendedor</td>';
	
	echo '</tr>';
	foreach($conexao->query($sql) as $item)
	{							
	echo '<tr>';
	echo '<td bgcolor="#E0DFEE"><center>' . $item['codigovend'] . '</td>';
	echo '<td bgcolor="#E0DFEE"><center>' . $item['dtvenda'] . '</td>';
	echo '<td bgcolor="#E0DFEE"><center>' . $item['hrvenda'] . '</td>';
	echo '<td bgcolor="#E0DFEE"><center>' . $item['nomecli'] . '</td>';
	echo '<td bgcolor="#E0DFEE"><center>' . $item['cnpjcli'] . '</td>';
	echo '<td bgcolor="#E0DFEE"><center>' . $item['preventrega'] . '</td>';
	echo '<td bgcolor="#E0DFEE"><center>' . $item['nomefunc'] . '</td>';
	
	echo '</tr>';
	}	
	echo '</table>';
	echo '</center>';
?>


<h4>INFORME OS DADOS SOLICITADOS PARA INCLUIR O(S) PRODUTO(S) NA VENDA:</h4>


<form method="post" action="cad_vendamercad.php"> 
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

<a href='form_vendaservico.php' target='principal'><h4>INSERIR SERVIÇO(S)</h4></a>
<a href='del_itemvendamercad.php' target='principal'><h4>CANCELAR ITEM(S)</h4></a>
<a href='finalizavenda.php' target='principal'><h1>DETALHAMENTO DA VENDA</h1></a>

<center><input type="submit" value="REGISTRAR O PRODUTO" /></center><br>

</form>

<?php
include('conexao.php');

//Insere o código da venda
$sql = " SELECT MAX(codigovend) maxcod FROM venda";
foreach($conexao->query($sql) as $item)
{
$codvenda=$item['maxcod'];
}	

$sql = "SELECT COUNT(*) QTDE  FROM consome where cod_vendamercad = $codvenda";
$resultado = $conexao->query($sql);
foreach($resultado as $valor)
{
	$qtdeprod = $valor['QTDE'];
}
if($qtdeprod){

	$sql  = " SELECT mercadoria.codigomercad, mercadoria.descricaomercad, consome.qtdemercvenda, mercadoria.precmercad ";
	$sql .= " FROM mercadoria, consome  WHERE  consome.cod_vendamercad =  $codvenda and ";
	$sql .= " consome.cod_mercad = mercadoria.codigomercad ";
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
	echo '<td bgcolor="#E0DFEE">' . $item['qtdemercvenda'] . '</td>';
	echo '<td bgcolor="#E0DFEE">R$ ' . number_format($item['precmercad'],2, ',', '.') . '</td>';
	$total = $item['precmercad']*$item['qtdemercvenda'];
	echo '<td bgcolor="#E0DFEE">R$ ' . number_format($total,2, ',', '.') . '</td>';
	echo '</tr>';
	}	
	echo '</table>';
	echo '</center>';
}
?>



</body>

</html>
