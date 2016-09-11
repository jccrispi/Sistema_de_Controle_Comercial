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
<h3>INFORME O DADO SOLICITADO PARA INICIAR A COMPRA:</h3>
<form method="post" action="cad_compra.php"> 
<?php
$time = mktime(date('H')-3, date('i'), date('s'));
$hora = gmdate("d/m/Y - H:i:s", $time);
echo "<h3>  $hora </h3>";
?>
<p>Fornecedor:<br>
<select name="forn">
<option value="0" selected="selected">Selecione um fornecedor</option>
        <?php

          //Ligação ao ficheiro de ligação à BD  
          include('conexao.php');


          //Selecciona as cidades  
          $sql = "SELECT nome, cnpjforn FROM fornecedor";
		  foreach($conexao->query($sql) as $item)
          {
         ?>
				<!-- O value possui o id da cidade a guardar na BD e na option mostra as cidades -->
                  <option value="<?php echo $item['cnpjforn'];?>"><?php echo $item['nome'];?></option><br/>
			<?php	    
			}
           ?>
</select></p>

<p><input type="submit" value="CONTINUAR" /></p>
</form>
</body>
</html>