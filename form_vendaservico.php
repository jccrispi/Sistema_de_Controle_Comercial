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
	echo '<table border="1" bordercolor="#FFFFFF">';
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


<h4>INFORME OS DADOS SOLICITADOS PARA INCLUIR O(S) SERVIÇO(S) NA VENDA:</h4>


<form method="post" action="cad_vendaservico.php"> 
<p>Serviço:<span style="padding-left:3px"></span>
<select name="servico">
<option value="0" selected="selected">Selecione o serviço</option>
        <?php

          //Ligação ao ficheiro de ligação à BD  
          include('conexao.php');


          //Selecciona as cidades  
          $sql = "SELECT descricaoserv, codigoserv FROM servico";
		  foreach($conexao->query($sql) as $item)
          {
         ?>
				<!-- O value possui o id da cidade a guardar na BD e na option 

mostra as cidades -->
                  <option value="<?php echo $item['codigoserv'];?>"><?php echo 

$item['descricaoserv'];?></option><br/>
			<?php	    
			}
           ?>
</select></p>

<a href='form_vendamercad.php' target='principal'><h4>INSERIR PRODUTO(S)</h4></a>
<a href='del_itemvendaserv.php' target='principal'><h4>CANCELAR ITEM(S)</h4></a>
<a href='finalizavenda.php' target='principal' ><h1>DETALHAMENTO DA VENDA</h1></a>

<center><input type="submit" value="REGISTRAR O SERVIÇO" /></center><br>

</form>

<?php
include('conexao.php');

//Insere o código da venda
$sql = " SELECT MAX(codigovend) maxcod FROM venda";
foreach($conexao->query($sql) as $item)
{
$codvenda=$item['maxcod'];
}	

$sql = "SELECT COUNT(*) QTDE  FROM recai where codvenda = $codvenda";
$resultado = $conexao->query($sql);
foreach($resultado as $valor)
{
	$qtdeprod = $valor['QTDE'];
}
if($qtdeprod){

	$sql  = " SELECT servico.codigoserv, servico.descricaoserv, servico.precserv FROM servico, ";
	$sql .= "  recai  WHERE  recai.codvenda =  $codvenda and ";
	$sql .= " recai.codservico = servico.codigoserv ";
	echo '<center>';
	echo '<right><table bordercolor="#FFFFFF">';
	echo '<tr>';
	echo '<td><center>Serviço</td>';
	echo '<td><center>Código</td>';
	echo '<td><center>Valor</td>';
	echo '</tr>';
	
	foreach($conexao->query($sql) as $item)
	{							
	echo '<tr>';
	echo '<td bgcolor="#E0DFEE"><center>' . $item['descricaoserv'] . '</td>';
	echo '<td bgcolor="#E0DFEE"><center>' . $item['codigoserv'] . '</td>';
	echo '<td bgcolor="#E0DFEE">R$ ' . number_format($item['precserv'],2, ',', '.') . '</td>';
	echo '</tr>';
	}	
	echo '</table>';
	echo '</center>';
}
?>



</body>

</html>
