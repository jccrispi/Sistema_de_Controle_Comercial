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

<h3>ALTERAÇÃO DE DADOS DA COMPRA</h3>
<form method="post" action="alt_compra_mercad.php">
<br>Código da compra:<br>
<input type="text" name="codcompra" /><br>


<h4>INFORME OS DADOS SOLICITADOS PARA MODIFICAR O(S) PRODUTO(S) DA COMPRA:</h4>


<p>Código do produto a ser alterado:<br>
<input type="text" name="mercadalt" /></p>

<p>Novo produto:
<select name="mercadnovo">
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
</select></p>
<p>Quantidade:<span style="padding-left:16px"></span>
<input type="text" name="qtde"/></p><br>

<input type="submit" value="ALTERAR" /><br>

</form>
</body>

</html>
